<?php

namespace App\Form;

use Stateless\Crypto;
use Stateless\Response;
use App\Layout\Alert;

final class SignUp extends \Stateless\Form {

    /**
     * Initialize this form
     */
    public function __construct() {
        
        // Form name
        $this->name = "sample-form";
        
        // Cipher key
        $this->cipherKey = CIPHER_KEY;

        // Inputs

        $this->inputs[] = new \App\FormInput\Email();
        $this->inputs[] = new \App\FormInput\Username([
            "description" => "Your username should be between 2-16 letters and " .
                "numbers."
        ]);
        $this->inputs[] = new \App\FormInput\Password([
            "description" => "Your password should be 2-16 characters."
        ]);
        $this->inputs[] = new \App\FormInput\Password([
            "label" => "Confirm Password",
            "description" => "Please enter your password again.",
            "slug" => "cpassword"
        ]);
        $this->inputs[] = new \App\FormInput\FirstName();
        $this->inputs[] = new \App\FormInput\LastName();
        $this->inputs[] = new \App\FormInput\Submit();

        // Construct the form
        parent::__construct();

    }
    
    /**
     * Handle valid Form submissions
     */
    public function onValid() {

        global $db;

        // Get the form values
        $values = $this->getValues();

        // Check if passwords match
        if ($values["password"] !== $values["cpassword"]) {

            $this->result = false;
            $this->error = "Passwords do not match.  Please re-enter your " .
                "passwords and try again.";


        }
        else {

            // Remove confirm password field
            unset($values["cpassword"]);

            // Find any conflicting users
            $nMatches = $db->nRowsMatch("Users", [
                "username" => $values["username"],
                "email" => $values["email"]
            ]);

            // Check conflicts
            if ($nMatches) {

                $this->result = false;
                $this->error = "Username or email address already exists.";

            }
            // No conflicts
            else {

                // Hash the password
                $values["password"] = Crypto::hash($values["password"]);
            
                // Create user
                $user = new \App\Model\User();
                $user->fromArray($values);

                // Insert user
                $this->result = $user->insert($db);

                // Sign the user in
                $user->signin();

                // Set error message
                $this->error = "User could not be created.  Please try again later.";
    
            }

        }

    }

    /**
     * Show the Form and submission results
     */
    public function show() {

        // Check if a result was set
        if (isset($this->result)) {

            // Check the result
            if ($this->result) {

                // Redirect to profile
                Response::redirect("/profile");

            }
            else {

                // Create error message
                $message = new Alert(
                    "Sign Up Failed.",
                    $this->error,
                    "danger"
                );

                // Show the message
                $message->show();

            }

        }

        // Show the parent
        parent::show();

    }

};
