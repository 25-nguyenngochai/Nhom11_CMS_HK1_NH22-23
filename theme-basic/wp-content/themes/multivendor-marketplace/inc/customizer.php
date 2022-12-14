<?php
/**
 * Multivendor Marketplace Theme Customizer
 *
 * @package Multivendor Marketplace
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function multivendor_marketplace_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'multivendor_marketplace_custom_controls' );

function multivendor_marketplace_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'multivendor_marketplace_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'multivendor_marketplace_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'multivendor_marketplace_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'multivendor-marketplace' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'multivendor_marketplace_left_right', array(
    	'title' => esc_html__('General Settings', 'multivendor-marketplace'),
		'panel' => 'multivendor_marketplace_panel_id'
	) );

	$wp_customize->add_setting('multivendor_marketplace_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'multivendor_marketplace_sanitize_choices'
	));
	$wp_customize->add_control(new Multivendor_Marketplace_Image_Radio_Control($wp_customize, 'multivendor_marketplace_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','multivendor-marketplace'),
        'description' => esc_html__('Here you can change the width layout of Website.','multivendor-marketplace'),
        'section' => 'multivendor_marketplace_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('multivendor_marketplace_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'multivendor_marketplace_sanitize_choices'
	));
	$wp_customize->add_control('multivendor_marketplace_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','multivendor-marketplace'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','multivendor-marketplace'),
        'section' => 'multivendor_marketplace_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','multivendor-marketplace'),
            'Right Sidebar' => esc_html__('Right Sidebar','multivendor-marketplace'),
            'One Column' => esc_html__('One Column','multivendor-marketplace'),
            'Grid Layout' => esc_html__('Grid Layout','multivendor-marketplace')
        ),
	) );

	$wp_customize->add_setting('multivendor_marketplace_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'multivendor_marketplace_sanitize_choices'
	));
	$wp_customize->add_control('multivendor_marketplace_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','multivendor-marketplace'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','multivendor-marketplace'),
        'section' => 'multivendor_marketplace_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','multivendor-marketplace'),
            'Right_Sidebar' => esc_html__('Right Sidebar','multivendor-marketplace'),
            'One_Column' => esc_html__('One Column','multivendor-marketplace')
        ),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'multivendor_marketplace_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'multivendor_marketplace_customize_partial_multivendor_marketplace_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'multivendor_marketplace_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ) );
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','multivendor-marketplace' ),
		'section' => 'multivendor_marketplace_left_right'
    )));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'multivendor_marketplace_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'multivendor_marketplace_customize_partial_multivendor_marketplace_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'multivendor_marketplace_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ) );
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','multivendor-marketplace' ),
		'section' => 'multivendor_marketplace_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'multivendor_marketplace_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ) );
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','multivendor-marketplace' ),
        'section' => 'multivendor_marketplace_left_right'
    )));

	$wp_customize->add_setting('multivendor_marketplace_preloader_bg_color', array(
		'default'           => '#0066CB',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'multivendor_marketplace_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'multivendor-marketplace'),
		'section'  => 'multivendor_marketplace_left_right',
	)));

	$wp_customize->add_setting('multivendor_marketplace_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'multivendor_marketplace_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'multivendor-marketplace'),
		'section'  => 'multivendor_marketplace_left_right',
	)));

	//Topbar
	$wp_customize->add_section( 'multivendor_marketplace_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'multivendor-marketplace' ),
		'panel' => 'multivendor_marketplace_panel_id'
	) );

	$wp_customize->add_setting( 'multivendor_marketplace_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ));  
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','multivendor-marketplace' ),
      'section' => 'multivendor_marketplace_topbar_section'
    )));

	$wp_customize->add_setting('multivendor_marketplace_free_delivery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multivendor_marketplace_free_delivery_text',array(
		'label'	=> esc_html__('Add Free Delivery Text','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Free Delivery', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('multivendor_marketplace_free_delivery_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multivendor_marketplace_free_delivery_link',array(
		'label'	=> esc_html__('Free Delivery Link','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://example.com/page', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_topbar_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('multivendor_marketplace_return_policy_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multivendor_marketplace_return_policy_text',array(
		'label'	=> esc_html__('Add Return Policy Text','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Return Policy', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('multivendor_marketplace_return_policy_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multivendor_marketplace_return_policy_link',array(
		'label'	=> esc_html__('Return Policy Link','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://example.com/page', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_topbar_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('multivendor_marketplace_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multivendor_marketplace_topbar_text',array(
		'label'	=> esc_html__('Add Text','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'We are dedicated to our customers 24/7', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_topbar_section',
		'type'=> 'text'
	));

	//Header
	$wp_customize->add_section( 'multivendor_marketplace_header_settings' , array(
    	'title'      => __( 'Header', 'multivendor-marketplace' ),
		'panel' => 'multivendor_marketplace_panel_id'
	) );

	$wp_customize->add_setting('multivendor_marketplace_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'multivendor_marketplace_sanitize_number_absint'
	));	
	$wp_customize->add_control('multivendor_marketplace_phone_number',array(
		'label'	=> esc_html__('Phone Number','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '+12 123 456 7890', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_header_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('multivendor_marketplace_view_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multivendor_marketplace_view_btn_text',array(
		'label'	=> esc_html__('Add Header Button Text','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'View All', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_header_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('multivendor_marketplace_view_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('multivendor_marketplace_view_btn_link',array(
		'label'	=> esc_html__('Add Header Button Link','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example.com', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_header_settings',
		'type'=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'multivendor_marketplace_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'multivendor-marketplace' ),
		'panel' => 'multivendor_marketplace_panel_id'
	) );

	$wp_customize->add_setting( 'multivendor_marketplace_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ));  
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','multivendor-marketplace' ),
      'section' => 'multivendor_marketplace_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('multivendor_marketplace_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'multivendor_marketplace_customize_partial_multivendor_marketplace_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'multivendor_marketplace_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'multivendor_marketplace_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'multivendor_marketplace_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'multivendor-marketplace' ),
			'description' => __('Slider image size (1400 x 550)','multivendor-marketplace'),
			'section'  => 'multivendor_marketplace_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'multivendor_marketplace_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multivendor_marketplace_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','multivendor-marketplace'),
		'section' => 'multivendor_marketplace_slidersettings',
		'type'  => 'text',
	) );

	//Sale Banner
	$wp_customize->add_section( 'multivendor_marketplace_sale' , array(
    	'title'      => __( 'Sale Banner Settings', 'multivendor-marketplace' ),
		'panel' => 'multivendor_marketplace_panel_id'
	));

	$wp_customize->add_setting( 'multivendor_marketplace_sale_banner_hide',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ));  
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_sale_banner_hide',
       array(
      'label' => esc_html__( 'On / Off Banner','multivendor-marketplace' ),
      'section' => 'multivendor_marketplace_sale'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_sale_page' , array(
		'default'           => '',
		'sanitize_callback' => 'multivendor_marketplace_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'multivendor_marketplace_sale_page' , array(
		'label'    => __( 'Select Banner Page', 'multivendor-marketplace' ),
		'description' => __('Product Image size (370 x 360)','multivendor-marketplace'),
		'section'  => 'multivendor_marketplace_sale',		
		'type'     => 'dropdown-pages'
	) );

	//Best Seller Products Section
	$wp_customize->add_section('multivendor_marketplace_best_seller_products_section',array(
		'title'	=> __('Best Seller Products Section','multivendor-marketplace'),
		'panel' => 'multivendor_marketplace_panel_id',
	));

	$wp_customize->add_setting('multivendor_marketplace_bestseller_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multivendor_marketplace_bestseller_section_title',array(
		'label'	=> __('Add Section Title','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => __( 'Best Selling Products', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_best_seller_products_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'multivendor_marketplace_bestseller_banner_page' , array(
		'default'           => '',
		'sanitize_callback' => 'multivendor_marketplace_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'multivendor_marketplace_bestseller_banner_page' , array(
		'label'    => __( 'Select Banner Page', 'multivendor-marketplace' ),
		'description' => __('Product Image size (370 x 360)','multivendor-marketplace'),
		'section'  => 'multivendor_marketplace_best_seller_products_section',		
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting( 'multivendor_marketplace_bestseller_product_page' , array(
		'default'           => '',
		'sanitize_callback' => 'multivendor_marketplace_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'multivendor_marketplace_bestseller_product_page' , array(
		'label'    => __( 'Select Products Page', 'multivendor-marketplace' ),
		'section'  => 'multivendor_marketplace_best_seller_products_section',		
		'type'     => 'dropdown-pages'
	) );

	//Blog Post
	$wp_customize->add_panel( 'multivendor_marketplace_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'multivendor-marketplace' ),
		'panel' => 'multivendor_marketplace_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'multivendor_marketplace_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'multivendor-marketplace' ),
		'panel' => 'multivendor_marketplace_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('multivendor_marketplace_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'multivendor_marketplace_Customize_partial_multivendor_marketplace_toggle_postdate', 
	));

	$wp_customize->add_setting( 'multivendor_marketplace_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ) );
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','multivendor-marketplace' ),
        'section' => 'multivendor_marketplace_post_settings'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ) );
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_toggle_author',array(
		'label' => esc_html__( 'Author','multivendor-marketplace' ),
		'section' => 'multivendor_marketplace_post_settings'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ) );
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_toggle_comments',array(
		'label' => esc_html__( 'Comments','multivendor-marketplace' ),
		'section' => 'multivendor_marketplace_post_settings'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ) );
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_toggle_time',array(
		'label' => esc_html__( 'Time','multivendor-marketplace' ),
		'section' => 'multivendor_marketplace_post_settings'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
	));
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','multivendor-marketplace' ),
		'section' => 'multivendor_marketplace_post_settings'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
	));
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_toggle_tags', array(
		'label' => esc_html__( 'Tags','multivendor-marketplace' ),
		'section' => 'multivendor_marketplace_post_settings'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'multivendor_marketplace_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'multivendor_marketplace_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','multivendor-marketplace' ),
		'section'     => 'multivendor_marketplace_post_settings',
		'type'        => 'range',
		'settings'    => 'multivendor_marketplace_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('multivendor_marketplace_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multivendor_marketplace_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','multivendor-marketplace'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','multivendor-marketplace'),
		'section'=> 'multivendor_marketplace_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('multivendor_marketplace_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'multivendor_marketplace_sanitize_choices'
	));
	$wp_customize->add_control('multivendor_marketplace_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','multivendor-marketplace'),
        'section' => 'multivendor_marketplace_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','multivendor-marketplace'),
            'Excerpt' => esc_html__('Excerpt','multivendor-marketplace'),
            'No Content' => esc_html__('No Content','multivendor-marketplace')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'multivendor_marketplace_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'multivendor-marketplace' ),
		'panel' => 'multivendor_marketplace_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('multivendor_marketplace_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'multivendor_marketplace_Customize_partial_multivendor_marketplace_button_text', 
	));

    $wp_customize->add_setting('multivendor_marketplace_button_text',array(
		'default'=> esc_html__('Read More','multivendor-marketplace'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multivendor_marketplace_button_text',array(
		'label'	=> esc_html__('Add Button Text','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'multivendor_marketplace_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'multivendor-marketplace' ),
		'panel' => 'multivendor_marketplace_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('multivendor_marketplace_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'multivendor_marketplace_Customize_partial_multivendor_marketplace_related_post_title', 
	));

    $wp_customize->add_setting( 'multivendor_marketplace_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ) );
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_related_post',array(
		'label' => esc_html__( 'Related Post','multivendor-marketplace' ),
		'section' => 'multivendor_marketplace_related_posts_settings'
    )));

    $wp_customize->add_setting('multivendor_marketplace_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multivendor_marketplace_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('multivendor_marketplace_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'multivendor_marketplace_sanitize_number_absint'
	));
	$wp_customize->add_control('multivendor_marketplace_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_related_posts_settings',
		'type'=> 'number'
	));

	//Responsive Media Settings
	$wp_customize->add_section('multivendor_marketplace_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','multivendor-marketplace'),
		'panel' => 'multivendor_marketplace_panel_id',
	));

    $wp_customize->add_setting( 'multivendor_marketplace_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ));  
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','multivendor-marketplace' ),
      	'section' => 'multivendor_marketplace_responsive_media'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ));  
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','multivendor-marketplace' ),
      	'section' => 'multivendor_marketplace_responsive_media'
    )));

    $wp_customize->add_setting( 'multivendor_marketplace_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ));  
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','multivendor-marketplace' ),
      	'section' => 'multivendor_marketplace_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('multivendor_marketplace_footer',array(
		'title'	=> esc_html__('Footer Settings','multivendor-marketplace'),
		'panel' => 'multivendor_marketplace_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('multivendor_marketplace_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'multivendor_marketplace_Customize_partial_multivendor_marketplace_footer_text', 
	));
	
	$wp_customize->add_setting('multivendor_marketplace_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multivendor_marketplace_footer_text',array(
		'label'	=> esc_html__('Copyright Text','multivendor-marketplace'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'multivendor-marketplace' ),
        ),
		'section'=> 'multivendor_marketplace_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('multivendor_marketplace_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'multivendor_marketplace_sanitize_choices'
	));
	$wp_customize->add_control(new Multivendor_Marketplace_Image_Radio_Control($wp_customize, 'multivendor_marketplace_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','multivendor-marketplace'),
        'section' => 'multivendor_marketplace_footer',
        'settings' => 'multivendor_marketplace_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'multivendor_marketplace_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'multivendor_marketplace_switch_sanitization'
    ));  
    $wp_customize->add_control( new Multivendor_Marketplace_Toggle_Switch_Custom_Control( $wp_customize, 'multivendor_marketplace_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','multivendor-marketplace' ),
      	'section' => 'multivendor_marketplace_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('multivendor_marketplace_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'multivendor_marketplace_Customize_partial_multivendor_marketplace_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('multivendor_marketplace_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'multivendor_marketplace_sanitize_choices'
	));
	$wp_customize->add_control(new Multivendor_Marketplace_Image_Radio_Control($wp_customize, 'multivendor_marketplace_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','multivendor-marketplace'),
        'section' => 'multivendor_marketplace_footer',
        'settings' => 'multivendor_marketplace_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'multivendor_marketplace_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Multivendor_Marketplace_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Multivendor_Marketplace_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Multivendor_Marketplace_Customize_Section_Pro( $manager,'multivendor_marketplace_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'MULTIVENDOR PRO', 'multivendor-marketplace' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'multivendor-marketplace' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/marketplace-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'multivendor-marketplace-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'multivendor-marketplace-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Multivendor_Marketplace_Customize::get_instance();