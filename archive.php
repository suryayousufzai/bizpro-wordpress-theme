<?php
/**
 * Archive Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main archive-page">
    <div class="container">
        
        <header class="page-header">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header>

        <div class="posts-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="entry-meta">
                                <span class="posted-on"><?php echo get_the_date(); ?></span>
                                <span class="byline">by <?php the_author(); ?></span>
                            </div>

                            <div class="entry-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
                        </div>

                    </article>
                    <?php
                endwhile;

                // Pagination
                the_posts_pagination( array(
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                ) );

            else :
                ?>
                <p>No posts found.</p>
                <?php
            endif;
            ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>