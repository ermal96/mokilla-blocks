<?php
/**
 * Plugin Name:     Mokilla Blocks
 * Plugin URI:      www.crispybacon.it
 * Description:     
 * Author:          Serxhio Vrapi
 * Author URI:      www.crispybacon.it
 * Text Domain:     mokilla-blocks
 * Domain Path:     /src/languages
 * Version:         1.0.0
 *
 * @package         Mokilla_Blocks
 */

namespace mokilla\mokilla_blocks;

use mokilla\mokilla_blocks\Blocks\Initializer;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include classes with Composer.
 */
require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

( new Admin_Page() )->init();

new Initializer();
