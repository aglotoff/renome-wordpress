<?php
/**
 * Options file for the Slider shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#options-file
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slides' => array(
		'type'        => 'addable-box',
		'label'       => __( 'Slides', 'renome' ),
		'template'    => '{{- title }}',

		'box-options' => array(
			'title'    => array(
				'type'  => 'text',
				'label' => __( 'Title', 'renome' ),
			),
			'subtitle' => array(
				'type'  => 'text',
				'label' => __( 'Subtitle', 'renome' ),
			),
			'image'    => array(
				'type'  => 'upload',
				'label' => __( 'Image', 'renome' ),
			),
		),
	),
);
