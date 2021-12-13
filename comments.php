<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Media_Blog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="blog-comments mt-5">

	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<h2 class="comments-count mb-3">
			<?php $media_blog_comment_count = get_comments_number();
			if ('1' === $media_blog_comment_count) {
				echo '<span>' . esc_html__('1 Comment', 'media-blog') . '</span>';
			} else {
				printf(
					'<span>' . esc_html__('%1$s Comments', 'media-blog') . '</span>',
					$media_blog_comment_count
				);
			} ?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style' => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'media-blog'); ?></p>
	<?php
		endif;

	endif; // Check for have_comments().

	$comments_args = array(
		//Define Fields
		'fields' => array(
			//Author field
			'author' => '<div class="form-group mb-3"><input name="author" type="text" class="form-control" aria-required="true" placeholder="Your Name*"></div>',
			//Email Field
			'email' => '<div class="form-group mb-3"><input name="email" type="text" class="form-control" placeholder="Your Email*"></div>',
			//URL Field
			'url' => '<div class="form-group mb-3"><input id="url" name="url" type="text" class="form-control" placeholder="Your Website"></div>',
			//Cookies
			'cookies' => '<div class="form-group mb-3"><input id="cookies" type="checkbox" required><label for="cookies"> By commenting you accept the<a href="' . get_privacy_policy_url() . '"> Privacy Policy </a></label></div>',
		),
		'comment_field' => '<div class="form-group mb-3"><textarea name="comment" rows="8" class="form-control" placeholder="Your Comment*"></textarea></div>',
	);

	comment_form($comments_args);
	?>

</div><!-- #comments -->