<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <div class="footer-widget">
                <h3>About BizPro</h3>
                <p>Professional business solutions for modern companies.</p>
            </div>
            <div class="footer-widget">
                <h3>Quick Links</h3>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'menu_id'        => 'footer-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ) );
                ?>
            </div>
            <div class="footer-widget">
                <h3>Contact</h3>
                <p>Email: surya.yousufzai@auaf.edu.af<br>
                Phone: +41 762 322 97</p>
            </div>
        </div>
        
        <div class="site-info">
            <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
            <p>Powered by <a href="<?php echo esc_url( __( 'https://wordpress.org/' ) ); ?>">WordPress</a> | 
            Theme: BizPro by <a href="#">Surya Yousufzai</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>