<?php
/**
 * Config file for the Testimonial shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#config-file
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title' => __( 'Testimonial', 'renome' ),
		'tab'   => __( 'Content Elements', 'renome' ),
	),
);
