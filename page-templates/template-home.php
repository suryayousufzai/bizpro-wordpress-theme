<?php
/**
 * Template Name: Homepage
 * 
 * @package BizPro
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-background">
        <div class="hero-gradient"></div>
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>
    
    <div class="container">
        <div class="hero-content">
            <span class="hero-label">Welcome to BizPro</span>
            <h1 class="hero-title">
                We Create<br>
                <span class="gradient-text">Amazing Digital</span><br>
                Experiences
            </h1>
            <p class="hero-description">
                Transform your business with cutting-edge solutions.<br>
                Beautiful design meets powerful functionality.
            </p>
            <div class="hero-buttons">
                <a href="#services" class="btn btn-primary">Get Started</a>
                <a href="#portfolio" class="btn btn-secondary">View Work</a>
            </div>
        </div>
    </div>
    
    <div class="scroll-indicator">
        <span>Scroll</span>
        <div class="mouse"></div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section section-padding">
    <div class="container">
        <div class="section-header">
            <span class="section-label">What We Do</span>
            <h2 class="section-title">Our Services</h2>
            <p class="section-description">
                Comprehensive solutions designed to elevate your business
            </p>
        </div>
        
        <div class="services-grid">
            <?php
            $services = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 6,
            ));
            
            if ($services->have_posts()) :
                $delay = 0;
                while ($services->have_posts()) : $services->the_post();
                    ?>
                    <div class="service-card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                <?php else : ?>
                                    <span class="default-icon">✨</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <a href="<?php the_permalink(); ?>" class="service-link">
                            Learn More <span>→</span>
                        </a>
                    </div>
                    <?php
                    $delay += 100;
                endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="no-content">
                    <p>No services found. Please add services to showcase your offerings.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Stats Section (Replacing About) -->
<section class="stats-section section-padding">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Why Choose Us</span>
            <h2 class="section-title">Trusted by Industry Leaders</h2>
            <p class="section-description">
                We deliver exceptional results that drive business growth
            </p>
        </div>
        
        <div class="stats-grid-large">
            <div class="stat-item" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-icon">📊</div>
                <div class="stat-number">500+</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">⭐</div>
                <div class="stat-number">98%</div>
                <div class="stat-label">Client Satisfaction</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">🏆</div>
                <div class="stat-number">15+</div>
                <div class="stat-label">Years Experience</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon">👥</div>
                <div class="stat-number">50+</div>
                <div class="stat-label">Team Members</div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio-section section-padding">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Work</span>
            <h2 class="section-title">Recent Projects</h2>
            <p class="section-description">
                Explore our latest creative projects
            </p>
        </div>
        
        <div class="portfolio-grid-modern">
            <?php
            $portfolio = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => 6,
            ));
            
            if ($portfolio->have_posts()) :
                $index = 0;
                while ($portfolio->have_posts()) : $portfolio->the_post();
                    $client = get_post_meta(get_the_ID(), '_portfolio_client', true);
                    ?>
                    <div class="portfolio-item-modern" data-aos="zoom-in" data-aos-delay="<?php echo ($index * 50); ?>">
                        <a href="<?php the_permalink(); ?>" class="portfolio-link">
                            <div class="portfolio-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <div class="placeholder-image">
                                        <span>📱</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="portfolio-overlay">
                                <div class="portfolio-info">
                                    <?php if ($client) : ?>
                                        <span class="portfolio-client"><?php echo esc_html($client); ?></span>
                                    <?php endif; ?>
                                    <h3><?php the_title(); ?></h3>
                                    <span class="view-project">View Project →</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $index++;
                endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="no-content">
                    <p>No portfolio items found. Add your projects to showcase your work.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section section-padding">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Team</span>
            <h2 class="section-title">Meet The Experts</h2>
            <p class="section-description">
                Talented individuals driving innovation
            </p>
        </div>
        
        <div class="team-grid-modern">
            <?php
            $team = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page' => 4,
            ));
            
            if ($team->have_posts()) :
                $delay = 0;
                while ($team->have_posts()) : $team->the_post();
                    $position = get_post_meta(get_the_ID(), '_team_position', true);
                    $linkedin = get_post_meta(get_the_ID(), '_team_linkedin', true);
                    $twitter = get_post_meta(get_the_ID(), '_team_twitter', true);
                    ?>
                    <div class="team-member-modern" data-aos="flip-left" data-aos-delay="<?php echo $delay; ?>">
                        <div class="member-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <div class="placeholder-image">
                                    <span>👤</span>
                                </div>
                            <?php endif; ?>
                            <div class="member-overlay">
                                <div class="social-links">
                                    <?php if ($linkedin) : ?>
                                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener">
                                            <span>in</span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($twitter) : ?>
                                        <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener">
                                            <span>tw</span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="member-info">
                            <h3><?php the_title(); ?></h3>
                            <?php if ($position) : ?>
                                <span class="member-position"><?php echo esc_html($position); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    $delay += 100;
                endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="no-content-team">
                    <p style="text-align: center; color: var(--text-gray); grid-column: 1 / -1;">
                        <!-- Team section will appear here when team members are added -->
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="zoom-in">
            <h2>Ready to Start Your Project?</h2>
            <p>Let's create something amazing together</p>
            <a href="#contact" class="btn btn-white">Get Started Now</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
