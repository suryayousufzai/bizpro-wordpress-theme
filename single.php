<?php
/**
 * Single Post Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main single-post">
    <div class="container">
        <?php
        while ( have_posts() ) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    
                    <div class="entry-meta">
                        <span class="posted-on">
                            <time datetime="<?php echo get_the_date( 'c' ); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </span>
                        <span class="byline">
                            by <?php the_author(); ?>
                        </span>
                        <span class="categories">
                            <?php the_category( ', ' ); ?>
                        </span>
                    </div>
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
                    <?php
                    the_tags( '<div class="tags-links">Tags: ', ', ', '</div>' );
                    ?>
                </footer>

            </article>

            <?php
            // Comments
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

            // Post navigation
            the_post_navigation( array(
                'prev_text' => '← Previous Post',
                'next_text' => 'Next Post →',
            ) );

        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>