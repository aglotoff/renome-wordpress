<?php
/**
 * Options file for the Page Section shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#options-file
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'layout'      => array(
		'type'    => 'radio',
		'label'   => __( 'Layout', 'renome' ),
		'value'   => 'images-left',
		'choices' => array(
			'images-left'  => __( 'Images on the left', 'renome' ),
			'images-right' => __( 'Images on the right', 'renome' ),
		),
	),
	'title'       => array(
		'type'  => 'text',
		'label' => __( 'Title', 'renome' ),
	),
	'subtitle'    => array(
		'type'  => 'text',
		'label' => __( 'Subtitle', 'renome' ),
	),
	'text'        => array(
		'type'  => 'wp-editor',
		'label' => __( 'Text', 'renome' ),
	),
	'link'        => array(
		'type'  => 'text',
		'label' => __( 'Link', 'renome' ),
	),
	'images'      => array(
		'type'   => 'addable-option',
		'label'  => __( 'Images', 'renome' ),
		'option' => array( 'type' => 'upload' ),
		'limit'  => 2,
	),
	'image_order' => array(
		'type'    => 'select',
		'label'   => __( 'Image order', 'renome' ),
		'choices' => array(
			'top-left'     => __( 'Top left', 'renome' ),
			'top-right'    => __( 'Top right', 'renome' ),
			'bottom-left'  => __( 'Bottom left', 'renome' ),
			'bottom-right' => __( 'Bottom right', 'renome' ),
		),
	),
	'image_size'  => array(
		'type'    => 'select',
		'label'   => __( 'Image order', 'renome' ),
		'choices' => array(
			'medium' => __( 'Medium', 'renome' ),
			'large'  => __( 'Large', 'renome' ),
		),
	),
);
