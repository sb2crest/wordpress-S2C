<?php
defined( 'ABSPATH' ) or die();

// Generate the background styles based on the
// given options key
$background_options = array(
	'global__layout__background'      => 'body',
	'header__background'              => '#site-header',
	'header__topbar__background'      => '#site-topbar',
	'header__sticky__background'      => '#site-header-sticky',
	// Title bar
	'header__titlebar__background'    => '.site-content .content-header'
);

foreach ( $background_options as $key => $selector ) {
	kiraz_define_style( $selector, kiraz_background_styles(
		kiraz_option( $key )
	) );
}

$queried_object = get_queried_object();

if ( $queried_object instanceOf WP_Post ) {
	$featured_background_types = (array) kiraz_option( 'header__titlebar__backgroundFeatured' );
	$current_post_type         = kiraz_current_post_type();
	
	if ( in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail( $queried_object->ID ) ) {
		list($src, $width, $height, $crop) = wp_get_attachment_image_src( get_post_thumbnail_id( $queried_object->ID ), 'full', false );
		
		kiraz_define_style( '.site-content .content-header', array(
			'background-image' => sprintf( 'url(%s)', $src )
		) );
	}
}


// Generate the typography styles based on the
// given options key
$typography_options = array(
	'global__typography__body'              => 'body',
	'global__typography__h1'                => 'h1',
	'global__typography__h2'                => 'h2',
	'global__typography__h3'                => 'h3',
	'global__typography__h4'                => 'h4',
	'global__typography__h5'                => 'h5',
	'global__typography__h6'                => 'h6',
	'global__typography__blockquote'        => 'blockquote',
	'header__topbar__typography'            => '#site-topbar',
	'header__nav__typography'               => '.site-header .navigator > .menu > li a',
	'header__sticky__nav__typography'       => '.site-header-sticky .navigator > .menu > li a',

	// Title bar
	'header__titlebar__titleFont' => '.content-header .page-title-inner,.ctaBox h2',

	// Widget
	'global__widget__title'   => '.widget > .widget-title, .widget .wp-block-group h2',
	'global__widget__content' => '.widget',

	// Sliding content
	'sliding__sidebarTypography'  => '.off-canvas-left .off-canvas-wrap .widget',
	'sliding__menuTypography'     => '.sliding-menu',

	// Content bottom widgets
	'contentBottom__widgets__typography'   => '.content-bottom-widgets .widget',
	'contentBottom__widgets__title'        => '.content-bottom-widgets .widget-title',

	// Footer typography
	'footer__typography'            => '.site-footer',
	'footer__copyright__typography' => '.footer-copyright',
	'footer__widgets__typography'   => '#site-footer .footer-widgets .widget',
	'footer__widgets__title'        => '#site-footer .footer-widgets .widget-title'

);

foreach ( $typography_options as $key => $selector ) {
	kiraz_define_style( $selector, kiraz_typography_styles(
		(array) kiraz_option( $key )
	) );
}

if ( $heading_sizes = kiraz_option( 'global__typography__headingSize' ) ) {
	foreach ( $heading_sizes as $tag => $size ) {
		kiraz_define_style( $tag, array(
			'font-size' => $size
		) );
	}
}

// Generate the text colors based on the
// given options key
$text_color_options = array( 'global__typography__colors' );

foreach ( $text_color_options as $key ) {
	$color_values = array_filter( kiraz_option( $key ) );
	
	foreach ( $color_values as $selector => $color ) {
		kiraz_define_style( $selector, array(
			'color' => $color
		) );
	}
}

$nav_colors_options = array(
	'header__topbar__colors' => array(
		'menu'        => '#site-topbar a',
		'menu-hover'  => '#site-topbar a:hover,#site-topbar .menu-top li:hover a',
		'menu-active' => array(
			'#site-topbar .menu-top li.current-menu-item > a',
			'#site-topbar .menu-top li.current_page_item > a',
			'#site-topbar .menu-top li.current-menu-ancestor > a',
			'#site-topbar .menu-top li.current-menu-parent > a',
			'#site-topbar .menu-top li.current-page-ancestor > a'
		)
	),
	'header__nav__colors' => array(
		'menu'        => '#site-header a',
		'menu-hover'  => '#site-header a:hover,#site-header .navigator .menu > li:hover > a',
		'menu-active' => array(
			'#site-header .navigator .menu > li.current-menu-item > a',
			'#site-header .navigator .menu > li.current_page_item > a',
			'#site-header .navigator .menu > li.current-menu-ancestor > a',
			'#site-header .navigator .menu > li.current-menu-parent > a',
			'#site-header .navigator .menu > li.current-page-ancestor > a'
		)
	),
	'header__sticky__nav__colors' => array(
		'menu'        => '#site-header-sticky a',
		'menu-hover'  => '#site-header-sticky a:hover,#site-header-sticky .navigator .menu > li:hover > a',
		'menu-active' => array(
			'#site-header-sticky .navigator .menu > li.current-menu-item > a',
			'#site-header-sticky .navigator .menu > li.current_page_item > a',
			'#site-header-sticky .navigator .menu > li.current-menu-ancestor > a',
			'#site-header-sticky .navigator .menu > li.current-menu-parent > a',
			'#site-header-sticky .navigator .menu > li.current-page-ancestor > a'
		)
	),
	'header__titlebar__breadcrumbColors' => array(
		'link'      => '.breadcrumbs a',
		'linkHover' => '.breadcrumbs a:hover'
	),

	// Widget link color
	'global__widget__linkColors' => array(
		'link'      => '.main-sidebar a',
		'linkHover' => '.main-sidebar a:hover'
	),

	// Sliding content color
	'sliding__sidebarColors' => array(
		'link'      => '.off-canvas-left a',
		'linkHover' => '.off-canvas-left a:hover'
	),
	'sliding__menuColors' => array(
		'link'      => '.sliding-menu .off-canvas-wrap a',
		'linkHover' => '.sliding-menu .off-canvas-wrap a:hover'
	),

	// Content bottom widgets
	'contentBottom__widgets__colors' => array(
		'link'      => '.content-bottom-widgets a',
		'linkHover' => '.content-bottom-widgets a:hover'
	),

	// Footer
	'footer__colors' => array(
		'link'      => '.site-footer a',
		'linkHover' => '.site-footer a:hover'
	),
	'footer__widgets__colors' => array(
		'link'      => '.site-footer .footer-widgets a',
		'linkHover' => '.site-footer .footer-widgets a:hover'
	),
	'footer__copyright__colors' => array(
		'link'      => '.site-footer .footer-copyright a',
		'linkHover' => '.site-footer .footer-copyright a:hover'
	),
);

foreach ( $nav_colors_options as $option_key => $selectors ) {
	$colors = kiraz_option( $option_key );

	foreach ( $colors as $key => $value ) {
		$selector = is_array( $selectors[ $key ] )
			? join( ', ', $selectors[ $key ] )
			: $selectors[ $key ];

		kiraz_define_style( $selector, array(
			'color' => $value
		) );
	}
}

// Generate the layout width settings
kiraz_define_style( '.wrap',
	(array) kiraz_option( 'global__layout__width' )
);

// The content padding styles
kiraz_define_style( '.content-body-inner',
	(array) kiraz_option( 'global__layout__padding' )
);

/**
 * The header options
 */
kiraz_define_style( '.site-header .header-brand',
	(array) kiraz_option( 'header__logoMargin' )
);
kiraz_define_style( '.site-header', array(
	'height' => kiraz_option( 'header__height' )
) );
kiraz_define_style( '.site-header .navigator .menu',
	(array) kiraz_option( 'header__nav__margin' )
);
kiraz_define_style( '.site-header .navigator .menu > li > a',
	(array) kiraz_option( 'header__nav__padding' )
);

/**
 * The header options
 */
kiraz_define_style( '.site-header-sticky .header-brand',
	(array) kiraz_option( 'header__sticky__logoMargin' )
);
kiraz_define_style( '.site-header-sticky .site-header-inner', array(
	'height' => kiraz_option( 'header__sticky__height' )
) );
kiraz_define_style( '.site-header-sticky .navigator .menu',
	(array) kiraz_option( 'header__sticky__nav__margin' )
);
kiraz_define_style( '.site-header-sticky .navigator .menu > li > a',
	(array) kiraz_option( 'header__sticky__nav__padding' )
);

kiraz_define_style( '#site-content .content-header', (array) kiraz_option( 'header__titlebar__margin' ) );
kiraz_define_style( '#site-content .content-header', (array) kiraz_option( 'header__titlebar__padding' ) );
kiraz_define_style( '.content-header .content-header-inner', array( 'height' => kiraz_option( 'header__titlebar__height' ) ) );


/**
 * The logo size
 */
foreach ( array( 'logoDefault', 'logoLight', 'logoDark' ) as $logo_profile ) {
	$size = (array) kiraz_option( "{$logo_profile}__logoSize" );
	$size = array_filter( $size );

	kiraz_define_style( ".logo.{$logo_profile}", $size );
}


/**
 * The sliding content
 */
if ( is_active_sidebar( 'off-canvas-left' ) ) {
	kiraz_define_style( '.off-canvas-left', kiraz_background_styles(
		(array) kiraz_option( 'sliding__sidebarBackground' )
	) );
	kiraz_define_style( '.off-canvas-left .off-canvas-wrap', (array) kiraz_option( 'sliding__sidebarPadding' ) );
}
// if ( has_nav_menu( 'sliding' ) ) {
	kiraz_define_style( '.sliding-menu', kiraz_background_styles(
		(array) kiraz_option( 'sliding__menuBackground' )
	) );
	kiraz_define_style( '.sliding-menu .off-canvas-wrap', (array) kiraz_option( 'sliding__menuPadding' ) );
// }


/**
 * Sidebar Styles
 */
if ( kiraz_has_sidebar() && is_active_sidebar( kiraz_sidebar_id() ) ) {
	$layout_dimension = kiraz_option( 'global__layout__width' );
	$sidebar_dimension = kiraz_option( 'global__sidebar__dimension' );
	$padding_side = kiraz_sidebar_position() == 'right' ? 'padding-left' : 'padding-right';

	kiraz_define_style( '#main-content', array(
		'width' => sprintf( 'calc(100%% - %spx)', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin'] )
	) );
	kiraz_define_style( '.main-sidebar', array(
		'width' => sprintf( '%spx', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin'] ),
		$padding_side => $sidebar_dimension['margin']
	) );
	kiraz_define_style( '.sidebar-right .content-body-inner::before', array(
		'right' => sprintf( '%spx', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin']/2 )
	) );
	kiraz_define_style( '.sidebar-left .content-body-inner::before', array(
		'left' => sprintf( '%spx', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin']/2 )
	) );
}

/**
 * The widget styles
 */
kiraz_define_style( '.widget', (array) kiraz_option( 'global__widget__contentPadding' ) );
kiraz_define_style( '.widget', (array) kiraz_option( 'global__widget__contentMargin' ) );

/**
 * Button styles
 */
kiraz_define_style( '.button, input[type="button"], input[type="submit"], button', array(
	'background' => kiraz_option( 'button__background' )
) );
kiraz_define_style( '.button, input[type="button"], input[type="submit"], button', array( 
	'height' => kiraz_option( 'button__height' ) 
) );
kiraz_define_style( '.button, input[type="button"], input[type="submit"], button', kiraz_typography_styles(
	(array) kiraz_option( 'button__typography' )
) );
kiraz_define_style( '.button, input[type="button"], input[type="submit"], button',
	(array) kiraz_option( 'button__padding' )
);
kiraz_define_style( '.button, input[type="button"], input[type="submit"], button', kiraz_border_styles(
	(array) kiraz_option( 'button__border' )
) );
kiraz_define_style( '.button, input[type="button"], input[type="submit"], button', array(
	'border-radius' => kiraz_option( 'button__borderRadius' )
) );

/**
 * Input styles
 */
kiraz_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select', array(
	'background' => kiraz_option( 'input__background' )
) );
kiraz_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), select', array( 
	'height' => kiraz_option( 'input__height' ) 
) );
kiraz_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select', kiraz_typography_styles(
	(array) kiraz_option( 'input__typography' )
) );
kiraz_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select',
	(array) kiraz_option( 'input__padding' )
);
kiraz_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select', kiraz_border_styles(
	(array) kiraz_option( 'input__border' )
) );
kiraz_define_style( 'input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]), textarea, select', array(
	'border-radius' => kiraz_option( 'input__borderRadius' )
) );

// Content bottom widgets
if ( kiraz_option( 'contentBottom__widgets' ) == 'on' ) {
	kiraz_define_style( '#site-footer .content-bottom-widgets', kiraz_background_styles(
		(array) kiraz_option( 'contentBottom__widgets__background' )
	) );
	kiraz_define_style( '#site-footer .content-bottom-widgets', (array) kiraz_option( 'contentBottom__widgets__padding' ) );
	kiraz_define_style( '#site-footer .content-bottom-widgets .widget', (array) kiraz_option( 'contentBottom__widgets__margin' ) );
}


/**
 * Footer styles
 */
kiraz_define_style( '#site-footer', kiraz_background_styles(
	(array) kiraz_option( 'footer__background' )
) );
kiraz_define_style( '.site-footer', (array) kiraz_option( 'footer__padding' ) );

// Footer widgets
if ( kiraz_option( 'footer__widgets' ) == 'on' ) {
	kiraz_define_style( '.footer-widgets', kiraz_background_styles(
		(array) kiraz_option( 'footer__widgets__background' )
	) );
	kiraz_define_style( '#site-footer .footer-widgets', (array) kiraz_option( 'footer__widgets__padding' ) );
	kiraz_define_style( '#site-footer .footer-widgets .widget', (array) kiraz_option( 'footer__widgets__margin' ) );
}

// Footer copyright
if ( kiraz_option( 'footer__copyright' ) == 'on' ) {
	kiraz_define_style( '.site-footer .footer-copyright', kiraz_background_styles(
		(array) kiraz_option( 'footer__copyright__background' )
	) );
	kiraz_define_style( '.site-footer .footer-copyright', (array) kiraz_option( 'footer__copyright__padding' ) );
}

/**
 * Shop
 */
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$grid_spacing = abs( (int)kiraz_option( 'shop__gridGutter' ) );
	
	kiraz_define_style( '.content-inner.products[data-grid] .product,.content-inner.products[data-grid-normal] .product', array(
		'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
		'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
		'margin-bottom' => sprintf( '%dpx', $grid_spacing )
	) );

	kiraz_define_style( '.content-inner.products[data-grid],.content-inner.products[data-grid-normal]', array(
		'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
		'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
	) );
}

/**
 * Projects
 */
if ( is_post_type_archive( 'nproject' ) ||
	 is_tax( 'nproject-category' ) ||
	 is_tax( 'nproject-tag' ) ||
	 is_page_template( 'tmpl/template-projects.php' ) ) {

	$grid_spacing = abs( (int)kiraz_option( 'projects__gridGutter' ) );
	
	kiraz_define_style( '.content-inner[data-grid] .project', array(
		'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
		'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
		'margin-bottom' => sprintf( '%dpx', $grid_spacing )
	) );

	kiraz_define_style( '.projects .content-inner[data-grid]', array(
		'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
		'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
	) );
}

/**
 * Blog
 */
$grid_spacing = abs( (int)kiraz_option( 'blog__archive__gridGutter' ) );
	
kiraz_define_style( '.content-inner[data-grid] .post, .content-inner[data-grid-normal] .post', array(
	'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
	'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
	'margin-bottom' => sprintf( '%dpx', $grid_spacing )
) );

kiraz_define_style( '.content-inner[data-grid], .content-inner[data-grid-normal]', array(
	'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
	'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
) );

/**
 * Loading screen
 */
$loading_screen_enabled = kiraz_option( 'global__misc__loading' );

if ( $loading_screen_enabled === 'off' ) {
	kiraz_define_style( 'body:not(.is-loaded):after, body:not(.is-loaded):before', array(
		'content' => 'none !important'
	) );
}
