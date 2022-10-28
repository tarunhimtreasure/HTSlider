<?php
/**
 * 
 * @package HTslider
 * 
 */

 class EnqueueAdmin{
    public static function admin_enqueue(){
        wp_enqueue_style('aldalPluginStyle',plugins_url('/htslider/assests/style.css'), __FILE__);
        wp_enqueue_script('aldalPluginScript',plugins_url('/htslider/assests/script.js'), __FILE__);
    }
 }