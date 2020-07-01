<?php
/**
 * Renome functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package renome
 */

namespace Renome;

// Replace the version number of the theme on each release.
define( 'RENOME_VERSION', '0.1.0' );

/**
 * Activate required plugins
 */
require get_template_directory() . '/inc/tgm/renome.php';

/**
 * Enqueue scripts and styles.
 */
function enqueue_scripts() {
	wp_register_style(
		'renome-style',
		get_template_directory_uri() . '/assets/css/style.css',
		array(),
		RENOME_VERSION
	);

	wp_enqueue_style( 'renome-style' );

	wp_register_script(
		'renome-main-script',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		RENOME_VERSION,
		true
	);

	wp_enqueue_script( 'renome-main-script' );
}

add_action( 'wp_enqueue_scripts', 'Renome\enqueue_scripts' );
