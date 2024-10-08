jQuery(document).ready(function($) {

    var loader              = $('#loader-wrapper');
    var loader_container    = $('#loader');
    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var nav_menu            = $('.main-navigation ul.nav-menu');

    // Preloader
    loader_container.hide();
    loader.hide();

    // Scroll Up
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

    // Primary Menu
    menu_toggle.click(function(){
        $(this).toggleClass('active');
        nav_menu.slideToggle();
        $('button.dropdown-toggle').removeClass('active');
        $('.main-navigation ul ul').slideUp();
        $('body').toggleClass('body-overlay');
    });

    $('.main-navigation .nav-menu .menu-item-has-children > a').after( $('<button class="dropdown-toggle"><i class="fas fa-caret-down"></i></button>') );

    $('button.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
        $(this).parent().find('.sub-menu').first().slideToggle();
    });

    if( $('.main-navigation a i').hasClass('wpmi-icon') ) {
        $('.main-navigation').addClass('icons-active');
    }

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    // Keyboard Navigation
    if( $(window).width() < 1024 ) {
        nav_menu.find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        nav_menu.find("li").unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            nav_menu.find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        }
        else {
            nav_menu.find("li").unbind('keydown');
        }
    });

    menu_toggle.on('keydown', function (e) {
        var tabKey    = e.keyCode === 9;
        var shiftKey  = e.shiftKey;

        if( menu_toggle.hasClass('active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                nav_menu.slideUp();
                menu_toggle.removeClass('active');
                $('body').removeClass('body-overlay');
            };
        }
    });

    // Slick Slider
    $('#featured-slider .section-content').slick();
    $('#featured-testimonial .section-content').slick({
        responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1
            }
        }
        ]
    });

    // Match Height
    $('#featured-courses .featured-classes-item').matchHeight();
    $('#featured-courses .equal-height img').matchHeight();
    $('#featured-gallery .equal-height img').matchHeight();
    $('#featured-testimonial .featured-testimonial-item').matchHeight();
    $('#featured-posts .equal-height img').matchHeight();
    $('.blog-posts-wrapper .post-item').matchHeight();

});