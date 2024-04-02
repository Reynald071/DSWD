<?php
/**
 * The template for displaying home page.
 * @package Creativ Academy
 */

if ( 'posts' != get_option( 'show_on_front' ) ) { 
    get_header(); ?>
    <?php $enabled_sections = creativ_academy_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( $section['id'] == 'featured-slider' ) { ?>
                <?php $enable_featured_slider_section = creativ_academy_get_option( 'enable_featured_slider_section' );
                if(true ==$enable_featured_slider_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">  
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'featured-services' ) { ?>
                <?php $enable_featured_services_section = creativ_academy_get_option( 'enable_featured_services_section' );
                if(true ==$enable_featured_services_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="section-gap">  
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'featured-courses' ) { ?>
                <?php $enable_featured_courses_section = creativ_academy_get_option( 'enable_featured_courses_section' );
                if(true ==$enable_featured_courses_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="section-gap">  
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'featured-gallery' ) { ?>
                <?php $enable_featured_gallery_section = creativ_academy_get_option( 'enable_featured_gallery_section' );
                if(true ==$enable_featured_gallery_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="section-gap equal-height">  
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'featured-testimonial' ) { ?>
                <?php $enable_featured_testimonial_section = creativ_academy_get_option( 'enable_featured_testimonial_section' );
                if(true ==$enable_featured_testimonial_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="section-gap">  
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif; ?>
            
            <?php } elseif( ( $section['id'] == 'featured-posts' ) ) { ?>
                <?php $enable_featured_posts_section = creativ_academy_get_option( 'enable_featured_posts_section' );
                if(true ==$enable_featured_posts_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper section-gap">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif; ?>
            <?php }
        }
    }
    if( true == creativ_academy_get_option('enable_frontpage_content') ) { ?>
        <div class="wrapper section-gap">
            <?php include( get_page_template() ); ?>
        </div>
    <?php }
    get_footer();
} 
elseif ('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 