<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proacto
 */

?>
	<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

	</main>
	<footer id="footer" class="footer">

		<div class="footer-top">
			<div class="container">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<section class="footer-service widget-area"">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</section>
				<?php endif; ?>
			</div>
		</div>

		<div class="footer-main">
			<div class="container">
				<div class="footer-wrap">
					<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
						<section class="footer-widget-col widget-area-1">
							<?php dynamic_sidebar( 'sidebar-2' ); ?>
						</section>
					<?php endif; ?>		
					<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
						<section class="footer-widget-col widget-area-2">
							<?php dynamic_sidebar( 'sidebar-3' ); ?>
						</section>
					<?php endif; ?>		
					<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
						<section class="footer-widget-col widget-area-3">
							<?php dynamic_sidebar( 'sidebar-4' ); ?>
						</section>
					<?php endif; ?>		
					<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
						<section class="footer-widget-col widget-area-4">
							<?php dynamic_sidebar( 'sidebar-5' ); ?>
						</section>
					<?php endif; ?>			
				</div>			
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
					<section class="primary-sidebar widget-area"">
						<?php dynamic_sidebar( 'sidebar-6' ); ?>
					</section>
				<?php endif; ?>
			</div>
		</div>	
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
