<?php
/*
* Plugin Name: GFF Store Locator
* Description: Store Locator for GFF
* Version: 1.0
* Author: Rokon
* Author Uri: prothomalo.com
* Text Domain: gff-store-locator
*/

if( !defined('ABSPATH') ) {
    exit;
}

// include codestar framework
require_once plugin_dir_path(__FILE__).'libs/codestar-framework/codestar-framework.php';
require_once plugin_dir_path(__FILE__).'inc/codestar-framework.php';
require_once plugin_dir_path(__FILE__).'inc/custom-posts.php';
require_once plugin_dir_path(__FILE__).'inc/shortcode.php';

function gff_store_locator_assets() {
    wp_enqueue_style('leaflet', plugin_dir_url(__FILE__).'libs/leaflet-js/leaflet.css', null, '1.0.0');
    wp_enqueue_script('leaflet', plugin_dir_url(__FILE__).'libs/leaflet-js/leaflet.js', [], '1.0.0', false);
}
add_action('wp_enqueue_scripts', 'gff_store_locator_assets');