<?php
/**
 * @package HTSlider
 * 
 */
/*
 Plugin Name: HTSlider
 Plugin URI: https://himtreasure.com
 Description: This is my first WordPress plugin.
 Version: 0.0.1
 Author: Tarun Chauhan
 Author URI: https://tarun.tech
 License: GPLv2 or later
 Text Domain : HTSlider
 */


 // SECURITY CHEKUP

 if(!defined('ABSPATH')){
    die();
 }

 class HtsliderPlugin{
    /**
     * ---------------------------------------------------------------------------
     * Functions list & description :
     * ---------------------------------------------------------------------------
     * active : call when plugin is activated
     * deactivate : call when plugin is deactivated
     * uninstall : call when plugin is removed completly. 
     * admin_enqueue : function including all scripts for plugin admin
     * front_enqueue : function including all stylesheets for plugin front
     * register_admin_euqueue : registering admin panel scripts & css.
     * register_front_enqueue : registering front end scritps & css.
     * custom_slider_post_register : custom post type registration function
     * custom_slider_texonomy_register : custom taxonomy for slider post type only
     */

   
    function __construct(){
        add_action('init', array($this , 'custom_slider_texonomy_register'));
        add_action('init',array($this, 'custom_slider_post_register'));
    }

    function active(){ 
       //echo "IT WORKED!!!!";
       $this->custom_slider_post_register();
       flush_rewrite_rules();
    }

    function deactivate(){ 

    }

    function uninstall(){

    }

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
            'supports' => array('title','editor','custom-fields'),
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

    function register_admin_euqueue(){
        add_action('admin_enqueue_scripts', array($this , 'admin_enqueue'));
    }

    function register_front_enqueue(){
        add_action('wp_enqueue_scripts', array($this , 'front_enqueue'));
    }

    function admin_enqueue(){
        wp_enqueue_style('aldalPluginStyle',plugins_url('/htslider/assests/style.css'), __FILE__);
        wp_enqueue_script('aldalPluginScript',plugins_url('/htslider/assests/script.js'), __FILE__);
    }
    
    function front_enqueue(){
        wp_enqueue_style('adlalpluginFrontStyle', plugins_url('/htslider/assests/front-style.css'),__FILE__);
    }
 }

 if(class_exists('HtsliderPlugin')){
    $objHtsliderPlugin = new HtsliderPlugin();
    $objHtsliderPlugin->register_admin_euqueue();
    $objHtsliderPlugin->register_front_enqueue();
 }

 register_activation_hook(__FILE__, array($objHtsliderPlugin, 'active'));

 register_deactivation_hook(__FILE__, array($objHtsliderPlugin, 'deactivate'));