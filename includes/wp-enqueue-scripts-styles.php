<?php

/**
 * Proper way to enqueue scripts and styles
 */
function ouhsd_tabs_tl() {
	wp_enqueue_style( 'style-tl', get_stylesheet_uri() );
	wp_enqueue_script( 'script-tl', plugins_url('/assets/js/jquery.responsiveTabs.min.js', __FILE__), array('jquery'), true );
}

add_action( 'wp_enqueue_scripts', 'ouhsd_tabs_tl' );

?>