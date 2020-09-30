<?php
/**
 * The default template for displaying pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package renome
 */

get_header();

if ( have_posts() ) {
	the_post();

	get_template_part( 'template-parts/page-header/page-header', 'page' );

	the_content();
}

get_footer();
