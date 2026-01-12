/**
 * BizPro Glassmorphism 3D Services - Enhanced JavaScript
 * Features: Particle system, 3D flip cards, advanced animations
 */

(function($) {
    'use strict';

    // ==========================================
    // PARTICLE SYSTEM
    // ==========================================
    
    class ParticleSystem {
        constructor() {
            this.canvas = document.getElementById('particleCanvas');
            if (!this.canvas) return;
            
            this.ctx = this.canvas.getContext('2d');
            this.particles = [];
            this.particleCount = 80;
            this.mouse = { x: null, y: null, radius: 150 };
            
            this.init();
        }
        
        init() {
            this.resize();
            this.createParticles();
            this.animate();
            this.addEventListeners();
        }
        
        resize() {
            this.canvas.width = window.innerWidth;
            this.canvas.height = window.innerHeight;
        }
        
        createParticles() {
            for (let i = 0; i < this.particleCount; i++) {
                this.particles.push({
                    x: Math.random() * this.canvas.width,
                    y: Math.random() * this.canvas.height,
                    vx: (Math.random() - 0.5) * 0.5,
                    vy: (Math.random() - 0.5) * 0.5,
                    size: Math.random() * 3 + 1,
                    color: this.getParticleColor()
                });
            }
        }
        
        getParticleColor() {
            const colors = [
                'rgba(124, 58, 237, 0.6)',
                'rgba(236, 72, 153, 0.6)',
                'rgba(6, 182, 212, 0.6)',
                'rgba(167, 139, 250, 0.6)'
            ];
            return colors[Math.floor(Math.random() * colors.length)];
        }
        
        animate() {
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            
            this.particles.forEach((particle, i) => {
                // Update position
                particle.x += particle.vx;
                particle.y += particle.vy;
                
                // Bounce off edges
                if (particle.x < 0 || particle.x > this.canvas.width) particle.vx *= -1;
                if (particle.y < 0 || particle.y > this.canvas.height) particle.vy *= -1;
                
                // Mouse interaction
                if (this.mouse.x !== null && this.mouse.y !== null) {
                    const dx = this.mouse.x - particle.x;
                    const dy = this.mouse.y - particle.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    if (distance < this.mouse.radius) {
                        const angle = Math.atan2(dy, dx);
                        const force = (this.mouse.radius - distance) / this.mouse.radius;
                        particle.vx -= Math.cos(angle) * force * 0.2;
                        particle.vy -= Math.sin(angle) * force * 0.2;
                    }
                }
                
                // Draw particle
                this.ctx.beginPath();
                this.ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
                this.ctx.fillStyle = particle.color;
                this.ctx.fill();
                
                // Connect nearby particles
                this.particles.slice(i + 1).forEach(otherParticle => {
                    const dx = particle.x - otherParticle.x;
                    const dy = particle.y - otherParticle.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    if (distance < 150) {
                        this.ctx.beginPath();
                        this.ctx.strokeStyle = `rgba(124, 58, 237, ${0.15 * (1 - distance / 150)})`;
                        this.ctx.lineWidth = 0.5;
                        this.ctx.moveTo(particle.x, particle.y);
                        this.ctx.lineTo(otherParticle.x, otherParticle.y);
                        this.ctx.stroke();
                    }
                });
            });
            
            requestAnimationFrame(() => this.animate());
        }
        
        addEventListeners() {
            window.addEventListener('resize', () => this.resize());
            
            window.addEventListener('mousemove', (e) => {
                this.mouse.x = e.x;
                this.mouse.y = e.y;
            });
            
            window.addEventListener('mouseleave', () => {
                this.mouse.x = null;
                this.mouse.y = null;
            });
        }
    }

    // ==========================================
    // SCROLL ANIMATIONS
    // ==========================================
    
    class ScrollAnimations {
        constructor() {
            this.elements = document.querySelectorAll('[data-scroll-animation]');
            this.init();
        }
        
        init() {
            this.observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.dataset.scrollDelay || '0s';
                        entry.target.style.transitionDelay = delay;
                        
                        setTimeout(() => {
                            entry.target.classList.add('animated');
                        }, parseFloat(delay) * 1000);
                        
                        this.observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });
            
            this.elements.forEach(el => this.observer.observe(el));
        }
    }

    // ==========================================
    // COUNTER ANIMATION
    // ==========================================
    
    function animateCounter($element, target) {
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            $element.text(Math.floor(current));
        }, 16);
    }

    // ==========================================
    // 3D CARD TILT EFFECT
    // ==========================================
    
    function init3DCardTilt() {
        $('.flip-card-3d').each(function() {
            const card = $(this);
            let isFlipped = false;
            
            // Manual flip on click for mobile
            card.on('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    isFlipped = !isFlipped;
                    if (isFlipped) {
                        card.find('.flip-card-inner').css('transform', 'rotateY(180deg)');
                    } else {
                        card.find('.flip-card-inner').css('transform', 'rotateY(0deg)');
                    }
                }
            });
            
            // 3D tilt on desktop
            card.on('mousemove', function(e) {
                if (window.innerWidth > 768) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = (y - centerY) / 20;
                    const rotateY = (x - centerX) / 20;
                    
                    card.css({
                        'transform': `perspective(1000px) rotateX(${-rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`
                    });
                }
            });
            
            card.on('mouseleave', function() {
                if (window.innerWidth > 768) {
                    card.css({
                        'transform': 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateZ(0px)'
                    });
                }
            });
        });
    }

    // ==========================================
    // GLASS MORPHISM HOVER EFFECT
    // ==========================================
    
    function initGlassMorphismHover() {
        $('.flip-card-3d').on('mouseenter', function() {
            $(this).find('.card-gradient-overlay').css('opacity', '0.3');
            $(this).find('.card-border-animate').css('opacity', '1');
        });
        
        $('.flip-card-3d').on('mouseleave', function() {
            $(this).find('.card-gradient-overlay').css('opacity', '0.1');
            $(this).find('.card-border-animate').css('opacity', '0');
        });
    }

    // ==========================================
    // MAGNETIC BUTTON EFFECT
    // ==========================================
    
    function initMagneticButtons() {
        $('.btn-glass-primary, .btn-glass-secondary').on('mousemove', function(e) {
            const btn = $(this);
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            btn.css({
                'transform': `translate(${x * 0.15}px, ${y * 0.15}px)`
            });
        });
        
        $('.btn-glass-primary, .btn-glass-secondary').on('mouseleave', function() {
            $(this).css({
                'transform': 'translate(0, 0)'
            });
        });
    }

    // ==========================================
    // PARALLAX SCROLL EFFECT
    // ==========================================
    
    function initParallaxScroll() {
        $(window).on('scroll', function() {
            const scrolled = $(this).scrollTop();
            
            // Parallax for blobs
            $('.blob-1').css('transform', `translate(${scrolled * 0.1}px, ${scrolled * 0.15}px) rotate(${scrolled * 0.05}deg)`);
            $('.blob-2').css('transform', `translate(${-scrolled * 0.08}px, ${-scrolled * 0.12}px) rotate(${-scrolled * 0.05}deg)`);
            $('.blob-3').css('transform', `translate(${scrolled * 0.05}px, ${-scrolled * 0.2}px) rotate(${scrolled * 0.1}deg)`);
            
            // Parallax for hero content
            $('.hero-glass-content').css('transform', `translateY(${scrolled * 0.3}px)`);
        });
    }

    // ==========================================
    // SMOOTH SCROLL
    // ==========================================
    
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 1000, 'easeInOutCubic');
            }
        });
    }

    // ==========================================
    // HEADER SCROLL EFFECT
    // ==========================================
    
    function initHeaderScroll() {
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
    }

    // ==========================================
    // CARD ENTRANCE ANIMATION
    // ==========================================
    
    function animateCardsOnScroll() {
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0) rotateY(0)';
                    }, index * 100);
                    cardObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        });
        
        document.querySelectorAll('.flip-card-3d').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px) rotateY(-30deg)';
            card.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            cardObserver.observe(card);
        });
    }

    // ==========================================
    // GRADIENT TEXT ANIMATION
    // ==========================================
    
    function animateGradientText() {
        const gradientTexts = document.querySelectorAll('.gradient-word, .gradient-text-cta');
        
        gradientTexts.forEach(text => {
            let position = 0;
            setInterval(() => {
                position = (position + 1) % 200;
                text.style.backgroundPosition = `${position}% 50%`;
            }, 20);
        });
    }

    // ==========================================
    // MOBILE MENU
    // ==========================================
    
    function initMobileMenu() {
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.main-navigation').toggleClass('toggled');
        });
        
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length) {
                $('.main-navigation').removeClass('toggled');
                $('.menu-toggle').removeClass('active');
            }
        });
    }

    // ==========================================
    // STATS COUNTER ANIMATION
    // ==========================================
    
    function initStatsCounter() {
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.dataset.count);
                    
                    if (target && !counter.dataset.animated) {
                        counter.dataset.animated = 'true';
                        animateCounter($(counter), target);
                    }
                    
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        document.querySelectorAll('.stat-glass-number[data-count]').forEach(stat => {
            statsObserver.observe(stat);
        });
    }

    // ==========================================
    // CURSOR GLOW EFFECT
    // ==========================================
    
    function initCursorGlow() {
        if (window.innerWidth > 1024) {
            const cursorGlow = $('<div class="cursor-glow"></div>');
            $('body').append(cursorGlow);
            
            $(document).on('mousemove', function(e) {
                cursorGlow.css({
                    'left': e.clientX,
                    'top': e.clientY
                });
            });
            
            // Add cursor glow styles
            $('<style>')
                .text(`
                    .cursor-glow {
                        position: fixed;
                        width: 300px;
                        height: 300px;
                        border-radius: 50%;
                        background: radial-gradient(circle, rgba(124, 58, 237, 0.15) 0%, transparent 70%);
                        pointer-events: none;
                        z-index: 9999;
                        transform: translate(-50%, -50%);
                        transition: all 0.3s ease;
                        mix-blend-mode: screen;
                    }
                `)
                .appendTo('head');
        }
    }

    // ==========================================
    // FORM VALIDATION
    // ==========================================
    
    function initFormValidation() {
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
            }
        });
        
        $('input, textarea').on('input', function() {
            $(this).removeClass('error');
        });
    }

    // ==========================================
    // LAZY LOADING
    // ==========================================
    
    function initLazyLoading() {
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
    }

    // ==========================================
    // PRELOADER
    // ==========================================
    
    function initPreloader() {
        const preloader = $(`
            <div class="preloader-glass">
                <div class="preloader-content">
                    <div class="spinner-glass">
                        <div class="spinner-ring"></div>
                        <div class="spinner-ring"></div>
                        <div class="spinner-ring"></div>
                    </div>
                    <div class="loading-text">Loading Experience...</div>
                </div>
            </div>
        `);
        
        $('body').prepend(preloader);
        
        // Add preloader styles
        $('<style>')
            .text(`
                .preloader-glass {
                    position: fixed;
                    inset: 0;
                    background: linear-gradient(135deg, #0a0a0a 0%, #1a0a2e 100%);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 99999;
                    transition: opacity 0.5s ease;
                }
                .preloader-content {
                    text-align: center;
                }
                .spinner-glass {
                    position: relative;
                    width: 100px;
                    height: 100px;
                    margin: 0 auto 30px;
                }
                .spinner-ring {
                    position: absolute;
                    inset: 0;
                    border: 3px solid transparent;
                    border-top-color: #7C3AED;
                    border-radius: 50%;
                    animation: spinnerRotate 1.5s linear infinite;
                }
                .spinner-ring:nth-child(2) {
                    inset: 10px;
                    border-top-color: #EC4899;
                    animation-duration: 2s;
                }
                .spinner-ring:nth-child(3) {
                    inset: 20px;
                    border-top-color: #06B6D4;
                    animation-duration: 2.5s;
                }
                @keyframes spinnerRotate {
                    to { transform: rotate(360deg); }
                }
                .loading-text {
                    color: rgba(255, 255, 255, 0.7);
                    font-size: 16px;
                    font-weight: 600;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                }
            `)
            .appendTo('head');
        
        $(window).on('load', function() {
            setTimeout(() => {
                preloader.fadeOut(500, function() {
                    $(this).remove();
                });
            }, 800);
        });
    }

    // ==========================================
    // INITIALIZE ALL
    // ==========================================
    
    $(document).ready(function() {
        // Initialize particle system
        new ParticleSystem();
        
        // Initialize scroll animations
        new ScrollAnimations();
        
        // Initialize all features
        init3DCardTilt();
        initGlassMorphismHover();
        initMagneticButtons();
        initParallaxScroll();
        initSmoothScroll();
        initHeaderScroll();
        animateCardsOnScroll();
        animateGradientText();
        initMobileMenu();
        initStatsCounter();
        initCursorGlow();
        initFormValidation();
        initLazyLoading();
        initPreloader();
    });

})(jQuery);
