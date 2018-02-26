<?php

namespace App\Menu;

use Stateless\Menu;
use Stateless\MenuItem;
use Stateless\MenuIcon;

final class MainMenu extends Menu {

    /**
     * Construct a new Menu
     */
    public function __construct() {

        global $user;

        // Set the Menu attributes
        $this->attributes = [
            "class" => "navbar-nav ml-auto"
        ];

        // Create Menu Items
        $this->items = [
            new MenuItem("Sample Page", "/sample-page"),
        ];

        // Check if user is logged in
        if ($user) {
            $this->items[] = new MenuItem($user->username, "/profile");
            $this->items[] = new MenuItem("Sign Out", "/sign-out");
        }
        else {
            $this->items[] = new MenuItem("Sign In", "/sign-in");
            $this->items[] = new MenuItem("Sign Up", "/sign-up");
        }

        // Create the Menu
        parent::__construct();

    }

};
