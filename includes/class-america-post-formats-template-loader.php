<?php

/**
  * Template loader for the America Post Formats
  *
  * @package America_Post_Formats
  */


if ( ! class_exists( 'Gamajo_Template_Loader' ) ) {
  require AMERICA_POST_FORMATS_DIR . 'includes/class-gamajo-template-loader.php';
}


class America_Post_Formats_Template_Loader extends Gamajo_Template_Loader {
  /**
    * Prefix for filter names.
    *
    * @since 2.0.0
    *
    * @var string
    */

  protected $filter_prefix = 'america_post_formats';


  /**
    * Directory name where custom templates for this plugin should be found in the theme.
    *
    * @since 2.0.0
    *
    * @var string
    */

  protected $theme_template_directory = 'america-post-formats-templates';


  /**
   * Directory name where templates are found in this plugin.
   *
   * e.g. 'templates' or 'includes/templates', etc.
   *
   * @since 1.1.0
   *
   * @var string
   */

  protected $plugin_template_directory = 'public/templates';


  /**
   * Reference to the root directory path of this plugin.
   *
   * Can either be a defined constant, or a relative reference from where the subclass lives.
   *
   * e.g. YOUR_PLUGIN_TEMPLATE or plugin_dir_path( dirname( __FILE__ ) ); etc.
   *
   * @since 1.0.0
   *
   * @var string
   */

  protected $plugin_directory = AMERICA_POST_FORMATS_DIR;
}
