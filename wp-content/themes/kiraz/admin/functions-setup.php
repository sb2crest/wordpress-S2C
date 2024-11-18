<?php
defined( 'ABSPATH' ) or die();

// The third-party libraries
require_once Kiraz_PATH . 'vendor/class-tgm-plugin-activation.php';

// Classes
require_once Kiraz_PATH . 'admin/inc/class-sample-data.php';

// Register theme's assets
add_action( 'init', 'kiraz_setup_admin_assets' );


if ( ! function_exists( 'kiraz_setup_admin_assets' ) ):
/**
 * Register scripts and styles for the theme
 * 
 * @return  void
 */
function kiraz_setup_admin_assets() {
	// Font Icons
	wp_register_style( 'font-icons', get_theme_file_uri( 'assets/css/components.css' ), array(), '4.7.0' );
	
	// Chosen
	wp_register_style( 'kiraz-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.min.css' ), array(), Kiraz_VERSION );
	wp_register_script( 'kiraz-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.jquery.min.js' ), array( 'jquery' ), Kiraz_VERSION, true );
	
	// Spectrum
	wp_register_style( 'kiraz-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.css' ), array(), Kiraz_VERSION );
	wp_register_script( 'kiraz-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.js' ), array( 'jquery' ), Kiraz_VERSION, true );

	// Spectrum
	wp_register_style( 'kiraz-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/css/jquery.fonticonpicker.css' ), array(), Kiraz_VERSION );
	wp_register_script( 'kiraz-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/fonticonpicker.js' ), array( 'jquery' ), Kiraz_VERSION, true );

	// VueJS library
	wp_register_script( 'vuejs', get_theme_file_uri( 'admin/js/vendor/vue.js' ), array(), Kiraz_VERSION, true );

	/**
	 * Core scripts
	 */
	wp_register_script( 'kiraz-options', get_theme_file_uri( 'admin/js/options.js' ), array(
		'vuejs',
		'kiraz-spectrum',
		'kiraz-chosen',
		'wp-plupload',
		'jquery-ui-resizable',
		'jquery-ui-sortable',
		'kiraz-iconpicker'
	), Kiraz_VERSION, true );

	wp_register_style( 'kiraz-options', get_theme_file_uri( 'admin/css/options.css' ), array(
		'font-icons',
		'kiraz-chosen',
		'kiraz-spectrum',
		'kiraz-iconpicker'
	), Kiraz_VERSION );
	
	wp_register_style( 'kiraz-customize', get_theme_file_uri( 'admin/css/customize.css' ), array( 'kiraz-options' ), Kiraz_VERSION );
}
endif;

add_filter('acf/settings/save_json', function() {
	return get_theme_file_path( 'admin/json/' );
} );

add_filter('acf/settings/load_json', function( $paths ) {
    return array( get_theme_file_path( 'admin/json/' ) );
} );