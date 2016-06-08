<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    America_Post_Formats
 * @subpackage America_Post_Formats/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    America_Post_Formats
 * @subpackage America_Post_Formats/admin
 * @author     Your Name <email@example.com>
 */
class America_Post_Formats_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $America_Post_Formats    The ID of this plugin.
	 */
	private $America_Post_Formats;

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
	 * @param      string    $America_Post_Formats       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $America_Post_Formats, $version ) {

		$this->America_Post_Formats = $America_Post_Formats;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in America_Post_Formats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The America_Post_Formats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->America_Post_Formats, plugin_dir_url( __FILE__ ) . 'css/america-post-formats-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in America_Post_Formats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The America_Post_Formats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->America_Post_Formats, plugin_dir_url( __FILE__ ) . 'js/america-post-formats-admin.js', array( 'jquery' ), $this->version, false );

	}

}
