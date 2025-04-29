<?php 

	function proacto_scripts() {

		wp_enqueue_style( 'proacto-style', get_stylesheet_uri(), array(), _S_VERSION );

		wp_style_add_data( 'proacto-style', 'rtl', 'replace' );



		wp_enqueue_style( 'proacto-awesome-style', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css', array(), _S_VERSION );

		wp_enqueue_style( 'proacto-main-style', get_template_directory_uri() . '/css/main.css', array(), _S_VERSION );

		wp_enqueue_style( 'proacto-footer-style', get_template_directory_uri() . '/css/footer.css', array(), _S_VERSION );



		wp_enqueue_script( 'proacto-google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBvy3iyOo7jMS-RwdFyCZQAalM9xrA7KzI&callback=initMap&region=UA&language=uk', array(), _S_VERSION, true );

		wp_enqueue_script( 'proacto-google-maps-cluster', 'https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'proacto-main', get_template_directory_uri() . '/js/main.js', array(), 1.0, true );

		wp_enqueue_script( 'proacto-map', get_template_directory_uri() . '/js/map.js', array(), 1.0, true );


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'proacto_scripts' );

 ?>