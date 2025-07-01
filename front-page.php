<?php get_header(); ?>

<main id="main" class="site-main">

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <h1><?php echo esc_html(get_theme_mod('ny_hero_title', 'Default Title')); ?></h1>
            <p class="tagline"><?php echo esc_html(get_theme_mod('ny_hero_tagline', 'Default tagline.')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('ny_hero_button_url', '#')); ?>" class="cta-button">
                <?php echo esc_html(get_theme_mod('ny_hero_button_text', 'Find Our Products')); ?>
                <i data-lucide="arrow-right" class="icon-right"></i>
            </a>
        </div>
    </section>
    
    <!-- FEATURED PRODUCTS SECTION -->
    <section class="products-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo esc_html(get_theme_mod('ny_products_title', 'Featured Strains')); ?></h2>
            </div>
            
            <div class="product-grid">
                <!-- Product Card 1 -->
                <div class="product-card">
                    <i data-lucide="<?php echo esc_attr(get_theme_mod('ny_product_1_icon', 'cannabis')); ?>"></i>
                    <h3><?php echo esc_html(get_theme_mod('ny_product_1_title', 'Product 1')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('ny_product_1_desc', 'Description for product 1.')); ?></p>
                </div>
                
                <!-- Product Card 2 -->
                <div class="product-card">
                    <i data-lucide="<?php echo esc_attr(get_theme_mod('ny_product_2_icon', 'sparkles')); ?>"></i>
                    <h3><?php echo esc_html(get_theme_mod('ny_product_2_title', 'Product 2')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('ny_product_2_desc', 'Description for product 2.')); ?></p>
                </div>
                
                <!-- Product Card 3 -->
                <div class="product-card">
                    <i data-lucide="<?php echo esc_attr(get_theme_mod('ny_product_3_icon', 'sun')); ?>"></i>
                    <h3><?php echo esc_html(get_theme_mod('ny_product_3_title', 'Product 3')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('ny_product_3_desc', 'Description for product 3.')); ?></p>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>