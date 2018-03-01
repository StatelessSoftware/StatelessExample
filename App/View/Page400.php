<?php

namespace App\View;

use \App\Layout\Container;

final class Page400 extends Page {

    /**
     * Construct a new Home Page
     */
    public function __construct($title = "Not Signed In",
        $bodyClass = "page-400") {

        // Construct the Page
        parent::__construct($title, $bodyClass);

    }

    /**
     * Show the View
     */
    public function show() {
        
        // Open the view
        parent::show();

        // Output page code

        /// Body paragraph
        echo "<p>You are not signed in.  Go <a href=\"/sign-in\">Sign In</a></p>";

    }

};
