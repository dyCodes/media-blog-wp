<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Media_Blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function media_blog_body_classes($classes)
{

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'media_blog_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function media_blog_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'media_blog_pingback_header');

/**
 * Change the excerpt more string
 */
function media_blog_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'media_blog_excerpt_more');
