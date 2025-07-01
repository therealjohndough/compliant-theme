<?php
/**
 * The main template file for displaying post archives.
 *
 * @package Compliant_Theme
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="page-header" data-sal="fade-in" data-sal-duration="1200">
        <div class="container">
            <h1><?php the_archive_title(); ?></h1>
        </div>
    </div>
    
    <div class="content-area">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="post-listing">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-excerpt'); ?> data-sal="slide-up" data-sal-duration="600">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="entry-meta">
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more-link">
                                Read More <i data-lucide="arrow-right" class="icon-right"></i>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <?php the_posts_pagination(); // Adds Next/Previous page links ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'compliant-theme' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
