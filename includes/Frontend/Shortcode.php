<?php

namespace Nymul\WpRestPlugin\Frontend;

/**
 * Shortcode handle class
 */
class Shortcode {

    /**
     * Initializes the class
     */
    public function __construct() {
        add_shortcode( 'wp_rest_plugin', [ $this, 'render_shortcode' ] );
    }

    /**
     * Shortcode handle method
     *
     * @param $attr
     * @param string $content
     *
     * @return string
     */
    public function render_shortcode( $attr, $content = '' ) {
        return 'Hello From ShortCode';
    }
}