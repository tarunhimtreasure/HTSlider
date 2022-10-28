<?php
/**
 * @package HTSlider
 * 
 */


class CustomSliderPostRegister{
    function custom_slider_post_register(){
        $labels = array(
            'name' => _x( 'Sliders', 'Slider for WordPress', 'slider' ),
            'singular_name' => _x( 'Slider', 'Slider for Wordpress', 'slider' ),
            'menu_name' => _x( 'Sliders', 'Admin Menu text', 'slider' ),
            'name_admin_bar' => _x( 'Slider', 'Add New on Toolbar', 'slider' ),
            'archives' => __( 'Slider Archives', 'slider' ),
            'attributes' => __( 'Slider Attributes', 'slider' ),
            'parent_item_colon' => __( 'Parent Slider:', 'slider' ),
            'all_items' => __( 'All Sliders', 'slider' ),
            'add_new_item' => __( 'Add New Slider', 'slider' ),
            'add_new' => __( 'Add New', 'slider' ),
            'new_item' => __( 'New Slider', 'slider' ),
            'edit_item' => __( 'Edit Slider', 'slider' ),
            'update_item' => __( 'Update Slider', 'slider' ),
            'view_item' => __( 'View Slider', 'slider' ),
            'view_items' => __( 'View Sliders', 'slider' ),
            'search_items' => __( 'Search Slider', 'slider' ),
            'not_found' => __( 'Not found', 'slider' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'slider' ),
            //'featured_image' => __( 'Featured Image', 'slider' ),
            //'set_featured_image' => __( 'Set featured image', 'slider' ),
            //'remove_featured_image' => __( 'Remove featured image', 'slider' ),
            //'use_featured_image' => __( 'Use as featured image', 'slider' ),
            'insert_into_item' => __( 'Insert into Slider', 'slider' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Slider', 'slider' ),
            'items_list' => __( 'Sliders list', 'slider' ),
            'items_list_navigation' => __( 'Sliders list navigation', 'slider' ),
            'filter_items_list' => __( 'Filter Sliders list', 'slider' ),
        );
        $args = array(
            'label' => __( 'Slider', 'slider' ),
            'description' => __( 'SliderPlugin for Website', 'slider' ),
            'labels' => $labels,
            'menu_icon' => 'dashicons-format-image',
            //'supports' => array('title', 'thumbnail', 'custom-fields'),
            'supports' => array('title','custom-fields'),
            'taxonomies' => array('slider_category'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => false,
            'has_archive' => true,
            'hierarchical' => false,
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        register_post_type( 'slider', $args );
    }
}