<?php
if (! defined ( 'ABSPATH' )) {
	die ( 'No script kiddies please!' );
}

if ( ! defined( 'YOIMG_COMMONS_PATH' ) ) {

	define ( 'YOIMG_COMMONS_PATH', dirname ( __FILE__ ) );
	require_once (YOIMG_COMMONS_PATH . '/utils.php');
	
	if (is_admin ()) {
	
		define ( 'YOIMG_COMMONS_URL', plugins_url ( plugin_basename ( YOIMG_COMMONS_PATH ) ) );
		
		global $yoimg_plugins_url;
		$yoimg_plugins_url = array (
			'yoimages-crop' => 'http://TODO/yoimages-crop',
			'yoimages-seo' => 'http://TODO/yoimages-seo'
		);
		
		define ( 'YOIMG_DOMAIN', 'yoimg' );
		load_plugin_textdomain ( YOIMG_DOMAIN, FALSE, plugin_basename ( YOIMG_COMMONS_PATH . '/languages/' ) );
		
		require_once (YOIMG_COMMONS_PATH . '/settings.php');
	}
	if (! function_exists( 'yoimg_settings_load_styles_and_scripts' ) ) {
		function yoimg_settings_load_styles_and_scripts($hook) {
			if (isset ( $_GET ['page'] ) && $_GET ['page'] === 'yoimg-settings') {
				wp_enqueue_script ( 'yoimg-settings-js', YOIMG_COMMONS_URL . '/js/yoimg-settings.js', array (
						'jquery' 
				), false, true );
			}
		}
		add_action ( 'admin_enqueue_scripts', 'yoimg_settings_load_styles_and_scripts' );
	}

}