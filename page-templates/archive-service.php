<?php
/**
 * Services Archive Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main services-archive">
    <div class="container">
        
        <header class="page-header">
            <h1 class="page-title">Our Services</h1>
            <p>Comprehensive solutions for your business needs</p>
        </header>

        <div class="services-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'service-card' ); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="service-icon">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="service-content">
                            <h2 class="service-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="service-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn-learn-more">Learn More →</a>
                        </div>

                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <p>No services found.</p>
                <?php
            endif;
            ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>