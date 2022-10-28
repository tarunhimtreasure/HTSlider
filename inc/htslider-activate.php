<?php
/**
 * @package HTSlider
 * 
 */

 class HtsliderActivate{
    public static function activate(){
        echo "HELLO";
        flush_rewrite_rules();
    }
 }