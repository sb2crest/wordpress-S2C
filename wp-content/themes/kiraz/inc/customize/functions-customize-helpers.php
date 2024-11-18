<?php
defined( 'ABSPATH' ) or die();


/**
 * The helper function to generate controls definition
 * for the branding section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @return  array
 * @since   1.0.0
 */
function kiraz_customize_generate_branding_controls( array &$controls, array $args ) {
	$args = array_replace_recursive( array(
			'prefix'  => '',
			'section' => false,
			'heading' => false
		), $args );

	if ( is_array( $args['heading'] ) ) {
		$controls[ $args['prefix'] . 'logoHeading' ] = array(
			'type'        => 'heading',
			'section'     => $args['section'],
			'label'       => $args['heading']['label'],
			'description' => $args['heading']['description']
		);
	}

	$controls[ $args['prefix'] . 'logo'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo', 'kiraz' ),
	);
	$controls[ $args['prefix'] . 'logoRetina'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo Retina', 'kiraz' ),
	);
	$controls[ $args['prefix'] . 'logoSize'] = array(
		'type'        => 'dimension',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo Size', 'kiraz' ),
		'choices'     => array(
			'width'   => esc_html__( 'Width', 'kiraz' ),
			'height'  => esc_html__( 'Height', 'kiraz' )
		)
	);
	
	return $controls;
}


/**
 * The helper function to generate controls definition
 * for the background section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @since   1.0.0
 */
function kiraz_customize_generate_background_controls( array &$controls, array $args ) {
	$args = array_replace_recursive( array(
			'prefix'  => '',
			'section' => false,
			'heading' => false
		), $args );

	if ( is_array( $args['heading'] ) ) {
		$controls[ $args['prefix'] . 'backgroundHeading' ] = array(
			'type'        => 'heading',
			'section'     => $args['section'],
			'label'       => $args['heading']['label'],
			'description' => $args['heading']['description']
		);
	}

	// Adding the controls
	$controls[ $args['prefix'] . 'backgroundImage'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Image', 'kiraz' ),
		'description' => esc_html__( 'Select an image for the background. If left empty, the background color will be used.', 'kiraz' )
	);
	$controls[ $args['prefix'] . 'backgroundColor'] = array(
		'type'        => 'color-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Color', 'kiraz' ),
		'description' => esc_html__( 'Select the color you want to use for the background.', 'kiraz' )
	);
	$controls[ $args['prefix'] . 'backgroundRepeat'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Repeat', 'kiraz' ),
		'choices' => array(
			'no-repeat' => esc_html__( 'No Repeat', 'kiraz' ),
			'repeat-x'  => esc_html__( 'Repeat X', 'kiraz' ),
			'repeat-y'  => esc_html__( 'Repeat Y', 'kiraz' ),
			'repeat'    => esc_html__( 'Repeat Both', 'kiraz' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundPosition'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Position', 'kiraz' ),
		'choices' => array(
			'top left'      => esc_html__( 'Top Left', 'kiraz' ),
			'top center'    => esc_html__( 'Top Center', 'kiraz' ),
			'top right'     => esc_html__( 'Top Right', 'kiraz' ),
			'center left'   => esc_html__( 'Center Left', 'kiraz' ),
			'center center' => esc_html__( 'Center Center', 'kiraz' ),
			'center right'  => esc_html__( 'Center Right', 'kiraz' ),
			'bottom left'   => esc_html__( 'Bottom Left', 'kiraz' ),
			'bottom center' => esc_html__( 'Bottom Center', 'kiraz' ),
			'bottom right'  => esc_html__( 'Bottom Right', 'kiraz' ),
			'custom'        => esc_html__( 'Custom Position', 'kiraz' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundOffset'] = array(
		'type'    => 'dimension',
		'section' => $args['section'],
		'label'   => esc_html__( 'Custom Position', 'kiraz' ),
		'depends' => array(
			$args['prefix'] . 'backgroundPosition' => array( 'equals', 'custom' )
		),
		'fields'  => array(
			'x' => esc_html__( 'Position X', 'kiraz' ),
			'y' => esc_html__( 'Position Y', 'kiraz' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundAttachment'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Attachment', 'kiraz' ),
		'choices' => array(
			'fixed'      => esc_html__( 'Fixed', 'kiraz' ),
			'scroll'     => esc_html__( 'Scroll', 'kiraz' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundSize'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Size', 'kiraz' ),
		'choices' => array(
			'auto'       => esc_html__( 'Auto', 'kiraz' ),
			'cover'      => esc_html__( 'Cover', 'kiraz' ),
			'contain'    => esc_html__( 'Contain', 'kiraz' ),
			'fit-width'  => esc_html__( '100% Width', 'kiraz' ),
			'fit-height' => esc_html__( '100% Height', 'kiraz' ),
			'stretch'    => esc_html__( 'Stretch', 'kiraz' ),
			'custom'    => esc_html__( 'Custom', 'kiraz' )
		)
	);

	$controls[ $args['prefix'] . 'backgroundCustomSize'] = array(
		'type'    => 'dimension',
		'section' => $args['section'],
		'label'   => esc_html__( 'Size', 'kiraz' ),
		'depends' => array( $args['prefix'] . 'backgroundSize' => array( 'equals', 'custom' ) ),
		'fields'  => array(
			'width'  => esc_html__( 'Width', 'kiraz' ),
			'height' => esc_html__( 'Height', 'kiraz' )
		)
	);
}


/**
 * The helper function to generate controls definition
 * for the typography section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @return  array
 * @since   1.0.0
 */
function kiraz_customize_generate_typography_controls( &$controls, $args ) {

}


/**
 * Retrieve the menu list for using as the menu dropdown
 * 
 * @return  array
 * @since   1.0.0
 */
function kiraz_customize_dropdown_menus() {
	$menus   = wp_get_nav_menus();
	$choices = array( 0 => esc_html__( '-- Select Menu --', 'kiraz' ) );
	$choices = array_merge( $choices, wp_list_pluck( $menus, 'name', 'term_id' ) );

	return $choices;
}


/**
 * Return an array of sidebars that will be use for
 * the dropdown in the theme options
 * 
 * @return  array
 */
function kiraz_customize_dropdown_sidebars() {
	global $wp_registered_sidebars;
	static $sidebars;

	if ( empty( $sidebars ) ) {
		$sidebars = array();

		foreach ( $wp_registered_sidebars as $sidebar ) {
			if ( $sidebar['id'] == 'wp_inactive_widgets' || strpos( $sidebar['id'], 'orphaned_widgets' ) !== false )
				continue;
			
			$sidebars[$sidebar['id']] = $sidebar['name'];
		}
	}
	
	return $sidebars;
}


function kiraz_customize_post_types_options() {
	$post_types = get_post_types( array( 'public' => true ), 'objects' );

	return wp_list_pluck(
		$post_types,
		'label',
		'name'
	);
}
