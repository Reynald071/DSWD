<?php if ( get_theme_mod('lms_education_blog_box_enable') ) : ?>

<?php $webinar_education_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('lms_education_blog_slide_category'),
  'posts_per_page' => get_theme_mod('lms_education_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $webinar_education_arr_posts = new WP_Query( $webinar_education_args );
    if ( $webinar_education_arr_posts->have_posts() ) :
      while ( $webinar_education_arr_posts->have_posts() ) :
        $webinar_education_arr_posts->the_post();
        ?>
        <div class="blog_box">
           <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            else:
              ?>
              <div class="slider-alternate">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
              </div>
              <?php
            endif;
          ?>
          <div class="content_inner_box">
            <?php if ( get_theme_mod('lms_education_title_unable_disable',true) ) : ?>
            <h3 class="post-title mb-3 mt-0"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h3>
            <?php endif; ?>
            <?php if ( get_theme_mod('lms_education_text_unable_disable',true) ) : ?>
            <p><?php echo wp_trim_words( get_the_content(), get_theme_mod('lms_education_slide_excerpt_number',20) ); ?></p>
            <?php endif; ?>
            <div class="slider-btn">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','webinar-education'); ?></a>
            </div>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>
