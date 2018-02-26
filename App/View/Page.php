<?php

namespace App\View;

use App\Layout\Container;
use App\Layout\Head;
use App\Layout\SiteHeader;

class Page extends \Stateless\View {

    /**
     * Show this Page
     */
    public function show() {

        // Create the containers and items
        $this->sitewrap = new Container("site-wrapper container");
        $siteHeader = new SiteHeader();

        // Response head
        $head = new Head($this->title, $this->bodyClass);

        // HTML Head
        $head->show();

        // Site Header
        $siteHeader->show();

        // Site wrap
        $this->sitewrap->show();

        // Page title
        echo "<h1>" . $this->title . "</h1>";

    }

    /**
     * Close the Page markup
     */
    public function close() {

        // Close site wrapper
        if ($this->sitewrap) {
            $this->sitewrap->close();
        }

        echo "</body></html>";

    }

};
