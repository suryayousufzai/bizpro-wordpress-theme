<?php
/**
 * Portfolio Archive Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main portfolio-archive">
    <div class="container">
        
        <header class="page-header">
            <h1 class="page-title">Our Portfolio</h1>
            <p>Showcasing our best work and successful projects</p>
        </header>

        <div class="portfolio-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    $client = get_post_meta( get_the_ID(), '_portfolio_client', true );
                    $url = get_post_meta( get_the_ID(), '_portfolio_url', true );
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-item' ); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="portfolio-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="portfolio-details">
                            <h3 class="portfolio-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <?php if ( $client ) : ?>
                                <p class="portfolio-client">Client: <?php echo esc_html( $client ); ?></p>
                            <?php endif; ?>

                            <div class="portfolio-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <?php if ( $url ) : ?>
                                <a href="<?php echo esc_url( $url ); ?>" class="btn-view-project" target="_blank">View Project →</a>
                            <?php endif; ?>
                        </div>

                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <p>No portfolio items found.</p>
                <?php
            endif;
            ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>