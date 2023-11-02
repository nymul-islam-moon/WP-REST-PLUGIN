<?php

namespace Nymul\WpRestPlugin;

/**
 * The admin class
 */
class Admin {
    public function __construct() {
        new Admin\Menu();
    }
}