<?php
/**
 * Custom hooks for the Unyson Page Builder shortcodes extension
 *
 * @package renome
 */

namespace Renome;

if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Disable default page builder shortcodes
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#overwriting-shortcodes
 *
 * @param  array $to_disable The list of shortcodes to disable.
 * @return array             The updated list of shortcodes to disable.
 */
function disable_default_shortcodes( $to_disable ) {
	return array_merge(
		$to_disable,
		array(
			'accordion',
			'button',
			'calendar',
			// 'call_to_action',
			'column',
			'contact_form',
			'divider',
			'icon_box',
			'icon',
			'map',
			'media_image',
			'media_video',
			'notification',
			'calendar',
			'section',
			'special_heading',
			'table',
			'tabs',
			'team_member',
			'testimonials',
			'widget_area',
		)
	);
}

add_filter( 'fw_ext_shortcodes_disable_shortcodes', 'Renome\disable_default_shortcodes' );
