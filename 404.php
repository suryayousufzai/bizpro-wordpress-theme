<?php
/**
 * 404 Error Page Template
 *
 * @package BizPro
 */

get_header(); ?>

<main id="main-content" class="site-main error-404">
    <div class="container">
        <div class="error-content">
            <h1 class="page-title">404</h1>
            <h2>Page Not Found</h2>
            <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button">Go to Homepage</a>

            <div class="search-form">
                <h3>Try Searching:</h3>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>