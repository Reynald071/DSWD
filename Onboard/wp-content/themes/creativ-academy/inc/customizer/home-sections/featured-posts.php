<?php
/**
 * Featured Posts Options.
 *
 * @package Creativ Academy
 */

$default = creativ_academy_get_default_theme_options();

// Featured Posts Section
$wp_customize->add_section( 'section_featured_posts',
	array(
		'title'      => __( 'Latest Posts Section', 'creativ-academy' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_featured_posts_section]', 
	array(
	'default' 			=> $default['enable_featured_posts_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_academy_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_posts_section]', 
	array(		
	'label' 	=> __('Enable Section', 'creativ-academy'),
	'section' 	=> 'section_featured_posts',
	'settings'  => 'theme_options[enable_featured_posts_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[featured_posts_section_title]', 
	array(
	'default'           => $default['featured_posts_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[featured_posts_section_title]', 
	array(
	'label'       => __('Section Title', 'creativ-academy'),
	'section'     => 'section_featured_posts',   
	'settings'    => 'theme_options[featured_posts_section_title]',	
	'active_callback' => 'creativ_academy_featured_posts_active',		
	'type'        => 'text'
	)
);

// Featured Posts Number.
$wp_customize->add_setting( 'theme_options[featured_posts_number]',
	array(
		'default'           => $default['featured_posts_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'creativ_academy_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[featured_posts_number]',
	array(
		'label'       		=> __('Items (Max: 3)', 'creativ-academy'),
		'section'     		=> 'section_featured_posts',
		'active_callback' 	=> 'creativ_academy_featured_posts_active',		
		'type'        		=> 'number',
		'input_attrs' 		=> array( 
			'min' => 1, 
			'max' => 3, 
			'step' => 1, 
			'style' => 'width: 115px;' 
		),
	)
);

// Column
$wp_customize->add_setting('theme_options[featured_posts_column]', 
	array(
	'default' 			=> $default['featured_posts_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_academy_sanitize_select'
	)
);

$wp_customize->add_control(new creativ_academy_Image_Radio_Control($wp_customize, 'theme_options[featured_posts_column]', 
	array(		
	'label' 	=> __('Select Column', 'creativ-academy'),
	'section' 	=> 'section_featured_posts',
	'settings'  => 'theme_options[featured_posts_column]',
	'type' 		=> 'radio-image',
	'active_callback' => 'creativ_academy_featured_posts_active',
	'choices' 	=> array(		
		'col-1' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-1.jpg',						
		'col-2' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-2.jpg',
		'col-3' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-3.jpg',
		),	
	))
);

$featured_posts_number = creativ_academy_get_option( 'featured_posts_number' );

// Setting Category.
$wp_customize->add_setting( 'theme_options[featured_posts_category]',
	array(
	'default'           => $default['featured_posts_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new creativ_academy_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[featured_posts_category]',
		array(
		'label'    => __( 'Select Category', 'creativ-academy' ),
		'section'  => 'section_featured_posts',
		'settings' => 'theme_options[featured_posts_category]',	
		'active_callback' => 'creativ_academy_featured_posts_active',		
		)
	)
);

// Title Font Weight
$wp_customize->add_setting( 'theme_options[featured_posts_title_font_weight]', array(
	'default' 			=> $default['featured_posts_title_font_weight'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_posts_title_font_weight]', array(
	'label'       => esc_html__( 'Title Font Weight', 'creativ-academy' ),
	'section'     => 'section_featured_posts',
	'type'        => 'select',
	'active_callback' 	=> 'creativ_academy_featured_posts_active',
	'choices' 	  => array(		
		'title-font-weight-regular' 	=> 'Regular',		
		'title-font-weight-semi-bold'   => 'Semi-Bold',										
		'title-font-weight-bold'        => 'Bold',
	),	
) );

// Title Text Transform
$wp_customize->add_setting( 'theme_options[featured_posts_title_text_transform]', array(
	'default' 			=> $default['featured_posts_title_text_transform'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_posts_title_text_transform]', array(
	'label'       		=> esc_html__( 'Title Text Transform', 'creativ-academy' ),
	'section'     		=> 'section_featured_posts',
	'type'        		=> 'select',
	'active_callback' 	=> 'creativ_academy_featured_posts_active',
	'active_callback' 	=> 'creativ_academy_featured_posts_active',
	'choices' 	  	  	=> array(		
		'title-default' 		=> 'Default',
		'title-uppercase'   	=> 'Uppercase',		
		'title-lowercase'   	=> 'Lowercase',										
		'title-capitalize'  	=> 'Capitalize',
	),	
) );

// Content Font Weight
$wp_customize->add_setting( 'theme_options[featured_posts_content_font_weight]', array(
	'default' 			=> $default['featured_posts_content_font_weight'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_posts_content_font_weight]', array(
	'label'       => esc_html__( 'Content Font Weight', 'creativ-academy' ),
	'section'     => 'section_featured_posts',
	'type'        => 'select',
	'active_callback' 	=> 'creativ_academy_featured_posts_active',
	'choices' 	  => array(		
		'content-font-weight-regular' 	=> 'Regular',		
		'content-font-weight-semi-bold' => 'Semi-Bold',										
		'content-font-weight-bold'      => 'Bold',
	),	
) );

// Content Text Transform
$wp_customize->add_setting( 'theme_options[featured_posts_content_text_transform]', array(
	'default' 			=> $default['featured_posts_content_text_transform'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_posts_content_text_transform]', array(
	'label'       		=> esc_html__( 'Content Text Transform', 'creativ-academy' ),
	'section'     		=> 'section_featured_posts',
	'type'        		=> 'select',
	'active_callback' 	=> 'creativ_academy_featured_posts_active',
	'choices' 	  	  	=> array(		
		'content-default' 		=> 'Default',
		'content-uppercase'   	=> 'Uppercase',		
		'content-lowercase'   	=> 'Lowercase',										
		'content-capitalize'  	=> 'Capitalize',
	),	
) );

// Button Font Weight
$wp_customize->add_setting( 'theme_options[featured_posts_button_font_weight]', array(
	'default' 			=> $default['featured_posts_button_font_weight'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_posts_button_font_weight]', array(
	'label'       => esc_html__( 'Button Font Weight', 'creativ-academy' ),
	'section'     => 'section_featured_posts',
	'type'        => 'select',
	'active_callback' 	=> 'creativ_academy_featured_posts_active',
	'choices' 	  => array(		
		'button-font-weight-regular' 	=> 'Regular',		
		'button-font-weight-semi-bold'  => 'Semi-Bold',										
		'button-font-weight-bold'       => 'Bold',
	),	
) );

// Button Text Transform
$wp_customize->add_setting( 'theme_options[featured_posts_button_text_transform]', array(
	'default' 			=> $default['featured_posts_button_text_transform'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_posts_button_text_transform]', array(
	'label'       		=> esc_html__( 'Button Text Transform', 'creativ-academy' ),
	'section'     		=> 'section_featured_posts',
	'type'        		=> 'select',
	'active_callback' 	=> 'creativ_academy_featured_posts_active',
	'choices' 	  	  	=> array(		
		'button-default'     => 'Default',
		'button-uppercase'   => 'Uppercase',		
		'button-lowercase'   => 'Lowercase',										
		'button-capitalize'  => 'Capitalize',
	),	
) );

// Image Size
$wp_customize->add_setting( 'theme_options[featured_posts_image_size]', array(
	'default' 			=> $default['featured_posts_image_size'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_posts_image_size]', array(
	'label'       		=> esc_html__( 'Image Size', 'creativ-academy' ),
	'section'     		=> 'section_featured_posts',
	'type'        		=> 'select',
	'active_callback' 	=> 'creativ_academy_featured_posts_active',
	'choices' 	  	  	=> array(		
		'default-image-size'    => 'Default',
		'equal-height'   		=> 'Equal Height',		
	),	
) );

// Show / Hide Image
$wp_customize->add_setting( 'theme_options[show_featured_posts_image]', array(
	'default'           => $default['show_featured_posts_image'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_posts_image]', array(
	'label'              => esc_html__( 'Display Image', 'creativ-academy' ),
	'section'            => 'section_featured_posts',
	'type'               => 'select',
	'active_callback'    => 'creativ_academy_featured_posts_active',
	'choices' 	         => array(		
		'image-enable' 	 => 'Yes',						
		'image-disable'   => 'No',
	),	
) );

// Show / Hide Category
$wp_customize->add_setting( 'theme_options[show_featured_posts_category]', array(
	'default'           => $default['show_featured_posts_category'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_posts_category]', array(
	'label'              => esc_html__( 'Display Category', 'creativ-academy' ),
	'section'            => 'section_featured_posts',
	'type'               => 'select',
	'active_callback'    => 'creativ_academy_featured_posts_active',
	'choices' 	         => array(		
		'category-enable' 	 => 'Yes',						
		'category-disable'  => 'No',
	),	
) );

// Show / Hide Title
$wp_customize->add_setting( 'theme_options[show_featured_posts_title]', array(
	'default'           => $default['show_featured_posts_title'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_posts_title]', array(
	'label'              => esc_html__( 'Display Title', 'creativ-academy' ),
	'section'            => 'section_featured_posts',
	'type'               => 'select',
	'active_callback'    => 'creativ_academy_featured_posts_active',
	'choices' 	         => array(		
		'title-enable' 	 => 'Yes',						
		'title-disable'  => 'No',
	),	
) );

// Show / Hide Content
$wp_customize->add_setting( 'theme_options[show_featured_posts_content]', array(
	'default'           => $default['show_featured_posts_content'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_posts_content]', array(
	'label'       => esc_html__( 'Display Content', 'creativ-academy' ),
	'section'     => 'section_featured_posts',
	'type'        => 'select',
	'active_callback' => 'creativ_academy_featured_posts_active',
	'choices' 	  => array(		
		'content-enable' 	=> 'Yes',						
		'content-disable'  => 'No',
	),	
) );

// Show / Hide Button
$wp_customize->add_setting( 'theme_options[show_featured_posts_button]', array(
	'default'           => $default['show_featured_posts_button'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_posts_button]', array(
	'label'       => esc_html__( 'Display Button', 'creativ-academy' ),
	'section'     => 'section_featured_posts',
	'type'        => 'select',
	'active_callback' => 'creativ_academy_featured_posts_active',
	'choices' 	  => array(		
		'button-enable' 	=> 'Yes',						
		'button-disable'    => 'No',
	),	
) );