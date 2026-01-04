<?php
/**
 * Single Team Member Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main single-team">
    <div class="container">
        <?php
        while ( have_posts() ) : the_post();
            $position = get_post_meta( get_the_ID(), '_team_position', true );
            $email = get_post_meta( get_the_ID(), '_team_email', true );
            $phone = get_post_meta( get_the_ID(), '_team_phone', true );
            $linkedin = get_post_meta( get_the_ID(), '_team_linkedin', true );
            $twitter = get_post_meta( get_the_ID(), '_team_twitter', true );
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php if ( $position ) : ?>
                        <p class="team-position"><?php echo esc_html( $position ); ?></p>
                    <?php endif; ?>
                </header>

                <div class="team-meta">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $email ) : ?>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                    <?php endif; ?>

                    <?php if ( $phone ) : ?>
                        <p><strong>Phone:</strong> <?php echo esc_html( $phone ); ?></p>
                    <?php endif; ?>

                    <?php if ( $linkedin ) : ?>
                        <p><strong>LinkedIn:</strong> <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank">View Profile</a></p>
                    <?php endif; ?>

                    <?php if ( $twitter ) : ?>
                        <p><strong>Twitter:</strong> <a href="<?php echo esc_url( $twitter ); ?>" target="_blank">Follow</a></p>
                    <?php endif; ?>
                </div>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <a href="<?php echo get_post_type_archive_link( 'team' ); ?>" class="back-to-team">← Back to Team</a>
                </footer>

            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>