<?php
defined( 'ABSPATH' ) or die();

add_filter( 'kiraz_customize_containers', 'kiraz_customize_blog_containers' );
add_filter( 'kiraz_customize_settings', 'kiraz_customize_blog_settings' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_blog_archive' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_blog_single' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_blog_related' );


function kiraz_customize_blog_containers( $containers ) {
	$containers['blog'] = array(
		'type'            => 'panel',
		'title'           => esc_html__( 'Blog & Post', 'kiraz' )
	);
	$containers['blogArchive'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Blog Settings', 'kiraz' )
	);
	$containers['blogSingle'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Post Settings', 'kiraz' )
	);
	$containers['blogAuthor'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Author Box', 'kiraz' ),
	);
	$containers['blogRelated'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Related Posts', 'kiraz' ),
	);

	return $containers;
}


function kiraz_customize_blog_settings( $settings ) {
	$settings['blog__archive__style']           = array( 'default' => 'grid' );
	$settings['blog__archive__columns']         = array( 'default' => 3 );
	$settings['blog__archive__gridGutter']      = array( 'default' => 60 );
	$settings['blog__archive__imagesize']       = array( 'default' => 'full' );
	$settings['blog__archive__imagesizeCrop']   = array( 'default' => 'crop' );
	$settings['blog__archive__autoExcerpt']     = array( 'default' => 'on' );
	$settings['blog__archive__excerptLength']   = array( 'default' => '145' );
	$settings['blog__archive__postMeta']        = array( 'default' => 'on' );
	$settings['blog__archive__readmore']        = array( 'default' => 'on' );
	$settings['blog__archive__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__archive__sidebarPosition'] = array( 'default' => 'none' );
	
	$settings['blog__single__postMeta']        = array( 'default' => 'on' );
	$settings['blog__single__postTags']        = array( 'default' => 'on' );
	$settings['blog__single__postNav']         = array( 'default' => 'on' );
	$settings['blog__single__postAuthor']      = array( 'default' => 'on' );
	$settings['blog__single__relatedPosts']    = array( 'default' => 'on' );
	$settings['blog__single__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__single__sidebarPosition'] = array( 'default' => 'right' );
	
	$settings['blog__related__title']       = array( 'default' => 'Related Posts' );
	$settings['blog__related__type']        = array( 'default' => 'category' );
	$settings['blog__related__gridColumns'] = array( 'default' => '3' );
	$settings['blog__related__count']       = array( 'default' => '3' );

	return $settings;
}


function kiraz_customize_blog_archive( $controls ) {
	$controls['blog__archive__style'] = array(
		'type' => 'radio-buttons',
		'label'   => esc_html__( 'Blog Layout', 'kiraz' ),
		'section' => 'blogArchive',
		'default' => 'grid',
		'choices' => array(
			'grid'   => esc_html__( 'Grid', 'kiraz' ),
			'list'  => esc_html__( 'List', 'kiraz' )
		)
	);
	$controls['blog__archive__columns'] = array(
		'type' => 'radio-buttons',
		'label'   => esc_html__( 'Grid Columns', 'kiraz' ),
		'section' => 'blogArchive',
		'choices' => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5
		)
	);
	$controls['blog__archive__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'kiraz' ),
	);
	$controls['blog__archive__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label' => esc_html__( 'Image Size', 'kiraz' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'kiraz' )
	);
	$controls['blog__archive__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'blogArchive',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'kiraz'),
			'none' => esc_html__('None', 'kiraz')
		)
	);
	$controls['blog__archive__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Meta', 'kiraz' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__readmore'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Read More', 'kiraz' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__autoExcerpt'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Auto Post Excerpt', 'kiraz' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);

	$controls['blog__archive__excerptLength'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Post Excerpt Length', 'kiraz' ),
		'section' => 'blogArchive',
		'default' => 145
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__archive__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogArchive',
		'label'   => esc_html__( 'Sidebar Position', 'kiraz' ),
		'choices' => array(
			'none' => esc_html__( 'No Sidebar', 'kiraz' ),
			'left'       => esc_html__( 'Left', 'kiraz' ),
			'right'      => esc_html__( 'Right', 'kiraz' )
		)
	);
	$controls['blog__archive__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogArchive',
		'label'   => esc_html__( 'Sidebar', 'kiraz' ),
		'choices' => 'kiraz_customize_dropdown_sidebars'
	);
	
	return $controls;
}


function kiraz_customize_blog_single( $controls ) {
	$controls['blog__single__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Meta', 'kiraz' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postTags'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Tags', 'kiraz' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postNav'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Navigator', 'kiraz' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postAuthor'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Author', 'kiraz' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__relatedPosts'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Related Posts', 'kiraz' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__single__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogSingle',
		'label'   => esc_html__( 'Sidebar Position', 'kiraz' ),
		'choices' => array(
			'none'    => esc_html__( 'No Sidebar', 'kiraz' ),
			'left'  => esc_html__( 'Left', 'kiraz' ),
			'right' => esc_html__( 'Right', 'kiraz' )
		)
	);
	$controls['blog__single__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogSingle',
		'label'   => esc_html__( 'Sidebar', 'kiraz' ),
		'choices' => 'kiraz_customize_dropdown_sidebars'
	);
	
	return $controls;
}


function kiraz_customize_blog_related( $controls ) {
	$controls['blog__related__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Widget Title', 'kiraz' ),
		'section' => 'blogRelated',
		'default' => esc_html__( 'Related Posts', 'kiraz' )
	);

	$controls['blog__related__count'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Number of Related Posts', 'kiraz' ),
		'section' => 'blogRelated',
		'default' => esc_html__( '3', 'kiraz' )
	);

	$controls['blog__related__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'blogRelated',
		'label'       => esc_html__( 'Grid Columns', 'kiraz' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);

	$controls['blog__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'blogRelated',
		'label' => esc_html__( 'Show Related Posts Based On', 'kiraz' ),
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
