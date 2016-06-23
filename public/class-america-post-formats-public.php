<?php

/**
	* The public-facing functionality of the plugin.
	*
	* @since 1.0.0
	*
	* @package America_Post_Formats
	* @subpackage America_Post_Formats/public
	*/




/**
	* The public-facing functionality of the plugin.
	*
	* Defines the plugin name, version, and two examples hooks for how to
	* enqueue the admin-specific stylesheet and JavaScript.
	*
	* @package America_Post_Formats
	* @subpackage America_Post_Formats/public
	* @author Office of Design, U.S. Department of State <kleekampnf@america.gov>
	*/

class America_Post_Formats_Public {

	/**
		* The ID of this plugin.
		*
		* @since 1.0.0
		* @access private
		* @var string $America_Post_Formats - The ID of this plugin.
		*/

	private $America_Post_Formats;


	/**
		* The version of this plugin.
		*
		* @since 1.0.0
		* @access private
		* @var string $version - The current version of this plugin.
		*/

	private $version;


	/**
		* Initialize the class and set its properties.
		*
		* @since 1.0.0
		* @param string $America_Post_Formats - The name of the plugin.
		* @param string $version - The version of this plugin.
		*/

	public function __construct( $America_Post_Formats, $version ) {
		$this->America_Post_Formats = $America_Post_Formats;
		$this->version = $version;
		$this->template_loader = new America_Post_Formats_Template_Loader;
	}


	/**
		* Pass a template to `corona_template_loader` to the `corona_loop_template` filter hook
		*
		* @param array $templates - The array of template paths
		* @param string $post_type - The type of post, for example a post format
		*
		* @return array $templates - The array of template paths
		* @since 1.0.0
		*/

	/* public function america_post_format_load_template( $templates, $post_type ) {

		// @note The requirements changed, so we no longer need to load a custom template for the `link` post_format.
		// Leaving this here to provide an example of how you'd do so.

		if ( $post_type === 'link' && ! is_single() ) {
			array_unshift( $templates, $this->template_loader->get_template_part( 'link-archive', $name = null, $load = false ) );
		}

		return $templates;
	} */


	/**
		* Exclude the `link` post_format from the main_query
		*
		* @param $query Object - The Wordpress $query
		* @since 1.3.0
		*/

	public function exclude_post_format( $query ) {
		if ( $query->is_main_query() ) {
			if ( is_archive() || is_search() || is_home() ) {
				$tax_query = array( array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-link' ),
					'operator' => 'NOT IN',
				) );

				$query->set( 'tax_query', $tax_query );
			}
		}
	}
}
