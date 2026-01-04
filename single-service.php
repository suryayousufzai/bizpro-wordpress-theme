<?php
/**
 * Single Service Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main single-service">
    <div class="container">
        <?php
        while ( have_posts() ) : the_post();
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

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <a href="<?php echo get_post_type_archive_link( 'service' ); ?>" class="back-to-services">← Back to All Services</a>
                </footer>

            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>