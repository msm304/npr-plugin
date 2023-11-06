<?php

/*
Plugin Name: npr plugin
Plugin URI: https://owebra.com/plugins/npr-plugin
Description: پلاگین نمایش مطالب محبوب، داغ و تصادفی
Author: Amirhosein Soltani
Version: 1.0.0
Licence: GPLv2 or Later
Author URI: https://owebra.com/resume
*/

defined('ABSPATH') || exit;

define('NPR_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('NPR_PLUGIN_URL', plugin_dir_url(__FILE__));

function npr_register_assets()
{
    // css
    wp_register_style('npr-style', plugins_url('npr-plugin/assets/front/css/style.css'), '', '1.0.0');
    wp_enqueue_style('npr-style');

    // script
    wp_register_script('npr-main-js', NPR_PLUGIN_URL . '/assets/front/js/main.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('npr-main-js');
}
add_action('wp_enqueue_scripts', 'npr_register_assets');

include_once NPR_PLUGIN_DIR . 'view/front/npr-tab.php';

if(!is_admin()){
    add_filter('widget_text','do_shortcode',11);
}
