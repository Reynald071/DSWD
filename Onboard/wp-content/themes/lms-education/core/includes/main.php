<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_lms_education_dismissed_notice_handler', 'lms_education_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function lms_education_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function lms_education_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {?>

            <?php
            $current_screen = get_current_screen();
				if ($current_screen->id !== 'appearance_page_lms-education-guide-page') {
             $lms_education_comments_theme = wp_get_theme(); ?>
            <div class="lms-education-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
			<div class="lms-education-notice">
				<div class="lms-education-notice-img">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'lms-education'); ?>">
				</div>
				<div class="lms-education-notice-content">
					<div class="lms-education-notice-heading"><?php esc_html_e('Thanks for installing ','lms-education'); ?><?php echo esc_html( $lms_education_comments_theme ); ?></div>
					<p><?php printf(__('In order to fully benefit from everything our theme has to offer, please make sure you visit our <a href="%s">For Premium Options</a>.', 'lms-education'), esc_url(admin_url('themes.php?page=lms-education-guide-page'))); ?></p>
					<?php if (is_child_theme()) { ?>
						<?php $child_theme = wp_get_theme(); ?>
						<?php printf(esc_html__('You\'re using %1$s theme, It\'s a child theme of %2$s.', 'lms-education'), '<strong>' . $child_theme->Name . '</strong>', '<strong>' . esc_html__('LMS Education', 'lms-education') . '</strong>'); 
						?>
					<?php } ?>
				</div>
			</div>
		</div>
        <?php }
	}
}

add_action( 'admin_notices', 'lms_education_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'lms_education_getting_started' );
function lms_education_getting_started() {
	add_theme_page( esc_html__('Get Started', 'lms-education'), esc_html__('Get Started', 'lms-education'), 'edit_theme_options', 'lms-education-guide-page', 'lms_education_test_guide');
}

function lms_education_admin_enqueue_scripts() {
	wp_enqueue_style( 'lms-education-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'lms-education-admin-script', get_template_directory_uri() . '/js/lms-education-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'lms-education-admin-script', 'lms_education_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'lms_education_admin_enqueue_scripts' );

if ( ! defined( 'LMS_EDUCATION_DOCS_FREE' ) ) {
define('LMS_EDUCATION_DOCS_FREE',__('https://www.misbahwp.com/docs/lms-education-free-docs/','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_DOCS_PRO' ) ) {
define('LMS_EDUCATION_DOCS_PRO',__('https://www.misbahwp.com/docs/lms-education-pro-docs','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_BUY_NOW' ) ) {
define('LMS_EDUCATION_BUY_NOW',__('https://www.misbahwp.com/themes/education-wordpress-theme/','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_SUPPORT_FREE' ) ) {
define('LMS_EDUCATION_SUPPORT_FREE',__('https://wordpress.org/support/theme/lms-education','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_REVIEW_FREE' ) ) {
define('LMS_EDUCATION_REVIEW_FREE',__('https://wordpress.org/support/theme/lms-education/reviews/#new-post','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_DEMO_PRO' ) ) {
define('LMS_EDUCATION_DEMO_PRO',__('https://www.misbahwp.com/demo/lms-education/','lms-education'));
}
if( ! defined( 'LMS_EDUCATION_THEME_BUNDLE' ) ) {
define('LMS_EDUCATION_THEME_BUNDLE',__('https://www.misbahwp.com/themes/wordpress-bundle/','lms-education'));
}

function lms_education_test_guide() { ?>
	<?php $lms_education_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( LMS_EDUCATION_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'lms-education' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'lms-education' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( LMS_EDUCATION_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'lms-education' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( LMS_EDUCATION_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'lms-education' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','lms-education'); ?><?php echo esc_html( $lms_education_theme ); ?>  <span><?php esc_html_e('Version: ', 'lms-education'); ?><?php echo esc_html($lms_education_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $lms_education_theme->get_screenshot() ); ?>" />
				<div id="description-insidee">
					<?php
						$lms_education_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $lms_education_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'lms-education' ); ?></h3>
				<div class="insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','lms-education'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( LMS_EDUCATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'lms-education' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( LMS_EDUCATION_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'lms-education' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( LMS_EDUCATION_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'lms-education' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'lms-education' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 50+ Perfect WordPress Theme In A Single Package at just $79."','lms-education'); ?></p>
					<p class="coupon"><?php esc_html_e('Exclusive Offer !! Get Our Theme Pack of 60+ WordPress Themes At 10% Off','lms-education'); ?><span class="coupon-code"><?php esc_html_e('"Themespack10"','lms-education'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( LMS_EDUCATION_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'lms-education' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','lms-education'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','lms-education'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','lms-education'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>

<?php } ?>
