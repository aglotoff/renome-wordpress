<?php
/**
 * Register the required plugins
 *
 * @see http://tgmpluginactivation.com/configuration/
 *
 * @package renome
 */

namespace Renome;

/**
 * TGM Plugin Activation Class
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 */
function register_required_plugins() {
	$plugins = array(

		// Unyson Framework.
		array(
			'name'             => 'Unyson', // The plugin name.
			'slug'             => 'unyson', // The plugin slug (typically the folder name).
			'required'         => true,     // If false, the plugin is only 'recommended' instead of required.
			'version'          => '2.7.24', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation' => true,     // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		),

		// Fly Dynamic Image Resizer.
		array(
			'name'             => 'Fly Dynamic Image Resizer', // The plugin name.
			'slug'             => 'fly-dynamic-image-resizer', // The plugin slug (typically the folder name).
			'required'         => true,                        // If false, the plugin is only 'recommended' instead of required.
			'version'          => '2.0.7',                     // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation' => true,                        // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		),

	);

	$config = array(
		'id'           => 'renome',                // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'Renome\register_required_plugins' );
