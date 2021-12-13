<?php

/**
 * Hero section posts slider
 *
 * @package Media_Blog
 */

$recent_posts = wp_get_recent_posts(array(
    'numberposts' => 6, // Number of recent posts to display
    'post_status' => 'publish', // Show only the published posts
));

// Return if no post is found
if (count($recent_posts) == 0) {
    return;
}
// set SlidesPerView property depending on number of posts found
function getSlidesPerView($recent_posts, $default)
{
    if (count($recent_posts) < 3) {
        return count($recent_posts);
    } else {
        return $default;
    }
}
?>

<!------- Hero Section ------->
<section id="hero">
    <div class="container">

        <div id="post_slider_hero" class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($recent_posts as $post_item) : ?>
                    <!-- slide item -->
                    <div class="swiper-slide">
                        <article class="card post">

                            <?php
                            if (has_post_thumbnail($post_item['ID'])) {
                                echo get_the_post_thumbnail($post_item['ID'], 'full');
                            } else { ?>
                                <img src="<?php echo get_theme_file_uri('assets/images/thumbnail.jpg') ?>" alt="<?php echo $post_item['post_title'] ?>">
                            <?php
                            } ?>

                            <div class="card-body">
                                <div class="category _flex">
                                    <?php echo the_category(' ', ' ', $post_item['ID']) ?>
                                </div>

                                <h2 class="entry-title">
                                    <a href="<?php echo esc_url(get_permalink($post_item['ID'])) ?>">
                                        <?php echo $post_item['post_title'] ?>
                                    </a>
                                </h2>

                                <ul class="entry-meta _flex">
                                    <li class="_flex">
                                        <i class="bi bi-person"></i>
                                        <a href="<?php echo esc_url(get_author_posts_url($post_item['post_author'])) ?>">
                                            <?php echo get_the_author_meta('display_name', $post_item['post_author']) ?>
                                        </a>
                                    </li>
                                    <li class="_flex">
                                        <i class="bi bi-clock"></i>
                                        <a href="<?php echo esc_url(get_permalink($post_item['ID'])) ?>">
                                            <time datetime="<?php echo $post_item['post_date']; ?>">
                                                <?php echo date("F j, Y", strtotime($post_item['post_date'])); ?>
                                            </time></a>
                                    </li>
                                </ul>

                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

    <script>
        // HERO POST SLIDER
        window.addEventListener('load', (e) => {
            new Swiper('#post_slider_hero', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                speed: 600,

                autoplay: {
                    delay: 5500,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: '.swiper-pagination',
                    // dynamicBullets: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: <?php echo getSlidesPerView($recent_posts, 2) ?>,
                    },
                    1200: {
                        slidesPerView: <?php echo getSlidesPerView($recent_posts, 3) ?>,
                    },
                }
            });
        });
    </script>

</section>
<!-- End Hero -->