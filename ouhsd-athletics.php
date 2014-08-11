<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   OUHSD Athletics
 * @author    Teodoro Lopez <teodoro.lopez@ouhsd.k12.ca.us>
 * @license   GPL-2.0+
 * @link      http://ouhsd.k12.ca.us
 * @copyright 2014 Oxnard Union High School District
 *
 * @wordpress-plugin
 * Plugin Name:       OUHSD_Athletics
 * Plugin URI:        http://wwww.ouhsd.k12.ca.us
 * Description:       A WordPress plugin that adds the page structure for the Athletics section for a school site
 * Version:           1.0.0
 * Author:            Teodoro Lopez
 * Author URI:        http://www.teolopez.com
 * Text Domain:       ouhsd-athletics-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 * WordPress-Plugin-Boilerplate: v2.6.1
 */



include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// function ouhsd_athletics_teams_get_ID_by_page_name($page_name) {
//    global $wpdb;
//    $page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."' AND post_type = 'page'");
//    if ($page_name_id) {
// 		return $page_name_id;
//    } else {
//    	return null;
//    }
// }


function ouhsd_athletics_teams_get_ID_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
};



global $post;
$pageBoys = ouhsd_athletics_teams_get_ID_by_slug('athletics/boys-teams');
$pageGirls = ouhsd_athletics_teams_get_ID_by_slug('athletics/girls-teams');
function wptuts_styles_with_the_lot()
{
	global $post;
	$pageBoys = ouhsd_athletics_teams_get_ID_by_slug('athletics/boys-teams');
	$pageGirls = ouhsd_athletics_teams_get_ID_by_slug('athletics/girls-teams');
	if ($post->post_parent == $pageBoys) {
	    // Register the style like this for a plugin:
	    wp_register_style( 'custom-style', plugins_url( '/css/bootstrap.min.css', __FILE__ ), array(), '20120208', 'all' );
	    wp_register_style( 'athletics-styles', plugins_url( '/css/athletics-styles.css', __FILE__ ), array(), '20120208', 'all' );
	    // wp_register_style( 'custom-style', plugins_url( '/css/bootstrap-theme.min.css', __FILE__ ), array(), '20120208', 'all' );
	    // or
	    // Register the style like this for a theme:
	    // dwp_register_style( 'custom-style', get_template_directory_uri() . '/css/custom-style.css', array(), '20120208', 'all' );
	 
	    // For either a plugin or a theme, you can then enqueue the style:

	   // echo "parent's id is $pageBoys";
	    wp_enqueue_style( 'custom-style' );
	    wp_enqueue_style( 'athletics-styles' );	   
	}

}
add_action( 'wp_enqueue_scripts', 'wptuts_styles_with_the_lot' );



function my_scripts_method() {
	wp_enqueue_script( 'newscript', plugins_url( '/js/bootstrap.min.js' , __FILE__ ), array( 'jquery' ));
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

include( plugin_dir_path( __FILE__ ) . '/includes/page-generator.php');

include( plugin_dir_path( __FILE__ ) . '/includes/advanced-custom-fields.php');


function tl_footer_tabs_responsive_script() {
    ?>

	<script type="text/javascript">
		// alert("Hello! I am an alert box!!");

		$('#responsiveTabsDemo').responsiveTabs({
			startCollapsed: 'accordion'
		});
	</script>

    <?php

}
add_action('wp_footer', 'tl_footer_tabs_responsive_script');


// function wpb_adding_scripts() {
// wp_register_script('my_amazing_script', plugins_url('amazing_script.js', __FILE__), array('jquery'),'1.1', true);
// wp_enqueue_script('my_amazing_script');
// }

// add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );

// add_filter( 'template_include', 'team_template', 99 );

// function team_template( $template ) {

//     $pages = array(
// 	        'baseball',
// 	        'basketball',
// 	        'cross-country',
// 	        'football',
// 	        'golf',
// 	        'soccer',
// 	        'tennis',
// 	        'track-field',
// 	        'volleyball',
// 	        'water-polo',
// 	        'wrestling',
// 	        'softball',
//     	);

// 	foreach( $pages as $key ) {
// 		echo $key;
// 		echo "<br>";
// 		$id = get_the_ID();
// 		$post_7 = get_post($id);
// 		$title = $post_7->post_title;
// 		echo $id. " = " .$title;

// 		if ($key == $title) {
// 			if ( $key) {
// 				$new_template = locate_template( array( 'page-templates/template.php' ) );
// 				if ( '' != $new_template ) {
// 					return $new_template ;
// 				}
// 			}
// 		}

// 		return $template;
// 	}
// }

add_filter( 'template_include', 'team_page_template', 99 );

function team_page_template( $template ) {

	if ( is_page(
			array(
		        'baseball',
		        'basketball',
		        'cross-country',
		        'football',
		        'golf',
		        'soccer',
		        'tennis',
		        'track-field',
		        'volleyball',
		        'water-polo',
		        'wrestling',
		        'softball',
				)
		)  ) {
		// $new_template = locate_template( array( 'page-templates/template.php' ) );
		$new_template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/custom-template.php';
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}