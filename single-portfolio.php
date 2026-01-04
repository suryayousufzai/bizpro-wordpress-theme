<?php
/**
 * Single Portfolio Item Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main single-portfolio">
    <div class="container">
        <?php
        while ( have_posts() ) : the_post();
            $client = get_post_meta( get_the_ID(), '_portfolio_client', true );
            $url = get_post_meta( get_the_ID(), '_portfolio_url', true );
            $date = get_post_meta( get_the_ID(), '_portfolio_date', true );
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="portfolio-meta">
                    <?php if ( $client ) : ?>
                        <p><strong>Client:</strong> <?php echo esc_html( $client ); ?></p>
                    <?php endif; ?>

                    <?php if ( $date ) : ?>
                        <p><strong>Completed:</strong> <?php echo esc_html( date( 'F Y', strtotime( $date ) ) ); ?></p>
                    <?php endif; ?>

                    <?php if ( $url ) : ?>
                        <p><strong>Project URL:</strong> <a href="<?php echo esc_url( $url ); ?>" target="_blank"><?php echo esc_html( $url ); ?></a></p>
                    <?php endif; ?>

                    <?php
                    $categories = get_the_terms( get_the_ID(), 'portfolio_category' );
                    if ( $categories && ! is_wp_error( $categories ) ) :
                        ?>
                        <p><strong>Categories:</strong> 
                        <?php
                        $cat_names = array();
                        foreach ( $categories as $category ) {
                            $cat_names[] = $category->name;
                        }
                        echo implode( ', ', $cat_names );
                        ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>" class="back-to-portfolio">← Back to Portfolio</a>
                </footer>

            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>