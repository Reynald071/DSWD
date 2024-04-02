<?php 
/**
 * Template part for displaying Featured Classes Section
 *
 *@package Creativ Academy
 */
    $featured_courses_section_title           = creativ_academy_get_option( 'featured_courses_section_title' );
    $featured_courses_column                  = creativ_academy_get_option( 'featured_courses_column' );
    $featured_courses_content_type            = creativ_academy_get_option( 'featured_courses_content_type' );
    $number_of_featured_courses_items         = creativ_academy_get_option( 'number_of_featured_courses_items' );
    $show_featured_courses_image              = creativ_academy_get_option( 'show_featured_courses_image' );
    $show_featured_courses_title              = creativ_academy_get_option( 'show_featured_courses_title' );
    $show_featured_courses_content            = creativ_academy_get_option( 'show_featured_courses_content' );
    $featured_courses_title_font_weight       = creativ_academy_get_option( 'featured_courses_title_font_weight' );
    $featured_courses_title_text_transform    = creativ_academy_get_option( 'featured_courses_title_text_transform' );
    $featured_courses_content_font_weight     = creativ_academy_get_option( 'featured_courses_content_font_weight' );
    $featured_courses_content_text_transform  = creativ_academy_get_option( 'featured_courses_content_text_transform' );
    $featured_courses_image_size              = creativ_academy_get_option( 'featured_courses_image_size' );

    if( $featured_courses_content_type == 'featured_courses_page' ) :
        for( $i=1; $i<=$number_of_featured_courses_items; $i++ ) :
            $featured_courses_posts[] = creativ_academy_get_option( 'featured_courses_page_'.$i );
        endfor;  
    elseif( $featured_courses_content_type == 'featured_courses_post' ) :
        for( $i=1; $i<=$number_of_featured_courses_items; $i++ ) :
            $featured_courses_posts[] = creativ_academy_get_option( 'featured_courses_post_'.$i );
        endfor;
    endif;
    ?>

    <?php if( !empty($featured_courses_section_title) ):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($featured_courses_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $featured_courses_content_type == 'featured_courses_page' ) : ?>
        <div class="section-content <?php echo esc_attr($show_featured_courses_image); ?> <?php echo esc_attr($show_featured_courses_title); ?> <?php echo esc_attr($show_featured_courses_content); ?> <?php echo esc_attr($featured_courses_title_font_weight); ?> <?php echo esc_attr($featured_courses_content_font_weight); ?> <?php echo esc_attr($featured_courses_title_text_transform); ?> <?php echo esc_attr($featured_courses_content_text_transform); ?> <?php echo esc_attr($featured_courses_image_size); ?> <?php echo esc_attr($featured_courses_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_courses_items ),
                'post__in'      => $featured_courses_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;
                while ($loop->have_posts()) : $loop->the_post(); $i++; ?>             
                <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
                    <div class="featured-classes-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    $excerpt = creativ_academy_the_excerpt( 10 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        </div><!-- .entry-container -->
                    </div><!-- .featured-classes-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content <?php echo esc_attr($show_featured_courses_image); ?> <?php echo esc_attr($show_featured_courses_title); ?> <?php echo esc_attr($show_featured_courses_content); ?> <?php echo esc_attr($featured_courses_title_font_weight); ?> <?php echo esc_attr($featured_courses_content_font_weight); ?> <?php echo esc_attr($featured_courses_title_text_transform); ?> <?php echo esc_attr($featured_courses_content_text_transform); ?> <?php echo esc_attr($featured_courses_image_size); ?> <?php echo esc_attr($featured_courses_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_courses_items ),
                'post__in'      => $featured_courses_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;
                while ($loop->have_posts()) : $loop->the_post(); $i++; ?>                
                <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
                    <div class="featured-classes-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    $excerpt = creativ_academy_the_excerpt( 10 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        </div><!-- .entry-container -->
                    </div><!-- .featured-classes-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;