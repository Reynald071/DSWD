<?php
/**
 * Services Section options.
 *
 * @package Creativ Academy
 */

$default = creativ_academy_get_default_theme_options();

// Services Section
$wp_customize->add_section( 'section_featured_services',
	array(
	'title'      => __( 'Services Section', 'creativ-academy' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_featured_services_section]', 
	array(
	'default' 			=> $default['enable_featured_services_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_academy_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_services_section]', 
	array(		
	'label' 	=> __('Enable Section', 'creativ-academy'),
	'section' 	=> 'section_featured_services',
	'settings'  => 'theme_options[enable_featured_services_section]',
	'type' 		=> 'checkbox',	
	)
);

// Items
$wp_customize->add_setting('theme_options[number_of_featured_services_items]', 
	array(
	'default' 			=> $default['number_of_featured_services_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_academy_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_services_items]', 
	array(
	'label'       => __('Items (Max: 4)', 'creativ-academy'),
	'section'     => 'section_featured_services',   
	'settings'    => 'theme_options[number_of_featured_services_items]',		
	'type'        => 'number',
	'active_callback' => 'creativ_academy_featured_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);

// Column
$wp_customize->add_setting('theme_options[featured_services_column]', 
	array(
	'default' 			=> $default['featured_services_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_academy_sanitize_select'
	)
);

$wp_customize->add_control(new creativ_academy_Image_Radio_Control($wp_customize, 'theme_options[featured_services_column]', 
	array(		
	'label' 	=> __('Column', 'creativ-academy'),
	'section' 	=> 'section_featured_services',
	'settings'  => 'theme_options[featured_services_column]',
	'type' 		=> 'radio-image',
	'active_callback' => 'creativ_academy_featured_services_active',
	'choices' 	=> array(		
		'col-1' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-1.jpg',						
		'col-2' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-2.jpg',
		'col-3' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-3.jpg',
		'col-4' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-4.jpg',
		),	
	))
);

// Content Type
$wp_customize->add_setting('theme_options[featured_services_content_type]', 
	array(
	'default' 			=> $default['featured_services_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_academy_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[featured_services_content_type]', 
	array(
	'label'       => __('Content Type', 'creativ-academy'),
	'section'     => 'section_featured_services',   
	'settings'    => 'theme_options[featured_services_content_type]',		
	'type'        => 'select',
	'active_callback' => 'creativ_academy_featured_services_active',
	'choices'	  => array(
			'featured_services_page'	  => __('Page','creativ-academy'),
			'featured_services_post'	  => __('Post','creativ-academy'),
		),
	)
);

$number_of_featured_services_items = creativ_academy_get_option( 'number_of_featured_services_items' );

for( $i=1; $i<=$number_of_featured_services_items; $i++ ) {

	// Icon
	$wp_customize->add_setting('theme_options[featured_services_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[featured_services_icon_'.$i.']', 
		array(
		'label'       		=> sprintf( __('Icon #%1$s', 'creativ-academy'), $i),
		'section'     		=> 'section_featured_services',   
		'settings'    		=> 'theme_options[featured_services_icon_'.$i.']',		
		'active_callback' 	=> 'creativ_academy_featured_services_active',			
		'type'        		=> 'text',
		)
	);

	// Page
	$wp_customize->add_setting('theme_options[featured_services_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_academy_dropdown_pages'
		)
	);
	
	$wp_customize->add_control('theme_options[featured_services_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Page #%1$s', 'creativ-academy'), $i),
		'section'     => 'section_featured_services',   
		'settings'    => 'theme_options[featured_services_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'creativ_academy_featured_services_page',
		)
	);

	// Post
	$wp_customize->add_setting('theme_options[featured_services_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_academy_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_services_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Post #%1$s', 'creativ-academy'), $i),
		'section'     => 'section_featured_services',   
		'settings'    => 'theme_options[featured_services_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => creativ_academy_dropdown_posts(),
		'active_callback' => 'creativ_academy_featured_services_post',
		)
	);
}

// Title Font Weight
$wp_customize->add_setting( 'theme_options[featured_services_title_font_weight]', array(
	'default' 			=> $default['featured_services_title_font_weight'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_services_title_font_weight]', array(
	'label'       => esc_html__( 'Title Font Weight', 'creativ-academy' ),
	'section'     => 'section_featured_services',
	'type'        => 'select',
	'active_callback' 	=> 'creativ_academy_featured_services_active',
	'choices' 	  => array(		
		'title-font-weight-regular' 	=> 'Regular',		
		'title-font-weight-semi-bold'   => 'Semi-Bold',										
		'title-font-weight-bold'        => 'Bold',
	),	
) );

// Title Text Transform
$wp_customize->add_setting( 'theme_options[featured_services_title_text_transform]', array(
	'default' 			=> $default['featured_services_title_text_transform'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_services_title_text_transform]', array(
	'label'       		=> esc_html__( 'Title Text Transform', 'creativ-academy' ),
	'section'     		=> 'section_featured_services',
	'type'        		=> 'select',
	'active_callback' 	=> 'creativ_academy_featured_services_active',
	'active_callback' 	=> 'creativ_academy_featured_services_active',
	'choices' 	  	  	=> array(		
		'title-default' 		=> 'Default',
		'title-uppercase'   	=> 'Uppercase',		
		'title-lowercase'   	=> 'Lowercase',										
		'title-capitalize'  	=> 'Capitalize',
	),	
) );

// Content Font Weight
$wp_customize->add_setting( 'theme_options[featured_services_content_font_weight]', array(
	'default' 			=> $default['featured_services_content_font_weight'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_services_content_font_weight]', array(
	'label'       => esc_html__( 'Content Font Weight', 'creativ-academy' ),
	'section'     => 'section_featured_services',
	'type'        => 'select',
	'active_callback' 	=> 'creativ_academy_featured_services_active',
	'choices' 	  => array(		
		'content-font-weight-regular' 	=> 'Regular',		
		'content-font-weight-semi-bold' => 'Semi-Bold',										
		'content-font-weight-bold'      => 'Bold',
	),	
) );

// Content Text Transform
$wp_customize->add_setting( 'theme_options[featured_services_content_text_transform]', array(
	'default' 			=> $default['featured_services_content_text_transform'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_services_content_text_transform]', array(
	'label'       		=> esc_html__( 'Content Text Transform', 'creativ-academy' ),
	'section'     		=> 'section_featured_services',
	'type'        		=> 'select',
	'active_callback' 	=> 'creativ_academy_featured_services_active',
	'choices' 	  	  	=> array(		
		'content-default' 		=> 'Default',
		'content-uppercase'   	=> 'Uppercase',		
		'content-lowercase'   	=> 'Lowercase',										
		'content-capitalize'  	=> 'Capitalize',
	),	
) );

// Show / Hide Icon
$wp_customize->add_setting( 'theme_options[show_featured_services_icon]', array(
	'default'           => $default['show_featured_services_icon'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_services_icon]', array(
	'label'              => esc_html__( 'Display Icon', 'creativ-academy' ),
	'section'            => 'section_featured_services',
	'type'               => 'select',
	'active_callback'    => 'creativ_academy_featured_services_active',
	'choices' 	         => array(		
		'icon-enable' 	 => 'Yes',						
		'icon-disable'   => 'No',
	),	
) );

// Show / Hide Title
$wp_customize->add_setting( 'theme_options[show_featured_services_title]', array(
	'default'           => $default['show_featured_services_title'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_services_title]', array(
	'label'              => esc_html__( 'Display Title', 'creativ-academy' ),
	'section'            => 'section_featured_services',
	'type'               => 'select',
	'active_callback'    => 'creativ_academy_featured_services_active',
	'choices' 	         => array(		
		'title-enable' 	 => 'Yes',						
		'title-disable'  => 'No',
	),	
) );

// Show / Hide Content
$wp_customize->add_setting( 'theme_options[show_featured_services_content]', array(
	'default'           => $default['show_featured_services_content'],
	'sanitize_callback' => 'creativ_academy_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_featured_services_content]', array(
	'label'       => esc_html__( 'Display Content', 'creativ-academy' ),
	'section'     => 'section_featured_services',
	'type'        => 'select',
	'active_callback' => 'creativ_academy_featured_services_active',
	'choices' 	  => array(		
		'content-enable' 	=> 'Yes',						
		'content-disable'  => 'No',
	),	
) );