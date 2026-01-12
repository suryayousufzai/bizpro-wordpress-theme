<?php
/**
 * Single Portfolio Template - Professional Layout
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="single-portfolio-premium">
    <?php
    while ( have_posts() ) : the_post();
        // Get custom fields
        $client = get_post_meta( get_the_ID(), '_portfolio_client', true );
        if ( empty( $client ) ) {
            $client = get_post_meta( get_the_ID(), 'client_name', true );
        }
        $url = get_post_meta( get_the_ID(), '_portfolio_url', true );
        if ( empty( $url ) ) {
            $url = get_post_meta( get_the_ID(), 'project_url', true );
        }
        $date = get_post_meta( get_the_ID(), '_portfolio_date', true );
        if ( empty( $date ) ) {
            $date = get_post_meta( get_the_ID(), 'completion_date', true );
        }
        $categories = get_the_terms( get_the_ID(), 'portfolio_category' );
        ?>

        <!-- Hero Section -->
        <section class="single-portfolio-hero">
            <div class="single-portfolio-hero-background"></div>
            
            <div class="container">
                <div class="single-portfolio-hero-content">
                    
                    <!-- Breadcrumbs -->
                    <div class="breadcrumbs">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        <span class="separator">/</span>
                        <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>">Portfolio</a>
                        <span class="separator">/</span>
                        <span class="current"><?php the_title(); ?></span>
                    </div>

                    <div class="hero-content-grid">
                        <div class="hero-text">
                            <?php if ( $client ) : ?>
                            <span class="portfolio-client-badge">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <?php echo esc_html( $client ); ?>
                            </span>
                            <?php endif; ?>

                            <h1 class="single-portfolio-title"><?php the_title(); ?></h1>

                            <div class="portfolio-meta-info">
                                <?php if ( $date ) : ?>
                                <div class="meta-item">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2"/>
                                        <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2"/>
                                        <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                    <span><?php echo esc_html( date( 'F Y', strtotime( $date ) ) ); ?></span>
                                </div>
                                <?php endif; ?>

                                <?php if ( $categories && ! is_wp_error( $categories ) ) : ?>
                                <div class="meta-item">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z" stroke="currentColor" stroke-width="2"/>
                                        <line x1="7" y1="7" x2="7.01" y2="7" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                    <span>
                                        <?php
                                        $cat_names = array();
                                        foreach ( $categories as $category ) {
                                            $cat_names[] = $category->name;
                                        }
                                        echo implode( ', ', $cat_names );
                                        ?>
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="hero-portfolio-image-container">
                            <div class="portfolio-image-frame">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'large' ); ?>
                                <?php else : ?>
                                    <div class="placeholder-portfolio-single">
                                        <svg width="200" height="200" viewBox="0 0 200 200" fill="none">
                                            <rect x="30" y="50" width="140" height="100" rx="8" stroke="currentColor" stroke-width="4"/>
                                            <circle cx="70" cy="90" r="15" fill="currentColor"/>
                                            <path d="M30 120l35-35 25 25 40-50 40 30v30H30z" fill="currentColor" opacity="0.3"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="portfolio-image-glow"></div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Content Section -->
        <section class="single-portfolio-content">
            <div class="container">
                <div class="portfolio-content-wrapper">
                    
                    <!-- Main Content -->
                    <div class="portfolio-main-content">
                        <div class="content-inner">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="portfolio-sidebar">
                        
                        <!-- Project Details -->
                        <div class="sidebar-card">
                            <h3>Project Details</h3>
                            <div class="project-details-list">
                                
                                <?php if ( $client ) : ?>
                                <div class="detail-item">
                                    <div class="detail-label">Client</div>
                                    <div class="detail-value"><?php echo esc_html( $client ); ?></div>
                                </div>
                                <?php endif; ?>

                                <?php if ( $date ) : ?>
                                <div class="detail-item">
                                    <div class="detail-label">Completed</div>
                                    <div class="detail-value"><?php echo esc_html( date( 'F Y', strtotime( $date ) ) ); ?></div>
                                </div>
                                <?php endif; ?>

                                <?php if ( $categories && ! is_wp_error( $categories ) ) : ?>
                                <div class="detail-item">
                                    <div class="detail-label">Category</div>
                                    <div class="detail-value">
                                        <?php
                                        $cat_names = array();
                                        foreach ( $categories as $category ) {
                                            $cat_names[] = $category->name;
                                        }
                                        echo implode( ', ', $cat_names );
                                        ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if ( $url ) : ?>
                                <div class="detail-item">
                                    <div class="detail-label">Website</div>
                                    <div class="detail-value">
                                        <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener">
                                            Visit Site
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>

                        <!-- CTA Card -->
                        <div class="sidebar-card cta-card">
                            <div class="cta-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <h3>Start Your Project</h3>
                            <p>Have a similar project in mind? Let's discuss how we can help you achieve your goals.</p>
                            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn-sidebar">
                                Get In Touch
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12h14m0 0l-7-7m7 7l-7 7" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </a>
                        </div>

                    </aside>

                </div>
            </div>
        </section>

        <!-- Related Projects -->
        <?php
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => 3,
            'post__not_in' => array( get_the_ID() ),
            'orderby' => 'rand',
        );
        $related = new WP_Query( $args );
        
        if ( $related->have_posts() ) : ?>
        <section class="related-portfolio">
            <div class="container">
                <div class="section-header-related">
                    <h2>Related Projects</h2>
                    <p>Check out more of our work</p>
                </div>

                <div class="related-portfolio-grid">
                    <?php while ( $related->have_posts() ) : $related->the_post(); 
                        $rel_client = get_post_meta( get_the_ID(), '_portfolio_client', true );
                        if ( empty( $rel_client ) ) {
                            $rel_client = get_post_meta( get_the_ID(), 'client_name', true );
                        }
                    ?>
                    <article class="related-portfolio-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="related-portfolio-image">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                <?php else : ?>
                                    <div class="placeholder-portfolio">
                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                                            <rect x="10" y="15" width="60" height="50" rx="4" stroke="currentColor" stroke-width="2"/>
                                            <circle cx="28" cy="32" r="5" fill="currentColor"/>
                                            <path d="M10 48l12-12 10 10 18-22 15 12v12H10z" fill="currentColor" opacity="0.3"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                <div class="related-image-overlay"></div>
                            </div>
                            <div class="related-portfolio-content">
                                <?php if ( $rel_client ) : ?>
                                    <span class="related-client"><?php echo esc_html( $rel_client ); ?></span>
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                                <div class="related-link-text">
                                    <span>View Project</span>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12h14m0 0l-7-7m7 7l-7 7" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Back to Portfolio -->
        <section class="back-to-portfolio">
            <div class="container">
                <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>" class="btn-back">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M19 12H5m0 0l7 7m-7-7l7-7" stroke="currentColor" stroke-width="2"/>
                    </svg>
                    Back to Portfolio
                </a>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
