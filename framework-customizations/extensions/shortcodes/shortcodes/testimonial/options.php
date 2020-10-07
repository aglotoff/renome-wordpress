<?php
/**
 * Options file for the Testimonial shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#options-file
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'layout' => array(
		'type'    => 'radio',
		'label'   => __( 'Layout', 'renome' ),
		'value'   => 'image-left',
		'choices' => array(
			'image-left'  => __( 'Image on the left', 'renome' ),
			'image-right' => __( 'Image on the right', 'renome' ),
		),
	),
	'quote'  => array(
		'type'  => 'textarea',
		'label' => __( 'Quote Text', 'renome' ),
	),
	'author' => array(
		'type'  => 'text',
		'label' => __( 'Quote Author', 'renome' ),
	),
	'image'  => array(
		'type'  => 'upload',
		'label' => __( 'Image', 'renome' ),
	),
);
