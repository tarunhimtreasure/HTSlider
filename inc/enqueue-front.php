<?php
/**
 * 
 * @package HTSlider
 * 
 */

 class EnqueueFront{
    public static function front_enqueue(){
        wp_enqueue_style('adlalpluginFrontStyle', plugins_url('/htslider/assests/front-style.css'),__FILE__);
    }
 }