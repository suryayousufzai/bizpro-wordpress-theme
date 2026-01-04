/**
 * BizPro Theme JavaScript
 */

(function($) {
    'use strict';

    // Mobile Menu Toggle
    $('.menu-toggle').on('click', function() {
        $('.main-navigation').toggleClass('toggled');
        $(this).toggleClass('active');
    });

    // Smooth Scroll
    $('a[href^="#"]').on('click', function(e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });

    // Add active class on scroll
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

})(jQuery);