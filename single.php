<?php
/**
 * The template for displaying single posts.
 *
 * @package Compliant_Theme
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="page-header" data-sal="fade-in" data-sal-duration="1200">
                <div class="container">
                    <?php the_title( '<h1>', '</h1>' ); ?>
                    <div class="entry-meta">
                        <span>By <?php the_author(); ?></span>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="content-area">
                <div class="container">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
