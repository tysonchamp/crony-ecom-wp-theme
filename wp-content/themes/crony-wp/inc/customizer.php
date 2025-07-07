<?php // WP Customize API

// Add a widget in WordPress Dashboard
function wpc_dashboard_widget_function() {
	// Entering the text between the quotes
	echo '<ul>
	   <li>WordPress Theme Framework: <a href="https://github.com/tysonchamp/WPT-WireFrame">WPT-WireFrame</a></li>
	   <li>Author: <a href="https://www.tysonchamp.com">Tyson</a></li>
	   <li>Theme Developer: <a href="https://www.gbyteinfotech.com">GBYTE INFOTECH</a></li>
	   <li>Theme Version: 0.1</li>
	</ul>';
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Theme information', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

/**
 * Add support for custom logo and also provide
 *
 * custom image size support
 * 
 */
add_theme_support( 'custom-logo', array(
	'height'      => 240,
	'width'       => 80,
	'flex-height' => true,
	'flex-width'  => true,
) );
 
if ( ! function_exists( 'theme_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Twenty Sixteen 1.2
 */
function theme_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

// change the default Login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/images/header/slider_logo.png);
            /*padding-bottom: 30px;*/
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
 *
 * Add support for Fav Icon in WordPress Customizer
 * 
 */
function theme_site_icon_size( $sizes ) {
   $sizes[] = 64;
 
   return $sizes;
}
add_filter( 'site_icon_image_sizes', 'theme_site_icon_size' );
 
function theme_site_icon_tag( $meta_tags ) {
   $meta_tags[] = sprintf( '<link rel="icon" href="%s" sizes="64x64" />', esc_url( get_site_icon_url( null, 64 ) ) );
 
   return $meta_tags;
}
add_filter( 'site_icon_meta_tags', 'theme_site_icon_tag' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * Hooks into the after_setup_theme action.
 *
 */
function theme_custom_background() {
    $defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
}
add_action( 'after_setup_theme', 'theme_custom_background' );

?>
