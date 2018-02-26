<?php

namespace App\Model;

use Stateless\Crypto;
use Stateless\DatabaseColumn;

class User extends \Stateless\Model {

    // User userId
    public $userId;

    // User name
    public $username;

    // Full name
    public $name;

    // Email
    public $email;

    // Password
    public $password;

    // Role
    public $role;

    // Status
    public $status;

    // First name
    public $fname;

    // Last name
    public $lname;

    // Registration timestamp
    public $timeCreated;

    // Last access timestamp
    public $timeAccessed;

    /**
     * Insert the user into a database
     * 
     * @param Database $db Stateless Database object to insert the User into
     * @return mixed Returns $this on success, or false on failure
     */
    public function insert($db) {

        // Create payload
        $payload = $this->toArray();

        // Insert row
        $result = $db->insert("Users", $payload);

        // Check result
        if ($result) {

            // Get insert ID
            $this->userId = intval($db->lastInsertId());

        }

        // Return result
        return $result ? $this : false;
        
    }

    /**
     * Validate this user
     */
    public function validate() {

        // Validate username
        if (!validateUsername($this->username)) {

            throw new \Exception ("Username is not valid.");

        }

    }

    /**
     * Create the table in the database
     */
    public function install($db) {

        $fields["userId"] = new DatabaseColumn("userId", "int", true);

        $fields["username"] = new DatabaseColumn("username", "varchar");
        $fields["username"]->size = 16;
        $fields["username"]->require = true;
        $fields["username"]->unique = true;

        $fields["email"] = new DatabaseColumn("email", "varchar");
        $fields["email"]->size = 255;
        $fields["email"]->require = true;
        $fields["email"]->unique = true;

        $fields["password"] = new DatabaseColumn("password", "varchar");
        $fields["password"]->size = 255;
        $fields["password"]->require = true;

        $fields["role"] = new DatabaseColumn("role", "varchar");
        $fields["role"]->size = 16;
        $fields["role"]->default = "guest";

        $fields["status"] = new DatabaseColumn("status", "varchar");
        $fields["status"]->size = 16;
        $fields["status"]->default = "active";

        $fields["fname"] = new DatabaseColumn("fname", "varchar");
        $fields["fname"]->size = 100;
        $fields["fname"]->require = true;

        $fields["lname"] = new DatabaseColumn("lname", "varchar");
        $fields["lname"]->size = 100;
        $fields["lname"]->require = true;

        $fields["timeCreated"] = new DatabaseColumn("timeCreated",
            "timestamp", true);

        $fields["timeAccessed"] = new DatabaseColumn("timeAccessed",
            "timestamp", true);
    
        
        $db->createTable("Users", $fields);

    }

    /**
     * Authenticate this user
     * 
     * @param Database $db Database to authenticate with
     * @return mixed Returns the User ID on success, or false on failure
     */
    public function authenticate($db) {

        // Select matching users from the database
        $results = $db->preparedSelect(
            "SELECT * FROM `Users` WHERE (email=? OR username=?)",
            [
                $this->username,
                $this->username
            ]);

        // Loop through matches
        foreach ($results as $result) {
            // Check for a password
            if (array_key_exists("password", $result) &&
                array_key_exists("userId", $result)) {

                if (Crypto::verifyHash($this->password, $result["password"])) {
                    $userId = $result["userId"];

                    // Create a Session for the user
                    \Stateless\Session::create([
                        "cipherKey" => CIPHER_KEY,
                        "uuid" => $userId,
                        "salt" => CRYPTO_SALT,
                        "pepperLength" => CRYPTO_PEPPER_LEN
                    ]);

                    // Return this user
                    return $userId;
                }

            }
        }

        return false;
    }

    /**
     * Sign the user out of their session
     */
    public function signout() {

        // Destroy the users session
        session_destroy();

    }

    /**
     * Update this user in the database
     * 
     * @param Database $db Database to update the user in
     * @return bool Returns if the user was inserted successfully
     */
    public function update($db, $payload = false) {

        // Check for a passed payload
        if ($payload === false) {

            // If no payload, push this object
            $payload = $this->toArray();

        }
        
        // Check that we have an ID to update by
        if (!isset($payload["userId"])) {
            throw new \Exception ("Cannot update User without an ID");
        }

        // Create where
        $where = ["userId" => $this->userId];

        // Update user
        return $db->update("Users", $payload, $where);
        
    }

    /**
     * Find a single User in the database, and set this object to it
     * 
     * @param Database $db Database to search in
     * @param int $userId User ID to pull by
     * @param string $user Username or Email to search by
     * @return mixed  Returns this if a user was found, otherwise false
     */
    public function find($db, $userId = -1, $user = -1) {

        // Pull matching users from the database
        $results = $db->preparedSelect(
            "SELECT * FROM `Users` WHERE (userId=? OR username=? OR email=?)",
            [
                $userId,
                $user,
                $user
            ]
        );

        // Loop through results
        foreach ($results as $result) {

            // Set this object to the result
            $this->fromArray($result);

            // Return the result
            return $this;

        }

        // Could not find any matches
        return false;
        
    }

    /**
     * Find all matching users
     *
     * @param Database $db Database connection to search
     * @param int $userId User ID to find by
     * @param string $username User username to find
     * @param string $email User email to find
     * @return array Returns an array of User objects found, or an empty array
     */
    public function findUsers($db, $userId = false, $username = false,
        $email = false) {

        // Build payload
        $payload = [];
    
        if ($userId) {
            $payload["userId"] = $userId;
        }
    
        if ($username) {
            $payload["username"] = $username;
        }
    
        if ($email) {
            $payload["email"] = $email;
        }
    
        // Get results from database
        $results = $db->selectBy("Users", $payload);
        $users = [];
    
        // Check for matches
        if ($results) {

            // Loop through matches
            foreach ($results as $result) {

                // Create a new user
                $key = new User();
                $key->fromArray($result);

                // Add the user to the results
                $users[] = $key;

            }
        }
    
        // Return results
        return $users;

    }

    /**
     * Hash the user's password
     */
    public function hash() {
        if ($this->password) {
            $this->password = Crypto::hash($this->password);
        }
    }

};
