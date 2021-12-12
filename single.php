<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Media_Blog
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="container mt-4 mt-lg-5">
		<div class="row">

			<div class="col-lg-8 content">

				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', get_post_type());

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'media-blog') . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'media-blog') . '</span> <span class="nav-title">%title</span>',
						)
					);
					
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				endwhile; // End of the loop.
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
