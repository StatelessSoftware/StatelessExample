<?php

namespace App\Form;

use Stateless\Response;
use App\Model\User;
use App\Layout\Alert;

final class SignIn extends \Stateless\Form {

    /**
     * Initialize this Form
     */
    public function init() {

        // Name
        $this->name = "sign-in";

        // Cipher key
        $this->cipherKey = CIPHER_KEY;

        // Inputs
        $this->inputs = [
            new \App\FormInput\Username(),
            new \App\FormInput\Password(),
            new \App\FormInput\Submit()
        ];

        // Initialize parent
        parent::init();
    }

    /**
     * Handle valid Form submissions
     */
    public function onValid() {

        global $db;

        // Create User
        $user = new User();
        $user->fromArray($this->getValues());

        // Authenticate
        $this->result = $user->authenticate($db);

        // Redirect to profile
        if ($this->result) {
            Response::redirect("/profile");
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

                // Create success message
                $message = new Alert(
                    "Welcome",
                    "<a href=\"/profile\">Go to your profile</a>",
                    "success"
                );

            }
            else {

                // Create error message
                if (!$this->error) {
                    $this->error = "Login failed.  Please try again.";
                }

                $message = new Alert(
                    "Login failed.",
                    $this->error,
                    "danger"
                );

            }

            // Show message
            $message->show();

        }

        // Show this form
        parent::show();

    }

};
