<?php
defined( 'ABSPATH' ) or die();

function kiraz_blog_body_class( $classes ) {
	$classes[] = sprintf( 'blog-%s', kiraz_option( 'blog__archive__style' ) );

	return $classes;
}

function kiraz_blog_sidebar() {
	return kiraz_option( 'blog__archive__sidebar' );
}

function kiraz_blog_sidebar_position() {
	return kiraz_option( 'blog__archive__sidebarPosition' );
}

function kiraz_single_sidebar() {
	return kiraz_option( 'blog__single__sidebar' );
}

function kiraz_single_sidebar_position() {
	return kiraz_option( 'blog__single__sidebarPosition' );
}

