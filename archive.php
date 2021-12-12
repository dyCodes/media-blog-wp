<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Media_Blog
 */

get_header();
?>


<main id="primary" class="site-main">
	<!------- Cover Title Section ------->
	<section class="cover_title">
		<div class="container text-center">
			<h2 class="_title h3"> <?php the_archive_title(); ?> </h2>
		</div>
	</section><!-- End Cover Title -->

	<div class="container mt-4 mt-lg-5">
		<div class="row">

			<div class="col-lg-8 content">
				<?php if (have_posts()) :

					/* Start the Loop */
					while (have_posts()) :
						the_post();
						/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
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
