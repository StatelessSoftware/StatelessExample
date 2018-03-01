<?php

namespace App\Layout;

final class Head extends \Stateless\Layout {

    public $title;
    public $class;

    /**
     * Construct a new Head response
     * 
     * @param string $title (Optional) Page Title
     * @param string $class (Optional) Page body class
     */
    public function __construct($title = false, $class = false) {
        if ($title) {
            $this->title = strip_tags($title);
        }

        if ($class) {
            $this->class = $class;
        }
    }

    /**
     * Get the HTML markup for this Layout
     *
     * @return string Returns the HTML markup
     */
    public function get() {
        $html = 
            "<!DOCTYPE html><html><head>" .
            "<title>" . $this->title . "</title>" .
            "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">" .
            "<link href=\"/css/main.css\" rel=\"stylesheet\" type=\"text/css\">" .
            "<script src=\"/js/main.js\"></script>" .
            "</head><body";

        if (!empty($this->class)) {
            $html .= " class=\"" . $this->class . "\"";
        }

        $html .= ">";

        return $html;
    }

};
