<?php

namespace App\Layout;

final class Container extends \Stateless\Layout {

    public $class = "container";
    public $tag = "div";
    public $attributes = [];

    /**
     * Construct a new Container object
     *
     * @param string $class (Optional) Class to attach to the Container.  Default
     *  is "container"
     * @param string $tag (Optional) Tag this container should be.  Default is
     *  "div"
     * @param array $attributes (Optional) Attributes to go with this Container
     */
    public function __construct($class = false, $tag = false, $attributes = []) {

        if ($class) {
            $this->class = $class;
        }

        if ($tag) {
            $this->tag = $tag;
        }

        if ($attributes) {
            $this->attributes = $attributes;
        }

    }

    /**
     * Get the HTML markup for this Layout
     *
     * @return string $class (Optional) Returns the HTML markup
     */
    public function get($class = false) {

        // Open the container
        $html = "<" . $this->tag;
        
        // Output container CSS classes
        if ($this->class || $class) {
            $html .= " class=\"" . $class . " " . $this->class . "\" ";
        }

        // Output container attributes
        foreach ($this->attributes as $key => $value) {
            if (isset($key) && isset($value)) {

                $html .= $key . "=\"" . $value . "\" ";
                
            }
        }

        // Close the container
        $html .= ">";

        // Return value
        return $html;

    }

    /**
     * Close this Container
     * 
     * @return string Returns the HTML Markup
     */
    public function getClose() {

        // Get the closing tag for the container
        return "</" . $this->tag . ">";

    }

    /**
     * Show the HTML markup for this layout
     * 
     * @param string $class (Optional) Class name to append to this element
     */
    public function show($class = false) {

        // Output the container to the output buffer
        echo $this->get($class);

    }

};
