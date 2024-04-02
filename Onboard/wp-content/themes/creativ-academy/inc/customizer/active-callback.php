<?php
/**
 * Active callback functions.
 *
 * @package Creativ Academy
 */

function creativ_academy_featured_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_academy_featured_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( creativ_academy_featured_slider_active( $control ) && ( 'featured_slider_page' == $content_type ) );
}

function creativ_academy_featured_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( creativ_academy_featured_slider_active( $control ) && ( 'featured_slider_post' == $content_type ) );
}


function creativ_academy_featured_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_services_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_academy_featured_services_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_services_content_type]' )->value();
    return ( creativ_academy_featured_services_active( $control ) && ( 'featured_services_page' == $content_type ) );
}

function creativ_academy_featured_services_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_services_content_type]' )->value();
    return ( creativ_academy_featured_services_active( $control ) && ( 'featured_services_post' == $content_type ) );
}

function creativ_academy_featured_courses_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_courses_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_academy_featured_courses_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_courses_content_type]' )->value();
    return ( creativ_academy_featured_courses_active( $control ) && ( 'featured_courses_page' == $content_type ) );
}

function creativ_academy_featured_courses_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_courses_content_type]' )->value();
    return ( creativ_academy_featured_courses_active( $control ) && ( 'featured_courses_post' == $content_type ) );
}

function creativ_academy_featured_gallery_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_gallery_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_academy_featured_gallery_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_gallery_content_type]' )->value();
    return ( creativ_academy_featured_gallery_active( $control ) && ( 'featured_gallery_page' == $content_type ) );
}

function creativ_academy_featured_gallery_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_gallery_content_type]' )->value();
    return ( creativ_academy_featured_gallery_active( $control ) && ( 'featured_gallery_post' == $content_type ) );
}

function creativ_academy_featured_testimonial_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_testimonial_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function creativ_academy_featured_testimonial_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_testimonial_content_type]' )->value();
    return ( creativ_academy_featured_testimonial_active( $control ) && ( 'featured_testimonial_page' == $content_type ) );
}

function creativ_academy_featured_testimonial_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_testimonial_content_type]' )->value();
    return ( creativ_academy_featured_testimonial_active( $control ) && ( 'featured_testimonial_post' == $content_type ) );
}

function creativ_academy_featured_posts_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_posts_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

/**
 * Active Callback for top bar section
 */
function creativ_academy_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function creativ_academy_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}