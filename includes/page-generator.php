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
*   -- Boy Sports
*       -- Baseball
*       -- Basketball
*       -- Cross Country
*       -- Fotball
*       -- Golf
*       -- Soccer
*       -- Tennis
*       -- Track & Field
*       -- Volleyball
*       -- Water Polo
*       -- Wrestling
*   -- Girl Sports
*       -- Basketball
*       -- Cross Country
*       -- Golf
*       -- Soccer
*       -- Softball
*       -- Tennis
*       -- Track & Field
*       -- Volleyball
*       -- Water Polo
*
**/
/*-----  End of Page Athletics  ------*/

/*
I need list array of pages and child pages that need to be created
I need to check that the pages do not exists so we avoid duplicating pages
I need to asign parent pages to child pages
I need to be able to create duplicate pages if the parent is different


List array of pages to create
Check if page exist
    if it does not, then create new page and assign a parent to the page
    if it does, check if the parent page matches to the parent page we are trying to assign it
        If it does not, then create under the assigned parent page
        If it does, then do not create the page
*/



function create_initial_pages() {
    $pages = array(
                array(
                    'name'  => 'athletics',
                    'title' => 'Athletics',
                    'child' => array(
                        'boys-teams'  => 'Boys Teams',
                        'girls-teams' => 'Girls Teams',
                    ),
                ),
                array(
                    'name'  => 'boys-teams',
                    'title' => 'Boys Teams',
                    'child_teams_01' => array(
                        'baseball'    => 'Baseball',
                        'basketball'  => 'Basketball',
                        'cross-country'  => 'Cross Country',
                        'football'  => 'Football',
                        'golf'  => 'Golf',
                        'soccer'  => 'Soccer',
                        'tennis'  => 'Tennis',
                        'track-field'  => 'Track & Field',
                        'volleyball'  => 'Volleyball',
                        'water-polo'  => 'Water Polo',
                        'wrestling'  => 'Wrestling',
                    )
                ),
                array(
                    'name'  => 'girls-teams',
                    'title' => 'Girls Teams',
                    'child_teams_02' => array(
                        'basketball'  => 'Basketball',
                        'cross-country'  => 'Cross Country',
                        'golf'  => 'Golf',
                        'soccer'  => 'Soccer',
                        'softball'  => 'Softball',
                        'tennis'  => 'Tennis',
                        'track-field'  => 'Track & Field',
                        'volleyball'  => 'Volleyball',
                        'water-polo'  => 'Water Polo',
                    )
                ),
            );
    $template = array(
        'post_type'   => 'page',
        'post_status' => 'publish',
        'post_author' => 1
    );
    foreach( $pages as $page ) {
        $exists = get_page_by_title( $page['title'] );
        $my_page = array(
            'post_name'  => $page['name'],
            'post_title' => $page['title']
        );
        $my_page = array_merge( $my_page, $template );
        $id = ( $exists ? $exists->ID : wp_insert_post( $my_page ) );
        if( isset( $page['child'] ) ) {
            foreach( $page['child'] as $key => $value ) {
                $child_id = get_page_by_title( $value );
                $child_page = array(
                    'post_name'   => $key,
                    'post_title'  => $value,
                    'post_parent' => $id
                );
                $child_page = array_merge( $child_page, $template );
                if( !isset( $child_id ) ) wp_insert_post( $child_page );
            }
        }
        elseif( isset( $page['child_teams_01'] ) ) {
            foreach( $page['child_teams_01'] as $key => $value ) {
                // $child_id = get_page_by_title( $value );
                $child_page = array(
                    'post_name'     => $key,
                    'post_title'    => $value,
                    'post_parent'   => $id,
                );
                $child_page = array_merge( $child_page, $template );
                if( !isset( $child_id ) ) wp_insert_post( $child_page );
            }
        }
        elseif( isset( $page['child_teams_02'] ) ) {
            foreach( $page['child_teams_02'] as $key => $value ) {
                //$child_id = get_page_by_title( $value );
                $child_page = array(
                    'post_name'     => $key,
                    'post_title'    => $value,
                    'post_parent'   => $id,
                );
                $child_page = array_merge( $child_page, $template );
                if (!isset( $child_id )) {
                        wp_insert_post( $child_page );
                }      
            }
        }        
    }
}
add_filter( 'after_setup_theme', 'create_initial_pages' );