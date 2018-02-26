<?php

namespace App\View;

use \App\Layout\Container;

final class Page404 extends Page {

    /**
     * Construct a new Home Page
     */
    public function __construct($title = "Page Not Found",
        $bodyClass = "page-404") {

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
        echo "<p>That page was not found.</p>";

    }

};
