<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package proacto
 */

get_header();
?>
	<div class="container">
		<section class="error-404 not-found">
			<?php 
			
			$content = get_field('content-404','option'); 
			
			if ($content): ?>
				<div class="page-content">
					<?php echo $content ?>
				</div><!-- .page-content -->				
			<?php endif ?>

		</section><!-- .error-404 -->
	</div>


<?php
get_footer();
