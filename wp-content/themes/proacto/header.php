<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proacto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php noindex_for_points() ?>
	
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header__wrap">
				<div class="burger">
					<span class="burger__line"></span>
					<span class="burger__line"></span>
					<span class="burger__line"></span>
				</div>
				<img class="header__logo" width="260" height="60" src="<?php echo esc_url(get_field('logo', 'option')['url']) ?>" alt="<?php echo esc_attr(get_field('logo', 'option')['alt']) ?>">
				<?php if(have_rows('main_menu', 'option')){?>
					<nav class="header__nav">
						<?php while (have_rows('main_menu', 'option')) { the_row() ?>
							<a class="header__nav__link" href="<?php echo get_sub_field('link')['url'] ?>">
								<img src="<?php echo esc_url(get_sub_field('icon')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('icon')['alt']) ?>" width="<?php echo esc_attr(get_sub_field('icon')['width']) ?>" height="<?php echo esc_attr(get_sub_field('icon')['height']) ?>">
								<span><?php echo get_sub_field('link')['title'] ?></span>
							</a>
						<?php } ?>	
						<button class="close-nav-mobile">
							<span class="close-line"></span>
							<span class="close-line"></span>
						</button>
					</nav>
				<?php } ?>
				<?php if(have_rows('add_menu', 'option')){?>
					<nav class="header__tools">
						<?php while (have_rows('add_menu', 'option')) { the_row() ?>
							<a class="header__tools__link" href="<?php echo get_sub_field('link')['url'] ?>">
								<img src="<?php echo esc_url(get_sub_field('icon')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('icon')['alt']) ?>" width="<?php echo esc_attr(get_sub_field('icon')['width']) ?>" height="<?php echo esc_attr(get_sub_field('icon')['height']) ?>">
								<span><?php echo get_sub_field('link')['title'] ?></span>
							</a>
						<?php } ?>	
					</nav>
				<?php } ?>
			</div>
		</div>
		<?php if (have_rows('offers', 'option')) { ?>
		<div class="promo-row">
			<div class="container">
				<div class="promo-row__wrap">
					<?php while (have_rows('offers', 'option')) { the_row() ?>
						<span class="promo-row__text">
							<?php the_sub_field('text', 'option') ?>
						</span>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</header><!-- #masthead -->
	<main>
