<?php


/**
 * Підключення setup.php
 */
require get_template_directory() . '/functions-parts/setup.php';

/**
 * Підключення віджетів
 */
require get_template_directory() . '/functions-parts/widgets.php';

/**
 * Підключення скриптів та стилів
 */
require get_template_directory() . '/functions-parts/scripts.php';

/**
 * Підключення меню
 */
require get_template_directory() . '/functions-parts/menus.php';

/**
 * Підключення катсомних типів
 */
require get_template_directory() . '/functions-parts/cpt.php';

/**
 * Підключення всякої додаткової фігні
 */
require get_template_directory() . '/functions-parts/custom-stuff.php';

/**
 * Підключення всякої acf-option
 */
require get_template_directory() . '/functions-parts/acf-option.php';







/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

