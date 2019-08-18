<?php
/**
 * Jewellery Lite Theme Customizer
 *
 * @package Jewellery Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function jewellery_lite_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'jewellery_lite_custom_controls' );

function jewellery_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'jewellery_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'jewellery-lite' ),
	) );

	// Layout
	$wp_customize->add_section( 'jewellery_lite_left_right', array(
    	'title'      => __( 'General Settings', 'jewellery-lite' ),
		'panel' => 'jewellery_lite_panel_id'
	) );

	$wp_customize->add_setting('jewellery_lite_width_option',array(
        'default' => __('Full Width','jewellery-lite'),
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Jewellery_Lite_Image_Radio_Control($wp_customize, 'jewellery_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','jewellery-lite'),
        'description' => __('Here you can change the width layout of Website.','jewellery-lite'),
        'section' => 'jewellery_lite_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('jewellery_lite_theme_options',array(
        'default' => __('Right Sidebar','jewellery-lite'),
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'	        
	) );
	$wp_customize->add_control('jewellery_lite_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','jewellery-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','jewellery-lite'),
        'section' => 'jewellery_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','jewellery-lite'),
            'Right Sidebar' => __('Right Sidebar','jewellery-lite'),
            'One Column' => __('One Column','jewellery-lite'),
            'Three Columns' => __('Three Columns','jewellery-lite'),
            'Four Columns' => __('Four Columns','jewellery-lite'),
            'Grid Layout' => __('Grid Layout','jewellery-lite')
        ),
	));

	$wp_customize->add_setting('jewellery_lite_page_layout',array(
        'default' => __('One Column','jewellery-lite'),
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));
	$wp_customize->add_control('jewellery_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','jewellery-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','jewellery-lite'),
        'section' => 'jewellery_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','jewellery-lite'),
            'Right Sidebar' => __('Right Sidebar','jewellery-lite'),
            'One Column' => __('One Column','jewellery-lite')
        ),
	) );

	$wp_customize->add_setting( 'jewellery_lite_sidebar',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_sidebar',array(
      	'label' => esc_html__( 'Show / Hide Homepage Sidebar','jewellery-lite' ),
      	'section' => 'jewellery_lite_left_right'
    )));

	//Top Bar
	$wp_customize->add_section( 'jewellery_lite_topbar', array(
    	'title'      => __( 'Top Bar Settings', 'jewellery-lite' ),
		'panel' => 'jewellery_lite_panel_id'
	) );

	$wp_customize->add_setting('jewellery_lite_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jewellery_lite_phone_number',array(
		'label'	=> __('Add Phone Number','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( '+00 1236 123 456', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('jewellery_lite_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jewellery_lite_location',array(
		'label'	=> __('Add Location','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( '123 Dunmmy street lorem ipsum, USA', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_topbar',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'jewellery_lite_order_tracking',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_order_tracking',array(
      	'label' => esc_html__( 'Show / Hide Order Tracker','jewellery-lite' ),
      	'section' => 'jewellery_lite_topbar'
    )));
    
	//Slider
	$wp_customize->add_section( 'jewellery_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'jewellery-lite' ),
		'panel' => 'jewellery_lite_panel_id'
	) );

	$wp_customize->add_setting( 'jewellery_lite_slider_hide_show',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','jewellery-lite' ),
      	'section' => 'jewellery_lite_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'jewellery_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'jewellery_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'jewellery_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'jewellery-lite' ),
			'description' => __('Slider image size (1500 x 800)','jewellery-lite'),
			'section'  => 'jewellery_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('jewellery_lite_slider_content_option',array(
        'default' => __('Left','jewellery-lite'),
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Jewellery_Lite_Image_Radio_Control($wp_customize, 'jewellery_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','jewellery-lite'),
        'section' => 'jewellery_lite_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'jewellery_lite_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'jewellery_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','jewellery-lite' ),
		'section'     => 'jewellery_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'jewellery_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('jewellery_lite_slider_opacity_color',array(
      'default'              => 0.8,
      'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'jewellery_lite_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','jewellery-lite' ),
	'section'     => 'jewellery_lite_slidersettings',
	'type'        => 'select',
	'settings'    => 'jewellery_lite_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','jewellery-lite'),
      '0.1' =>  esc_attr('0.1','jewellery-lite'),
      '0.2' =>  esc_attr('0.2','jewellery-lite'),
      '0.3' =>  esc_attr('0.3','jewellery-lite'),
      '0.4' =>  esc_attr('0.4','jewellery-lite'),
      '0.5' =>  esc_attr('0.5','jewellery-lite'),
      '0.6' =>  esc_attr('0.6','jewellery-lite'),
      '0.7' =>  esc_attr('0.7','jewellery-lite'),
      '0.8' =>  esc_attr('0.8','jewellery-lite'),
      '0.9' =>  esc_attr('0.9','jewellery-lite')
	),
	));

	//Blog Post
	$wp_customize->add_section('jewellery_lite_blog_post',array(
		'title'	=> __('Blog Post Settings','jewellery-lite'),
		'panel' => 'jewellery_lite_panel_id',
	));	

	$wp_customize->add_setting( 'jewellery_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','jewellery-lite' ),
        'section' => 'jewellery_lite_blog_post'
    )));

    $wp_customize->add_setting( 'jewellery_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_toggle_author',array(
		'label' => esc_html__( 'Author','jewellery-lite' ),
		'section' => 'jewellery_lite_blog_post'
    )));

    $wp_customize->add_setting( 'jewellery_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','jewellery-lite' ),
		'section' => 'jewellery_lite_blog_post'
    )));

    $wp_customize->add_setting( 'jewellery_lite_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'jewellery_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','jewellery-lite' ),
		'section'     => 'jewellery_lite_blog_post',
		'type'        => 'range',
		'settings'    => 'jewellery_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Content Craetion
	$wp_customize->add_section( 'jewellery_lite_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'jewellery-lite' ),
		'priority' => null,
		'panel' => 'jewellery_lite_panel_id'
	) );

	$wp_customize->add_setting('jewellery_lite_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new Jewellery_Lite_Content_Creation( $wp_customize, 'jewellery_lite_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','jewellery-lite' ),
		),
		'section' => 'jewellery_lite_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'jewellery-lite' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('jewellery_lite_footer',array(
		'title'	=> __('Footer Settings','jewellery-lite'),
		'panel' => 'jewellery_lite_panel_id',
	));	
	
	$wp_customize->add_setting('jewellery_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('jewellery_lite_footer_text',array(
		'label'	=> __('Copyright Text','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'jewellery_lite_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','jewellery-lite' ),
      	'section' => 'jewellery_lite_footer'
    )));

	$wp_customize->add_setting('jewellery_lite_scroll_top_alignment',array(
        'default' => __('Right','jewellery-lite'),
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Jewellery_Lite_Image_Radio_Control($wp_customize, 'jewellery_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','jewellery-lite'),
        'section' => 'jewellery_lite_footer',
        'settings' => 'jewellery_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'jewellery_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Jewellery_Lite_Customize {

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
		$manager->register_section_type( 'Jewellery_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Jewellery_Lite_Customize_Section_Pro( $manager,'example_1', array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW JEWELLERY PRO', 'jewellery-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'jewellery-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/jewellery-wordpress-theme/'),
		) )	);

		$manager->add_section(new Jewellery_Lite_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'jewellery-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'jewellery-lite' ),
			'pro_url'  => admin_url('themes.php?page=jewellery_lite_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'jewellery-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'jewellery-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Jewellery_Lite_Customize::get_instance();