<?php
defined( 'ABSPATH' ) or die();

add_filter( 'kiraz_customize_containers', 'kiraz_customize_shop_containers' );
add_filter( 'kiraz_customize_controls', 'kiraz_customize_shop_controls' );
// add_filter( 'kiraz_customize_controls', 'kiraz_customize_single_product_controls' );
add_filter( 'kiraz_customize_settings', 'kiraz_customize_shop_settings' );


function kiraz_customize_shop_containers( $containers ) {
	$containers['shop'] = array(
		'type'            => 'panel',
		'title'           => esc_html__( 'Shop', 'kiraz' ),
		'description'     => '',
		'active_callback' => function() {
			return class_exists( 'WooCommerce' );
		}
	);
	$containers[ 'shopList' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Product Archive', 'kiraz' ),
		'description' => '',
		'panel'       => 'shop'
	);
	$containers[ 'shopSingle' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Product Single', 'kiraz' ),
		'description' => '',
		'panel'       => 'shop'
	);

	return $containers;
}


function kiraz_customize_shop_controls( $controls ) {
	$controls['shop__archive__category'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Categories', 'kiraz' ),
		'section' => 'shopList',
		'default' => 'off'
	);
	$controls['shop__productImageSize'] = array(
		'type'        => 'textfield',
		'section'     => 'shopList',
		'label'       => esc_html__( 'Image Size', 'kiraz' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'kiraz' )
	);
	$controls['shop__productImageSizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shopList',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'kiraz'),
			'none' => esc_html__('None', 'kiraz')
		)
	);

	$controls['shop__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shopList',
		'label'       => esc_html__( 'Grid Columns', 'kiraz' ),
		'choices'     => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5
		)
	);
	$controls['shop__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'shopList',
		'label'       => esc_html__( 'Grid Columns Spacing (px)', 'kiraz' )
	);
	$controls['shop__paginate'] = array(
		'type'        => 'textfield',
		'section'     => 'shopList',
		'label'       => esc_html__( 'Products Per Page', 'kiraz' )
	);

	$controls['shop__sidebarPosition'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shopList',
		'label'       => esc_html__( 'Sidebar Position', 'kiraz' ),
		'choices'     => array(
			'none'  => esc_html__( 'No Sidebar', 'kiraz' ),
			'left'  => esc_html__( 'Left', 'kiraz' ),
			'right' => esc_html__( 'Right', 'kiraz' )
		)
	);
	$controls['shop__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'shopList',
		'label'       => esc_html__( 'Sidebar', 'kiraz' ),
		'choices'     => 'kiraz_customize_dropdown_sidebars'
	);


	/**
	 * Product Settigns
	 */
	$controls['product__imageSize'] = array(
		'type'        => 'textfield',
		'section'     => 'shopSingle',
		'label'       => esc_html__( 'Image Size', 'kiraz' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'kiraz' )
	);
	$controls['product__imageSizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shopSingle',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'kiraz'),
			'none' => esc_html__('None', 'kiraz')
		)
	);
	$controls['product__thumbnailSize'] = array(
		'type'        => 'textfield',
		'section'     => 'shopSingle',
		'label'       => esc_html__( 'Thumbnails Size (Gallery)', 'kiraz' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'kiraz' )
	);
	$controls['product__thumbnailSizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shopSingle',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'kiraz'),
			'none' => esc_html__('None', 'kiraz')
		)
	);
	$controls['product__sidebarPosition'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shopSingle',
		'label'       => esc_html__( 'Sidebar Position', 'kiraz' ),
		'choices'     => array(
			'none'  => esc_html__( 'No Sidebar', 'kiraz' ),
			'left'  => esc_html__( 'Left', 'kiraz' ),
			'right' => esc_html__( 'Right', 'kiraz' )
		)
	);
	$controls['product__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'shopSingle',
		'label'       => esc_html__( 'Sidebar', 'kiraz' ),
		'choices'     => 'kiraz_customize_dropdown_sidebars'
	);

	return $controls;
}

function kiraz_customize_shop_settings( $settings ) {
	$settings['shop__archive__category']        = array( 'default' => 'off' );
	$settings['shop__productImageSizeCrop']     = array( 'default' => 'crop' );
	$settings['product__imageSizeCrop']         = array( 'default' => 'crop' );
	$settings['product__thumbnailSizeCrop']     = array( 'default' => 'crop' );
	$settings['shop__gridColumns']              = array( 'default' => 3 );
	$settings['shop__gridGutter']               = array( 'default' => 60 );
	$settings['shop__paginate']                 = array( 'default' => 12 );
	$settings['shop__productImageSize']         = array( 'default' => 'full' );
	$settings['shop__sidebar']                  = array( 'default' => 'primary' );
	$settings['shop__sidebarPosition']          = array( 'default' => 'left' );
	$settings['product__imageSize']             = array( 'default' => 'full' );
	$settings['product__thumbnailSize']         = array( 'default' => '150x150' );
	$settings['product__sidebar']               = array( 'default' => 'primary' );
	$settings['product__sidebarPosition']       = array( 'default' => 'left' );
	return $settings;
}