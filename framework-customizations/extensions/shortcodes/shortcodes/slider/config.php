<?php
/**
 * Config file for the Slider shortcode.
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
		'title' => __( 'Slider', 'renome' ),
		'tab'   => __( 'Content Elements', 'renome' ),
	),
);
