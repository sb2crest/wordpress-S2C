<?php
defined( 'ABSPATH' ) or die();


// Setup the theme navigation
add_action( 'after_setup_theme', 'kiraz_navigation' );

// Setup theme supports
add_action( 'after_setup_theme', 'kiraz_supports' );

// Setup theme sidebars
add_action( 'widgets_init', 'kiraz_sidebars' );

// Add action to register the needed scripts and styles
// for the theme
add_action( 'init', 'kiraz_register_assets', 5 );

// We need enqueue the scripts and styles before showing
// the content
add_action( 'wp_enqueue_scripts', 'kiraz_enqueue_assets', 5 );


add_filter( 'the_content', function ( $content ) {
	if ( is_singular() ) {
		return preg_replace( '/<p>\s*<span id="more-[0-9]+">\s*<\/span><\/p>/is', '', $content );
	}

	return $content;
}, 99 );

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

function kiraz_cleanup ( $content ) {
	return $content;
}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function kiraz_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'kiraz_pingback_header' );


/**
 * Register the theme menu locations
 *
 * @return  void
 * @since   1.0.0
 */
function kiraz_navigation() {
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu', 'kiraz' ),
		'sliding'   => esc_html__( 'Sliding Menu', 'kiraz' ),
		'top'       => esc_html__( 'Top Menu', 'kiraz' )
	) );
}


/**
 * Register the theme features support
 *
 * @return  void
 */
function kiraz_supports() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'status', 'video', 'audio' ) );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'script', 'style' ] );
	add_theme_support( 'align-wide' );
	add_theme_support( "wp-block-styles" );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "custom-logo" );
	add_theme_support( "custom-header" );
	add_theme_support( "custom-background" );
}


function kiraz_sidebars() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Widgets Area', 'kiraz' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sliding Content', 'kiraz' ),
		'id'            => 'off-canvas-left',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Content Filter', 'kiraz' ),
		'id'            => 'woocommerce-content-top',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Content bottom sidebars
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #1', 'kiraz' ),
		'id'            => 'content-bottom-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #1 area', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #2', 'kiraz' ),
		'id'            => 'content-bottom-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #2 area', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #3', 'kiraz' ),
		'id'            => 'content-bottom-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #3 area', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #4', 'kiraz' ),
		'id'            => 'content-bottom-4',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #4 area', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Footer sidebars
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer #1', 'kiraz' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #1 area', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #2', 'kiraz' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #2 area', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #3', 'kiraz' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #3 area', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #4', 'kiraz' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #4 area', 'kiraz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}


function kiraz_register_assets() {
	// Theme's styles
	wp_register_style( 'kiraz-components', get_template_directory_uri() . '/assets/css/components.css', array(), Kiraz_VERSION, 'all' );

	if (is_child_theme()) {
		wp_register_style( 'kiraz-parent', get_template_directory_uri() . '/assets/css/style.css', array( 'kiraz-components' ), Kiraz_VERSION, 'all' );
		wp_register_style( 'kiraz', get_stylesheet_uri(), array( 'kiraz-parent' ), Kiraz_VERSION, 'all' );
	} else {
		wp_register_style( 'kiraz', get_template_directory_uri() . '/assets/css/style.css', ['kiraz-components'], Kiraz_VERSION, 'all' );
	}
	wp_enqueue_script( 'imagesloaded' );
	wp_register_script( 'packery', get_theme_file_uri( 'assets/js/libs/packery.js' ), ['jquery'], false, true );
	wp_register_script( 'isotope', get_theme_file_uri( 'assets/js/libs/isotope.js' ), ['jquery'], false, true );
	wp_register_script( 'isotope-packery', get_theme_file_uri( 'assets/js/libs/isotope.packery.js' ), ['isotope', 'packery'], false, true );

	// Theme's scripts
	wp_register_script( 'kiraz', get_template_directory_uri() . '/assets/js/theme.js', [
		'imagesloaded',
		'isotope-packery',
	], Kiraz_VERSION, true );
}


function kiraz_enqueue_google_fonts() {
	global $_required_google_fonts;

	if ( ! empty( $_required_google_fonts ) && is_array( $_required_google_fonts ) ) {
		$fonts = array();
		$subsets = array();

		foreach ( $_required_google_fonts as $font ) {
			$fonts[] = sprintf( '%s:%s', urlencode( $font['family'] ), urlencode( $font['variants'] ) );
			$subsets = array_merge( $subsets, $font['subsets'] );
		}

		if ( ! empty( $fonts ) ) {
			$scheme = parse_url( get_home_url(), PHP_URL_SCHEME );
			$fonts_url = add_query_arg( array(
				'family' => implode( '|', array_unique( $fonts ) ),
				'subset' => implode( ',', array_unique( $subsets ) )
				), sprintf( '%s://fonts.googleapis.com/css', $scheme ) );

			wp_enqueue_style( 'kiraz-fonts', $fonts_url );
		}
	}
}


function kiraz_enqueue_assets() {
	// The dynamic styles
	if ( locate_template( 'dynamic-styles.php' ) ) {
		// Load the script that generate the dynamic
		// stylesheets
		get_template_part( 'dynamic-styles' );
	}

	kiraz_enqueue_google_fonts();

	// Enqueue the main styles
	wp_enqueue_style( 'kiraz' );

	// Enqueue the inline stylesheet
	wp_add_inline_style( 'kiraz', kiraz_styles() );
	wp_add_inline_style( 'kiraz', kiraz_scheme_styles() );

	// Enqueue the main script
	wp_enqueue_script( 'kiraz' );

	// Comment script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


function kiraz_acf_fallback_init () {
	if ( ! function_exists( 'get_field' ) ) {
		function get_field () {}
	}

	if ( ! function_exists( 'the_field' ) ) {
		function the_field () {}
	}
}
add_action( 'wp', 'kiraz_acf_fallback_init' );


//Restoring the classic Widgets Editor 
function kiraz_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'kiraz_theme_support' );

//Add Shortcode to Menu
add_filter('wp_nav_menu_items', 'do_shortcode');

//Disable elementor color and typo and update globals
function kiraz_activate_elementor_settings() {
    update_option('elementor_disable_color_schemes', 'yes');
    update_option('elementor_disable_typography_schemes', 'yes');
}
add_action( 'after_setup_theme', 'kiraz_activate_elementor_settings' );

//Custom Body Class
add_filter( 'body_class', 'kiraz_custom_body_class' );
/**
 * Add custom field body class(es) to the body classes.
 *
 * It accepts values from a per-page custom field, and only outputs when viewing a singular static Page.
 *
 * @param array $classes Existing body classes.
 * @return array Amended body classes.
 */
function kiraz_custom_body_class( array $classes ) {
	$new_class = is_page() ? get_post_meta( get_the_ID(), 'body_class', true ) : null;

	if ( is_singular() && get_post_meta( get_the_ID(), 'body_class', true ) ) {
        $classes[] = get_post_meta( get_the_ID(), 'body_class', true );
    }

	if ( $new_class ) {
		$classes[] = $new_class;
	}

	return $classes;
}