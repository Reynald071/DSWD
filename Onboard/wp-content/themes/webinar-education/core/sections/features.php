<div class="features">
  <div class="row m-0">
    <?php 
      $webinar_education_feature_box = get_theme_mod('webinar_education_features_counter','');
      for ( $i = 1; $i <= $webinar_education_feature_box; $i++ ){ ?>
      <div class="col-lg-3 col-md-3 col-sm-3 features-content">
        <div class="text-center p-lg-5 p-3">
          <div class="features-icon">
            <?php $webinar_education_icon = get_theme_mod( 'webinar_education_features_icon_setting'.$i); ?>
            <span class="dashicons dashicons-<?php echo esc_attr( $webinar_education_icon ); ?>"></span>
          </div>
          <h5 class="mt-4"><?php echo esc_html(get_theme_mod('webinar_education_features_title_text'.$i));?></h5>
        </div>
      </div>
    <?php }?>
  </div>
</div>