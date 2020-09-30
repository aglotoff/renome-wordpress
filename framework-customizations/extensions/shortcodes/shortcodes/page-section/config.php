<?php
/**
 * Config file for the Page Section shortcode.
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
		'title' => __( 'Section', 'renome' ),
		'tab'   => __( 'Content Elements', 'renome' ),
	),
);
