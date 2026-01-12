<?php
/**
 * Template Name: Services Archive
 * 
 * Services Archive - Gradient Wave Design
 * THIS VERSION INCLUDES INLINE CSS AS BACKUP
 *
 * @package BizPro
 */

get_header(); ?>

<!-- Inline CSS Backup - Remove after external CSS loads -->
<style>
/* Quick Fix Styles */
.services-gradient-wave {
    background: linear-gradient(180deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
    min-height: 100vh;
}
.wave-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 30px;
    padding: 40px 0;
}
.wave-service-card {
    background: rgba(20, 20, 40, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(124, 58, 237, 0.2);
    border-radius: 24px;
    padding: 40px 30px;
    text-align: center;
}
.icon-image, .icon-default {
    width: 100px !important;
    height: 100px !important;
    margin: 0 auto 20px;
    border-radius: 20px;
    overflow: hidden;
}
.icon-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}
.service-title-wave a {
    color: #fff;
    text-decoration: none;
    font-size: 24px;
    font-weight: 700;
}
.service-excerpt-wave {
    color: #A1A1AA;
    font-size: 15px;
    margin: 15px 0;
}
.wave-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 28px;
    background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
    color: #fff !important;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    margin-top: 15px;
}
.hero-title-wave {
    font-size: clamp(42px, 7vw, 72px);
    font-weight: 900;
    color: #fff;
    text-align: center;
    padding: 100px 0 50px;
}
.gradient-word {
    background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
@media (max-width: 768px) {
    .wave-cards-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<main id="main-content" class="services-gradient-wave">
    
    <!-- Hero Section -->
    <section class="wave-hero">
        <div class="container">
            <div class="hero-content-wave">
                <h1 class="hero-title-wave">
                    Our <span class="gradient-word">Services</span>
                </h1>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-wave-grid">
        <div class="container">
            
            <?php
            // Query services
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $services_query = new WP_Query($args);
            
            if ( $services_query->have_posts() ) : ?>
                
                <div class="wave-cards-grid">
                    <?php
                    $count = 0;
                    while ( $services_query->have_posts() ) : $services_query->the_post();
                        $count++;
                        ?>
                        
                        <article class="wave-service-card">
                            
                            <!-- Service Number Badge -->
                            <div class="service-badge-number" style="position: absolute; top: 20px; right: 20px; width: 50px; height: 50px; background: linear-gradient(135deg, #7C3AED 0%, #EC4899 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; color: #fff;">
                                <?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?>
                            </div>
                            
                            <!-- Service Icon -->
                            <div class="service-icon-box" style="margin-bottom: 20px;">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="icon-image">
                                        <?php the_post_thumbnail( 'thumbnail' ); ?>
                                    </div>
                                <?php else : ?>
                                    <div class="icon-default" style="background: rgba(124, 58, 237, 0.2); border: 2px solid rgba(124, 58, 237, 0.3); display: flex; align-items: center; justify-content: center;">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                                            <rect x="8" y="8" width="32" height="32" rx="4" stroke="#A78BFA" stroke-width="2"/>
                                            <path d="M16 24h16M24 16v16" stroke="#A78BFA" stroke-width="2"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Service Content -->
                            <div class="service-content-box">
                                
                                <h3 class="service-title-wave">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <p class="service-excerpt-wave">
                                    <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?>
                                </p>
                                
                                <!-- CTA Button -->
                                <a href="<?php the_permalink(); ?>" class="wave-btn">
                                    <span class="btn-text">View Details</span>
                                    <span class="btn-icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M4 10h12m0 0l-4-4m4 4l-4 4" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                    </span>
                                </a>
                                
                            </div>
                            
                        </article>
                        
                    <?php endwhile; ?>
                </div>
                
            <?php else : ?>
                
                <!-- Empty State -->
                <div class="wave-empty-state" style="text-align: center; padding: 100px 20px;">
                    <h3 style="color: #fff; font-size: 32px; margin-bottom: 15px;">No Services Yet</h3>
                    <p style="color: #A1A1AA; font-size: 18px;">Services will appear here once they're published</p>
                </div>
                
            <?php endif; 
            wp_reset_postdata();
            ?>
            
        </div>
    </section>

</main>

<?php get_footer(); ?>
