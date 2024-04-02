<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('webinar_education_enqueue_scripts')) {

	function webinar_education_enqueue_scripts() {

	    $webinar_education_my_theme = wp_get_theme();
	    $webinar_education_version = $webinar_education_my_theme['Version'];

	    wp_enqueue_style(
			'bootstrap-css',
				esc_url( get_template_directory_uri() ) . '/css/bootstrap.css',
				array(),'4.5.0'
			);

	    wp_enqueue_style( 'lms-education-style', get_template_directory_uri() . '/style.css' );

	    wp_enqueue_style( 'webinar-education-style', get_stylesheet_directory_uri() . '/style.css', array('lms-education-woocommerce-css'), $webinar_education_version );

	    wp_enqueue_style( 'webinar-education-style', get_stylesheet_directory_uri() . '/style.css', array('lms-education-style'), $webinar_education_version );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	}

	add_action( 'wp_enqueue_scripts', 'webinar_education_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('webinar_education_after_setup_theme')) {

	function webinar_education_after_setup_theme() {

		if ( ! isset( $webinar_education_content_width ) ) $webinar_education_content_width = 900;

		add_theme_support( 'align-wide' );
		add_theme_support( 'woocommerce' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support( "responsive-embeds" );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'webinar_education_after_setup_theme', 999 );

}

if (!function_exists('webinar_education_widgets_init')) {

	function webinar_education_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','webinar-education'),
			'id'   => 'lms-education-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'webinar-education'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','webinar-education'),
			'id'   => 'lms-education-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'webinar-education'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'webinar_education_widgets_init' );

}

function webinar_education_remove_custom($wp_customize) {
  $wp_customize->remove_setting('lms_education_slider_phone_heading');
  $wp_customize->remove_setting('lms_education_slider_phone_text');
 	$wp_customize->remove_setting('lms_education_phone_detail_unable_disable');
	$wp_customize->remove_setting('lms_education_slider_content_alignment');
	$wp_customize->remove_setting('lms_education_slider_opacity_color');
	$wp_customize->remove_setting('lms_education_overlay_option');
	$wp_customize->remove_setting('lms_education_slider_image_overlay_color');
}
add_action( 'customize_register', 'webinar_education_remove_custom', 1000 );

/*-----------------------------------------------------------------------------------*/
/* Customizer */
/*-----------------------------------------------------------------------------------*/

if ( class_exists("Kirki")){

	// FEATURES SECTION

	Kirki::add_section( 'webinar_education_features_section', array(
    'title'          => esc_html__( 'Features Settings', 'webinar-education' ),
    'description'    => esc_html__( 'You have to select category to show features.', 'webinar-education' ),
    'panel'          => 'lms_education_panel_id',
    'priority'       => 170,
	) );

	Kirki::add_field( 'theme_config_id', [
    'type'        => 'number',
    'settings'    => 'webinar_education_features_counter',
    'label'       => esc_html__( 'Features Counter Section',  'webinar-education' ),
    'section'     => 'webinar_education_features_section',
    'default'     => 0,
    'choices'     => [
      'min'  => 0,
      'max'  => 80,
      'step' => 1,
    ],
  ] );

  $webinar_education_feature_box = get_theme_mod('webinar_education_features_counter','');
  for ( $i = 1; $i <= $webinar_education_feature_box; $i++ ) :

		Kirki::add_field( 'theme_config_id', [
			'type'     => 'dashicons',
			'settings' => 'webinar_education_features_icon_setting'.$i,
			'label'    => esc_html__( 'Features Icon ', 'webinar-education' ).$i,
			'section'  => 'webinar_education_features_section',
			'priority' => 10,
	    ] );

		Kirki::add_field( 'theme_config_id', [
			'type'     => 'text',
			'settings' => 'webinar_education_features_title_text'.$i,
			'label'    => esc_html__( 'Features Title ', 'webinar-education' ).$i,
			'section'  => 'webinar_education_features_section',
			'priority' => 10,
	    ] );

	endfor;
}


if ( ! defined( 'LMS_EDUCATION_PREMIUM_THEME_LINK' ) ) {
	define( 'LMS_EDUCATION_PREMIUM_THEME_LINK', 'https://www.misbahwp.com/themes/education-webinar-wordpress-theme/' );
}
if ( ! defined( 'LMS_EDUCATION_PREMIUM_THEME_DEMO_LINK' ) ) {
    define( 'LMS_EDUCATION_PREMIUM_THEME_DEMO_LINK', 'https://misbahwp.com/demo/webinar-education/' );
}
if ( ! defined( 'LMS_EDUCATION_DOCS_FREE' ) ) {
define('LMS_EDUCATION_DOCS_FREE',__('https://www.misbahwp.com/docs/webinar-education-free-docs/','webinar-education'));
}
if ( ! defined( 'LMS_EDUCATION_DOCS_PRO' ) ) {
define('LMS_EDUCATION_DOCS_PRO',__('https://www.misbahwp.com/docs/webinar-education-pro-docs','webinar-education'));
}
if ( ! defined( 'LMS_EDUCATION_BUY_NOW' ) ) {
define('LMS_EDUCATION_BUY_NOW',__('https://www.misbahwp.com/themes/education-webinar-wordpress-theme/','webinar-education'));
}
if ( ! defined( 'LMS_EDUCATION_SUPPORT_FREE' ) ) {
define('LMS_EDUCATION_SUPPORT_FREE',__('https://wordpress.org/support/theme/webinar-education','webinar-education'));
}
if ( ! defined( 'LMS_EDUCATION_REVIEW_FREE' ) ) {
define('LMS_EDUCATION_REVIEW_FREE',__('https://wordpress.org/support/theme/webinar-education/reviews/#new-post','webinar-education'));
}
if ( ! defined( 'LMS_EDUCATION_DEMO_PRO' ) ) {
define('LMS_EDUCATION_DEMO_PRO',__('https://www.misbahwp.com/demo/webinar-education/','webinar-education'));
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/

function webinar_education_global_color() {

    $webinar_education_theme_color_css = '';
    $lms_education_global_color = get_theme_mod('lms_education_global_color');
    $lms_education_global_color_2 = get_theme_mod('lms_education_global_color_2');

	$webinar_education_theme_color_css = '
		.top-header,.features-content:nth-child(odd),.scroll-up a:hover,.slider-btn a:hover,nav.woocommerce-MyAccount-navigation ul li:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.comment-respond input#submit:hover,.woocommerce button.button.alt:hover,.woocommerce a.added_to_cart:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce #respond input#submit:hover,.comment-respond input#submit:hover,.woocommerce a.button.alt:hover,.woocommerce a.button:hover,.woocommerce button.button:hover, .sidebar-area .wp-block-search__button, .sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label {
			background: '.esc_attr($lms_education_global_color).';
		}
		#checkout-payment #checkout-order-action button, .learnpress-page .lp-button, .learnpress-page #lp-button,ul.learn-press-nav-tabs .course-nav.active::before, p.wp-block-tag-cloud a {
			background: '.esc_attr($lms_education_global_color).'!important;
		}
		@media screen and (min-width: 320px) and (max-width: 767px){
	         .menu-toggle, .dropdown-toggle, button.close-menu, .header i.fa.fa-search, .header i.fas.fa-shopping-cart {
	        background: '.esc_attr($lms_education_global_color).'!important;
	 		}
		}
		#main-menu a:hover, #main-menu ul li a:hover, #main-menu li:hover > a, #main-menu a:focus, #main-menu ul li a:focus, #main-menu li.focus > a, #main-menu li:focus > a, #main-menu ul li.current-menu-item > a, #main-menu ul li.current_page_item > a, #main-menu ul li.current-menu-parent > a, #main-menu ul li.current_page_ancestor > a, #main-menu ul li.current-menu-ancestor > a,.post-meta i, a:focus,.courses-info strong,.courses-box-content h3 a,.social-links a:hover, .top-header p,.slider h3.post-title a,.header-search .open-search-form i, a.cart-customlocation i,span.rss-date {
			color: '.esc_attr($lms_education_global_color).';
		}
		.lp-archive-courses .course-summary .course-summary-content .course-detail-info .course-info-left .course-meta .course-meta__pull-left .meta-item::before,#learn-press-course-tabs input[name=learn-press-course-tab-radio]:nth-child(1):checked ~ .learn-press-nav-tabs .course-nav:nth-child(1) label,#learn-press-course-tabs input[name=learn-press-course-tab-radio]:nth-child(2):checked ~ .learn-press-nav-tabs .course-nav:nth-child(2) label,#learn-press-course-tabs input[name=learn-press-course-tab-radio]:nth-child(3):checked ~ .learn-press-nav-tabs .course-nav:nth-child(3) label{
			color: '.esc_attr($lms_education_global_color).'!important;
		}
		#courses hr,.slider .owl-carousel button.owl-dot.active,.content_inner_box hr,button.menu-toggle:focus, a.open-search-form:focus,.sidebar-area h4.title {
			border-color: '.esc_attr($lms_education_global_color).';
		}
		.slider-btn a,.features-content:nth-child(even),.scroll-up a,#main-menu ul.children li a:hover, #main-menu ul.sub-menu li a:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.added_to_cart, .searchform input[type=submit], .sidebar-area .tagcloud a:hover, .comment-reply a, .comment-respond input#submit, .menu-toggle, .dropdown-toggle, button.close-menu, .slider-btn a, .pagination .nav-links a:hover, .pagination .nav-links a:focus, .pagination .nav-links span.current, .lms-education-pagination span.current, .lms-education-pagination span.current:hover, .lms-education-pagination span.current:focus, .lms-education-pagination a span:hover, .lms-education-pagination a span:focus,.register-top,footer,.sidebar-area h4.title, .header, .wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover, .wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,nav.woocommerce-MyAccount-navigation ul li {
			background: '.esc_attr($lms_education_global_color_2).';
		}
		h1,h2,h3,h4,h5,h6,span.rss-date:hover,.top-header span .dashicons,.social-links i{
			color: '.esc_attr($lms_education_global_color_2).';
		}
		footer .sidebar-area h4.title, .sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label{
			border-color: '.esc_attr($lms_education_global_color_2).';
		}
	';
    wp_add_inline_style( 'webinar-education-style',$webinar_education_theme_color_css );
    wp_add_inline_style( 'webinar-education-woocommerce-css',$webinar_education_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'webinar_education_global_color' );
