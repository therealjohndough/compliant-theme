<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="social-links">
                <?php if ($url = get_theme_mod('social_twitter_url')): ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank"><i data-lucide="twitter"></i></a>
                <?php endif; ?>
                <?php if ($url = get_theme_mod('social_instagram_url')): ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank"><i data-lucide="instagram"></i></a>
                <?php endif; ?>
                <?php if ($url = get_theme_mod('social_linkedin_url')): ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank"><i data-lucide="linkedin"></i></a>
                <?php endif; ?>
            </div>
            
            <div class="compliance-info">
                <p><?php echo esc_html(get_theme_mod('ny_health_warning')); ?></p>
                <p><strong><?php echo esc_html(get_theme_mod('ny_rotating_warning')); ?></strong></p>
                <p><?php echo esc_html(get_theme_mod('ny_hopeline_info')); ?></p>
                <p><?php echo esc_html(get_theme_mod('ny_licensee_info')); ?></p>
            </div>
    
            <div class="copyright-info">
                <p><?php echo esc_html(get_theme_mod('ny_copyright_text')); ?></p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
