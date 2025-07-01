<?php
/**
 * NY Cannabis Compliance Theme functions and definitions
 *
 * @package NY_Cannabis_Theme
 */

// Basic theme setup.
function ny_cannabis_theme_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'ny_cannabis_theme_setup');

/**
 * Enqueue styles and scripts.
 */
function ny_cannabis_theme_scripts() {
/**
 * Enqueue styles and scripts.
 */
function ny_cannabis_theme_scripts() {
    // --- Enqueue Google Fonts (Swapped Poppins for Inter) --- //
    // We're loading weights 400 (regular), 600 (semibold), 700 (bold), and 900 (black for headings)
    wp_enqueue_style('ny-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap', array(), null);

    // Get the selected theme style from the Customizer.
    $theme_style = get_theme_mod('theme_style_selector', 'futuristic-glow.css');
    $style_path = get_template_directory_uri() . '/styles/' . $theme_style;

    // Enqueue the chosen stylesheet, with Google Fonts as a dependency.
    wp_enqueue_style('ny-cannabis-theme-skin', $style_path, ['ny-google-fonts'], '1.0.0');
    
    // --- Enqueue Lucide Icons --- //
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest/dist/lucide.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'ny_cannabis_theme_scripts');

// (The rest of the functions.php file remains the same)
    // Get the selected theme style from the Customizer.
    $theme_style = get_theme_mod('theme_style_selector', 'default.css');
    $style_path = get_template_directory_uri() . '/styles/' . $theme_style;

    // Enqueue the chosen stylesheet, with Google Fonts as a dependency.
    wp_enqueue_style('ny-cannabis-theme-skin', $style_path, ['ny-google-fonts'], '1.0.0');
    
    // --- Enqueue Lucide Icons --- //
    // This lightweight script finds any `data-lucide` attribute and replaces it with an SVG icon.
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest/dist/lucide.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'ny_cannabis_theme_scripts');

/**
 * A helper script to run the icon replacement function after the page loads.
 */
function ny_cannabis_footer_scripts() {
    echo '<script>lucide.createIcons();</script>';
}
add_action('wp_footer', 'ny_cannabis_footer_scripts');


/**
 * Register all theme settings for the WordPress Customizer.
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function ny_cannabis_customize_register($wp_customize) {

    // --- Theme Style Selector --- //
    $wp_customize->add_section('ny_theme_style_section', [ /* ... previous code ... */ ]);
    $wp_customize->add_setting('theme_style_selector', [ /* ... previous code ... */ ]);
    $wp_customize->add_control('theme_style_selector', [
        'label'   => __('Choose a Visual Style', 'ny-cannabis-theme'),
        'section' => 'ny_theme_style_section',
        'type'    => 'select',
        'choices' => [
            'default.css'          => __('Default Light', 'ny-cannabis-theme'),
            'futuristic-glow.css'  => __('Futuristic Glow (Dark)', 'ny-cannabis-theme'),
        ],
    ]);

    // --- Hero Section --- //
    $wp_customize->add_section('ny_hero_section', [ /* ... previous code ... */ ]);
    $wp_customize->add_setting('ny_hero_title', [ /* ... previous code ... */ ]);
    $wp_customize->add_control('ny_hero_title', [ /* ... previous code ... */ ]);
    // (All other Hero and About controls remain the same...)


    // --- Featured Products Section --- //
    $wp_customize->add_section('ny_products_section', array(
        'title'      => __('Featured Products', 'ny-cannabis-theme'),
        'priority'   => 50,
    ));

    // Section Title
    $wp_customize->add_setting('ny_products_title', array('default' => 'Our Featured Strains'));
    $wp_customize->add_control('ny_products_title', array('label' => 'Section Title', 'section' => 'ny_products_section', 'type' => 'text'));

    // --- Product Card 1 --- //
    $wp_customize->add_setting('ny_product_1_icon', array('default' => 'cannabis'));
    $wp_customize->add_control('ny_product_1_icon', array('label' => 'Product 1 Icon', 'section' => 'ny_products_section', 'type' => 'text', 'description' => 'Find icon names at lucide.dev'));
    $wp_customize->add_setting('ny_product_1_title', array('default' => 'Cosmic Dream'));
    $wp_customize->add_control('ny_product_1_title', array('label' => 'Product 1 Title', 'section' => 'ny_products_section', 'type' => 'text'));
    $wp_customize->add_setting('ny_product_1_desc', array('default' => 'A balanced hybrid known for its creative and euphoric effects.'));
    $wp_customize->add_control('ny_product_1_desc', array('label' => 'Product 1 Description', 'section' => 'ny_products_section', 'type' => 'textarea'));
    
    // --- Product Card 2 --- //
    $wp_customize->add_setting('ny_product_2_icon', array('default' => 'sparkles'));
    $wp_customize->add_control('ny_product_2_icon', array('label' => 'Product 2 Icon', 'section' => 'ny_products_section', 'type' => 'text'));
    $wp_customize->add_setting('ny_product_2_title', array('default' => 'Galaxy Glaze'));
    $wp_customize->add_control('ny_product_2_title', array('label' => 'Product 2 Title', 'section' => 'ny_products_section', 'type' => 'text'));
    $wp_customize->add_setting('ny_product_2_desc', array('default' => 'A potent indica perfect for relaxation and a journey through the stars.'));
    $wp_customize->add_control('ny_product_2_desc', array('label' => 'Product 2 Description', 'section' => 'ny_products_section', 'type' => 'textarea'));
    
    // --- Product Card 3 --- //
    $wp_customize->add_setting('ny_product_3_icon', array('default' => 'sun'));
    $wp_customize->add_control('ny_product_3_icon', array('label' => 'Product 3 Icon', 'section' => 'ny_products_section', 'type' => 'text'));
    $wp_customize->add_setting('ny_product_3_title', array('default' => 'Solar Flare'));
    $wp_customize->add_control('ny_product_3_title', array('label' => 'Product 3 Title', 'section' => 'ny_products_section', 'type' => 'text'));
    $wp_customize->add_setting('ny_product_3_desc', array('default' => 'An energetic sativa that provides a burst of citrus and daytime clarity.'));
    $wp_customize->add_control('ny_product_3_desc', array('label' => 'Product 3 Description', 'section' => 'ny_products_section', 'type' => 'textarea'));

    // (All other sections like About and Footer remain the same)
    // ...
}
add_action('customize_register', 'ny_cannabis_customize_register');
<?php
// (Keep all the existing code in your functions.php file)
// ...

// ----- ADD THE FOLLOWING CODE ----- //

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ny_cannabis_theme_setup() {
    // Add <title> tag support
    add_theme_support('title-tag');

    // --- NEW: Enable support for a Custom Logo ---
    // This adds the "Logo" upload option in the Customizer under Site Identity.
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // --- NEW: Register a navigation menu ---
    // This adds the "Menus" option in the Appearance dashboard.
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ny-cannabis-theme'),
    ));
}
add_action('after_setup_theme', 'ny_cannabis_theme_setup');


/**
 * Enqueue styles, fonts, and scripts.
 */
function ny_cannabis_theme_scripts() {
    // Enqueue Google Fonts (Inter)
    wp_enqueue_style('ny-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap', array(), null);

    // Enqueue the selected theme skin
    $theme_style = get_theme_mod('theme_style_selector', 'futuristic-glow.css');
    $style_path = get_template_directory_uri() . '/styles/' . $theme_style;
    wp_enqueue_style('ny-cannabis-theme-skin', $style_path, ['ny-google-fonts'], '1.0.0');
    
    // Enqueue Lucide Icons script
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest/dist/lucide.min.js', array(), null, true);

    // --- NEW: Enqueue the theme's javascript file for mobile menu ---
    wp_enqueue_script('ny-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'ny_cannabis_theme_scripts');


/**
 * Register settings for the Customizer.
 */
function ny_cannabis_customize_register($wp_customize) {
    // (All your existing Customizer sections remain here...)
    // ...

    // --- NEW: Add Social Media Links to the Footer Section --- //
    $wp_customize->add_setting('social_twitter_url', array('default' => ''));
    $wp_customize->add_control('social_twitter_url', array(
        'label'   => __('X / Twitter URL', 'ny-cannabis-theme'),
        'section' => 'ny_footer_section',
        'type'    => 'url',
    ));
    $wp_customize->add_setting('social_instagram_url', array('default' => ''));
    $wp_customize->add_control('social_instagram_url', array(
        'label'   => __('Instagram URL', 'ny-cannabis-theme'),
        'section' => 'ny_footer_section',
        'type'    => 'url',
    ));
    $wp_customize->add_setting('social_linkedin_url', array('default' => ''));
    $wp_customize->add_control('social_linkedin_url', array(
        'label'   => __('LinkedIn URL', 'ny-cannabis-theme'),
        'section' => 'ny_footer_section',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'ny_cannabis_customize_register');

// (The rest of your functions.php remains the same)
// Find and replace the entire ny_cannabis_theme_scripts() function with this:
function ny_cannabis_theme_scripts() {
    // --- Enqueue Google Fonts (Added Lora for the Earthy skin) ---
    wp_enqueue_style('ny-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&family=Lora:wght@400;600&display=swap', array(), null);

    // Enqueue Sal.js
    wp_enqueue_style('sal-css', get_template_directory_uri() . '/assets/css/sal.css');
    wp_enqueue_script('sal-js', get_template_directory_uri() . '/assets/js/sal.js', array(), null, true);

    // Enqueue the selected theme skin
    $theme_style = get_theme_mod('theme_style_selector', 'futuristic-glow.css');
    $style_path = get_template_directory_uri() . '/styles/' . $theme_style;
    wp_enqueue_style('ny-cannabis-theme-skin', $style_path, ['ny-google-fonts', 'sal-css'], '1.2.0');
    
    // Enqueue other scripts
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest/dist/lucide.min.js', array(), null, true);
    wp_enqueue_script('ny-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), '1.1.0', true);
}


// Find the 'theme_style_selector' control inside ny_cannabis_customize_register()
// and replace its 'choices' array with this:
'choices' => [
    'futuristic-glow.css'  => __('Futuristic Glow (Dark)', 'compliant-theme'),
    'corporate-clean.css'  => __('Corporate Clean (Light)', 'compliant-theme'),
    'earthy-organic.css'   => __('Earthy Organic (Light)', 'compliant-theme'),
],

// In functions.php, find the ny_cannabis_customize_register function.
// Inside the 'ny_products_listing_section' loop for the products page...
// ...
// Loop to create 8 product card settings
for ($i = 1; $i <= 8; $i++) {
    // --- NEW: Add an Image URL field ---
    $wp_customize->add_setting("ny_prod_page_item_{$i}_image_url", array('default' => ''));
    $wp_customize->add_control("ny_prod_page_item_{$i}_image_url", array(
        'label'       => "Product {$i} Image URL",
        'section'     => 'ny_products_listing_section',
        'type'        => 'url',
        'description' => __('Optional. If left blank, a placeholder image will be generated from the product title.', 'compliant-theme')
    ));

    // (The existing settings for icon, title, and description remain below this)
    $wp_customize->add_setting("ny_prod_page_item_{$i}_icon", array('default' => 'cannabis'));
    // ... etc ...
}