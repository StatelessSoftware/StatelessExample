<?php

namespace App;

use Stateless\Session;

// Globals
global $db;
global $user;
global $siteTitle;

// Dependencies
try {
    require_once("../vendor/autoload.php");
}
catch (\Exception $e) {
    die("Not Installed - Please run install script.");
}

// Files
require_once("functions.php");
require_once("filters.php");
require_once("validators.php");

// Configuration
require_once("../conf/app.conf.php");

// Start session
startSession();

// Create database connection
$db = new \Stateless\Database(
    DB_HOST,
    DB_USER,
    DB_PASS,
    DB_NAME
);

$user = false;

// Check database connection
if ($db) {

    $installed = null;

    // Try to get the settings
    try {

        // Site title
        $siteTitle = getSetting("site_title");

    }
    catch (\Exception $e) {

        // Start installation
        require_once("install.php");
        $installed = install($db);

        if (!$installed) {
            die ("An error occurred trying to install.");
        }

    }

    // Check if a user is logged in
    if (Session::isActive()) {
        $userID = Session::getUserId();

        // Pull user
        $user = new \App\Model\User();
        $user = $user->find($db, $userID);

    }

    // Start routing 
    $controller = new Controller\Controller();
    $controller->start();

}
else {

    // Database error
    // TODO - Show a database error

}

// Done
exit;
