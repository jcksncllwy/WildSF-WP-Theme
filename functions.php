<?php
function create_tour_post_type() {
  register_post_type( 'tour',
    array(
      'labels' => array(
        'name' => __( 'Tours' ),
        'singular_name' => __( 'Tour' ),
        'supports' => array( 'title', 'custom-fields' ),
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Tour',
        'edit' => 'Edit',
        'edit_item' => 'Edit Tour',
        'new_item' => 'New Tour',
        'view' => 'View',
        'view_item' => 'View Tour',
        'search_items' => 'Search Tours',
        'not_found' => 'No Tours found',
        'not_found_in_trash' => 'No Tours found in Trash',
        'parent' => 'Parent Tour'
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  remove_post_type_support( 'tour', 'editor' );
}

add_action( 'init', 'create_tour_post_type' );


function create_tourguide_post_type() {
  register_post_type( 'tourguide',
    array(
      'labels' => array(
        'name' => __( 'Tourguides' ),
        'singular_name' => __( 'Tourguide' ),
        'supports' => array( 'title', 'custom-fields' ),
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Tourguide',
        'edit' => 'Edit',
        'edit_item' => 'Edit Tourguide',
        'new_item' => 'New Tourguide',
        'view' => 'View',
        'view_item' => 'View Tourguide',
        'search_items' => 'Search Tourguides',
        'not_found' => 'No Tourguides found',
        'not_found_in_trash' => 'No Tourguides found in Trash',
        'parent' => 'Parent Tourguide'
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  remove_post_type_support( 'tourguide', 'editor' );
}

add_action( 'init', 'create_tourguide_post_type' );


add_image_size( 'fullscreen', 1366, 768, true ); 
add_image_size( 'thumbnail-no-crop', 150, 105, false );

?>