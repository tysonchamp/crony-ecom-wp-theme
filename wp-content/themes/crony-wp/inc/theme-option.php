<?php
// Theme Option Page Initializing
if( function_exists("acf_add_options_page") ) {
	acf_add_options_page(array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug'  => 'theme-options',
		'icon_url' => 'dashicons-screenoptions',
		'capability' => 'edit_posts'
	));
}

// Theme Option Page Initializing
if( function_exists("acf_add_options_page") ) {
	acf_add_options_page(array(
		'page_title' => 'Theme Slider',
		'menu_title' => 'Theme Slider',
		'menu_slug'  => 'slider-options',
		'icon_url' => 'dashicons-images-alt',
		'capability' => 'edit_posts'
	));
}

// Theme Option Page Initializing
if( function_exists("acf_add_options_page") ) {
	acf_add_options_page(array(
		'page_title' => 'Testimonials',
		'menu_title' => 'Testimonials',
		'menu_slug'  => 'feedbacks-options',
		'icon_url' => 'dashicons-format-quote',
		'capability' => 'edit_posts'
	));
}


?>