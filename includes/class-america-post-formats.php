<?php

/**
	* The file that defines the core plugin class
	*
	* A class definition that includes attributes and functions used across both the
	* public-facing side of the site and the admin area.
	*
	* @since 1.0.0
	*
	* @package America_Post_Formats
	* @subpackage America_Post_Formats/includes
	*/




/**
	* The core plugin class.
	*
	* This is used to define internationalization, admin-specific hooks, and
	* public-facing site hooks.
	*
	* Also maintains the unique identifier of this plugin as well as the current
	* version of the plugin.
	*
	* @since 1.0.0
	* @package America_Post_Formats
	* @subpackage America_Post_Formats/includes
	* @author Office of Design, U.S. Department of State <kleekamp@america.gov>
	*/

class America_Post_Formats {

	/**
		* The loader that's responsible for maintaining and registering all hooks that power
		* the plugin.
		*
		* @since 1.0.0
		* @access protected
		* @var America_Post_Formats_Loader $loader - Maintains and registers all hooks for the plugin.
		*/

	protected $loader;


	/**
		* The unique identifier of this plugin.
		*
		* @since 1.0.0
		* @access protected
		* @var string $America_Post_Formats - The string used to uniquely identify this plugin.
		*/

	protected $America_Post_Formats;


	/**
		* The current version of the plugin.
		*
		* @since 1.0.0
		* @access protected
		* @var string $version - The current version of the plugin.
		*/

	protected $version;


	/**
		* Define the core functionality of the plugin.
		*
		* Set the plugin name and the plugin version that can be used throughout the plugin.
		* Load the dependencies, define the locale, and set the hooks for the admin area and
		* the public-facing side of the site.
		*
		* @since 1.0.0
		*/

	public function __construct() {
		$this->America_Post_Formats = 'america-post-formats';
		$this->version = '1.0.0';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_public_hooks();
	}

	/**
		* Load the required dependencies for this plugin.
		*
		* Include the following files that make up the plugin:
		*
		* - America_Post_Formats_Loader. Orchestrates the hooks of the plugin.
		* - America_Post_Formats_i18n. Defines internationalization functionality.
		* - America_Post_Formats_Admin. Defines all hooks for the admin area.
		* - America_Post_Formats_Public. Defines all hooks for the public side of the site.
		*
		* Create an instance of the loader which will be used to register the hooks
		* with WordPress.
		*
		* @since 1.0.0
		* @access private
		*/

	private function load_dependencies() {
		require_once AMERICA_POST_FORMATS_DIR . 'includes/class-america-post-formats-loader.php';
		require_once AMERICA_POST_FORMATS_DIR . 'includes/class-america-post-formats-i18n.php';
		require_once AMERICA_POST_FORMATS_DIR . 'includes/class-gamajo-template-loader.php';
		require_once AMERICA_POST_FORMATS_DIR . 'includes/class-america-post-formats-template-loader.php';
		require_once AMERICA_POST_FORMATS_DIR . 'includes/advanced-custom-fields/acf.php';
		require_once AMERICA_POST_FORMATS_DIR . 'public/class-america-post-formats-public.php';

		/**
			* Custom settings for Advanced Custom Fields
			*/

		add_filter( 'acf/settings/path', function() {
			return plugin_dir_path( dirname( __FILE__ ) ) . 'includes/advanced-custom-fields/';
		});

		add_filter( 'acf/settings/dir', function() {
			return plugin_dir_url( dirname( __FILE__ ) ) . 'includes/advanced-custom-fields/';
		});

		add_filter( 'acf/settings/save_json', function( $path ) {
			$path = plugin_dir_path( dirname( __FILE__ ) ) . 'includes/acf-json';
			return $path;
		});

		add_filter( 'acf/settings/load_json', function( $paths ) {
			unset($paths[0]);
		  $paths[] = plugin_dir_path( dirname( __FILE__ ) ) . 'includes/acf-json';
		  return $paths;
		});

		// Hide Advanced Custom Fields from Wordpress Admin Menu
		add_filter('acf/settings/show_admin', '__return_false');

		$this->loader = new America_Post_Formats_Loader();

	}


	/**
		* Define the locale for this plugin for internationalization.
		*
		* Uses the America_Post_Formats_i18n class in order to set the domain and to register the hook
		* with WordPress.
		*
		* @since 1.0.0
		* @access private
		*/

	private function set_locale() {
		$plugin_i18n = new America_Post_Formats_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}


	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 */

	private function define_public_hooks() {
		$plugin_public = new America_Post_Formats_Public( $this->get_America_Post_Formats(), $this->get_version() );
		$this->loader->add_filter( 'corona_loop_template', $plugin_public, 'america_post_format_load_template', 10, 2 );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since 1.0.0
	 */

	public function run() {
		$this->loader->run();
	}


	/**
		* The name of the plugin used to uniquely identify it within the context of
		* WordPress and to define internationalization functionality.
		*
		* @since 1.0.0
		* @return string - The name of the plugin.
		*/
	public function get_America_Post_Formats() {
		return $this->America_Post_Formats;
	}


	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since 1.0.0
	 * @return America_Post_Formats_Loader - Orchestrates the hooks of the plugin.
	 */

	public function get_loader() {
		return $this->loader;
	}


	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since 1.0.0
	 * @return string - The version number of the plugin.
	 */

	public function get_version() {
		return $this->version;
	}
}
