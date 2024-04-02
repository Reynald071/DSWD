<?php
/**
 * Home Page Options.
 *
 * @package Creativ Academy
 */

$default = creativ_academy_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Creativ Academy Sections', 'creativ-academy' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/featured-slider.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-services.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-courses.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-gallery.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-testimonial.php';
require get_template_directory() . '/inc/customizer/home-sections/featured-posts.php';

