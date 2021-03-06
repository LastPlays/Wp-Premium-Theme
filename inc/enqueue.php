<?php

/*

	@package sunsettheme

    =========================
        ADMIN ENQUEUE FUNCTIONS
    =========================
*/

// By default, the variable $hook It's taken by add_action
// Also, we can know the name of our specific hook by echoing, and watching on the source file of the page.

function sunset_load_admin_scripts( $hook ) {

	// Here we're telling that if doesn't have the exact hook name, stop the execution of the script.
	if ( 'toplevel_page_alecadd_sunset' !== $hook ) {
		return;
	}

	// There we register a new css file, with the unique ID 'sunset_admin' to refer this css file, and include this file wherever we want.
	wp_register_style( 'sunset_admin', get_template_directory_uri() . '/css/sunset_admin.css', array(), '1.0.0', 'all' );

	// Here we enqueue our new style.
	wp_enqueue_style( 'sunset_admin' );


	// This function will automaticly handle the calling and the activation process of all the scripts and all the source code that we need to use with the media uploader.
	wp_enqueue_media();

	wp_register_script('sunset-admin-script', get_template_directory_uri() . '/js/sunset_admin.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script( 'sunset-admin-script' );

}

// Here, we're saying to wordpress that you have to include this scripts inside your admin page, and not in frontend.
add_action( 'admin_enqueue_scripts', 'sunset_load_admin_scripts' );