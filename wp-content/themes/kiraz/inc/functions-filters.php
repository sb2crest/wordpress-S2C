<?php
defined( 'ABSPATH' ) or die();


// A filter for adding custom classes
// into the body element
add_filter( 'kiraz_body_class', 'kiraz_body_classes', 5 );


// A filter to generate the post excerpt
// automatically
add_filter( 'kiraz_the_content', 'kiraz_auto_excerpt', 5 );

/**
 * Return the classes name for the body tag
 * in array format
 * 
 * @param   array  $classes  An existing classes
 * @return  array
 * @since   1.0.0
 */
function kiraz_body_classes( $classes ) {
	$classes[] = sprintf( 'layout-%s', kiraz_option( 'global__layout__mode' ) );

	if ( kiraz_has_sidebar() && is_active_sidebar( kiraz_sidebar_id() ) ) {
		$classes[] = sprintf( 'sidebar-%s', kiraz_sidebar_position() );
	}

	return $classes;
}


function kiraz_auto_excerpt( $content ) {
	if ( kiraz_option( 'blog__archive__autoExcerpt' ) === 'on' ) {
		$length = (int) kiraz_option( 'blog__archive__excerptLength' );
		$post   = get_post();

		if ( ! preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {
			$content = strip_tags( strip_shortcodes( $content ) );
			$content = trim( $content );

			if ( strlen( $content ) > $length ) {
				$content = mb_substr( $content, 0, $length );
				$content.= '...';
			}

			return sprintf( '<p>%s</p>', $content );
		}
	}

	return $content;
}