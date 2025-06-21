<?php 
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Advanced Custom Field Pro', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory_uri() . '/plugins/advanced-custom-fields-pro.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'GTranslate',
			'slug'      => 'gtranslate',
			'required'  => false,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		// function to fetch the image $thumbnail_id =  z_taxonomy_image_url($term->term_id);
		array(
			'name'      => 'Categories Images',
			'slug'      => 'categories-images',
			'required'  => false,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Fluid Responsive Slideshow',
			'slug'      => 'fluid-responsive-slideshow',
			'required'  => false,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Nav Menu Roles',
			'slug'      => 'nav-menu-roles',
			'required'  => false,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Cyclone Slider 2',
			'slug'      => 'cyclone-slider-2',
			'required'  => false,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Dynamic Featured Image',
			'slug'      => 'dynamic-featured-image',
			'required'  => false,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Kiwi Logo Carousel',
			'slug'      => 'kiwi-logo-carousel',
			'required'  => true,
			'force_activation'   => true,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Meta Slider',
			'slug'      => 'ml-slider',
			'required'  => false,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Robo Gallery',
			'slug'      => 'robo-gallery',
			'required'  => false,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'WP likes',
			'slug'      => 'wp-likes',
			'required'  => true,
			'force_activation'   => true,
			'force_deactivation' => true,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Membership 2',
			'slug'      => 'membership-2',
			'required'  => true,
		),
		array(
			'name'      => 'Nav Menu Roles',
			'slug'      => 'nav-menu-roles',
			'required'  => true,
		),
		array(
			'name'      => 'Advanced Custom Fields: Font Awesome',
			'slug'      => 'advanced-custom-fields-font-awesome',
			'required'  => true,
		),
	);
	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
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
// END!!
?>