<?php
/*
Plugin Name: Q.Digital MU - Admin Columns 
Plugin URI: https://www.queerty.com/
Description: Adds slug and image to admin post list (and drops comments)
Author: Scott Gatz
Author URI: https://queerty.com/
Version: 20190919
*/


add_filter( 'manage_posts_columns', 'qdigital_admin_columns' );
function qdigital_admin_columns( $columns ) {
	
	$columns = array(
      'cb' => $columns['cb'],
	  'image' => __( 'Image' ),
	  'title'      => $columns['title'],
	  'author'      => $columns['author'],
	  'categories'  => $columns['categories'],
	  'tags'        => $columns['tags'],
	  'date'        => $columns['date']
    );
    
	return $columns;
}

add_action( 'manage_posts_custom_column', 'qdigital_admin_custom_column', 10, 2);
function qdigital_admin_custom_column( $column, $post_id ) {
  // Image column
  if ( 'image' === $column ) {
    echo get_the_post_thumbnail( $post_id, array(60, 60) );
  }
}


add_action('admin_head', 'qdigital_admin_column_width');
function qdigital_admin_column_width() {
    echo '<style type="text/css">
        .column-image { text-align: left; width:60px !important; overflow:hidden }
    </style>';
}