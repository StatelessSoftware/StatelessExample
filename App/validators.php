<?php

// Validators are functions that can be passed a type of data, and return
// if the data is valid or not.  Validators can be passed into FormInputs
// as the "validate" attribute, and the form will only be considered valid
// if the validation function returns true.  You can also use validators
// in other places in your application to ensure data is valid.
//
// Respect/Validator is a great PHP library for validating and filtering
// data.  Many of the prebuilt validators use the library.  Further
// documentation for the Validator can be found at
// https://github.com/Respect/Validation

use Respect\Validation\Validator;

/**
 * Validate Sample
 * 
 * @param string $sample Sample string to validate
 * @return bool Returns if the sample string is valid
 */
function validateSample($sample) {
    
    // This sample validator will check if the $sample string is a string
    // and at least 15 characters long, and then return the result
    if (!empty($sample) && is_string($sample) && strlen($sample) >= 15) {

        // String is valid
        return true;

    }
    else {
        
        // String is not valid
        return false;

    }

}

/**
 * Validate email
 * 
 * @param string $email Email address to validate
 * @return bool Returns if the email address is valid
 */
function validateEmail($email) {
    $emailValidator = Validator::email()->length(1, 255);
    return $emailValidator->validate($email);
}

/**
 * Validate username
 * 
 * @param string $username Username to validate
 * @return bool Returns if the username is valid
 */
function validateUsername($username) {
    $usernameValidator = Validator::alnum()->noWhitespace()->length(2, 16);
    return $usernameValidator->validate($username);
}

/**
 * Validate name
 * 
 * @param string $name Name to validate
 * @return bool Returns if the name is valid
 */
function validateName($name) {
    $nameValidator = Validator::alpha("`',.")->noWhitespace()->length(1, 100);

    return $nameValidator->validate($name);
}

/**
 * Validate password
 * 
 * @param string $password Password to validate
 * @return bool Returns if the password is valid
 */
function validatePassword($password) {
    $passwordValidator = Validator::alnum("<>?~!@#$%^&*()-=_+[]{}|;:'\"/\\")->
        noWhitespace()->length(6, 16);
    return $passwordValidator->validate($password);
}

