<?php
/**
 * Options for the Page Add/Edit Page
 *
 * @link http://manual.unyson.io/en/latest/options/introduction.html
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'page-box' => array(
		'type'    => 'box',
		'options' => array(
			'page-subtitle' => array(
				'type'  => 'text',
				'label' => __( 'Subtitle', 'renome' ),
			),
			'header-image'  => array(
				'type'  => 'upload',
				'label' => __( 'Header background image', 'renome' ),
			),
		),
	),
);
