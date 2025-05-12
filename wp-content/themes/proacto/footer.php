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

        <?php $footer_services = get_field('footer_services', 'options'); ?>
        <?php if(!empty($footer_services)): ?>
            <div class="footer-top">
                <div class="container">
                    <section class="footer-service">
                        <?php foreach($footer_services as $item): ?>
                            <section id="josera_list_widget-3" class="widget widget_josera_list_widget">
                                <?php if(!empty($item['josera-title'])): ?>
                                    <h3 class="service-title">
                                        <?php echo $item['josera-title'] ?>
                                    </h3>
                                <?php endif; ?>

	                            <?php if(!empty($item['josera-ul'])): ?>
                                    <ul class="service-list">
	                                    <?php foreach($item['josera-ul'] as $li): ?>
                                            <li><?php echo $li['josera-li'] ?></li>
	                                    <?php endforeach; ?>
                                    </ul>
	                            <?php endif; ?>

                                <div class="service-footer">
                                    <div class="payment-delivery-logos">
	                                    <?php echo $item['josera-img'] ?>
                                    </div>

	                                <?php if(!empty($item['josera-link'])): ?>
                                        <div class="service-more">
                                            <a href="<?php echo $item['josera-link']['url'] ?>" target="_self">
	                                            <?php echo $item['josera-link']['title'] ?>
                                            </a>
                                        </div>
	                                <?php endif; ?>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    </section>
                </div>
            </div>
        <?php endif; ?>



		<div class="footer-main">
			<div class="container">
				<div class="footer-wrap">

                    <?php
                    $logo_footer = get_field( 'footer_logo', 'options' );
                    $title_1 = get_field( 'title_1', 'options' );
                    $title_2 = get_field( 'title_2', 'options' );
                    $title_3 = get_field( 'title_3', 'options' );
                    ?>

                    <section class="footer-widget-col widget-area-1">
                        <section id="media_image-2" class="widget widget_media_image">
                            <?php if( $logo_footer !== null ): ?>
                                <img width="300" height="300" src="<?php echo $logo_footer['url'] ?>" class="image wp-image-37 footer-logo attachment-medium size-medium" alt="josera-logo" style="max-width: 100%; height: auto;" decoding="async" loading="lazy">
                            <?php endif; ?>
                        </section>
                        <section id="nav_menu-5" class="widget widget_nav_menu">
	                        <?php
	                        wp_nav_menu(array(
		                        'menu' => 'Footer (Про Josera)',
	                        ));
	                        ?>
                        </section>
                    </section>

                    <section class="footer-widget-col widget-area-2">
                        <section id="nav_menu-2" class="widget widget_nav_menu">
                            <h2 class="widgettitle"><?php echo $title_1 ?></h2>

	                        <?php
	                        wp_nav_menu(array(
		                        'menu' => 'Footer (Корм для собак)',
	                        ));
	                        ?>
                        </section>
                        <section id="nav_menu-4" class="widget widget_nav_menu">
                            <h2 class="widgettitle"><?php echo $title_2 ?></h2>
	                        <?php
	                        wp_nav_menu(array(
		                        'menu' => 'Footer (Корм для котів)',
	                        ));
	                        ?>
                        </section>
                    </section>

                    <section class="footer-widget-col widget-area-3">
                        <section id="nav_menu-6" class="widget widget_nav_menu">
                            <h2 class="widgettitle"><?php echo $title_3 ?></h2>
	                        <?php
	                        wp_nav_menu(array(
		                        'menu' => 'Footer (Сервіс)',
	                        ));
	                        ?>
                        </section>
                    </section>


                    <section class="footer-widget-col widget-area-4">
                        <section id="josera_list_contact_widget-2" class="widget widget_josera_list_contact_widget">
                            <h2 class="widgettitle">Контакти</h2>
                            <?php
                            if( have_rows('josera-contact-ul', 'options' )):

	                            echo '<ul class="contact-list">';

	                            while ( have_rows('josera-contact-ul', 'options') ) : the_row();

		                            $icon = get_sub_field( 'josera-contact-li-icon', 'options' );
		                            $text = get_sub_field( 'josera-contact-li-text', 'options' );
		                            $link = get_sub_field( 'josera-contact-li-link', 'options' );
		                            $textarea1 = get_sub_field( 'josera-contact-li-textarea-1', 'options' );
		                            $textarea2 = get_sub_field( 'josera-contact-li-textarea-2', 'options' );

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
                            ?>

                        </section>
                    </section>

				</div>			
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
					<section class="primary-sidebar widget-area"">
                        <section id="nav_menu-7" class="widget widget_nav_menu">
	                        <?php
	                        wp_nav_menu(array(
		                        'menu' => 'Footer Bottom (Додаткова інфомрація)',
	                        ));
	                        ?>
                        </section>
					</section>
			</div>
		</div>	
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
