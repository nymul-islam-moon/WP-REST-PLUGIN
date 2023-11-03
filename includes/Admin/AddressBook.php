<?php

namespace Nymul\WpRestPlugin\Admin;

/**
 * AddressBook handle class
 */
class AddressBook {

    /**
     * Construct method for the class
     */
    function __construct() {

    }

    public function plugin_page() {
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';

        switch ( $action ) {
            case 'new' :
                $template = __DIR__ . '/views/address-new.php';
                break;

            case 'edit' :
                $template = __DIR__ . '/views/address-edit.php';
                break;

            case 'view' :
                $template = __DIR__ . '/views/address-view.php';
                break;

            default :
                $template = __DIR__ . '/views/address-list.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }

    }

}