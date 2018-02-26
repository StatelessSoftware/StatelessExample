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
            "<link href=\"https://bootswatch.com/4/pulse/bootstrap.min.css\" " .
                "rel=\"stylesheet\" type=\"text/css\">" .
            "<link href=\"/css/style.css\" rel=\"stylesheet\" type=\"text/css\">" .
            "<script
                src=\"https://code.jquery.com/jquery-3.3.1.js\"
                integrity=\"sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=\"
                crossorigin=\"anonymous\"></script>" .
            "<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\">" .
                "</script>" .
            "</head><body";

        if (!empty($this->class)) {
            $html .= " class=\"" . $this->class . "\"";
        }

        $html .= ">";

        return $html;
    }

};
