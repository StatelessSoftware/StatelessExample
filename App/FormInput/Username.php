<?php

namespace App\FormInput;

final class Username extends \Stateless\FormInput {

    /**
     * Construct a new FormInput
     * 
     * @param array $attributes Key/value pairs to pass to the FormInput
     */
    public function __construct($attributes = []) {

        // Set default attributes
        $defaults = [
            "label" => "Username",
            "slug" => "username",
            "type" => "username",
            "validate" => "validateUsername",
            "description" => "Please enter your username.",
            "required" => true,
            "hint" => "Your username should be 2-16 letters and numbers only, " .
                "and should begin with a letter."
        ];

        // Merge defaults
        $attributes = array_merge($defaults, $attributes);

        // Create the Input
        parent::__construct($attributes);

    }

};
