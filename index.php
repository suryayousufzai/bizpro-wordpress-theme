<?php
/**
 * The main template file
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main">
    <div class="container">
        <h1>Welcome to BizPro Theme!</h1>
        <p>Your professional business WordPress theme is now active.</p>
        
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <p>No content found. Start creating your posts!</p>
            <?php
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>