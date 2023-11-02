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

        $parent_slug = 'wp-rest-plugin';
        $capability = 'manage_options';

        add_menu_page( __( 'WP REST PLUGIN', 'wp-rest-plugin' ), __( 'WP REST PLUGIN', 'wp-rest-plugin' ), $capability, $parent_slug, [ $this, 'plugin_page' ],  'dashicons-welcome-learn-more' );

        add_submenu_page( $parent_slug, __( 'Address Book', 'wp-rest-plugin' ), __( 'Address Book', 'wp-rest-plugin' ), $capability, 'wp-rest-plugin-address-book', [ $this, 'address_book_page' ]);
    }

    public function plugin_page() {
        echo "hello world";
    }

    public function address_book_page() {
        echo 'Hello Address Book';
    }
}