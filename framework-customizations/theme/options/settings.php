<?php
/**
 * Options for the Theme Settings Page
 *
 * @link http://manual.unyson.io/en/latest/options/introduction.html
 *
 * @package renome
 */

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'footer' => array(
		'title'   => __( 'Footer Settings', 'renome' ),
		'type'    => 'tab',
		'options' => array(
			'social-links' => array(
				'type'        => 'addable-box',
				'label'       => __( 'Social links', 'renome' ),
				'template'    => '{{- text }}',
				'box-options' => array(
					'media' => array(
						'type'    => 'select',
						'label'   => __( 'Media Type', 'renome' ),
						'choices' => array(
							'fb'      => 'Facebook',
							'twitter' => 'Twitter',
							'gplus'   => 'Google Plus',
						),
					),
					'link'  => array(
						'type'  => 'text',
						'label' => __( 'Profile Link', 'renome' ),
					),
					'text'  => array(
						'type'  => 'text',
						'label' => __( 'Link text', 'renome' ),
					),
				),
			),
			'copyright'    => array(
				'type'  => 'wp-editor',
				'label' => __( 'Copyright text', 'renome' ),
			),
		),
	),
);
