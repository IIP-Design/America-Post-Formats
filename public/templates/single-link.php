<?php

/**
  * The default `link` post format template. This can be overwritten by placing
  * another template file in `you/theme/america-post-formats-templates/link.php`
  *
  * @since 1.0.0
  * @package America_Post_Formats
  */ ?>


<?php tha_entry_before(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php tha_entry_top(); ?>

  <header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
  </header>

  <?php tha_entry_content_before(); ?>

  <div class="entry-content">

    <?php the_content();?>

  </div><!-- .entry-content -->

  <?php tha_entry_content_after(); ?>

	<footer class="entry-footer">
		<?php corona_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php tha_entry_bottom(); ?>

</article>

<?php tha_entry_after(); ?>
