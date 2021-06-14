<?php
/**
 * Blocks initializer
 *
 * @link       v.serxhio@gmail.com
 * @since      1.0.0
 *
 * @package    Mokilla_Blocks
 * @subpackage Mokilla_Blocks/src
 */

namespace mokilla\mokilla_blocks\Blocks;

use mokilla\mokilla_blocks\Admin_Page;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Initializer
 */
class Initializer {

	const NOPRIV_NONCE_ACTION = 'mokilla-blocks-special-string-for$nopriv%ajax';

	const NONCE_ACTION = 'mokilla-blocks-special-string-for%ajax';

	/**
	 * Initializer constructor.
	 */
	public function __construct() {
		add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_public_script' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );
		add_filter( 'block_categories', array( $this, 'add_category' ), 11, 2 );

		//add_action( 'init', array( $this, 'template_to_posts' ) );
		add_action( 'init', array( $this, 'load_translations' ) );
	}

	/**
	 * Load the plugin domain translations
	 */
	public function load_translations() {
		load_plugin_textdomain( 'mokilla-blocks', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}


	/**
	 * Register public script
	 */
	public function register_public_script() {
    	if ( ! file_exists(plugin_dir_path( __DIR__ ) . 'dist/public-scripts.min.js' ) ) {
    	    return;
    	}
		wp_enqueue_script(
			'mokilla-blocks-public-scripts',
			plugin_dir_url( __DIR__ ) . 'dist/public-scripts.min.js',
			array(
				'jquery',
			),
			filemtime( plugin_dir_path( __DIR__ ) . 'dist/public-scripts.min.js' ),
			true
		);
		wp_localize_script(
			'mokilla-blocks-public-scripts',
			'MokillaBlocksBlocksAjax',
			array(
				'ajaxurl'  => admin_url( 'admin-ajax.php' ),
				'security' => wp_create_nonce( self::NOPRIV_NONCE_ACTION ),
			)
		);
	}

	/**
	 * Enqueue Gutenberg block assets for both frontend + backend.
	 *
	 * `wp-blocks`: includes block type registration and related functions.
	 *
	 * @since 1.0.0
	 */
	public function block_assets() {
		// Styles.
		$relative_path = 'dist/blocks.style.build.css';
		if ( file_exists( plugin_dir_path( __DIR__ ) . $relative_path ) && filesize( plugin_dir_path( __DIR__ ) . $relative_path ) > 0 ) {
			wp_enqueue_style(
				'mokilla-blocks-style',
				plugins_url( $relative_path, dirname( __FILE__ ) ),
				array( 'wp-blocks' ),
				filemtime( plugin_dir_path( __DIR__ ) . $relative_path )
			);
		}

	}

	/**
	 * Enqueue Gutenberg block assets for backend editor.
	 *
	 * `wp-blocks`: includes block type registration and related functions.
	 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
	 * `wp-i18n`: To internationalize the block's text.
	 *
	 * @since 1.0.0
	 */
	public function editor_assets() {
		global $current_screen;
		wp_enqueue_script(
			'mokilla-blocks-build',
			plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
			array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
			filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ),
			true
		);
		wp_localize_script(
			'mokilla-blocks-build',
			'MokillaBlocksBlocksAjax',
			array(
				'ajaxurl'   => admin_url( 'admin-ajax.php' ),
				'security'  => wp_create_nonce( self::NONCE_ACTION ),
				'whitelist' => $this->get_whitelisted_blocks( $current_screen->post_type ),
			)
		);
		$relative_path = 'dist/blocks.editor.build.css';
		if ( file_exists( plugin_dir_path( __DIR__ ) . $relative_path ) && filesize( plugin_dir_path( __DIR__ ) . $relative_path ) > 0 ) {
			wp_enqueue_style(
				'mokilla-blocks-editor-css',
				plugins_url( $relative_path, dirname( __FILE__ ) ),
				array( 'wp-edit-blocks' ),
				filemtime( plugin_dir_path( __DIR__ ) . $relative_path )
			);
		}
	}
	/**
	 * Create a custom category for the blocks
	 *
	 * @param array   $categories The list of categories currently installed.
	 * @param WP_Post $post The post.
	 *
	 * @return array
	 */
	public function add_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'mokilla',
					'title' => 'Mokilla Blocks',
				),
			)
		);
	}

	/**
	 * Adds a template to the post type "post"
	 */
	public function template_to_posts() {
		$post_type_object           = get_post_type_object( 'post' );
		$post_type_object->template = array(
			array( 'BLOCK_IDENTIFIER' ),

		);
		// $post_type_object->template_lock = 'all';
	}

	/**
	 * Get the list of whitelisted blocks
	 *
	 * @param string $post_type The post type blocks to return.
	 *
	 * @return array|string
	 */
	protected function get_whitelisted_blocks( $post_type ) {
		$input = get_option( Admin_Page::OPTION_NAME, false );
		if ( false === $input ) {
			return array();
		}
		$whitelist = array();
		foreach ( $input as $type => $list ) {
			if ( $type !== $post_type ) {
				continue;
			}
			foreach ( $list as $slug => $status ) {
				if ( 'on' === $status ) {
					$whitelist[] = $slug;
				}
			}
		}

		return wp_json_encode( $whitelist );
	}

}

