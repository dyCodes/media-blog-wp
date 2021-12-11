<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Media_Blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'media-blog'); ?></a>

		<!------- Header ------->
		<header id="header" class="site-header">
			<div class="top_navbar container py-md-3">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()) :
					?>
						<h1 class="site-title h2">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
						</h1>
					<?php else : ?>
						<p class="site-title h2">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
						</p>
					<?php endif; ?>
				</div>
				<!-- Search Form -->
				<?php get_search_form() ?>
			</div>

			<!-- Main NavBar -->
			<nav class="navbar navbar-expand-md" id="main-navigation">
				<div class="container">
					<!-- Search Btn -->
					<div id="searchBtn">
						<div class="bi-search"></div>
					</div>

					<!-- Mobile Toggle Button -->
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="bi bi-list mobile-nav-toggle"></i>
					</button>

					<!-- Nav Links -->
					<div class="collapse navbar-collapse justify-content-start" id="navbarContent">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary-menu',
								'menu_id'        => 'site-menu',
								'menu_class'     => 'navbar-nav mt-3 mb-1 my-md-0',
							)
						); ?>
					</div>
				</div>
			</nav><!-- #main-navigation -->

		</header><!-- #Header -->