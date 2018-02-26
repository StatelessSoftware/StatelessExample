<?php

namespace App\Form;

use App\Layout\Alert;

final class Sample extends \Stateless\Form {

    /**
     * Initialize this form
     */
    public function __construct() {
        
        // Form name
        $this->name = "sample-form";
        
        // Cipher key
        $this->cipherKey = CIPHER_KEY;
        
        // Set the form encoding for file uploads
        /// Uncomment this if your form has any file uploads
        /// $this->attributes["enctype"] = "multipart/form-data";
 
        // Inputs

        /// Create your form inputs in the $this->inputs array
        /// i.e
        /// $this->inputs[] = new \App\FormInput\Username();
        /// $this->inputs[] = new \App\FormInput\Password();

        $this->inputs = new \App\FormInput\Sample();

        // Construct the form
        parent::__construct();

    }
    
    /**
     * Handle valid Form submissions
     */
    public function onValid() {

        // Get the form values
        $values = $this->getValues();

        /// This event will run when the form is submitted, and the form and all
        /// inputs are valid.  You can interact with your models here, and set
        /// $this->result and $this->error to pass the state to show()
        ///
        /// Example -
        /// if ($values["username"] === "tom" && $values["password"] === 123) {
        ///     $this->result = true;            
        /// }
        /// else {
        ///     $this->result = false;
        ///     $this->error = "Username is not set";
        /// }

        if (empty($values["sample"])) {

            $this->result = false;
            $this->error = "Sample input should not be empty!";

        }
        else {

            $this->result = true;

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
                    "Success",
                    "Form submission success.  " . $pageLink,
                    "success"
                );

            }
            else {

                // Create error message
                $message = new Alert(
                    "Form Submission Failed.",
                    $this->error,
                    "danger"
                );

            }

            // Show the message
            $message->show();

        }

        // Show the parent
        parent::show();

    }

};
