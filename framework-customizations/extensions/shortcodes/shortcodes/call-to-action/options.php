<?php
/**
 * Options file for the Call to Action shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#options-file
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'btn_title' => array(
		'type'  => 'text',
		'label' => __( 'Button title', 'renome' ),
	),
	'btn_link'  => array(
		'type'  => 'text',
		'label' => __( 'Button link', 'renome' ),
	),
	'image'     => array(
		'type'  => 'upload',
		'label' => __( 'Background image', 'renome' ),
	),
);
