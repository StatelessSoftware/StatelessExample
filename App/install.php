<?php

function install($db) {

    try {
    
        // Install each model
        installModels($db, "App/Model/*.php");

        // Create additional installation steps here

    
    }
    catch (\Exception $e) {
        return false;
    }

    return true;

}

/**
 * Install all models containing an install() method
 * 
 * @param $db Database Database to create tables in
 * @param $path Directory path to find Models to install
 */
function installModels($db, $path) {

    $path = dirname(__FILE__) . "/Model/*.php";

    // Load the directory
    foreach (glob($path) as $file) {

        require_once($file);
        $class = "\\App\\Model\\" . basename($file, ".php");

        if (class_exists($class)) {
            $obj = new $class;
            
            if (method_exists($obj, "install")) {
                $obj->install($db);
            }

        }

    }

}
