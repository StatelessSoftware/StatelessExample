<?php

namespace App\FormInput;

final class Submit extends \Stateless\FormInput {

    /**
     * Construct a new FormInput
     * 
     * @param array $attributes Key/value pairs to pass to the FormInput
     */
    public function __construct($attributes = []) {

        // Set default attributes
        $defaults = [
            "type" => "submit",
            "value" => "Submit",
            "attributes" => [
                "class" => "form-control btn btn-primary"
            ]
        ];

        // Merge defaults
        $attributes = array_merge($defaults, $attributes);

        // Create the Input
        parent::__construct($attributes);

    }

};
