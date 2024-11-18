<?php
defined( 'ABSPATH' ) or die();

// Add filter to register customize containers
add_filter( 'kiraz_customize_containers', 'kiraz_customize_global_containers' );
add_filter( 'kiraz_customize_settings', 'kiraz_customize_global_settings' );


// Add filter to register customize controls
add_filter( 'kiraz_customize_controls', 'kiraz_customize_global_logo_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_global_layout_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_global_styles_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_global_connections_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_global_sliding_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_global_misc_controls' );

/**
 * Return an array of the containers that will be registered
 * into the theme customizer
 * 
 * @return  array
 * @since   1.0.0
 */
function kiraz_customize_global_containers( $containers ) {
	$containers['global__logo'] = array(
		'type'        => 'panel',
		'title'       => esc_html__( 'Logos', 'kiraz' ),
		'heading'     => array(
		'title'       => esc_html__( 'Global Settings', 'kiraz' )
		)
	);
	$containers['global__logoDefault'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => esc_html__( 'Logo Default', 'kiraz' )
	);
	$containers['global__logoDark'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => esc_html__( 'Logo Dark', 'kiraz' )
	);
	$containers['global__logoLight'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => esc_html__( 'Logo Light', 'kiraz' )
	);


	$containers['global__styles'] = array(
		'type'        => 'panel',
		'title'       => esc_html__( 'Layout & Styles', 'kiraz' )
	);
	$containers['global__layout'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => esc_html__( 'Layout Settings', 'kiraz' )
	);
	$containers['global__sidebar'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => esc_html__( 'Sidebar Settings', 'kiraz' )
	);
	$containers['global__typography'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => esc_html__( 'Color & Typography', 'kiraz' )
	);
	$containers['global__connections'] = array(
		'type'        => 'section',
		'title'       => esc_html__( 'Social Networks', 'kiraz' )
	);
	$containers['global__slidingSidebar'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => _x( 'Sliding Sidebar', 'customize', 'kiraz' ),
		'heading'     => array(
		'title'       => esc_html__( 'Sliding Areas', 'kiraz' )
		)
	);
	$containers['global__slidingMenu'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => _x( 'Sliding Menu', 'customize', 'kiraz' )
	);

	return $containers;
}


/**
 * Return an array of the settings that will be registered
 * into the theme customizer
 * 
 * @return  array
 * @since   1.0.0
 */
function kiraz_customize_global_settings( $settings ) {
	$layout_width = array(
		'width'                                     => '1170px',
		'max-width'                                 => '90%'
	);
	$layout_padding                                 = array();

	$text_link_colors                               = array(
		'a'                                         => '',
		'a:hover'                                   => '',
		'a:visited'                                 => '',
		'a:active, a:focus'                         => ''
	);

	$settings = array_merge( $settings, array(
		'logoDefault__logo'                         => array( 'default' => array( 'url' => get_theme_file_uri( 'assets/img/logo.png' ) ) ),
		'logoDefault__logoRetina'                   => array( 'default' => array( 'url' => get_theme_file_uri( 'assets/img/logo@2x.png' ) ) ),
		'logoDefault__logoSize'                     => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),
		
		'logoDark__logo'                            => array( 'default' => array( 'url' => get_theme_file_uri( 'assets/img/logo_sticky.png' ) ) ),
		'logoDark__logoRetina'                      => array( 'default' => array( 'url' => get_theme_file_uri( 'assets/img/logo_sticky@2x.png' ) ) ),
		'logoDark__logoSize'                        => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),
		
		'logoLight__logo'                           => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoLight__logoRetina'                     => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoLight__logoSize'                       => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),

		'global__layout__mode'                      => array( 'default' => 'wide' ),
		'global__layout__width'                     => array( 'default' => $layout_width ),
		'global__layout__padding'                   => array( 'default' => $layout_padding ),
		'global__layout__background'                => array( 'default' => array() ),
		
		'global__sidebar__position'                 => array( 'default' => 'none' ),
		'global__sidebar__dimension'                => array( 'default' => array( 'width' => '200px', 'margin' => '50px' ) ),
		'global__widget__title'                     => array( 'default' => array() ),
		'global__widget__content'                   => array( 'default' => array() ),
		'global__widget__linkColors'                => array( 'default' => array() ),
		'global__widget__contentPadding'            => array( 'default' => array() ),
		'global__widget__contentMargin'             => array( 'default' => array() ),
		'global__widget__heading'                   => array( 'default' => array() ),
		'global__widget__titleHeading'              => array( 'default' => array() ),
		'global__typography__scheme'                => array( 'default' => array() ),
		'global__typography__body'                  => array( 'default' => array() ),
		'global__typography__colors'                => array( 'default' => $text_link_colors ),
		'global__typography__h1'                    => array( 'default' => array() ),
		'global__typography__h2'                    => array( 'default' => array() ),
		'global__typography__h3'                    => array( 'default' => array() ),
		'global__typography__h4'                    => array( 'default' => array() ),
		'global__typography__h5'                    => array( 'default' => array() ),
		'global__typography__h6'                    => array( 'default' => array() ),
		'global__typography__blockquote'            => array( 'default' => array() ),

		'global__social__positions'                 => array( 'default' => array() ),
		'global__social__icons'                     => array( 'default' => array() ),

		'sliding__sidebarTypography'                => array( 'default' => array() ),
		'sliding__sidebarColors'                    => array( 'default' => array() ),
		'sliding__sidebarBackground'                => array( 'default' => array() ),
		'sliding__sidebarPadding'                   => array( 'default' => array() ),
		
		'sliding__menuStyle'                        => array( 'default' => 'overlay' ),
		'sliding__menuDesktop'                      => array( 'default' => 'off' ),
		'sliding__menuTypography'                   => array( 'default' => array() ),
		'sliding__menuColors'                       => array( 'default' => array() ),
		'sliding__menuBackground'                   => array( 'default' => array() ),
		'sliding__menuPadding'                      => array( 'default' => array() ),

		'global__misc__gotop'                       => array( 'default' => 'on' ),
		'global__misc__loading'                     => array( 'default' => 'off' ),
		'sliding__menuTypographyHeading'            => array( 'default' => array() ),
		'header__backgroundHeading'                 => array( 'default' => array() ),
		'header__topbar__typoHeading'               => array( 'default' => array() ),
		'header__topbar__backgroundHeading'         => array( 'default' => array() ),
		'header__nav__backgroundHeading'            => array( 'default' => array() ),
		'header__sticky'                            => array( 'default' => array() ),
		'header__sticky__backgroundHeading'         => array( 'default' => array() ),
		'header__titlebar__titleHeading'            => array( 'default' => array() ),
		'header__titlebar__breadcrumbHeading'       => array( 'default' => array() ),
		'header__widgets'                           => array( 'default' => array() ),
		'footer__widgets__titleHeading'             => array( 'default' => array() ),
		'button__background'                        => array( 'default' => array() ),
		'input__background'                         => array( 'default' => array() )
	) );

	$settings['contentBottom__widgets']             = array( 'default' => 'on' );
	$settings['contentBottom__widgets__layout']     = array( 'default' => array(
		'columns' => 4,
		'layout'  => array(
			1 => array( 12 ),
			2 => array( 6, 6 ),
			3 => array( 4, 4, 4 ),
			4 => array( 3, 3, 3, 3 ),
		)
	) );
	$settings['contentBottom__widgets__full']       = array( 'default' => 'off' );
	$settings['contentBottom__widgets__padding']    = array( 'default' => array() );
	$settings['contentBottom__widgets__background'] = array( 'default' => array() );
	$settings['contentBottom__widgets__typography'] = array( 'default' => array() );
	$settings['contentBottom__widgets__colors']     = array( 'default' => array() );
	$settings['contentBottom__widgets__title']      = array( 'default' => array() );
	$settings['contentBottom__widgets__margin']     = array( 'default' => array() );

	return $settings;
}


/**
 * Return an array of the controls which will be used
 * for customize the logo
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function kiraz_customize_global_logo_controls( $controls ) {
	kiraz_customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoDefault__',
		'section' => 'global__logoDefault'
	) );

	kiraz_customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoDark__',
		'section' => 'global__logoDark'
	) );
	
	kiraz_customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoLight__',
		'section' => 'global__logoLight'
	) );
	
	return $controls;
}


/**
 * Return an array of the controls which will be used
 * for customize the layout
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function kiraz_customize_global_layout_controls( $controls ) {
	$controls['global__layout__mode'] = array(
		'type'           => 'radio-buttons',
		'label'          => esc_html__( 'Site Layout', 'kiraz' ),
		'section'        => 'global__layout',
		'choices'        => array(
			'wide'           => esc_html__( 'Wide', 'kiraz' ),
			'boxed'          => esc_html__( 'Boxed', 'kiraz' )
		)
	);

	$controls['global__layout__width'] = array(
		'type'           => 'dimension',
		'section'        => 'global__layout',
		'label'          => esc_html__( 'Layout Width', 'kiraz' ),
		'choices'        => array(
			'width'          => esc_html__( 'Width', 'kiraz' ),
			'max-width'      => esc_html__( 'Max Width', 'kiraz' )
		)
	);

	$controls['global__layout__padding'] = array(
		'type'           => 'dimension',
		'section'        => 'global__layout',
		'label'          => esc_html__( 'Content Padding', 'kiraz' ),
		'choices'        => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);
	$controls['global__layout__background'] = array(
		'type'           => 'background',
		'section'        => 'global__layout',
		'label'          => esc_html__( 'Background Settings', 'kiraz' )
	);

	/**
	 * Sidebar options
	 */
	$controls['global__sidebar__position'] = array(
		'type'           => 'radio-buttons',
		'section'        => 'global__sidebar',
		'label'          => esc_html__( 'Sidebar Position', 'kiraz' ),
		'choices'        => array(
			'none'           => esc_html__( 'No Sidebar', 'kiraz' ),
			'left'           => esc_html__( 'Left', 'kiraz' ),
			'right'          => esc_html__( 'Right', 'kiraz' )
		)
	);
	$controls['global__sidebar__dimension'] = array(
		'type'           => 'dimension',
		'section'        => 'global__sidebar',
		'label'          => esc_html__( 'Sidebar Layout', 'kiraz' ),
		'choices'        => array(
			'width'          => esc_html__( 'Width', 'kiraz' ),
			'margin'         => esc_html__( 'Margin', 'kiraz' )
		)
	);
	$controls['global__widget__titleHeading'] = array(
		'type'           => 'heading',
		'section'        => 'global__sidebar',
		'label'          => esc_html__( 'Widget Title Font', 'kiraz' ),
	);
	$controls['global__widget__title'] = array(
		'type'           => 'typography',
		'section'        => 'global__sidebar'
	);
	$controls['global__widget__heading'] = array(
		'type'           => 'heading',
		'section'        => 'global__sidebar',
		'label'          => esc_html__( 'Widget Font', 'kiraz' ),
	);
	$controls['global__widget__content'] = array(
		'type'           => 'typography',
		'section'        => 'global__sidebar'
	);
	$controls['global__widget__linkColors'] = array(
		'type'           => 'colors',
		'section'        => 'global__sidebar',
		'label'          => esc_html__( 'Widget Link Colors', 'kiraz' ),
		'choices'        => array(
			'link'           => esc_html__( 'Link Color', 'kiraz' ),
			'linkHover'      => esc_html__( 'Hover Link Color', 'kiraz' )
		)
	);
	$controls['global__widget__contentPadding'] = array(
		'type'           => 'dimension',
		'section'        => 'global__sidebar',
		'label'          => esc_html__( 'Widget Padding', 'kiraz' ),
		'choices'        => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);
	$controls['global__widget__contentMargin'] = array(
		'type'           => 'dimension',
		'section'        => 'global__sidebar',
		'label'          => esc_html__( 'Widget Margin', 'kiraz' ),
		'choices'        => array(
			'margin-top'    => esc_html__( 'Top', 'kiraz' ),
			'margin-right'  => esc_html__( 'Right', 'kiraz' ),
			'margin-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'margin-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	return $controls;
}

/**
 * Return an array of the controls which will be used
 * for customize the styles
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function kiraz_customize_global_styles_controls( $controls ) {
	$controls['global__typography__scheme'] = array(
		'type'          => 'colors',
		'section'       => 'global__typography',
		'label'         => esc_html__( 'Scheme Color', 'kiraz' ),
		'choices'       => array(
			'primary'      => esc_html__( 'Primary', 'kiraz' ),
			'accent'       => esc_html__( 'Accent', 'kiraz' ),
			'light'        => esc_html__( 'Light', 'kiraz' ),
			'grey'         => esc_html__( 'Grey', 'kiraz' ),
			'dark'         => esc_html__( 'Dark', 'kiraz' ),
			'green'        => esc_html__( 'Green', 'kiraz' ),
			'blue'         => esc_html__( 'Blue', 'kiraz' ),
			'red'          => esc_html__( 'Red', 'kiraz' ),
			'orange'       => esc_html__( 'Orange', 'kiraz' ),
			'yellow'       => esc_html__( 'Yellow', 'kiraz' ),
			'pink'         => esc_html__( 'Pink', 'kiraz' ),
			'purple'       => esc_html__( 'Purple', 'kiraz' )
		)
	);

	$controls['global__typography__colors'] = array(
		'type'          => 'colors',
		'section'       => 'global__typography',
		'label'         => esc_html__( 'Link Colors', 'kiraz' ),
		'choices'       => array(
			'a'            => esc_html__( 'Link Color', 'kiraz' ),
			'a:hover'      => esc_html__( 'Hover Color', 'kiraz' ),
			'a:visited'    => esc_html__( 'Visited Color', 'kiraz' )
		)
	);
	$controls['global__typography__body'] = array(
		'type'          => 'typography',
		'section'       => 'global__typography',
		'label'         => esc_html__( 'Body Font', 'kiraz' ),
	);
	

	foreach ( range( 1, 6 ) as $index ) {
		$controls["global__typography__h{$index}"] = array(
			'type'      => 'typography',
			'section'   => 'global__typography',
			'label'     => sprintf( esc_html__( 'Heading %d', 'kiraz' ), $index )
		);
	}

	$controls['global__typography__blockquote'] = array(
		'type'         => 'typography',
		'section'      => 'global__typography',
		'label'        => esc_html__( 'Blockquote Font', 'kiraz' ),
	);
	
	return $controls;
}


/**
 * Return an array of the controls which will be used
 * for customize the social network icons
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function kiraz_customize_global_connections_controls( $controls ) {
	$controls['global__social__icons'] = array(
		'type'        => 'icons',
		'section'     => 'global__connections'
	);

	$controls['global__social__positions'] = array(
		'type'        => 'checkboxes',
		'section'     => 'global__connections',
		'label'       => esc_html__( 'Position', 'kiraz' ),
		'choices'     => array(
			'top'        => esc_html__( 'Topbar', 'kiraz' ),
			'nav'        => esc_html__( 'Navigation', 'kiraz' ),
			'sticky'     => esc_html__( 'Sticky Header', 'kiraz' ),
			'footer'     => esc_html__( 'Footer', 'kiraz' )
		)
	);

	return $controls;
}



function kiraz_customize_global_sliding_controls( $controls ) {
	/**
	 * The content sliding from the left
	 */
	$controls['sliding__sidebarLable'] = array(
		'type'        => 'textfield',
		'section'     => 'global__slidingSidebar',
		'label'       => _x( 'Label', 'customize', 'kiraz' )
	);
	$controls['sliding__sidebarTypography'] = array(
		'type'        => 'typography',
		'section'     => 'global__slidingSidebar',
		'label'       => esc_html__( 'Sliding Area Font', 'kiraz' ),
	);
	$controls['sliding__sidebarColors'] = array(
		'type'        => 'colors',
		'section'     => 'global__slidingSidebar',
		'label'       => esc_html__( 'Sliding Area Link Colors', 'kiraz' ),
		'choices'     => array(
			'link'       => esc_html__( 'Link Color', 'kiraz' ),
			'linkHover'  => esc_html__( 'Hover Link Color', 'kiraz' )
		)
	);
	$controls['sliding__sidebarBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__slidingSidebar',
		'label'       => esc_html__( 'Sliding Area Background', 'kiraz' ),
	);
	$controls['sliding__sidebarPadding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__slidingSidebar',
		'label'       => esc_html__( 'Sliding Area Padding', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);


	/**
	 * The content sliding from the right
	 */
	$controls['sliding__menuLable'] = array(
		'type'        => 'textfield',
		'section'     => 'global__slidingMenu',
		'label'       => _x( 'Label', 'customize', 'kiraz' )
	);
	$controls['sliding__menuStyle'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Select Styles', 'kiraz' ),
		'choices'     => array(
			'overlay' => _x( 'Overlay', 'customize', 'kiraz' ),
			'slide'   => _x( 'Slide', 'customize', 'kiraz' )
		)
	);
	$controls['sliding__menuDesktop'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Show On Desktop', 'kiraz' ),
	);


	// Typography
	$controls['sliding__menuTypographyHeading'] = array(
		'type'        => 'heading',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Sliding Menu Font', 'kiraz' ),
	);
	$controls['sliding__menuTypography'] = array(
		'type'        => 'typography',
		'section'     => 'global__slidingMenu'
	);
	$controls['sliding__menuColors'] = array(
		'type'        => 'colors',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Sliding Menu Color', 'kiraz' ),
		'choices'     => array(
			'link'        => esc_html__( 'Link Color', 'kiraz' ),
			'linkHover'   => esc_html__( 'Hover Link Color', 'kiraz' )
		)
	);
	$controls['sliding__menuBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Sliding Menu Background', 'kiraz' ),
	);
	$controls['sliding__menuPadding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Sliding Menu Padding', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	return $controls;
}


function kiraz_customize_global_misc_controls( $controls ) {
	$controls['global__misc__gotop'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__layout',
		'label'       => esc_html__( 'Enable Go Top Button', 'kiraz' ),
	);
	$controls['global__misc__loading'] = array(
		'type'        => 'radio-onoff',
		'label'       => esc_html__( 'Enable Loading Screen', 'kiraz' ),
		'section'     => 'global__layout'
	);

	return $controls;
}