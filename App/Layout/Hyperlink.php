<?php

namespace App\Layout;

final class Hyperlink extends \Stateless\Layout {

    public $href = "#";
    public $class;
    public $target;

    /**
     * Construct a new Hyperlink object
     *
     * @param string $href (Optional) URL to link to.  Default is "#"
     * @param string $class (Optional) CSS Class to link to
     * @param boolean $target (Optional) Browser target context
     */
    public function __construct(
        $href = false,
        $class = false,
        $target = false
    ) {
        if ($href) {
            $this->href = $href;
        }

        if ($class) {
            $this->class = $class;
        }

        if ($target) {
            $this->target = $target;
        }

    }

    /**
     * Get the HTML Markup for the Hyperlink
     * 
     * @return string Returns the HTML Markup
     */
    public function get() {
        $html = "<a href=\"" . $this->href . "\"";
    
        if ($this->class) {
            $html .= " class=\"" . $this->class . "\"";
        }

        if ($this->target) {
            $html .= " target=\"" . $this->target . "\"";
        }

        $html .= ">";

        return $html;
    }

    /**
     * Get the closing HTML Markup for the Hyperlink
     *
     * @return string Returns the HTML Markup
     */
    public function getClose() {
        return "</a>";
    }

};
