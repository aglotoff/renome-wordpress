<?php
/**
 * Template part for displaying page content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package renome
 */

if ( have_posts() ) {
	the_post();
	the_content();
}
