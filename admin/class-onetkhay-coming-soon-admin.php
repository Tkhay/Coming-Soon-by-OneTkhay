<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://tiekuasare.com
 * @since      1.0.0
 *
 * @package    Onetkhay_Coming_Soon
 * @subpackage Onetkhay_Coming_Soon/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Onetkhay_Coming_Soon
 * @subpackage Onetkhay_Coming_Soon/admin
 * @author     Tieku Asare <nanakhay21@gmail.com>
 */
class Onetkhay_Coming_Soon_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Inititalize the plugin Menu
	 */
	public function add_plugin_admin_menu() {
        add_options_page(
            __('Coming Soon Settings', 'onetkhay-coming-soon'),
            __('Coming Soon', 'onetkhay-coming-soon'),
            'access_coming_soon_settings',
            'onetkhay-coming-soon',
            array($this, 'display_plugin_admin_page')
        );
    }

	public function display_plugin_admin_page() {
    include plugin_dir_path( __FILE__ ) . 'partials/onetkhay-coming-soon-admin-display.php';
	}

	public function section_callback() {
    echo '<p>' . __( 'Configure your coming soon page settings below.', 'onetkhay-coming-soon' ) . '</p>';
	}


	public function register_plugin_settings() {
        // Register all options
        register_setting('ccsSettings', 'ccs_enabled');
        register_setting('ccsSettings', 'ccs_heading');
        register_setting('ccsSettings', 'ccs_message');
        register_setting('ccsSettings', 'ccs_logo');
        register_setting('ccsSettings', 'ccs_bg_color');
        register_setting('ccsSettings', 'ccs_facebook_url');
        register_setting('ccsSettings', 'ccs_instagram_url');
        register_setting('ccsSettings', 'ccs_tiktok_url');

        add_settings_section(
			'ccs_section',
			__( 'Settings', 'onetkhay-coming-soon' ),
			array( $this, 'section_callback' ),
			'ccsSettings'
		);

        $this->add_field('ccs_enabled', __('Enable Coming Soon', 'onetkhay-coming-soon'), 'render_enabled_field');
		$this->add_field('ccs_heading', __('Page Heading', 'onetkhay-coming-soon'), 'render_heading_field');
		$this->add_field('ccs_message', __('Page Message', 'onetkhay-coming-soon'), 'render_message_field');
		$this->add_field('ccs_logo', __('Logo', 'onetkhay-coming-soon'), 'render_logo_field');
		$this->add_field('ccs_bg_color', __('Background Color', 'onetkhay-coming-soon'), 'render_bg_color_field');
		$this->add_field('ccs_facebook_url', __('Facebook URL', 'onetkhay-coming-soon'), 'render_facebook_url_field');
		$this->add_field('ccs_instagram_url', __('Instagram URL', 'onetkhay-coming-soon'), 'render_instagram_url_field');
		$this->add_field('ccs_tiktok_url', __('TikTok URL', 'onetkhay-coming-soon'), 'render_tiktok_url_field');
    }

	private function add_field($id, $title, $callback) {
		add_settings_field(
			$id,
			$title,
			array( $this, $callback ),
			'ccsSettings',
			'ccs_section'
		);
	}

	public function render_enabled_field() {
		$enabled = get_option('ccs_enabled', '0');
		?>
		<input type="checkbox" name="ccs_enabled" value="1" <?php checked(1, $enabled, true); ?>>
		<label><?php _e('Enable the coming soon page', 'onetkhay-coming-soon'); ?></label>
		<?php
	}

	public function render_heading_field() {
		$heading = get_option('ccs_heading', 'Coming Soon');
		echo '<input type="text" name="ccs_heading" value="' . esc_attr($heading) . '">';
	}

	public function render_message_field() {
		$message = get_option('ccs_message', 'Our website is under construction.');
		echo '<textarea name="ccs_message">' . esc_textarea($message) . '</textarea>';
	}

	public function render_logo_field() {
		$logo = get_option('ccs_logo');
		?>
		<input type="text" name="ccs_logo" id="ccs_logo" value="<?php echo esc_url($logo); ?>" class="regular-text">
		<input type="button" id="ccs_logo_button" class="button" value="<?php _e('Upload Logo', 'onetkhay-coming-soon'); ?>" />
		<?php if ( $logo ): ?>
			<br><br><img src="<?php echo esc_url($logo); ?>" style="max-width: 150px; height: auto;">
		<?php endif; ?>
		<?php
	}

	public function render_bg_color_field() {
    $bg_color = get_option('ccs_bg_color', '#ffffff');
    echo '<input type="text" name="ccs_bg_color" value="' . esc_attr($bg_color) . '" class="ccs-color-field" />';
    echo '<p class="description">' . __('Choose a background color for your coming soon page.', 'onetkhay-coming-soon') . '</p>';
	}

	public function render_facebook_url_field() {
		$url = get_option('ccs_facebook_url');
		echo '<input type="url" name="ccs_facebook_url" value="' . esc_attr($url) . '" class="regular-text">';
	}

	public function render_instagram_url_field() {
		$url = get_option('ccs_instagram_url');
		echo '<input type="url" name="ccs_instagram_url" value="' . esc_attr($url) . '" class="regular-text">';
	}

	public function render_tiktok_url_field() {
		$url = get_option('ccs_tiktok_url');
		echo '<input type="url" name="ccs_tiktok_url" value="' . esc_attr($url) . '" class="regular-text">';
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook_suffix) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Onetkhay_Coming_Soon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Onetkhay_Coming_Soon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ($hook_suffix === 'settings_page_onetkhay-coming-soon') {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/onetkhay-coming-soon-admin.css', array(), $this->version, 'all');
    }
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook_suffix) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Onetkhay_Coming_Soon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Onetkhay_Coming_Soon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ($hook_suffix === 'settings_page_onetkhay-coming-soon') {
        wp_enqueue_media();
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/onetkhay-coming-soon-admin.js', array('jquery', 'wp-color-picker'), $this->version, false);
    }
	}

}
