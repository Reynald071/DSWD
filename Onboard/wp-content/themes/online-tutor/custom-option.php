<?php

    $online_tutor_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $online_tutor_scroll_position = get_theme_mod( 'online_tutor_scroll_top_position','Right');
    if($online_tutor_scroll_position == 'Right'){
        $online_tutor_theme_css .='#button{';
            $online_tutor_theme_css .='right: 20px;';
        $online_tutor_theme_css .='}';
    }else if($online_tutor_scroll_position == 'Left'){
        $online_tutor_theme_css .='#button{';
            $online_tutor_theme_css .='left: 20px;';
        $online_tutor_theme_css .='}';
    }else if($online_tutor_scroll_position == 'Center'){
        $online_tutor_theme_css .='#button{';
            $online_tutor_theme_css .='right: 50%;left: 50%;';
        $online_tutor_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $online_tutor_slider_img_opacity = get_theme_mod( 'online_tutor_slider_opacity_color','');
    if($online_tutor_slider_img_opacity == '0'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.1'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.1';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.2'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.2';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.3'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.3';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.4'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.4';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.5'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.5';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.6'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.6';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.7'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.7';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.8'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.8';
        $online_tutor_theme_css .='}';
        }else if($online_tutor_slider_img_opacity == '0.9'){
        $online_tutor_theme_css .='.slider-box img{';
            $online_tutor_theme_css .='opacity:0.9';
        $online_tutor_theme_css .='}';
        }

    /*---------------------------Slider Height ------------*/

    $online_tutor_slider_img_height = get_theme_mod('online_tutor_slider_img_height');
    if($online_tutor_slider_img_height != false){
        $online_tutor_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $online_tutor_theme_css .='height: '.esc_attr($online_tutor_slider_img_height).';';
        $online_tutor_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $online_tutor_product_sale = get_theme_mod( 'online_tutor_woocommerce_product_sale','Right');
    if($online_tutor_product_sale == 'Right'){
        $online_tutor_theme_css .='.woocommerce ul.products li.product .onsale{';
            $online_tutor_theme_css .='left: auto; right: 15px;';
        $online_tutor_theme_css .='}';
    }else if($online_tutor_product_sale == 'Left'){
        $online_tutor_theme_css .='.woocommerce ul.products li.product .onsale{';
            $online_tutor_theme_css .='left: 15px; right: auto;';
        $online_tutor_theme_css .='}';
    }else if($online_tutor_product_sale == 'Center'){
        $online_tutor_theme_css .='.woocommerce ul.products li.product .onsale{';
            $online_tutor_theme_css .='right: 50%;left: 50%;';
        $online_tutor_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $online_tutor_footer_bg_image = get_theme_mod('online_tutor_footer_bg_image');
    if($online_tutor_footer_bg_image != false){
        $online_tutor_theme_css .='#colophon{';
            $online_tutor_theme_css .='background: url('.esc_attr($online_tutor_footer_bg_image).')!important;';
        $online_tutor_theme_css .='}';
    }