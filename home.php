<?php

/**
 * The template for displaying blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Media_Blog
 */

get_header();
?>


<main id="primary" class="site-main">

    <?php get_template_part('components/hero-slider') ?>

    <div class="container mt-4 mt-lg-5">
        <div class="row">

            <div class="col-lg-8 content">
                <?php if (have_posts()) :

                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();
                        /*
                        * Include the Post-Type-specific template for the content.instead.
                        */
                        get_template_part('template-parts/content-loop', get_post_type());
                    endwhile;
                    the_posts_navigation();
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </div>

            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div><!-- End blog sidebar -->

        </div>
    </div>
    
</main><!-- #main -->

<?php
get_footer();
