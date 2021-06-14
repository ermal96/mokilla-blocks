<?php
/**
 * The administration page
 *
 * @link       www.crispybacon.it
 * @since      1.0.0
 *
 * @package    Mokilla_Blocks
 */

namespace mokilla\mokilla_blocks;

use mokilla\mokilla_blocks\Model\Core_Blocks;

/**
 * Class Admin_Page
 */
class Admin_Page {

	/**
	 * Holds the values to be used in the fields callbacks
	 *
	 * @var array
	 */
	private $options;
	/**
	 * Name of the option
	 *
	 * @var string
	 */
	const OPTION_NAME = 'mokilla-block-whitelist';

	/**
	 * Plugin slug
	 *
	 * @var string
	 */
	const PAGE_SLUG = 'mokilla-blocks-manager';

	/**
	 * Administration page title
	 *
	 * @var string
	 */
	const PAGE_TITLE = 'Blocks Manager';

	/**
	 * Start up
	 */
	public function __construct() {

	}

	/**
	 * Init the hooks
	 */
	public function init() {
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_script' ) );
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_admin_script() {
		wp_enqueue_script(
			self::PAGE_SLUG . '-admin',
			plugin_dir_url( __FILE__ ) . 'js/admin_scripts.js',
			array(),
			filemtime( plugin_dir_path( __FILE__ ) . 'js/admin_scripts.js' ),
			true
		);
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		add_menu_page(
			self::PAGE_TITLE,
			self::PAGE_TITLE,
			'manage_options',
			self::PAGE_SLUG,
			array( $this, 'create_admin_page' ),
			'dashicons-schedule',
			31
		);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		$this->options = get_option( self::OPTION_NAME );
		?>
		<div class="wrap">
			<h1><?php echo esc_html( self::PAGE_TITLE ); ?></h1>
			<form method="post" action="options.php">
				<?php
				// This prints out all hidden setting fields.
				settings_fields( self::PAGE_SLUG . '-group' );
				do_settings_sections( self::PAGE_SLUG . '-admin' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Register and add settings
	 */
	public function page_init() {
		register_setting(
			self::PAGE_SLUG . '-group',
			self::OPTION_NAME,
			array( $this, 'sanitize' )
		);

		add_settings_section(
			'setting_section_id',
			'',
			array( $this, 'print_section_info' ),
			self::PAGE_SLUG . '-admin'
		);

		add_settings_field(
			'size',
			'Blocchi core da mostrare',
			array( $this, 'whitelist_blocks_callback' ),
			self::PAGE_SLUG . '-admin',
			'setting_section_id'
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys.
	 *
	 * @return array
	 */
	public function sanitize( $input ) {
		return $input;
	}

	/**
	 * Print the Section text
	 */
	public function print_section_info() {
		print 'Scegliere i blocchi da rendere disponibili';
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function whitelist_blocks_callback() {
		$post_types = get_post_types(
			array(
				'public'            => true,
				'show_in_nav_menus' => true,
			)
		);
		$html       = '<table><tr>';

		$html .= '<th>Titolo blocco</th>';
		foreach ( $post_types as $key => $post_type ) {
			$html .= '<th>' . $post_type . '</th>';
		}
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td>Seleziona tutti i blocchi</td>';
		foreach ( $post_types as $key => $post_type ) {
			$html .= '<td><input type="checkbox" name="check-all" class="check-all" data-type="' . $post_type . '" /></td>';
		}
		$html .= '</tr>';
		foreach ( Core_Blocks::ALL as $slug => $title ) {
			$html .= '<tr>';
			$html .= '<td';
			if ( in_array( $slug, Core_Blocks::MANDATORY, true ) ) {
				$html .= ' style="color: red;" title="Questo blocco è meglio non escluderlo"';
			}
			$html .= '>' . $title . '</td>';
			foreach ( $post_types as $key => $post_type ) {
				$html .= '<td><input type="checkbox" name="' . self::OPTION_NAME . '[' . $post_type . ']' . '[' . $slug . ']" value="on" class="checkbox" data-class="' . $post_type . '"';
				if ( isset( $this->options[ $post_type ][ $slug ] ) ) {
					$html .= checked( $this->options[ $post_type ][ $slug ], 'on', false );
				}
				$html .= ' /></td>';

			}
			$html .= '</tr>';
		}

		$html .= '</table>';
		echo $html;
	}

}

