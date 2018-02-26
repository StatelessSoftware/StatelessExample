<?php

namespace App\View;

final class Sample extends Page {

    /**
     * Construct a new Sample Page
     */
    public function __construct($title = "Sample", $bodyClass = "page-sample") {

        // Construct the Page
        parent::__construct($title, $bodyClass);

    }

    /**
     * Show the View
     */
    public function show() {
        
        // Open the view
        parent::show();

        // TODO - Output page code

        // Page title
        echo "<p>This is a sample page!</p>";

    }

};
