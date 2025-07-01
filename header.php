<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php 
    $skin_name = str_replace('.css', '', get_theme_mod('theme_style_selector', 'futuristic-glow.css'));
    body_class('skin-' . $skin_name); 
?>><?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php
            // Display the custom logo if it's set, otherwise display the site title.
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<a href="' . esc_url(home_url('/')) . '" rel="home" class="site-title">' . get_bloginfo('name') . '</a>';
            }
            ?>
        </div>

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <i data-lucide="menu" class="icon-menu"></i>
                <i data-lucide="x" class="icon-close"></i>
                <span class="screen-reader-text">Menu</span>
            </button>
            <?php
            // Display the "Primary Menu".
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
            ));
            ?>
        </nav>
    </div>
</header>
