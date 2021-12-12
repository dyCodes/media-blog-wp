<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Media_Blog
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php if (!is_front_page()) : ?>
		<!------- Cover Title Section ------->
		<section class="cover_title">
			<div class="container text-center">
				<h2 class="_title h3"> <?php the_title(); ?> </h2>

			</div>
		</section><!-- End Cover Title -->
	<?php endif ?>

	<div class="container mt-4 mt-lg-5">
		<div class="row">

			<div class="col-lg-8 content">
				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', 'page');
				endwhile; // End of the loop.
				?>
			</div>

			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div><!-- End blog sidebar -->

		</div>
	</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
