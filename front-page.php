<?php
/**
 * Custom front page template.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-front-page-templates/
 *
 * @package renome
 */

get_header();

if ( have_posts() ) {
	the_post();

	the_content();
}

get_footer();
