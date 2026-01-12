/**
 * BizPro Premium Theme JavaScript
 * Version: 2.1 - Clean & Fixed
 */

(function($) {
    'use strict';

    // ==========================================
    // PORTFOLIO GRID FIX - DISABLED
    // ==========================================
    function fixPortfolioGrid() {
        // Disabled - CSS handles the grid layout
        console.log('✓ Portfolio Grid Fix: Disabled - using CSS grid layout instead');
        return;
    }

    // Run portfolio fix on DOM ready
    $(document).ready(function() {
        fixPortfolioGrid();
    });

    // ==========================================
    // INITIALIZE AOS (Animate On Scroll)
    // ==========================================
    function initAOS() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('aos-animate');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements with data-aos attribute
        document.querySelectorAll('[data-aos]').forEach(el => {
            observer.observe(el);
        });
    }

    // ==========================================
    // MOBILE MENU
    // ==========================================
    $('.menu-toggle').on('click', function() {
        $(this).toggleClass('active');
        $('.main-navigation').toggleClass('toggled');
    });

    // Close mobile menu when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.site-header').length) {
            $('.main-navigation').removeClass('toggled');
            $('.menu-toggle').removeClass('active');
        }
    });

    // ==========================================
    // SMOOTH SCROLL
    // ==========================================
    $('a[href^="#"]').on('click', function(e) {
        const target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 1000, 'swing');
        }
    });

    // ==========================================
    // HEADER SCROLL EFFECT
    // ==========================================
    let lastScroll = 0;
    $(window).on('scroll', function() {
        const currentScroll = $(this).scrollTop();
        
        if (currentScroll > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
        
        lastScroll = currentScroll;
    });

    // ==========================================
    // PARALLAX EFFECT FOR HERO SHAPES
    // ==========================================
    $(window).on('scroll', function() {
        const scrolled = $(this).scrollTop();
        $('.shape-1').css('transform', `translate(${scrolled * 0.1}px, ${scrolled * 0.15}px) rotate(${scrolled * 0.05}deg)`);
        $('.shape-2').css('transform', `translate(${-scrolled * 0.1}px, ${-scrolled * 0.1}px) rotate(${-scrolled * 0.05}deg)`);
        $('.shape-3').css('transform', `translate(${scrolled * 0.05}px, ${-scrolled * 0.2}px) rotate(${scrolled * 0.1}deg)`);
    });

    // ==========================================
    // COUNTER ANIMATION FOR STATS
    // ==========================================
    function animateCounter($el, target) {
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            // Format numbers with + or %
            let displayValue = Math.floor(current);
            if ($el.text().includes('+')) {
                displayValue += '+';
            } else if ($el.text().includes('%')) {
                displayValue += '%';
            }
            
            $el.text(displayValue);
        }, 16);
    }

    // Trigger counter animation when stats come into view
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const $statNumber = $(entry.target).find('.stat-number');
                const originalText = $statNumber.text();
                const targetNumber = parseInt(originalText.replace(/[^0-9]/g, ''));
                
                if (targetNumber && !$statNumber.data('animated')) {
                    $statNumber.data('animated', true);
                    animateCounter($statNumber, targetNumber);
                }
                
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    $('.stat-item').each(function() {
        statsObserver.observe(this);
    });

    // ==========================================
    // 3D TILT EFFECT ON CARDS
    // ==========================================
    $('.service-card, .portfolio-item-modern, .team-member-modern').on('mousemove', function(e) {
        const $card = $(this);
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        const rotateX = (y - centerY) / 10;
        const rotateY = (centerX - x) / 10;

        $card.css({
            'transform': `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`
        });
    });

    $('.service-card, .portfolio-item-modern, .team-member-modern').on('mouseleave', function() {
        $(this).css({
            'transform': 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)'
        });
    });

    // ==========================================
    // MAGNETIC EFFECT FOR BUTTONS
    // ==========================================
    $('.btn').on('mousemove', function(e) {
        const $btn = $(this);
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;

        $btn.css({
            'transform': `translate(${x * 0.2}px, ${y * 0.2}px)`
        });
    });

    $('.btn').on('mouseleave', function() {
        $(this).css({
            'transform': 'translate(0, 0)'
        });
    });

    // ==========================================
    // CURSOR FOLLOWER EFFECT
    // ==========================================
    const cursor = $('<div class="cursor"></div>');
    const cursorFollower = $('<div class="cursor-follower"></div>');
    $('body').append(cursor).append(cursorFollower);

    $(document).on('mousemove', function(e) {
        cursor.css({
            'left': e.clientX,
            'top': e.clientY
        });

        setTimeout(() => {
            cursorFollower.css({
                'left': e.clientX,
                'top': e.clientY
            });
        }, 100);
    });

    // Enlarge cursor on hover over interactive elements
    $('a, button, .btn, .service-card, .portfolio-item-modern').on('mouseenter', function() {
        cursor.addClass('cursor-active');
        cursorFollower.addClass('cursor-active');
    }).on('mouseleave', function() {
        cursor.removeClass('cursor-active');
        cursorFollower.removeClass('cursor-active');
    });

    // ==========================================
    // PAGE LOAD ANIMATION
    // ==========================================
    $(window).on('load', function() {
        $('body').addClass('loaded');
        
        // Trigger AOS after page load
        setTimeout(() => {
            initAOS();
        }, 100);

        // Animate hero elements sequentially
        $('.hero-label, .hero-title, .hero-description, .hero-buttons, .hero-card').each(function(index) {
            const $el = $(this);
            setTimeout(() => {
                $el.css('opacity', '1');
            }, index * 200);
        });
    });

    // ==========================================
    // FORM VALIDATION
    // ==========================================
    $('form').on('submit', function(e) {
        let isValid = true;
        
        $(this).find('input[required], textarea[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });

    // Remove error class on input
    $('input, textarea').on('input', function() {
        $(this).removeClass('error');
    });

    // ==========================================
    // LAZY LOADING IMAGES
    // ==========================================
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        imageObserver.unobserve(img);
                    }
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // ==========================================
    // SECTION REVEAL ON SCROLL
    // ==========================================
    const sections = document.querySelectorAll('section');
    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('section-visible');
            }
        });
    }, { threshold: 0.15 });

    sections.forEach(section => {
        sectionObserver.observe(section);
    });

    // ==========================================
    // PORTFOLIO FILTER
    // ==========================================
    $('.portfolio-filter button').on('click', function() {
        const filter = $(this).data('filter');
        
        $('.portfolio-filter button').removeClass('active');
        $(this).addClass('active');

        if (filter === 'all') {
            $('.portfolio-item-modern').fadeIn();
        } else {
            $('.portfolio-item-modern').hide();
            $(`.portfolio-item-modern[data-category="${filter}"]`).fadeIn();
        }
    });

    // ==========================================
    // PRELOADER
    // ==========================================
    const preloader = $('<div class="preloader"><div class="spinner"></div></div>');
    $('body').prepend(preloader);

    $(window).on('load', function() {
        setTimeout(() => {
            preloader.fadeOut(500, function() {
                $(this).remove();
            });
        }, 500);
    });

})(jQuery);