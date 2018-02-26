<?php

namespace App\Controller;

use Stateless\Request;
use Stateless\Response;
use Stateless\Session;

final class Controller extends \Stateless\Controller {

    /**
     * Create the Controller
     */
    public function __construct() {

        // Parent controllers should start an output buffer early to catch any
        //  outputs before the show() stage.
        ob_start();

        // Set default 404
        $this->default404 = new \App\View\Page404();

    }

    /**
     * Route control paths
     */
    public function route() {

        global $db;
        global $user;

        $path = Request::getPath();
        
        // TODO - Start routing by path.  You should set $this->view here
        // e.g. -
        //
        // if ($path === "/") {
        //      $this->view = new \App\View\HomePage();
        // }
        // 
        // This will send any requests to "/" to your HomePage View

        // Home
        if ($path === "/") {
            $this->view = new \App\View\HomePage();
        }

        // Sample page
        else if ($path === "/sample-page") {
            $this->view = new \App\View\Sample();
        }

        // Sign in
        else if ($path === "/sign-in") {

            // Create View
            $this->view = new \App\View\Page();
            $this->view->title = "Sign In";

            // Create Form
            $this->form = new \App\Form\SignIn();
        }

        // Sign up
        else if ($path === "/sign-up") {
            
            // Create the view
            $this->view = new \App\View\Page();
            $this->view->title = "Sign Up";

            // Create the Form
            $this->form = new \App\Form\SignUp();

        }

        // Sign Out
        else if ($path === "/sign-out") {

            // Sign the user out
            $user->signout();

            // Redirect back home
            Response::redirect("/");

        }

        // Profile
        else if ($path === "/profile") {

            if ($user) {
                $this->view = new \App\View\Profile($user);
            }
            else {
                $this->view = new \App\View\Page();
                echo "You are not authenticated.";
            }

        }

    }

};
