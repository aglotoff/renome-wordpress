<?php
/**
 * Options file for the Specials shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#options-file
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'       => array(
		'type'  => 'text',
		'label' => __( 'Section ID', 'renome' ),
		'value' => 'specials',
	),
	'title'    => array(
		'type'  => 'text',
		'label' => __( 'Title', 'renome' ),
	),
	'subtitle' => array(
		'type'  => 'text',
		'label' => __( 'Subtitle', 'renome' ),
	),
	'slides'   => array(
		'type'        => 'addable-box',
		'label'       => __( 'Slides', 'renome' ),
		'template'    => '{{- title }}',

		'box-options' => array(
			'title'    => array(
				'type'  => 'text',
				'label' => __( 'Title', 'renome' ),
			),
			'weekday' => array(
				'type'    => 'select',
				'label'   => __( 'Day of week', 'renome' ),
				'choices' => array(
					'mon' => __( 'Monday', 'renome' ),
					'tue' => __( 'Tuesday', 'renome' ),
					'wed' => __( 'Wednesday', 'renome' ),
					'thu' => __( 'Thursday', 'renome' ),
					'fri' => __( 'Friday', 'renome' ),
					'sat' => __( 'Saturday', 'renome' ),
					'sun' => __( 'Sunday', 'renome' ),
				),
			),
			'price'   => array(
				'type'  => 'text',
				'label' => __( 'Price', 'renome' ),
			),
			'image'   => array(
				'type'  => 'upload',
				'label' => __( 'Image', 'renome' ),
			),
		),
	),
);
