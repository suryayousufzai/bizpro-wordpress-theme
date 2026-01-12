<?php
/**
 * Single Service Template - Gradient Wave Design
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="single-service-wave">

    <?php while ( have_posts() ) : the_post(); ?>

    <!-- Wave Background -->
    <div class="wave-background">
        <svg class="wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path class="wave-path wave-1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
    </div>

    <!-- Hero Section -->
    <section class="single-wave-hero">
        <div class="container">
            
            <!-- Breadcrumbs -->
            <nav class="breadcrumbs-wave animate-fade-up">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span>→</span>
                <a href="<?php echo get_post_type_archive_link('service'); ?>">Services</a>
                <span>→</span>
                <span><?php the_title(); ?></span>
            </nav>
            
            <div class="single-hero-grid">
                
                <!-- Left Content -->
                <div class="hero-left animate-fade-up" style="animation-delay: 0.2s">
                    
                    <div class="service-badge-single">
                        <span class="badge-dot"></span>
                        <span>Premium Service</span>
                    </div>
                    
                    <h1 class="single-title-wave">
                        <?php the_title(); ?>
                    </h1>
                    
                    <p class="single-excerpt">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                    
                    <div class="single-meta-grid">
                        <div class="meta-box-wave">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 7v5l3 3" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <div class="meta-content">
                                <div class="meta-label">Delivery</div>
                                <div class="meta-value">2-4 Weeks</div>
                            </div>
                        </div>
                        <div class="meta-box-wave">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <div class="meta-content">
                                <div class="meta-label">Quality</div>
                                <div class="meta-value">Premium</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="hero-actions">
                        <a href="#contact" class="btn-wave-primary">
                            <span>Get Started</span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </a>
                        <a href="#details" class="btn-wave-secondary">
                            <span>View Details</span>
                        </a>
                    </div>
                    
                </div>
                
                <!-- Right Image -->
                <div class="hero-right animate-fade-up" style="animation-delay: 0.4s">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="featured-image-wave">
                        <?php the_post_thumbnail( 'large' ); ?>
                        <div class="image-glow-effect"></div>
                    </div>
                    <?php else : ?>
                    <div class="placeholder-single">
                        <svg width="200" height="200" viewBox="0 0 200 200" fill="none">
                            <rect x="40" y="40" width="120" height="120" rx="20" stroke="currentColor" stroke-width="3"/>
                            <circle cx="100" cy="100" r="30" stroke="currentColor" stroke-width="3"/>
                        </svg>
                    </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="single-content-wave" id="details">
        <div class="container">
            <div class="content-layout-wave">
                
                <!-- Main Content -->
                <div class="main-content-wave animate-fade-up">
                    <div class="content-box-wave">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <aside class="sidebar-wave animate-fade-up" style="animation-delay: 0.2s">
                    
                    <!-- Features Card -->
                    <div class="sidebar-card-wave">
                        <h3>Key Features</h3>
                        <ul class="features-list-wave">
                            <li>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M4 10l4 4L16 6" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <span>Professional Quality</span>
                            </li>
                            <li>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M4 10l4 4L16 6" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <span>Fast Delivery</span>
                            </li>
                            <li>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M4 10l4 4L16 6" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <span>24/7 Support</span>
                            </li>
                            <li>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M4 10l4 4L16 6" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <span>Money-Back Guarantee</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Pricing Card -->
                    <div class="sidebar-card-wave pricing-card-wave">
                        <div class="pricing-badge-top">Best Value</div>
                        <div class="pricing-amount-wave">
                            <span class="currency">$</span>
                            <span class="price">999</span>
                            <span class="period">/project</span>
                        </div>
                        <p class="pricing-desc">Complete package with everything included</p>
                        <a href="#contact" class="btn-pricing-wave">
                            <span>Request Quote</span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Contact Card -->
                    <div class="sidebar-card-wave contact-card-wave">
                        <div class="contact-icon-wave">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3>Need Assistance?</h3>
                        <p>Our team is here to help you</p>
                        <a href="#contact" class="btn-contact-wave">Contact Us</a>
                    </div>
                    
                </aside>
                
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <?php
    $related = new WP_Query(array(
        'post_type' => 'service',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'rand'
    ));
    
    if ($related->have_posts()) : ?>
    <section class="related-wave-section">
        <div class="container">
            
            <div class="related-header animate-fade-up">
                <h2>Related Services</h2>
                <p>Explore more solutions</p>
            </div>
            
            <div class="related-wave-grid">
                <?php while ($related->have_posts()) : $related->the_post(); ?>
                <article class="related-wave-card animate-slide-up">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="related-image-wave">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="related-content-wave">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 12); ?></p>
                        <a href="<?php the_permalink(); ?>" class="related-link-wave">
                            <span>View Service</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M3 8h10m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            
        </div>
    </section>
    <?php endif; ?>

    <!-- Back Button -->
    <section class="back-section-wave">
        <div class="container">
            <a href="<?php echo get_post_type_archive_link('service'); ?>" class="btn-back-wave animate-fade-up">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M16 10H4m0 0l4-4m-4 4l4 4" stroke="currentColor" stroke-width="2"/>
                </svg>
                <span>Back to Services</span>
            </a>
        </div>
    </section>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>