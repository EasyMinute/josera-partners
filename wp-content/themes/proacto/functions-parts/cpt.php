<?php 

// Тип поста для Точок на мапі
function points_post_type() {
	register_post_type( 'points',
		array(
			'labels' => array(
				'name'          => __('Точки на мапі'),
				'singular_name' => __('Точка'),
				'add_new'       => __('Додати точку')
			),
			'public'        => true,
			'has_archive'   => false,
			'menu_position' => 4,
			'menu_icon'     => 'dashicons-location',
			'supports'      => array('title','thumbnail',' custom-fields')
		)
	);
}
function noindex_for_points() {
    if ( is_singular( 'points' ) ) {
        echo '<meta name="robots" content="noindex, follow">';
    }
}



add_action( 'init', 'points_post_type' );
// add_action('wp_head', 'noindex_for_points');
?>