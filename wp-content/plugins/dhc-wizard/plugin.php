<?php
/**
Plugin Name: Doggy Health Club Plugin
Description: A plugin to elegantly handle DHC product ordering
Version: 1.0.0
Author: Miller Media
Author URI: http://www.miller-media.com
*/

if ( ! defined( 'ABSPATH' ) ) 
{
	die( 'Access denied.' );
}

$plugin_path = rtrim( plugin_dir_path( __FILE__ ), '/' );
include_once( $plugin_path . '/lib/Plugin.php' );
include_once( $plugin_path . '/lib/Settings.php' );

$plugin = \DHC\Plugin::instance();
$settings = new \DHC\Settings;

$plugin->setPath( $plugin_path );
$plugin->setSettings( $settings );

/* Register Scripts */
add_action( 'wp_enqueue_scripts', array( $plugin, 'registerScripts' ) );

/* Register Template Handler */
add_filter( 'wc_get_template_part', array( $plugin, 'templateHandler' ), 10, 3 );

/* Register Ajax Callbacks */
add_action( 'wp_ajax_dhc_wizard', array( $plugin, 'ajaxHandler' ) );
add_action( 'wp_ajax_nopriv_dhc_wizard', array( $plugin, 'ajaxHandler' ) );
