<?php
defined( 'ABSPATH' ) or die();


add_filter( 'nprojects/shortcode_template', 'kiraz_project_shortcode_template' );
add_filter( 'nprojects/shortcode_parameters', 'kiraz_project_shortcode_params' );
add_filter( 'the_excerpt', 'kiraz_project_auto_excerpt', 99 );

add_action( 'after_setup_theme', function () {
	if ( class_exists( 'nProjects_Admin' ) ) {
		$admin = nProjects_Admin::instance();
		$meta_box_hook = 'add_meta' . '_boxes';
		
		remove_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_styles' ) );
		remove_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_scripts' ) );
		remove_action( 'save_post', array( $admin, 'update_media_items' ) );
		remove_action( $meta_box_hook, array( $admin, 'add_metabox' ) );
	}
} );

function kiraz_project_auto_excerpt( $excerpt ) {
	if ( kiraz_current_post_type() == 'nproject' && mb_strlen( $excerpt ) > kiraz_option( 'projects__autoExcerptLength' ) ) {
		$excerpt = mb_substr( $excerpt, 0, kiraz_option( 'projects__autoExcerptLength' ) );
	}

	return $excerpt;
}

function kiraz_projects_body_class( $classes ) {
	$classes[] = sprintf( 'projects projects-%s', kiraz_option( 'projects__displayMode' ) );

	return $classes;
}

function kiraz_projects_sidebar() {
	return kiraz_option( 'projects__sidebar' );
}

function kiraz_projects_sidebar_position() {
	return kiraz_option( 'projects__sidebarPosition' );
}

function kiraz_single_project_sidebar() {
	return kiraz_option( 'project__sidebar' );
}

function kiraz_single_project_sidebar_position() {
	return kiraz_option( 'project__sidebarPosition' );
}

function kiraz_project_shortcode_template() {
	return 'tmpl/project/projects.php';
}