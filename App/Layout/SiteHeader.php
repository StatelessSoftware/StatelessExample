<?php

namespace App\Layout;
use \Stateless\Session;

final class SiteHeader extends \Stateless\Layout {
    public function __construct() {

    }

    /**
     * Do not use this object's get method
     */
    public function get() {
        throw new \Exception ("SiteHeader::get() does not exist.  Please use show()");
    }

    /**
     * Show the HTML markup for this Layout
     *
     * @return string Returns the HTML markup
     */
    public function show() {

        // Create the layout objects
        $header = new Container("navbar navbar-expand-lg navbar-dark bg-primary", "nav");
        $main = new Container("container");
        $logoLink = new Hyperlink("/", "navbar-brand");
        $logoImage = new Image("/images/logo.png", [
            "height" => 40
        ]);
        $button = new Container("navbar-toggler", "button", [
            "type" => "button",
            "data-toggle" => "collapse",
            "data-target" => "#headernav",
            "aria-controls" => "navbarSupportedContent",
            "aria-expanded" => "false",
            "aria-label" => "Toggle navigation"
        ]);
        $collapseContainer = new Container("collapse navbar-collapse", false, [
            "id" => "headernav"
        ]);
        $mainMenu = new \App\Menu\MainMenu();
        $userMenu = false;

        // Display the layout objects

        /// Open header
        $header->show();
        $main->show();

        /// Logo
        $logoLink->show();
        $logoImage->show();
        $logoLink->close();

        // Collapse button
        $button->show();
        echo "<span class=\"navbar-toggler-icon\"></span>";
        $button->close();

        /// Main menu
        $collapseContainer->show();
        $mainMenu->show();
        $collapseContainer->close();

        /// Close 
        $main->close();
        $header->close();

    }

};
