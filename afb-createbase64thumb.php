<?php
/*
Plugin Name: AFB Add Base64 Thumbnail
Plugin URI: http://wwww.ifihadthecash.org/
Description: Create a Base64 thumbnail to use with apps accessing any JSON-enabled WordPress site
Version: 1.0
Author: Andrew F. Burton
Author URI: http://wwww.ifihadthecash.org/
License: GPLv2
*/
add_action('init','base64_thumbnails');

function base64_thumbnails(){
	//Get all posts that are in the DB
    $allposts = get_posts( array('post_type' => 'post', 'numberposts' => -1 ) );
	$index	= 0;
	foreach ( $allposts as $post ) {
		//Get the URL to the featured image
		$postthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
		$thumburl = $postthumb['0'];
		//Do a base64 encode of the featured image
		$postbase64 = base64_encode(file_get_contents($thumburl));
		//Create (if not already there) or update a custom field "base64thumb" and put the base64 of the featured image there
		update_post_meta($post->ID, 'base64thumb', $postbase64);
		$index++;
    }
	//Ensuring it only shows on the plugins page
	global $pagenow;
	//Give feedback to the user by telling him how many featured images were updated (using var $index)
    if ( $pagenow == 'plugins.php' ) {
         echo '<div id="message" class="updated"><p>' . $index . ' Featured Images (Post thumbnails) were updated. Switch off the plugin now. Reactivate it when you have new images to update.</p></div>';
	}
	wp_reset_postdata();
}
