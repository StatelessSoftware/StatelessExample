<?php

namespace App\View;

use \App\Layout\Container;

final class HomePage extends Page {

    /**
     * Construct a new Home Page
     */
    public function __construct($title = "Stateless Example", $bodyClass = "page-home") {

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
        echo "<p>Welcome home!</p>";

    }

};
