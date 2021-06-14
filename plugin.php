<?php
/**
 * Plugin Name:     Mokilla Blocks
 * Plugin URI:      v.serxhio@gmail.com
 * Description:     
 * Author:          Serxhio Vrapi
 * Author URI:      v.serxhio@gmail.com
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


new Initializer();
