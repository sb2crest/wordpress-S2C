<?php
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'kiraz_customize_containers', 'kiraz_customize_elements_containers' );
add_filter( 'kiraz_customize_settings', 'kiraz_customize_elements_settings' );


// Add filter to register customize controls
add_filter( 'kiraz_customize_controls', 'kiraz_customize_elements_button_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_elements_input_controls' );


function kiraz_customize_elements_containers( $containers ) {
	$containers['elementButton'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Button', 'kiraz' ),
		'heading'     => array(
			'title'       => esc_html__( 'Element Settings', 'kiraz' )
		)
	);
	$containers['elementInput'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Input, Textarea & Select', 'kiraz' )
	);

	return $containers;
}

function kiraz_customize_elements_settings( $settings ) {
	// The default settings for the button
	$settings['button__height'] = array( 'default' => '' );
	$settings['button__border'] = array( 'default' => array(
		'all'    => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'top'    => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'right'  => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'bottom' => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'left'   => array( 'size' => '', 'style' => 'none', 'color' => '' )
	) );
	$settings['button__borderRadius'] = array( 'default' => '' );
	$settings['button_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['button__typography'] = array( 'default' => array() );
	$settings['button__padding']    = array( 'default' => array() );

	// The default settings for the input
	$settings['input__height'] = array( 'default' => '' );
	$settings['input__border'] = array( 'default' => array(
		'all'    => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'top'    => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'right'  => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'bottom' => array( 'size' => '', 'style' => 'none', 'color' => '' ),
		'left'   => array( 'size' => '', 'style' => 'none', 'color' => '' )
	) );
	$settings['input__borderRadius'] = array( 'default' => '' );
	$settings['input_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['input__typography'] = array( 'default' => array() );
	$settings['input__padding']    = array( 'default' => array() );

	return $settings;
}

function kiraz_customize_elements_button_controls( $controls ) {
	$controls['button__background'] = array(
		'type'        => 'color',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Background Color', 'kiraz' ),
	);

	$controls['button__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Height (px)', 'kiraz' ),
	);

	$controls['button__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Font', 'kiraz' ),
	);

	$controls['button__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Padding', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	$controls['button__border'] = array(
		'type'        => 'border',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Border', 'kiraz' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'kiraz' ),
			'right'  => esc_html__( 'Right', 'kiraz' ),
			'bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'left'   => esc_html__( 'Left', 'kiraz' )
		)
	);
	$controls['button__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Border Radius', 'kiraz' ),
	);

	return $controls;
}

function kiraz_customize_elements_input_controls( $controls ) {
	$controls['input__background'] = array(
		'type'        => 'color',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Background Color', 'kiraz' ),
	);

	$controls['input__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Height (px)', 'kiraz' ),
	);

	$controls['input__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Font', 'kiraz' ),
	);

	$controls['input__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Padding', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	$controls['input__border'] = array(
		'type'        => 'border',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Border', 'kiraz' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'kiraz' ),
			'right'  => esc_html__( 'Right', 'kiraz' ),
			'bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'left'   => esc_html__( 'Left', 'kiraz' )
		)
	);
	$controls['input__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Border Radius', 'kiraz' ),
	);

	return $controls;
}
