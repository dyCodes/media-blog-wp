<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Media_Blog
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="container mt-4 mt-lg-5">
		<div class="row">

			<div class="col-lg-8 content">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'media-blog'); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e('It looks like nothing was found at this location. Perhaps searching can help.', 'media-blog'); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
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
