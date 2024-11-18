<?php
defined( 'ABSPATH' ) or die();

add_filter( 'kiraz_customize_containers', 'kiraz_customize_projects_containers' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_projects_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_single_project_controls' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_project_related' );
add_filter( 'kiraz_customize_settings', 'kiraz_customize_projects_settings' );


function kiraz_customize_projects_containers( $containers ) {
	$containers['projects'] = array(
		'type'        => 'panel',
		'title'       => esc_html__( 'Projects', 'kiraz' ),
		'description' => '',
		'active_callback' => function() {
			return class_exists( 'nprojects' );
		}
	);

	$containers[ 'projectsList' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Project Archive', 'kiraz' ),
		'description' => '',
		'panel'       => 'projects'
	);

	$containers[ 'projectsSingle' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Project Single', 'kiraz' ),
		'description' => '',
		'panel'       => 'projects'
	);

	$containers[ 'projectsRelated' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Related Projects', 'kiraz' ),
		'description' => '',
		'panel'       => 'projects'
	);

	return $containers;
}


function kiraz_customize_projects_controls( $controls ) {
	$controls['projects__displayMode'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Project Layout', 'kiraz' ),
		'choices'     => array(
			'style1'  => esc_html__( 'Style 1', 'kiraz' ),
			'style2'  => esc_html__( 'Style 2', 'kiraz' ),
			'style3'  => esc_html__( 'Style 3', 'kiraz' )
		)
	);

	$controls['projects__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Grid Columns', 'kiraz' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);
	$controls['projects__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'kiraz' ),
	);
	$controls['projects__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label' => esc_html__( 'Image Size', 'kiraz' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'kiraz' )
	);
	$controls['projects__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'kiraz'),
			'none' => esc_html__('None', 'kiraz')
		)
	);

	$controls['projects__filterable'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Enable Projects Filterable', 'kiraz' ),
	);
	$controls['projects__filterableType'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Filterable Type', 'kiraz' ),
		'choices'     => array(
			'nproject-tag'      => esc_html__( 'Tag', 'kiraz' ),
			'nproject-category' => esc_html__( 'Category', 'kiraz' )
		)
	);
	$controls['projects__filterableAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => _x( 'Filterable Alignment', 'customize', 'kiraz' ),
		'description' => _x( '', 'customize', 'kiraz' ),
		'choices'     => array(
			'left'    => _x( 'Left', 'customize', 'kiraz' ),
			'center'  => _x( 'Center', 'customize', 'kiraz' ),
			'right'   => _x( 'Right', 'customize', 'kiraz' )
		)
	);

	$controls['projects__excerpt'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Show Summary Text', 'kiraz' ),
	);
	$controls['projects__autoExcerptLength'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Summary Text Length', 'kiraz' ),
	);

	$controls['projects__readmore'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Show Readmore Button', 'kiraz' ),
	);


	// Sidebar section
	$controls['projects__sidebarHeading'] = array(
		'type'        => 'heading',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Sidebar', 'kiraz' ),
	);
	$controls['projects__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'projectsList',
		'choices'     => 'kiraz_customize_dropdown_sidebars'
	);

	$controls['projects__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'projectsList',
		'label'   => esc_html__( 'Sidebar Position', 'kiraz' ),
		'choices' => array(
			'none'  => esc_html__( 'No Sidebar', 'kiraz' ),
			'left'  => esc_html__( 'Left', 'kiraz' ),
			'right' => esc_html__( 'Right', 'kiraz' )
		)
	);

	$controls['project__page__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Archive Page Title', 'kiraz' ),
		'section' => 'projectsList',
		'default' => esc_html__( 'Project', 'kiraz' )
	);

	return $controls;
}


function kiraz_customize_single_project_controls( $controls ) {
	$controls['project__pagination'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Post Navigator', 'kiraz' ),
	);
	$controls['project__tags'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Project Tags', 'kiraz' ),
	);
	$controls['project__related'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Related Posts', 'kiraz' ),
	);

	// Sidebar section
	$controls['project__sidebarHeading'] = array(
		'type'        => 'heading',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Sidebar', 'kiraz' ),
	);
	$controls['project__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'projectsSingle',
		'choices'     => 'kiraz_customize_dropdown_sidebars'
	);

	$controls['project__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'projectsSingle',
		'label'   => esc_html__( 'Sidebar Position', 'kiraz' ),
		'choices' => array(
			'none'  => esc_html__( 'No Sidebar', 'kiraz' ),
			'left'  => esc_html__( 'Left', 'kiraz' ),
			'right' => esc_html__( 'Right', 'kiraz' )
		)
	);

	return $controls;
}


function kiraz_customize_projects_settings( $settings ) {
	$settings['projects__displayMode']     = array( 'default' => 'style1' );
	$settings['projects__gridColumns']     = array( 'default' => 3 );
	$settings['projects__gridGutter']      = array( 'default' => 30 );
	$settings['projects__imagesize']       = array( 'default' => 'full' );
	$settings['projects__imagesizeCrop']   = array( 'default' => 'crop' );
	
	$settings['projects__filterable']        = array( 'default' => 'on' );
	$settings['projects__filterableAlign']   = array( 'default' => 'left' );
	$settings['projects__filterableType']    = array( 'default' => 'nproject-category' );
	$settings['projects__excerpt']           = array( 'default' => 'on' );
	$settings['projects__autoExcerpt']       = array( 'default' => 'on' );
	$settings['projects__autoExcerptLength'] = array( 'default' => '80' );
	$settings['projects__readmore']          = array( 'default' => 'on' );
	$settings['projects__sidebar']           = array( 'default' => 'primary' );
	$settings['projects__sidebarPosition']   = array( 'default' => 'none' );

	$settings['project__pagination']      = array( 'default' => 'on' );
	$settings['project__related']         = array( 'default' => 'on' );
	$settings['project__sidebar']         = array( 'default' => 'primary' );
	$settings['project__sidebarPosition'] = array( 'default' => 'none' );
	$settings['project__tags']            = array( 'default' => 'on' );

	$settings['project__related__title']            = array( 'default' => 'Related Posts' );
	$settings['project__related__count']            = array( 'default' => '4' );
	$settings['projects__related__gridColumns']     = array( 'default' => 4 );
	$settings['project__related__type']             = array( 'default' => 'category' );

	return $settings;
}

function kiraz_customize_project_related( $controls ) {
	$controls['project__related__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Widget Title', 'kiraz' ),
		'section' => 'projectsRelated',
		'default' => esc_html__( 'Related Projects', 'kiraz' )
	);

	$controls['project__related__count'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Number of Related Projects', 'kiraz' ),
		'section' => 'projectsRelated',
		'default' => esc_html__( '4', 'kiraz' )
	);

	$controls['projects__related__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsRelated',
		'label'       => esc_html__( 'Grid Columns', 'kiraz' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);

	$controls['project__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'projectsRelated',
		'label' => esc_html__( 'Show Related Projects Based On', 'kiraz' ),
		'default' => 'tag',
		'choices' => array(
			'tag'      => esc_html__( 'Tag', 'kiraz' ),
			'category' => esc_html__( 'Category', 'kiraz' ),
			'random'   => esc_html__( 'Random', 'kiraz' ),
			'recent'   => esc_html__( 'Recent', 'kiraz' )
		)
	);

	return $controls;
}
