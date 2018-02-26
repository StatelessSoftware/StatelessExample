<?php

namespace App\View;

use \App\Layout\Container;

final class Profile extends Page {

    public $user = false;

    /**
     * Construct a new Home Page
     */
    public function __construct($_user = false,
        $bodyClass = "page-profile") {

        global $user;

        if ($_user) {
            $this->user = $_user;
        }
        else {
            $this->user = $user;
        }

        $title = $this->user->username;

        // Construct the Page
        parent::__construct($title, $bodyClass);

    }

    /**
     * Show the View
     */
    public function show() {
        
        // Open the view
        parent::show();

        if ($this->user) {

            $fname = $this->user->fname;
            $lname = $this->user->lname;

            /// Body paragraph
            echo "<p>Welcome to your profile, " .
                $fname . " " . $lname . ".</p>";

        }

    }

};
