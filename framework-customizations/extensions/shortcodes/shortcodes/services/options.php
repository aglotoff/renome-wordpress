<?php
/**
 * Options file for the Services shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#options-file
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'    => array(
		'type'  => 'text',
		'label' => __( 'Title', 'renome' ),
	),
	'subtitle' => array(
		'type'  => 'text',
		'label' => __( 'Subtitle', 'renome' ),
	),
	'services' => array(
		'type'   => 'addable-option',
		'label'  => __( 'Service list', 'renome' ),
		'option' => array( 'type' => 'text' ),
	),
);
