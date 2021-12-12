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
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function media_blog_search_form($form)
{
	$form = '<form role="search" class="search-form input-group" method="get" action="' . home_url('/') . '" >
        <label><span class="screen-reader-text">' . __('Search for:', 'media-blog') . '</label>
        <input type="search" class="form-control" placeholder="' . esc_attr_x("Search ...", "placeholder", "media-blog") . '" value="' . get_search_query() . '" name="s" />

        <button type="submit" class="btn" value="' . esc_attr__('Search', 'media-blog') . '"><i class="bi bi-search"></i></button> 
		</form>';

	return $form;
}
add_filter('get_search_form', 'media_blog_search_form');

/**
 * Change the excerpt more string
 */
function media_blog_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'media_blog_excerpt_more');
