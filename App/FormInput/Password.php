<?php

namespace App\FormInput;

final class Password extends \Stateless\FormInput {

    /**
     * Construct a new FormInput
     * 
     * @param array $attributes Key/value pairs to pass to the FormInput
     */
    public function __construct($attributes = []) {

        // Set default attributes
        $defaults = [
            "label" => "Password",
            "slug" => "password",
            "type" => "password",
            "required" => true,
            "validate" => "validatePassword",
            "hint" => "Your password should be between 6-16 characters"
        ];

        // Merge defaults
        $attributes = array_merge($defaults, $attributes);

        // Create the Input
        parent::__construct($attributes);

    }

};
