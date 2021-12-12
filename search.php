<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Media_Blog
 */

get_header();
?>

<main id="primary" class="site-main">

	<!------- Cover Title Section ------->
	<section class="cover_title">
		<div class="container text-center">
			<h1 class="_title h3">
				<?php
				/* translators: %s: search query. */
				printf(esc_html__('Search Results for: %s', 'media-blog'), '<span>' . get_search_query() . '</span>');
				?>
			</h1>
		</div>
	</section><!-- End Cover Title -->

	<div class="container mt-4 mt-lg-5">
		<div class="row">

			<div class="col-lg-8 content">
				<?php if (have_posts()) :

					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part('template-parts/content', 'loop');

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
get_sidebar();
get_footer();
