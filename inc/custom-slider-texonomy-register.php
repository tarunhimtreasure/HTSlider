<?php

class CustomSliderTexonomyRegister {
    function custom_slider_texonomy_register(){
        $labels = array(
            'name'              => _x( 'Slider Categories', 'Slider Category taxonomy', 'textdomain' ),
            'singular_name'     => _x( 'Slider Category', 'Slider Categpry taxonomy', 'textdomain' ),
            'search_items'      => __( 'Search Slider Categories', 'textdomain' ),
            'all_items'         => __( 'All Slider Categories', 'textdomain' ),
            'parent_item'       => __( 'Parent Slider Category', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Slider Category:', 'textdomain' ),
            'edit_item'         => __( 'Edit Slider Category', 'textdomain' ),
            'update_item'       => __( 'Update Slider Category', 'textdomain' ),
            'add_new_item'      => __( 'Add New Slider Category', 'textdomain' ),
            'new_item_name'     => __( 'New Slider Category Name', 'textdomain' ),
            'menu_name'         => __( 'Slider Category', 'textdomain' ),
        );
        $args = array(
            'labels' => $labels,
            'description' => __( 'Categories only for the Slider Post type', 'textdomain' ),
            'hierarchical' => false,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => false,
            'show_in_rest' => true,
        );
        register_taxonomy( 'slidercategory', array(), $args );
    }
}