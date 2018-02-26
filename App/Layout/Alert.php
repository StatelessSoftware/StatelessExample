<?php

namespace App\Layout;

final class Alert extends \Stateless\Layout {

    public $title;
    public $content;
    public $color;
    public $hlevel;

    /**
     * Construct a new alert
     * 
     * @param string $title Alert title
     * @param string $content Alert content
     * @param string $color Alert color (can be any bootstrap alert color)
     * @param int $hlevel Heading level.  Default is 3
     * @return Alert Returns $this
     */
    public function __construct($title = false, $content = false,
        $color = "warning", $hlevel = 2
    ) {
        if ($title) {
            $this->title = $title;
        }

        if ($content) {
            $this->content = $content;
        }

        if ($color) {
            $this->color = $color;
        }

        if ($hlevel) {
            $this->hlevel = $hlevel;
        }

        return $this;
    }

    /**
     * Get the markup for this alert
     * 
     * @return string Returns the markup
     */
    public function get() {
        return
            "<div class=\"alert alert-" . $this->color . "\">" .
            "<h" . $this->hlevel . ">" .
            $this->title .
            "</h" . $this->hlevel . ">" . "<hr>" .
            "<p>" . $this->content . "</p>" .
            "</div>";
    }
    
};
