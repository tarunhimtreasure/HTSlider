<?php

/**
 * unistalling the plugin
 * 
 * @package adlal
 */

 if(! defined('WP_UNINSTALL_PLUGIN')){
    die('Unauthorized access');
 }

 // DELETE the custom post types
// METHOD ONE
//  $varieties = get_posts(array('post_type'=> 'variety','numberposts' => -1));

//  foreach($varieties as $variety){
//     wp_delete_post($variety->ID, true); // inbuilt function to delete posts , true for deleting posts from trash bin also
//  }

global $wpdb; // accessing DB via SQL (use with caution)

$wpdb->query("DELETE FROM `wp_posts` WHERE `post_type` = `slider`");

$wpdb->query("DELETE FROM `wp_postmeta` WHERE 'post_id' NOT IN (SELECT `id` FROM `wp_posts`)");

$wpdb->query("DELETE FROM `wp_term_relationships` WHERE 'object_id' NOT IN (SELECT `id` FROM `wp_posts`)");