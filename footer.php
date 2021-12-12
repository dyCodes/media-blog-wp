<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Media_Blog
 */

?>
<!------- Footer ------->
<footer id="footer" class="site-footer">
	<div class="container d-flex flex-wrap justify-content-between align-items-baseline">

		<div class="site-info col-md-7 d-flex">
			<p>
				<?php echo esc_html__('Copyright © ', 'media-blog') . date('Y'); ?>
				<b> <?php echo bloginfo('name'); ?></b>

				<span class="sep"> | </span>

				<?php printf(esc_html__('Developed By %s', 'media-blog'), '<a href="https://github.com/dyCodes" target="_blank"><b>dyCodes</b></a>'); ?>
			</p>
		</div>

		<div class="social-links col-md-5">
			<ul class="nav _flex social justify-content-end">
				<li class="ms-3">
					<a class="text-white" href="https://facebook.com/yusufdaudu51">
						<i class="bi-facebook"></i>
					</a>
				</li>
				<li class="ms-3">
					<a class="text-white" href="http://instagram.com/dyCodes">
						<i class="bi-instagram"></i>
					</a>
				</li>
				<li class="ms-3">
					<a class="text-white" href="https://twitter.com/dyCodes">
						<i class="bi-twitter"></i>
					</a>
				</li>
				<li class="ms-3">
					<a class="text-white" href="https://wa.me/2349038254560">
						<i class="bi-whatsapp"></i>
					</a>
				</li>
				<li class="ms-3">
					<a class="text-white" href="https://linkedin.com/dyCodes">
						<i class="bi-linkedin"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div id="back2Top" class="_flex justify-content-center">
		<i class="bi bi-arrow-up-short"></i>
	</div>
</footer><!-- #footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>