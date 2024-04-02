<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Creativ Academy
 */
/**
* Hook - creativ_academy_action_doctype.
*
* @hooked creativ_academy_doctype -  10
*/
do_action( 'creativ_academy_action_doctype' );
?>
<head>
<?php
/**
* Hook - creativ_academy_action_head.
*
* @hooked creativ_academy_head -  10
*/
do_action( 'creativ_academy_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - creativ_academy_action_before.
*
* @hooked creativ_academy_page_start - 10
*/
do_action( 'creativ_academy_action_before' );

/**
*
* @hooked creativ_academy_header_start - 10
*/
do_action( 'creativ_academy_action_before_header' );

/**
*
*@hooked creativ_academy_site_branding - 10
*@hooked creativ_academy_header_end - 15 
*/
do_action('creativ_academy_action_header');

/**
*
* @hooked creativ_academy_content_start - 10
*/
do_action( 'creativ_academy_action_before_content' );

/**
 * Banner start
 * 
 * @hooked creativ_academy_banner_header - 10
*/
do_action( 'creativ_academy_banner_header' );  
