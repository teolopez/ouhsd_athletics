<?php


/*===============================================================
=            Programmatically Create Posts and Pages            =
===============================================================*/

/**
*
* --------------------------------------
* - Outline of pages that are generated:
* --------------------------------------
* - Athletics
*	-- Boy Sports
*		-- Baseball
*		-- Basketball
*		-- Cross Country
*		-- Fotball
*		-- Golf
*		-- Soccer
*		-- Tennis
*		-- Track & Field
*		-- Volleyball
*		-- Water Polo
*		-- Wrestling
*	-- Girl Sports
*		-- Basketball
*		-- Cross Country
*		-- Golf
*		-- Soccer
*		-- Softball
*		-- Tennis
*		-- Track & Field
*		-- Volleyball
*		-- Water Polo
*
**/





/*-----  End of Page Athletics  ------*/



function create_initial_pages() {

// Your Multidimensional Array of Pages
$all_pages = array( 
	'parents' => array(
		'basketball' => array(
			'ID'             => 1, // Are you creating or updating an existing post?
			'post_title'     => 'Basketball', // Title
			'post_name'      => 'basketball', // slug
			'post_content'   => '',
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'post_author'    => 1,
			'post_parent'    => 0 // Has No Parent
		),
		'soccer' => array(
			'ID'             => 2, // Are you creating or updating an existing post?
			'post_title'     => 'Soccer', // Title
			'post_name'      => 'soccer', // slug
			'post_content'   => '',
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'post_author'    => 1,
			'post_parent'    => 0 // Has No Parent
		)
	),
	'children' => array(
		array(
			'ID'             => 3, // Are you creating or updating an existing post?
			'post_title'     => 'Boys Basketball', // Title
			'post_name'      => 'boys-basketball', // slug
			'post_content'   => '',
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'post_author'    => 1,
			'post_parent'    => 1 // Has Parent
		),
		array(
			'ID'             => 4, // Are you creating or updating an existing post?
			'post_title'     => 'Girls Basketball', // Title
			'post_name'      => 'girls-basketball', // slug
			'post_content'   => '',
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'post_author'    => 1,
			'post_parent'    => 1 // Has Parent
		),
		array(
			'ID'             => 5, // Are you creating or updating an existing post?
			'post_title'     => 'Boys Soccer', // Title
			'post_name'      => 'boys-soccer', // slug
			'post_content'   => '',
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'post_author'    => 1,
			'post_parent'    => 2 // Has Parent
		),
		array(
			'ID'             => 6, // Are you creating or updating an existing post?
			'post_title'     => 'Girls Soccer', // Title
			'post_name'      => 'girls-soccer', // slug
			'post_content'   => '',
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'post_author'    => 1,
			'post_parent'    => 2 // Has Parent
		)
	)
);  


// Run Loop For Each Array Instance
foreach ($all_pages as $pages) {

// Run Loop For Each Array Page
	foreach ($pages as $page) {
		
		$page_parent = $page['post_parent'];

		// If true it is a parent page
		if ($page_parent === 0) {
			echo "parent<br>";

			// Check if parent page does not exist
			// Using wordpress functions
			$exists = false;
			if (!$exists) {
				echo 'Created New Page '.$page['post_title'].'<br><br>';
				// wp_insert_post( $postarr, $wp_error );
			}
		}
		// If false it is a child page
		else{
			echo "child<br>";
			// Check if child page does not exist
			// Using wordpress functions
			$exists = false;
			if (!$exists) {
				echo 'Created New Page '.$page['post_title'].'<br><br>';
				// wp_insert_post( $postarr, $wp_error );
			}
		}

	}

}

    // $pages = array(
		  //       array(
		  //           'name'  => 'athletics',
		  //           'title' => 'Athletics',
		  //           'child' => array(
		  //               'boys-teams'  => 'Boys Teams',
		  //               'girls-teams' => 'Girls Teams',
		  //           ),
		  //       ),
		  //       array(
		  //           'name'  => 'boys-teams',
		  //           'title' => 'Boys Teams',
		  //           'child' => array(
		  //               'baseball'    => 'Baseball',
		  //               'basketball'  => 'Basketball',
		  //               'water-polo'  => 'Water Polo',
		  //           )
		  //       ),
		  //       array(
		  //           'name'  => 'girls-teams',
		  //           'title' => 'Girls Teams',
		  //           'child' => array(
		  //               'baseball'    => 'Baseball',
		  //               'basketball'  => 'Basketball',
		  //               'water-polo'  => 'Water Polo',
		  //           )
		  //       ),		        
    // 		);

    // $template = array(
    //     'post_type'   => 'page',
    //     'post_status' => 'publish',
    //     'post_author' => 1
    // );

    // foreach( $pages as $page ) {
    //     $exists = get_page_by_title( $page['title'] );
    //     $my_page = array(
    //         'post_name'  => $page['name'],
    //         'post_title' => $page['title']
    //     );
    //     $my_page = array_merge( $my_page, $template );

    //     $id = ( $exists ? $exists->ID : wp_insert_post( $my_page ) );

    //     if( isset( $page['child'] ) ) {
    //         foreach( $page['child'] as $key => $value ) {
    //             $child_id = get_page_by_title( $value );
    //             $child_page = array(
    //                 'post_name'   => $key,
    //                 'post_title'  => $value,
    //                 'post_parent' => $id
    //             );
    //             $child_page = array_merge( $child_page, $template );
    //             if( !isset( $child_id ) ) wp_insert_post( $child_page );
    //         }
    //     }
    // }
}

add_filter( 'after_setup_theme', 'create_initial_pages' );


