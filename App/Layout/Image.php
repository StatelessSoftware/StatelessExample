<?php

namespace App\Layout;

final class Image extends \Stateless\Layout {
    
    public $src;
    public $attributes;

    /**
     * Create a new Image object
     *
     * @param string $src (Optional) URL Source of the image
     * @param array $attributes (Optional) Additional attributes to pass to the
     *  tag as key => value pairs.
     */
    public function __construct(
        $src = false,
        $attributes = false
    ) {
        if ($src) {
            $this->src = $src;
        }

        if ($attributes) {

            if (array_key_exists("uncache", $attributes)) {

                if ($attributes["uncache"]) {

                    $this->src .= "?" . time();

                }
                
                unset($attributes["uncache"]);

            }

            $this->attributes = $attributes;
        }

    }

    /**
     * Get the HTML markup for the Image
     *
     * @return string Returns the markup
     */
    public function get() {
        $html = "<img src=\"" . $this->src . "\"";

        if ($this->attributes) {
            foreach ($this->attributes as $key => $value) {
                $html .= " " . $key . "=\"" . $value . "\"";
            }
        }

        $html .= "/>";

        return $html;
    }

};
