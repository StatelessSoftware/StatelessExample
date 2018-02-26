<?php

namespace App\FormInput;

final class FirstName extends \Stateless\FormInput {

    /**
     * Construct a new FormInput
     * 
     * @param array $attributes Key/value pairs to pass to the FormInput
     */
    public function __construct($attributes = []) {

        // Set default attributes
        $defaults = [
            "label" => "First Name",
            "slug" => "fname",
            "type" => "text",
            "validate" => "validateName",
            "description" => "Please enter your first name.",
            "required" => true,
            "hint" => "Your first name be no longer than 100 letters."
        ];

        // Merge defaults
        $attributes = array_merge($defaults, $attributes);

        // Create the Input
        parent::__construct($attributes);

    }

};
