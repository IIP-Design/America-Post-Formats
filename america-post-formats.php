<?php

/**********************************************************************************************************
Plugin Name:    America Post Formats
Description:    A set of common fields, templates, and functionaly specific to Wordpress post formats
Version:        1.3.1
Author:         Office of Design, U.S. Department of State
License:        MIT
Text Domain:    america
Domain Path:    /languages/
************************************************************************************************************/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


// Constants
define( 'AMERICA_POST_FORMATS_DIR', plugin_dir_path( dirname( __FILE__ ) ) . 'america-post-formats/' );


function activate_America_Post_Formats() {
	require_once AMERICA_POST_FORMATS_DIR . 'includes/class-america-post-formats-activator.php';
	America_Post_Formats_Activator::activate();
}


function deactivate_America_Post_Formats() {
	require_once AMERICA_POST_FORMATS_DIR . 'includes/class-america-post-formats-deactivator.php';
	America_Post_Formats_Deactivator::deactivate();
}


register_activation_hook( __FILE__, 'activate_America_Post_Formats' );
register_deactivation_hook( __FILE__, 'deactivate_America_Post_Formats' );


require AMERICA_POST_FORMATS_DIR . 'includes/class-america-post-formats.php';


/**
	* Begins execution of the plugin.
	*
	* Since everything within the plugin is registered via hooks,
	* then kicking off the plugin from this point in the file does
	* not affect the page life cycle.
	*
	* @since 1.0.0
	*/

function run_America_Post_Formats() {

	$plugin = new America_Post_Formats();
	$plugin->run();

}

run_America_Post_Formats();
