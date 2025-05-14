<?php 

	function proacto_scripts() {

		wp_enqueue_style( 'proacto-style', get_stylesheet_uri(), array(), _S_VERSION );

		wp_style_add_data( 'proacto-style', 'rtl', 'replace' );

		wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/OwlCarousel2/dist/assets/owl.carousel.css');
		wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/OwlCarousel2/dist/assets/owl.theme.default.css');

		wp_enqueue_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );






		wp_enqueue_style( 'proacto-awesome-style', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css', array(), _S_VERSION );

		wp_enqueue_style( 'proacto-main-style', get_template_directory_uri() . '/css/main.css', array(), '1.0.1' );

		wp_enqueue_style( 'proacto-footer-style', get_template_directory_uri() . '/css/footer.css', array(),'1.0.1' );


		wp_enqueue_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array( 'jquery' ), null, true );

		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/OwlCarousel2/dist/owl.carousel.min.js', array('jquery'), null, true);

		wp_enqueue_script( 'proacto-google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBvy3iyOo7jMS-RwdFyCZQAalM9xrA7KzI&callback=initMap&region=UA&language=uk', array(), _S_VERSION, true );

		wp_enqueue_script( 'proacto-google-maps-cluster', 'https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'proacto-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'proacto-map', get_template_directory_uri() . '/js/map.js', array(), _S_VERSION, true );


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'proacto_scripts' );

 ?>
