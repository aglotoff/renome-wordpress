<?php
/**
 * Options file for the Gallery shortcode.
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
	'images'   => array(
		'type'   => 'addable-option',
		'label'  => __( 'Images', 'renome' ),
		'option' => array( 'type' => 'upload' ),
		'limit'  => 2,
	),
);
