<?php

namespace App\FormInput;

final class Sample extends \Stateless\FormInput {

    /**
     * Construct a new FormInput
     * 
     * @param array $attributes Key/value pairs to pass to the FormInput
     */
    public function __construct($attributes = []) {

        /// The following example creates a Sample field,
        /// will run it through your validate function
        /// and shows the hint if the input is invalid.  If it is
        /// valid, it will run it through your filter function and
        /// then show up as the "username" index when you getValues() in the Form

        // Set default attributes
        $defaults = [
            "label" => "Sample",
            "slug" => "sample",
            "type" => "text",
            "validate" => "validateSample",
            "description" => "Enter sample text here",
            "required" => true,
            "filter" => "filterHTML",
            "hint" => "Your sample text should be no longer than 15 characters."
        ];

        // Merge defaults
        $attributes = array_merge($defaults, $attributes);

        // Create the Input
        parent::__construct($attributes);

    }

};
