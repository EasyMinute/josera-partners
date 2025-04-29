<?php 
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function proacto_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Секція #1 (Сервіси)', 'proacto' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Додайте сюди віджет з колонки, яка розташована зліва.', 'proacto' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Секція #2 (Блок 1)', 'proacto' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html__( 'Додайте сюди віджет з колонки, яка розташована зліва.', 'proacto' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Секція #2 (Блок 2)', 'proacto' ),
				'id'            => 'sidebar-3',
				'description'   => esc_html__( 'Додайте сюди віджет з колонки, яка розташована зліва.', 'proacto' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Секція #2 (Блок 3)', 'proacto' ),
				'id'            => 'sidebar-4',
				'description'   => esc_html__( 'Додайте сюди віджет з колонки, яка розташована зліва.', 'proacto' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Секція #2 (Блок 4)', 'proacto' ),
				'id'            => 'sidebar-5',
				'description'   => esc_html__( 'Додайте сюди віджет з колонки, яка розташована зліва.', 'proacto' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
			)
		);		
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Секція #3 (Загальна інформа)', 'proacto' ),
				'id'            => 'sidebar-6',
				'description'   => esc_html__( 'Додайте сюди віджет з колонки, яка розташована зліва.', 'proacto' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
			)
		);
	}

	function my_acf_add_local_field_groups() {
	    remove_filter('acf_the_content', 'wpautop' );
	}
	add_action('acf/init', 'my_acf_add_local_field_groups');

	class Josera_List_Widget extends WP_Widget {

	  function __construct() {
	    parent::__construct(
	      'josera_list_widget', 
	      __('Josera Footer #1 Сервіси', 'text_domain'), 
	      array( 'description' => __( 'Набір елементів для Footer #1', 'text_domain' ), ) // Args
	    );
	  }

	  /**
	   * Front-end display of widget.
	   *
	   * @see WP_Widget::widget()
	   *
	   * @param array $args     Widget arguments.
	   * @param array $instance Saved values from database.
	   */
	  public function widget( $args, $instance ) {
	    echo $args['before_widget'];
	    if ( !empty($instance['title']) ) {
	      echo  '<h3 class="service-title">' . $instance['title'] . '</h3>';
	    }


		if( have_rows('josera-ul', 'widget_' . $args['widget_id']) ):

			echo '<ul class="service-list">';

				while ( have_rows('josera-ul', 'widget_' . $args['widget_id']) ) : the_row();

					$element = get_sub_field( 'josera-li', 'widget_' . $args['widget_id'] );
					if( $element ) {
						echo '<li>' . $element . '</li>';
					} 

				endwhile;

			echo "</ul>";

		endif;


		$images = get_field('josera-img', 'widget_' . $args['widget_id']);
		$link = get_field('josera-link', 'widget_' . $args['widget_id']);
		
		
			echo '<div class="service-footer">';
				echo '<div class="payment-delivery-logos">';
						if ($images) {
					        echo $images;
					    }
		    	echo "</div>";

		    	echo "<div class='service-more'>";

		    		if ($link) {
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';

					    echo '<a href='. $link_url .' target='. $link_target .'>'. $link_title .'</a>';

		    		}

		    	echo '</div>';

			echo '</div>';

		

		echo $args['after_widget'];

	  }

	  /**
	   * Back-end widget form.
	   *
	   * @see WP_Widget::form()
	   *
	   * @param array $instance Previously saved values from database.
	   */
	  public function form( $instance ) {
	    if ( isset($instance['title']) ) {
	      $title = $instance['title'];
	    }
	    else {
	      $title = __( 'Заголовок', 'text_domain' );
	    }
	    ?>
	    <p>
	      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
	    </p>
	    <?php
	  }

	  /**
	   * Sanitize widget form values as they are saved.
	   *
	   * @see WP_Widget::update()
	   *
	   * @param array $new_instance Values just sent to be saved.
	   * @param array $old_instance Previously saved values from database.
	   *
	   * @return array Updated safe values to be saved.
	   */
	  public function update( $new_instance, $old_instance ) {
	    $instance = array();
	    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

	    return $instance;
	  }

	} 


	class Josera_List_Contact_Widget extends WP_Widget {

	  function __construct() {
	    parent::__construct(
	      'Josera_List_Contact_Widget', 
	      __('Josera Footer Contact', 'text_domain'), 
	      array( 'description' => __( 'Набір елементів для контатних даних', 'text_domain' ), ) 
	    );
	  }

	  /**
	   * Front-end display of widget.
	   *
	   * @see WP_Widget::widget()
	   *
	   * @param array $args     Widget arguments.
	   * @param array $instance Saved values from database.
	   */
	  public function widget( $args, $instance ) {
	    echo $args['before_widget'];
	    if ( !empty($instance['title']) ) {
	      echo  '<h2 class="widgettitle">' . $instance['title'] . '</h2>';
	    }



		if( have_rows('josera-contact-ul', 'widget_' . $args['widget_id']) ):

			echo '<ul class="contact-list">';

				while ( have_rows('josera-contact-ul', 'widget_' . $args['widget_id']) ) : the_row();

					$icon = get_sub_field( 'josera-contact-li-icon', 'widget_' . $args['widget_id'] );
					$text = get_sub_field( 'josera-contact-li-text', 'widget_' . $args['widget_id'] );
					$link = get_sub_field( 'josera-contact-li-link', 'widget_' . $args['widget_id'] );
					$textarea1 = get_sub_field( 'josera-contact-li-textarea-1', 'widget_' . $args['widget_id'] );
					$textarea2 = get_sub_field( 'josera-contact-li-textarea-2', 'widget_' . $args['widget_id'] );

					echo "<li class='contact-element'>";

					if( $icon ) {
						echo "<img src=". $icon['url'] ."  width=".$icon['sizes']['thumbnail-width']." height=".$icon['sizes']['thumbnail-width']." alt=". $icon['alt'] .">"; ;
					} 

					if ($text && $link) {
						echo "<a href=". $link .">". $text ."</a>";
					}

					if ($textarea1) {
						echo "<br>";
						echo "<span class='contact-element__additional'>".$textarea1."</span>";
					}
					if ($textarea2) {
						echo "<span class='contact-element__additional'>".$textarea2."</span>";
					}


					echo "</li>";

				endwhile;

			echo "</ul>";

		endif;


		echo $args['after_widget'];

	  }

	  /**
	   * Back-end widget form.
	   *
	   * @see WP_Widget::form()
	   *
	   * @param array $instance Previously saved values from database.
	   */
	  public function form( $instance ) {
	    if ( isset($instance['title']) ) {
	      $title = $instance['title'];
	    }
	    else {
	      $title = __( 'Заголовок', 'text_domain' );
	    }
	    ?>
	    <p>
	      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
	    </p>
	    <?php
	  }

	  /**
	   * Sanitize widget form values as they are saved.
	   *
	   * @see WP_Widget::update()
	   *
	   * @param array $new_instance Values just sent to be saved.
	   * @param array $old_instance Previously saved values from database.
	   *
	   * @return array Updated safe values to be saved.
	   */
	  public function update( $new_instance, $old_instance ) {
	    $instance = array();
	    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

	    return $instance;
	  }

	} 



	add_action( 'widgets_init', function() {

		register_widget( 'Josera_List_Widget' );
		register_widget( 'Josera_List_Contact_Widget' );

	});

	add_action( 'widgets_init', 'proacto_widgets_init' );

 ?>
