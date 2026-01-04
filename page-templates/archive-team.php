<?php
/**
 * Team Archive Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main team-archive">
    <div class="container">
        
        <header class="page-header">
            <h1 class="page-title">Meet Our Team</h1>
            <p>Talented professionals dedicated to your success</p>
        </header>

        <div class="team-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    $position = get_post_meta( get_the_ID(), '_team_position', true );
                    $email = get_post_meta( get_the_ID(), '_team_email', true );
                    $linkedin = get_post_meta( get_the_ID(), '_team_linkedin', true );
                    $twitter = get_post_meta( get_the_ID(), '_team_twitter', true );
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'team-card' ); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="team-photo">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="team-info">
                            <h3 class="team-name"><?php the_title(); ?></h3>
                            
                            <?php if ( $position ) : ?>
                                <p class="team-position"><?php echo esc_html( $position ); ?></p>
                            <?php endif; ?>

                            <div class="team-bio">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="team-social">
                                <?php if ( $email ) : ?>
                                    <a href="mailto:<?php echo esc_attr( $email ); ?>">Email</a>
                                <?php endif; ?>
                                
                                <?php if ( $linkedin ) : ?>
                                    <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank">LinkedIn</a>
                                <?php endif; ?>
                                
                                <?php if ( $twitter ) : ?>
                                    <a href="<?php echo esc_url( $twitter ); ?>" target="_blank">Twitter</a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <p>No team members found.</p>
                <?php
            endif;
            ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>