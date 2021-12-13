<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Media_Blog
 */

if (!function_exists('media_blog_entry_meta')) :
	/**
	 * Prints HTML with meta information for the current author and post-date/time.
	 */
	function media_blog_entry_meta()
	{
		// post author
		$posted_by = '<a class="author" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>';
		// post-date/time
		$time_string = sprintf(
			'<time class="entry-date" datetime="%1$s">%2$s</time>',
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date(), 'media-blog')
		);
		$posted_on = '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>';
		// post categories
		$categories_list = get_the_category_list(esc_html__(', ', 'media-blog')); ?>

		<ul class="_flex">
			<li class="_flex">
				<i class="bi bi-person"></i>
				<?php echo $posted_by ?>
			</li>
			<li class="_flex">
				<i class="bi bi-clock"></i>
				<?php echo $posted_on ?>
			</li>
			<li class="_flex">
				<i class="bi bi-tag"></i>
				<?php echo $categories_list ?>
			</li>
		</ul>
		<?php
	}
endif;

if (!function_exists('media_blog_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function media_blog_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('','');
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<ul class="tags"><b>Tags:</b>' . esc_html__(' %1$s ', 'media-blog') . '</ul>', $tags_list);
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'media-blog'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if (!function_exists('media_blog_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function media_blog_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
		?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;
