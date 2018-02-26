<?php

namespace App\FormInput;

final class LastName extends \Stateless\FormInput {

    /**
     * Construct a new FormInput
     * 
     * @param array $attributes Key/value pairs to pass to the FormInput
     */
    public function __construct($attributes = []) {

        // Set default attributes
        $defaults = [
            "label" => "Last Name",
            "slug" => "lname",
            "type" => "text",
            "validate" => "validateName",
            "description" => "Please enter your last name.",
            "required" => true,
            "hint" => "Your last name be no longer than 100 letters."
        ];

        // Merge defaults
        $attributes = array_merge($defaults, $attributes);

        // Create the Input
        parent::__construct($attributes);

    }

};
