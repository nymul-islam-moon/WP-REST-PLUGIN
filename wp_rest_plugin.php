<?php
/**
 * WP-REST-PLUGIN
 *
 * @package           WP-REST-PLUGIN
 * @author            Nymul Islam Moon
 * @copyright         2023 Nymul Islam
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WP-REST-PLUGIN
 * Plugin URI:        https://github.com/nymul-islam-moon/WP-REST-PLUGIN
 * Description:       This plugin contains plugin basic rules and rest api. This is for only tutorial purpose.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nymul Islam Moon
 * Author URI:        https://github.com/nymul-islam-moon
 * Text Domain:       author-bio
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://github.com/nymul-islam-moon/WP-REST-PLUGIN
 */

/**
 * Copyright (c) 2023 Nymul Islam ( email: towkir1997islam@gmail.com ). All rights reserved.
 *
 * Released under the GPL license
 * htp://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpres.org/
 *
 * *********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Geneal Public License as published by
 * the Free Software Foundation; eiher version 2of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope hat it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Ring Road, Mohammadpur, Dhaka, Bangladesh.
 * ********************************************************************
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Wp_Rest_Plugin {

    /**
     * Plugin version
     */
    const version = '1.0.0';

    /**
     * Class constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugin_loaded', [ $this, 'init_plugin' ] );
    }


    /**
     * Initializes a singleton instance
     *
     * @return false|Wp_Rest_Plugin
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        $prefix = 'WP_REST_PLUGIN_';
        define( $prefix . 'VERSION', self::version );
        define( $prefix . 'FILE', __FILE__ );
        define( $prefix . 'PATH', __DIR__ );
        define( $prefix . 'URL', plugins_url( '', WP_REST_PLUGIN_FILE ) );
        define( $prefix . 'ASSETS', WP_REST_PLUGIN_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        if ( is_admin() ) {
            new \Nymul\WpRestPlugin\Admin();
        } else {
            new \Nymul\WpRestPlugin\Frontend();
        }
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installed = get_option( 'wp_rest_plugin_installed' );

        if ( ! $installed ) {
            update_option( 'wp_rest_plugin_installed', time() );
        }

        update_option( 'wp_rest_plugin_version', WP_REST_PLUGIN_VERSION );
    }
}

/**
 * Initializes the main plugin
 *
 * @return false|Wp_Rest_Plugin
 */
function wp_rest_plugin() {
    return Wp_Rest_Plugin::init();
}

// kick-off the plugin
wp_rest_plugin();