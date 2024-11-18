<?php
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'kiraz_customize_containers', 'kiraz_customize_footer_containers' );
add_filter( 'kiraz_customize_settings', 'kiraz_customize_footer_settings' );


// Add filter to register customize controls
add_filter( 'kiraz_customize_controls', 'kiraz_customize_footer_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_footer_content_bottom_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_footer_widgets_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_footer_copyright_controls' );


function kiraz_customize_footer_containers( $containers ) {
	$containers['footerGeneral'] = array(
		'type'    => 'section',
		'panel'   => 'headerAndFooter',
		'title'   => _x( 'General Settings', 'customize', 'kiraz' ),
		'heading' => array(
			'title'       => _x( 'Footer Settings', 'customize', 'kiraz' ),
			'description' => _x( '', 'customize', 'kiraz' )
		)
	);
	$containers['footerContentBottom'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Content Bottom', 'customize', 'kiraz' )
	);
	$containers['footerWidgets'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Footer Widget', 'customize', 'kiraz' )
	);
	$containers['footerCopyright'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Copyright Settings', 'customize', 'kiraz' )
	);

	return $containers;
}


function kiraz_customize_footer_settings( $settings ) {
	$settings['footer__background'] = array( 'default' => array() );
	$settings['footer__typography'] = array( 'default' => array() );
	$settings['footer__colors']     = array( 'default' => array() );
	$settings['footer__padding']    = array( 'default' => array() );


	$settings['footer__copyright']             = array( 'default' => 'on' );
	$settings['footer__copyright__content']    = array( 'default' => 'Copyright &copy; 2021 LineThemes' );
	$settings['footer__copyright__full']         = array( 'default' => 'off' );
	$settings['footer__copyright__typography'] = array( 'default' => array() );
	$settings['footer__copyright__colors'] = array( 'default' => array() );
	$settings['footer__copyright__padding'] = array( 'default' => array() );
	$settings['footer__copyright__background'] = array( 'default' => array() );


	$settings['footer__widgets']                  = array( 'default' => 'on' );
	$settings['footer__widgets__layout']          = array( 'default' => array(
		'columns' => 4,
		'layout'  => array(
			1 => array( 12 ),
			2 => array( 6, 6 ),
			3 => array( 4, 4, 4 ),
			4 => array( 3, 3, 3, 3 ),
		)
	) );
	$settings['footer__widgets__full']            = array( 'default' => 'off' );
	$settings['footer__widgets__padding']         = array( 'default' => array() );
	$settings['footer__widgets__background']      = array( 'default' => array() );
	$settings['footer__widgets__typography']      = array( 'default' => array() );
	$settings['footer__widgets__colors']          = array( 'default' => array() );
	$settings['footer__widgets__title']           = array( 'default' => array() );
	$settings['footer__widgets__margin']          = array( 'default' => array() );

	return $settings;
}



function kiraz_customize_footer_controls( $controls ) {
	$controls['footer__background'] = array(
		'type'        => 'background',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Background', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);

	$controls['footer__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Font', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Link Colors', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'kiraz' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'kiraz' )
		)
	);
	$controls['footer__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Padding', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'kiraz' ),
			'padding-right'  => _x( 'Right', 'customize', 'kiraz' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'kiraz' ),
			'padding-left'   => _x( 'Left', 'customize', 'kiraz' )
		)
	);

	return $controls;
}



function kiraz_customize_footer_copyright_controls( $controls ) {
	$controls['footer__copyright'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Enable Copyright Bar', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__copyright__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerCopyright',
		'label'       => _x( '100% Full Width', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__copyright__content'] = array(
		'type'        => 'textareafield',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Content', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__copyright__background'] = array(
		'type'        => 'background',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Bar Background', 'customize', 'kiraz' )
	);

	$controls['footer__copyright__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Typography', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__copyright__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Link Colors', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'kiraz' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'kiraz' )
		)
	);
	$controls['footer__copyright__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Padding', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'kiraz' ),
			'padding-right'  => _x( 'Right', 'customize', 'kiraz' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'kiraz' ),
			'padding-left'   => _x( 'Left', 'customize', 'kiraz' )
		)
	);

	return $controls;
}

function kiraz_customize_footer_content_bottom_controls( $controls ) {
	$controls['contentBottom__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Enable Content Bottom Areas', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['contentBottom__widgets__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerContentBottom',
		'label'       => _x( '100% Full Width', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['contentBottom__widgets__layout'] = array(
		'type'        => 'column-layout',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Widgetized Layout Builder', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['contentBottom__widgets__background'] = array(
		'type'        => 'background',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Content Bottom Background', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['contentBottom__widgets__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Content Bottom Padding', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'kiraz' ),
			'padding-right'  => _x( 'Right', 'customize', 'kiraz' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'kiraz' ),
			'padding-left'   => _x( 'Left', 'customize', 'kiraz' )
		)
	);
	$controls['contentBottom__widgets__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Content Bottom Font', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['contentBottom__widgets__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerContentBottom',
		'label'       => _x( 'Content Bottom Link Colors', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'kiraz' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'kiraz' )
		)
	);
	$controls['contentBottom__widgets__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'footerContentBottom',
		'label'       => esc_html__( 'Content Bottom Widget Title Font', 'kiraz' ),
	);
	$controls['contentBottom__widgets__title'] = array(
		'type'        => 'typography',
		'section'     => 'footerContentBottom'
	);
	$controls['contentBottom__widgets__margin'] = array(
		'type'    => 'dimension',
		'section' => 'footerContentBottom',
		'label'   => esc_html__( 'Content Bottom Widget Margin', 'kiraz' ),
		'choices' => array(
			'margin-top'    => esc_html__( 'Top', 'kiraz' ),
			'margin-right'  => esc_html__( 'Right', 'kiraz' ),
			'margin-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'margin-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	return $controls;
}

function kiraz_customize_footer_widgets_controls( $controls ) {
	$controls['footer__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Enable Footer Widget Areas', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__widgets__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerWidgets',
		'label'       => _x( '100% Full Width', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__widgets__layout'] = array(
		'type'        => 'column-layout',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Widgetized Layout Builder', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__widgets__background'] = array(
		'type'        => 'background',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Background', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__widgets__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Padding', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'kiraz' ),
			'padding-right'  => _x( 'Right', 'customize', 'kiraz' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'kiraz' ),
			'padding-left'   => _x( 'Left', 'customize', 'kiraz' )
		)
	);
	$controls['footer__widgets__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Font', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls['footer__widgets__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Link Colors', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'kiraz' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'kiraz' )
		)
	);
	$controls['footer__widgets__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'footerWidgets',
		'label'       => esc_html__( 'Footer Widget Title Font', 'kiraz' ),
	);
	$controls['footer__widgets__title'] = array(
		'type'        => 'typography',
		'section'     => 'footerWidgets'
	);
	$controls['footer__widgets__margin'] = array(
		'type'    => 'dimension',
		'section' => 'footerWidgets',
		'label'   => esc_html__( 'Footer Widget Margin', 'kiraz' ),
		'choices' => array(
			'margin-top'    => esc_html__( 'Top', 'kiraz' ),
			'margin-right'  => esc_html__( 'Right', 'kiraz' ),
			'margin-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'margin-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	return $controls;
}

