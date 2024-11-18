<?php
defined( 'ABSPATH' ) or die();

add_filter( 'kiraz_customize_containers', 'kiraz_customize_header_containers' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_header_controls' );
add_filter( 'kiraz_customize_settings', 'kiraz_customize_header_settings' );

function kiraz_customize_header_containers( $containers ) {
	$containers['headerAndFooter'] = array(
		'type'        => 'panel',
		'title'       => _x( 'Header & Footer', 'customize', 'kiraz' )
	);

	$containers['headerGeneral'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General', 'customize', 'kiraz' ),
		'parent'      => _x( 'Header Settings', 'customize', 'kiraz' ),
		'heading'     => array(
			'title'       => esc_html__( 'Header Settings', 'kiraz' ),
		)
	);
	$containers['headerTopbar'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Topbar Settings', 'customize', 'kiraz' ),
		'parent'      => _x( 'Header Settings', 'customize', 'kiraz' )
	);
	$containers['headerNavigator'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'kiraz' ),
		'parent'      => _x( 'Header Settings', 'customize', 'kiraz' ),
	);

	$containers['headerTitle'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Title Bar', 'customize', 'kiraz' ),
		'parent'      => _x( 'Header Settings', 'customize', 'kiraz' )
	);

	$containers['headerSticky'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General Settings', 'customize', 'kiraz' ),
		'heading'     => array(
			'title'       => esc_html__( 'Header Sticky Setting', 'kiraz' ),
		)
	);
	$containers['headerStickyNav'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'kiraz' )
	);

	return $containers;
}

function kiraz_customize_header_controls( $controls ) {
	/**
	 * Header Styles
	 */
	$controls['header__style'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Styles', 'customize', 'kiraz' ),
		'choices'     => array(
			'style1'  => _x( 'Style 1', 'customize', 'kiraz' ),
			'style2'  => _x( 'Style 2', 'customize', 'kiraz' ),
			'style3'  => _x( 'Style 3', 'customize', 'kiraz' ),
			'style4'  => _x( 'Style 4', 'customize', 'kiraz' )
		)
	);
	/**
	 * The logo profile
	 */
	$controls['header__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Logo that will be shown', 'customize', 'kiraz' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'kiraz' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'kiraz' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'kiraz' )
		)
	);
	$controls[ 'header__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Logo Margin', 'kiraz' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'kiraz' ),
			'margin-right'  => esc_html__( 'Right', 'kiraz' ),
			'margin-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'margin-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Height', 'customize', 'kiraz' )
	);
	$controls['header__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => _x( '100% Header Full Width', 'customize', 'kiraz' )
	);
	$controls['header__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Enable Shadow', 'kiraz' ),
	);
	$controls['header__transparent'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Enable Header Transparent', 'kiraz' ),
	);

	$controls['header__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Background', 'customize', 'kiraz' )
	);
	$controls['header__background'] = array(
		'type'        => 'background',
		'section'     => 'headerGeneral'
	);

	$controls['header__info__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Site Info', 'customize', 'kiraz' )
	);

	$controls['header__extras'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Show Extra Items On The Header', 'kiraz' ),
		'choices'     => array(
			'cart'      => _x( 'Shopping Cart', 'customize', 'kiraz' ),
			'search'    => _x( 'Search Box', 'customize', 'kiraz' )
		)
	);

	/**
	 * Topbar Settings
	 */
	$controls['header__topbar'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Enable Topbar', 'customize', 'kiraz' )
	);

	// Topbar content
	$controls['header__topbar__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Content', 'customize', 'kiraz' )
	);

	$controls['header__topbar__typoHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => esc_html__( 'Topbar Font', 'kiraz' ),
	);
	$controls['header__topbar__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerTopbar'
	);
	$controls['header__topbar__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTopbar',
		'label'       => esc_html__( 'Topbar Link Colors', 'kiraz' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Link Color', 'kiraz' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'kiraz' ),
			'menu-active' => esc_html__( 'Active Color', 'kiraz' )
		)
	);

	$controls['header__topbar__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Background', 'customize', 'kiraz' )
	);
	$controls['header__topbar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTopbar'
	);

	/**
	 * Navigation Bar Settings
	 */
	$controls['header__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Font', 'kiraz' ),
	);
	$controls['header__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Colors', 'kiraz' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Menu Color', 'kiraz' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'kiraz' ),
			'menu-active' => esc_html__( 'Active Color', 'kiraz' )
		)
	);
	$controls[ 'header__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Margin', 'kiraz' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'kiraz' ),
			'margin-right'  => esc_html__( 'Right', 'kiraz' ),
			'margin-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'margin-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);
	$controls['header__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Padding', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	/**
	 * Sticky Header Settings
	 */
	$controls['header__sticky'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'kiraz' ),
		'default'     => 'on'
	);
	$controls['header__sticky__style'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Styles', 'customize', 'kiraz' ),
		'choices'     => array(
			'style1'  => _x( 'Style 1', 'customize', 'kiraz' ),
			'style2'  => _x( 'Style 2', 'customize', 'kiraz' ),
			'style3'  => _x( 'Style 3', 'customize', 'kiraz' ),
			'style4'  => _x( 'Style 4', 'customize', 'kiraz' )
		)
	);
	$controls['header__sticky__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerSticky',
		'label'       => _x( 'Logo that will be shown', 'customize', 'kiraz' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'kiraz' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'kiraz' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'kiraz' )
		)
	);
	$controls[ 'header__sticky__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Logo Margin', 'kiraz' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'kiraz' ),
			'margin-right'  => esc_html__( 'Right', 'kiraz' ),
			'margin-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'margin-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__sticky__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Height', 'customize', 'kiraz' )
	);
	$controls['header__sticky__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( '100% Full Width', 'customize', 'kiraz' )
	);
	
	$controls['header__sticky__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Enable Shadow', 'kiraz' ),
	);

	$controls['header__sticky__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Background', 'customize', 'kiraz' )
	);
	$controls['header__sticky__background'] = array(
		'type'        => 'background',
		'section'     => 'headerSticky'
	);

	$controls['header__sticky__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Font', 'kiraz' ),
	);
	$controls['header__sticky__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Colors', 'kiraz' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Menu Color', 'kiraz' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'kiraz' ),
			'menu-active' => esc_html__( 'Active Color', 'kiraz' )
		)
	);
	$controls[ 'header__sticky__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Margin', 'kiraz' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'kiraz' ),
			'margin-right'  => esc_html__( 'Right', 'kiraz' ),
			'margin-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'margin-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);
	$controls['header__sticky__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Padding', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);


	/**
	 * Title bar
	 */
	$controls['header__titlebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Displays', 'customize', 'kiraz' ),
		'choices'     => array(
			'both'        => _x( 'Page Title and Breadcrumbs', 'customize', 'kiraz' ),
			'title'       => _x( 'Page Title Only', 'customize', 'kiraz' ),
			'breadcrumbs' => _x( 'Breadcrumbs Only', 'customize', 'kiraz' ),
			'none'        => _x( 'None', 'customize', 'kiraz' )
		)
	);
	$controls['header__titlebar__align'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Alignment', 'customize', 'kiraz' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'kiraz' ),
			'center' => _x( 'Center', 'customize', 'kiraz' ),
			'right'  => _x( 'Right', 'customize', 'kiraz' ),
			'inline' => _x( 'Inline', 'customize', 'kiraz' )
		)
	);
	$controls['header__titlebar__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Height', 'customize', 'kiraz' )
	);
	$controls['header__titlebar__home'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => _x( 'Display On The Homepage', 'customize', 'kiraz' )
	);
	$controls['header__titlebar__scrolldown'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Enable Scroll Down Button', 'kiraz' ),
	);
	$controls['header__titlebar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Background', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' )
	);
	$controls[ 'header__titlebar__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Margin', 'kiraz' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'kiraz' ),
			'margin-right'  => esc_html__( 'Right', 'kiraz' ),
			'margin-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'margin-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);
	$controls['header__titlebar__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Padding', 'kiraz' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'kiraz' ),
			'padding-right'  => esc_html__( 'Right', 'kiraz' ),
			'padding-bottom' => esc_html__( 'Bottom', 'kiraz' ),
			'padding-left'   => esc_html__( 'Left', 'kiraz' )
		)
	);
	$controls['header__titlebar__backgroundFeatured'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerTitle',
		'label'       => _x( 'Use Featured Image As Background in', 'customize', 'kiraz' ),
		'choices'     => 'kiraz_customize_post_types_options'
	);

	$controls['header__titlebar__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTitle',
		'label'       => _x( 'Page Title Font', 'customize', 'kiraz' )
	);
	$controls['header__titlebar__titleFont'] = array(
		'type'        => 'typography',
		'section'     => 'headerTitle'
	);

	$controls['header__titlebar__breadcrumbColors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTitle',
		'label'       => _x( 'Breadcrumbs Link Color', 'customize', 'kiraz' ),
		'choices'     => array(
			'link' => _x( 'Link Color', 'customize', 'kiraz' ),
			'linkHover' => _x( 'Hover Color', 'customize', 'kiraz' )
		)
	);


	/**
	 * Sticky Header Settings
	 */
	$controls['header__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'header__widgets',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'kiraz' ),
		'description' => _x( 'Turn ON to enable the header widgets area', 'customize', 'kiraz' ),
		'default'     => 'on'
	);

	return $controls;
}



function kiraz_customize_header_settings( $settings ) {
	$border_default = array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' );
	$settings = array_merge( $settings, array(
		'header__style'  => array( 'default' => 'style1' ),
		'header__logo'       => array( 'default' => 'logoDefault' ),
		'header__logoMargin' => array( 'default' => array() ),

		'header__width'      => array( 'default' => 'on' ),
		'header__height'     => array( 'default' => '' ),
		'header__background' => array( 'default' => array() ),
		'header__shadow'     => array( 'default' => 'off' ),
		'header__transparent' => array( 'default' => 'off' ),
		'header__extras'     => array( 'default' => array() ),

		'header__topbar'             => array( 'default' => 'off' ),
		'header__topbar__text'       => array( 'default' => 'Content here' ),
		'header__topbar__icons'      => array( 'default' => '' ),
		'header__topbar__background' => array( 'default' => array() ),
		'header__topbar__typography' => array( 'default' => array() ),
		'header__topbar__colors'     => array( 'default' => array() ),

		'header__nav__typography' => array( 'default' => array() ),
		'header__nav__colors'     => array( 'default' => array() ),
		'header__nav__margin'     => array( 'default' => array() ),
		'header__nav__padding' => array( 'default' => array() ),
		'header__nav__background' => array( 'default' => array() ),

		'header__sticky'             => array( 'default' => 'off' ),
		'header__sticky__style'      => array( 'default' => 'style1' ),
		'header__sticky__logo'       => array( 'default' => 'logoDefault' ),
		'header__sticky__logoMargin' => array( 'default' => array() ),

		'header__sticky__width'      => array( 'default' => 'on' ),
		'header__sticky__height'     => array( 'default' => '' ),
		'header__sticky__background' => array( 'default' => array() ),
		'header__sticky__shadow'     => array( 'default' => 'off' ),
		'header__sticky__nav__typography' => array( 'default' => array() ),
		'header__sticky__nav__colors'     => array( 'default' => array() ),
		'header__sticky__nav__margin'     => array( 'default' => array() ),
		'header__sticky__nav__padding'    => array( 'default' => array() ),

		'header__titlebar'         => array( 'default' => 'both' ),
		'header__titlebar__home'   => array( 'default' => 'on' ),
		'header__titlebar__align'  => array( 'default' => 'left' ),
		'header__titlebar__height' => array( 'default' => '' ),
		'header__titlebar__margin' => array( 'default' => array() ),
		'header__titlebar__padding' => array( 'default' => array() ),
		'header__titlebar__scrolldown' => array( 'default' => 'on' ),
		'header__titlebar__background'         => array( 'default' => array() ),
		'header__titlebar__backgroundFeatured' => array( 'default' => array() ),
		'header__titlebar__titleFont'          => array( 'default' => array() ),
		'header__titlebar__breadcrumbColors'   => array( 'default' => array() ),
	) );

	return $settings;
}
