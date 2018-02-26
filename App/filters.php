<?php

// Filters are functions that can be passed a type of data, filter it,
// and return the filtered data.  Filters can be passed into FormInputs
// as the "filter" attribute, and when you getValues() for your form, the
// values will automatically be passed through your filters.  You can also
// use them in other places to ensure data is filtered properly.
//
// Respect/Validator is a great PHP library for validating and filtering
// data.  Many of the prebuilt filters use the library.  Further documentation
// for the Validator can be found at
// https://github.com/Respect/Validation

use Respect\Validation\Validator;

/**
 * Filter email
 * 
 * @param string $email Email to filter
 * @return string Returns the filtered email
 */
function filterEmail($email) {
    return filter_var($email, FILTER_SANITIZE_EMAIL);
}
