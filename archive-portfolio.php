<?php
/**
 * Portfolio Archive Template - Responsive Grid
 * 
 * This template displays all portfolio items in a responsive grid
 * Desktop: 3 columns | Tablet: 2 columns | Mobile: 1 column
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="portfolio-archive-premium">
    
    <!-- Hero Section with Gradient Orbs -->
    <section class="portfolio-hero">
        <div class="portfolio-hero-background">
            <div class="gradient-orb orb-1"></div>
            <div class="gradient-orb orb-2"></div>
            <div class="gradient-orb orb-3"></div>
        </div>
        
        <div class="container">
            <div class="portfolio-hero-content">
                <span class="hero-badge">
                    <span class="badge-icon">🎨</span>
                    Our Portfolio
                </span>
                <h1 class="portfolio-hero-title">
                    Exceptional Work<br>
                    That <span class="gradient-text-portfolio">Drives Results</span>
                </h1>
                <p class="portfolio-hero-description">
                    Explore our collection of successful projects and see how we've helped businesses thrive
                </p>
            </div>
        </div>
        
        <div class="scroll-arrow">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 5v14m0 0l7-7m-7 7l-7-7" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section class="portfolio-grid-section">
        <div class="container">
            
            <div class="portfolio-premium-grid">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        // Get client name from different possible meta keys
                        $client = get_post_meta( get_the_ID(), '_portfolio_client', true );
                        if ( empty( $client ) ) {
                            $client = get_post_meta( get_the_ID(), 'client_name', true );
                        }
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-card-premium' ); ?>>
                            <a href="<?php the_permalink(); ?>" class="portfolio-card-link">
                                
                                <!-- Featured Image -->
                                <div class="portfolio-image-premium">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'large' ); ?>
                                    <?php else : ?>
                                        <div class="placeholder-portfolio">
                                            <svg width="120" height="120" viewBox="0 0 120 120" fill="none">
                                                <rect x="20" y="30" width="80" height="60" rx="4" stroke="currentColor" stroke-width="2"/>
                                                <circle cx="40" cy="50" r="8" fill="currentColor"/>
                                                <path d="M20 75l20-20 15 15 25-30 20 20v15H20z" fill="currentColor" opacity="0.3"/>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                    <div class="image-overlay"></div>
                                </div>

                                <!-- Portfolio Content -->
                                <div class="portfolio-content-premium">
                                    <?php if ( $client ) : ?>
                                    <span class="portfolio-client-premium">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                        <?php echo esc_html( $client ); ?>
                                    </span>
                                    <?php endif; ?>
                                    
                                    <h3 class="portfolio-title-premium">
                                        <?php the_title(); ?>
                                    </h3>

                                    <div class="portfolio-excerpt-premium">
                                        <?php 
                                        if ( has_excerpt() ) {
                                            echo wp_trim_words( get_the_excerpt(), 15, '...' );
                                        } else {
                                            echo wp_trim_words( get_the_content(), 15, '...' );
                                        }
                                        ?>
                                    </div>

                                    <div class="portfolio-link-premium">
                                        <span>View Project</span>
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12h14m0 0l-7-7m7 7l-7 7" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Hover Glow Effect -->
                                <div class="hover-glow"></div>
                                
                            </a>
                        </article>
                        <?php
                    endwhile;
                    
                    // Pagination
                    if ( get_query_var( 'paged' ) ) {
                        $paged = get_query_var( 'paged' );
                    } elseif ( get_query_var( 'page' ) ) {
                        $paged = get_query_var( 'page' );
                    } else {
                        $paged = 1;
                    }
                    
                    $total_pages = $wp_query->max_num_pages;
                    
                    if ( $total_pages > 1 ) : ?>
                    <div class="portfolio-pagination">
                        <?php
                        the_posts_pagination( array(
                            'prev_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M19 12H5m0 0l7 7m-7-7l7-7" stroke="currentColor" stroke-width="2"/></svg> Previous',
                            'next_text' => 'Next <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M5 12h14m0 0l-7-7m7 7l-7 7" stroke="currentColor" stroke-width="2"/></svg>',
                        ) );
                        ?>
                    </div>
                    <?php endif;
                    
                else :
                    ?>
                    <div class="no-portfolio-premium">
                        <div class="no-portfolio-icon">
                            <svg width="100" height="100" viewBox="0 0 100 100" fill="none">
                                <rect x="15" y="25" width="70" height="50" rx="4" stroke="currentColor" stroke-width="2"/>
                                <circle cx="35" cy="42" r="6" fill="currentColor"/>
                                <path d="M15 60l15-15 12 12 20-24 18 15v12H15z" fill="currentColor" opacity="0.3"/>
                            </svg>
                        </div>
                        <h2>No Projects Yet</h2>
                        <p>We're working on showcasing our amazing work. Check back soon!</p>
                    </div>
                    <?php
                endif;
                wp_reset_postdata();
                ?>
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="portfolio-cta">
        <div class="container">
            <div class="portfolio-cta-content">
                <h2>Like What You See?</h2>
                <p>Let's create something amazing together</p>
                <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn-cta-premium">
                    Start Your Project
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14m0 0l-7-7m7 7l-7 7" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
