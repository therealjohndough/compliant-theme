<?php
/**
 * Template Name: Products Page
 *
 * @package Compliant_Theme
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="page-header" data-sal="fade-in" data-sal-duration="1200">
        <div class="container">
            <h1><?php echo esc_html(get_theme_mod('ny_products_page_title', 'Our Full Catalog')); ?></h1>
        </div>
    </div>
    
    <div class="products-section page-version">
        <div class="container">
             <div class="product-grid">
                <?php for ($i = 1; $i <= 8; $i++): 
                    $title = get_theme_mod("ny_prod_page_item_{$i}_title");
                    $image_url = get_theme_mod("ny_prod_page_item_{$i}_image_url");
                    
                    if (!empty($title)): // Only show the card if it has a title
                ?>
                <div class="product-card" data-sal="slide-up" data-sal-duration="600" data-sal-delay="<?php echo (($i - 1) % 4) * 100; ?>">
                    
                    <div class="product-card-image">
                        <?php if ( ! empty($image_url) ) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
                        <?php else: // --- THE SMART FALLBACK LOGIC --- ?>
                            <img src="https://source.unsplash.com/300x300/?<?php echo urlencode($title . ' plant'); ?>" alt="Placeholder image for <?php echo esc_attr($title); ?>">
                        <?php endif; ?>
                    </div>

                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html(get_theme_mod("ny_prod_page_item_{$i}_desc")); ?></p>
                </div>
                <?php 
                    endif;
                endfor; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
