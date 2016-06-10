<?php

/**
	* Define the internationalization functionality
	*
	* Loads and defines the internationalization files for this plugin
	* so that it is ready for translation.
	*
	* @since 1.0.0
	*
	* @package America_Post_Formats
	* @subpackage America_Post_Formats/includes
	*/




/**
	* Define the internationalization functionality.
	*
	* Loads and defines the internationalization files for this plugin
	* so that it is ready for translation.
	*
	* @since 1.0.0
	* @package    America_Post_Formats
	* @subpackage America_Post_Formats/includes
	* @author Office of Design, U.S. Department of State <kleekampnf@america.gov>
	*/

class America_Post_Formats_i18n {

	/**
		* Load the plugin text domain for translation.
		*
		* @since 1.0.0
		*/

	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'america-post-formats', false, AMERICA_POST_FORMATS_DIR . '/languages/');
	}
}
