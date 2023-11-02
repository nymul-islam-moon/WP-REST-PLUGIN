<?php

namespace Nymul\WpRestPlugin\Admin;

/**
 * The Menu handle class
 */
class Menu {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    public function admin_menu() {
        add_menu_page( __( 'WP REST PLUGIN', 'wp-rest-plugin' ), __( 'WP REST PLUGIN', 'wp-rest-plugin' ), 'manage_options', 'wp-rest-plugin', [ $this, 'plugin_page' ],  'dashicons-welcome-learn-more' );

//        add_submenu_page(  );
    }

    public function plugin_page() {
        echo "hello world";
    }
}