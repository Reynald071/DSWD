<?php
/**
 * Featured Testimonial options.
 *
 * @package Creativ Academy
 */

$default = creativ_academy_get_default_theme_options();

// Featured Featured Testimonial Section
$wp_customize->add_section( 'section_featured_testimonial',
	array(
	'title'      => __( 'Testimonial Section', 'creativ-academy' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Featured Testimonial Section
$wp_customize->add_setting('theme_options[enable_featured_testimonial_section]', 
	array(
	'default' 			=> $default['enable_featured_testimonial_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_academy_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_testimonial_section]', 
	array(		
	'label' 	=> __('Enable Section', 'creativ-academy'),
	'section' 	=> 'section_featured_testimonial',
	'settings'  => 'theme_options[enable_featured_testimonial_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[featured_testimonial_section_title]', 
	array(
	'default'           => $default['featured_testimonial_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[featured_testimonial_section_title]', 
	array(
	'label'       => __('Section Title', 'creativ-academy'),
	'section'     => 'section_featured_testimonial',   
	'settings'    => 'theme_options[featured_testimonial_section_title]',	
	'active_callback' => 'creativ_academy_featured_testimonial_active',		
	'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_featured_testimonial_items]', 
	array(
	'default' 			=> $default['number_of_featured_testimonial_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_academy_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_testimonial_items]', 
	array(
	'label'       => __('Items (Max: 3)', 'creativ-academy'),
	'section'     => 'section_featured_testimonial',   
	'settings'    => 'theme_options[number_of_featured_testimonial_items]',		
	'type'        => 'number',
	'active_callback' => 'creativ_academy_featured_testimonial_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[featured_testimonial_content_type]', 
	array(
	'default' 			=> $default['featured_testimonial_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_academy_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[featured_testimonial_content_type]', 
	array(
	'label'       => __('Content Type', 'creativ-academy'),
	'section'     => 'section_featured_testimonial',   
	'settings'    => 'theme_options[featured_testimonial_content_type]',		
	'type'        => 'select',
	'active_callback' => 'creativ_academy_featured_testimonial_active',
	'choices'	  => array(
			'featured_testimonial_page'	     => __('Page','creativ-academy'),
			'featured_testimonial_post'	     => __('Post','creativ-academy'),
		),
	)
);

$number_of_featured_testimonial_items = creativ_academy_get_option( 'number_of_featured_testimonial_items' );

for( $i=1; $i<=$number_of_featured_testimonial_items; $i++ ) {

	// Page
	$wp_customize->add_setting('theme_options[featured_testimonial_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_academy_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_testimonial_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'creativ-academy'), $i),
		'section'     => 'section_featured_testimonial',   
		'settings'    => 'theme_options[featured_testimonial_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'creativ_academy_featured_testimonial_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[featured_testimonial_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_academy_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_testimonial_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'creativ-academy'), $i),
		'section'     => 'section_featured_testimonial',   
		'settings'    => 'theme_options[featured_testimonial_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => creativ_academy_dropdown_posts(),
		'active_callback' => 'creativ_academy_featured_testimonial_post',
		)
	);

	// Position
	$wp_customize->add_setting('theme_options[featured_testimonial_position_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[featured_testimonial_position_'.$i.']', 
		array(
		'label'       => sprintf( __('Position #%1$s', 'creativ-academy'), $i),
		'section'     => 'section_featured_testimonial',   
		'settings'    => 'theme_options[featured_testimonial_position_'.$i.']',		
		'active_callback' => 'creativ_academy_featured_testimonial_active',		
		'type'        => 'text'
		)
	);
}

// Title Font Weight
$wp_customize->add_setting( 'theme_options[featured_testimonial_title_font_weight]', array(
	'default' 			=> $default['featured_testimonial_title_font_weight'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_testimonial_title_font_weight]', array(
	'label'       => esc_html__( 'Title Font Weight', 'creativ-academy' ),
	'section'     => 'section_featured_testimonial',
	'type'        => 'select',
	'active_callback' 	=> 'creativ_academy_featured_testimonial_active',
	'choices' 	  => array(		
		'title-font-weight-regular' 	=> 'Regular',		
		'title-font-weight-semi-bold'   => 'Semi-Bold',										
		'title-font-weight-bold'        => 'Bold',
	),	
) );

// Title Text Transform
$wp_customize->add_setting( 'theme_options[featured_testimonial_title_text_transform]', array(
	'default' 			=> $default['featured_testimonial_title_text_transform'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_testimonial_title_text_transform]', array(
	'label'       		=> esc_html__( 'Title Text Transform', 'creativ-academy' ),
	'section'     		=> 'section_featured_testimonial',
	'type'        		=> 'select',
	'active_callback' 	=> 'creativ_academy_featured_testimonial_active',
	'active_callback' 	=> 'creativ_academy_featured_testimonial_active',
	'choices' 	  	  	=> array(		
		'title-default' 		=> 'Default',
		'title-uppercase'   	=> 'Uppercase',		
		'title-lowercase'   	=> 'Lowercase',										
		'title-capitalize'  	=> 'Capitalize',
	),	
) );

// Content Font Weight
$wp_customize->add_setting( 'theme_options[featured_testimonial_content_font_weight]', array(
	'default' 			=> $default['featured_testimonial_content_font_weight'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_testimonial_content_font_weight]', array(
	'label'       => esc_html__( 'Content Font Weight', 'creativ-academy' ),
	'section'     => 'section_featured_testimonial',
	'type'        => 'select',
	'active_callback' 	=> 'creativ_academy_featured_testimonial_active',
	'choices' 	  => array(		
		'content-font-weight-regular' 	=> 'Regular',		
		'content-font-weight-semi-bold' => 'Semi-Bold',										
		'content-font-weight-bold'      => 'Bold',
	),	
) );

// Content Text Transform
$wp_customize->add_setting( 'theme_options[featured_testimonial_content_text_transform]', array(
	'default' 			=> $default['featured_testimonial_content_text_transform'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_testimonial_content_text_transform]', array(
	'label'       		=> esc_html__( 'Content Text Transform', 'creativ-academy' ),
	'section'     		=> 'section_featured_testimonial',
	'type'        		=> 'select',
	'active_callback' 	=> 'creativ_academy_featured_testimonial_active',
	'choices' 	  	  	=> array(		
		'content-default' 		=> 'Default',
		'content-uppercase'   	=> 'Uppercase',		
		'content-lowercase'   	=> 'Lowercase',										
		'content-capitalize'  	=> 'Capitalize',
	),	
) );

// Show / Hide Image
$wp_customize->add_setting( 'theme_options[show_featured_testimonial_image]', array(
	'default'           => $default['show_featured_testimonial_image'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_testimonial_image]', array(
	'label'              => esc_html__( 'Display Image', 'creativ-academy' ),
	'section'            => 'section_featured_testimonial',
	'type'               => 'select',
	'active_callback'    => 'creativ_academy_featured_testimonial_active',
	'choices' 	         => array(		
		'image-enable' 	 => 'Yes',						
		'image-disable'   => 'No',
	),	
) );

// Show / Hide Position
$wp_customize->add_setting( 'theme_options[show_featured_testimonial_position]', array(
	'default'           => $default['show_featured_testimonial_position'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_testimonial_position]', array(
	'label'              => esc_html__( 'Display Position', 'creativ-academy' ),
	'section'            => 'section_featured_testimonial',
	'type'               => 'select',
	'active_callback'    => 'creativ_academy_featured_testimonial_active',
	'choices' 	         => array(		
		'position-enable' 	 => 'Yes',						
		'position-disable'  => 'No',
	),	
) );

// Show / Hide Title
$wp_customize->add_setting( 'theme_options[show_featured_testimonial_title]', array(
	'default'           => $default['show_featured_testimonial_title'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_testimonial_title]', array(
	'label'              => esc_html__( 'Display Title', 'creativ-academy' ),
	'section'            => 'section_featured_testimonial',
	'type'               => 'select',
	'active_callback'    => 'creativ_academy_featured_testimonial_active',
	'choices' 	         => array(		
		'title-enable' 	 => 'Yes',						
		'title-disable'  => 'No',
	),	
) );

// Show / Hide Content
$wp_customize->add_setting( 'theme_options[show_featured_testimonial_content]', array(
	'default'           => $default['show_featured_testimonial_content'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_testimonial_content]', array(
	'label'       => esc_html__( 'Display Content', 'creativ-academy' ),
	'section'     => 'section_featured_testimonial',
	'type'        => 'select',
	'active_callback' => 'creativ_academy_featured_testimonial_active',
	'choices' 	  => array(		
		'content-enable' 	=> 'Yes',						
		'content-disable'  => 'No',
	),	
) );