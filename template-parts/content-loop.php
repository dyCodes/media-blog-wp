<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Media_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

    <?php media_blog_post_thumbnail(); ?>

    <div class="post-entry card-body">

        <?php the_title('<h2 class="entry-title h2"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

        <div class="entry-meta">
            <?php if ('post' === get_post_type()) media_blog_entry_meta(); ?>
        </div><!-- .entry-meta -->

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

    </div>

</article><!-- #post-<?php the_ID(); ?> -->