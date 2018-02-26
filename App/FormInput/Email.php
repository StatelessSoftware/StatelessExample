<?php

namespace App\FormInput;

final class Email extends \Stateless\FormInput {

    /**
     * Construct a new FormInput
     * 
     * @param array $attributes Key/value pairs to pass to the FormInput
     */
    public function __construct($attributes = []) {

        // Set default attributes
        $defaults = [
            "label" => "Email",
            "slug" => "email",
            "type" => "email",
            "validate" => "validateEmail",
            "description" => "Please enter your email address.",
            "required" => true,
            "hint" => "This should be a valid email address."
        ];

        // Merge defaults
        $attributes = array_merge($defaults, $attributes);

        // Create the Input
        parent::__construct($attributes);

    }

};
