<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proacto
 */

get_header()
?>

<!-- Масив точок на мапі -->
<?php $posts = get_posts( array(
	'numberposts' => -1,
	'post_type'   => 'points',
) ); ?>

<?php 
// Масиви міст та областей ініціалізація
$cities = array();
$states = array();



$city_param = isset($_GET['city']) ? $_GET['city'] : '';
$state_param = isset($_GET['state']) ? $_GET['state'] : '';

$mob_active = wp_is_mobile() ? '' : 'active';;

// Масиви міст та областей заповнення
foreach ($posts as $post) { 
	setup_postdata( $post ) ;

	// область
	$state = get_field('create_map_state', $post);
	if (!in_array($state, $states)) {
		array_push($states, $state);
	} ;	
	// місто
	$city = get_field('create_map_city', $post);
	if ($state_param && $state == $state_param) {
		if (!in_array($city, $cities)) {
			array_push($cities, $city);
		};
	} elseif (!$state_param) {
		if (!in_array($city, $cities)) {
			array_push($cities, $city);
		};
	}
} 

wp_reset_postdata() ;
?>





<section class="map-general" id="map-general">
	<div class="container">
			
				<?php 
				
				$additionalBock = get_field('content-block', 'option');

				if ($additionalBock): ?>
					<div class="additional-content">
						<?php echo $additionalBock; ?>
					</div>
				<?php endif ?>	

			
		<div class="map__filter">
			<?php if (count($states) > 1) { ?>
				<select name="states" id="states-filter">
					<option value="<?php echo get_page_link() . '?' . http_build_query(array_merge($_GET, ['state' => ""])) ?>">Обрати область</option>
					<?php foreach ($states as $state): 

						?>
						<?php $checked = $state_param == $state ? 'selected' : '' ?> 
						<?php unset($_GET['city']) ?>
		
						<option <?php echo $checked ?> value="<?php echo get_page_link() . '?' . http_build_query(array_merge($_GET, ['state' => $state])) ?>">
							<?php echo $state; ?>
							<!--  echo $state['label'] -->
						</option>
					<?php endforeach ?>
				</select>
				<select name="cities" id="cities-filter">
					<option value="<?php echo get_page_link() . '?' . http_build_query(array_merge($_GET, ['city' => ''])) ?>">Обрати місто</option>
					<?php foreach ($cities as $city): ?>
						<?php $checked = $city_param == $city ? 'selected' : '' ?> 
						<option <?php echo $checked ?>  value="<?php echo get_page_link() . '?' . http_build_query(array_merge($_GET, ['city' => $city])) ?>">
							<?php echo $city; ?>
							<!-- echo $city['label'] -->
						</option>
					<?php endforeach ?>
				</select>
				<a class="jos-button" href="<?php echo get_page_link() ?>">Скинути фільтр</a>
				<div class="list-thumler-wrapper">
					<button class="list-thumler <?php echo $mob_active ?>"></button>
					<span class="list-thumler__trigger">Показати список</span>
				</div>
			<?php }?>
		</div>
		<div class="map__wrapper">
			<div id="locations" class="locations <?php echo $mob_active ?>">
				<ul class="locations__list">
					<?php $counter = 0 ?>
					<?php foreach ($posts as $post) {  ?>
					<?php setup_postdata( $post ) ?>

					<?php $point = get_field('create_map_pin', $post); ?>
					<?php $city_point = get_field('create_map_city', $post); ?>
					<?php $state_point = get_field('create_map_state', $post); ?>
					<?php if ($state_param == '' || $state_param == $state_point) { ?>
						<?php if ($city_param == '' || $city_param == $city_point) { ?>
							<li class="locations__item" data-count="<?php echo $counter ?>" data-lat="<?php echo esc_attr($point['lat']); ?>" data-lng="<?php echo esc_attr($point['lng']); ?>">
				                <h3 class="locations__item__title"><?php echo esc_html( get_the_title($post) ); ?></h3>
				                <p><em><?php echo esc_html( $point['address'] ); ?></em></p>
				                <?php if (get_field('create_map_phone', $post)) { ?>
				                	<a class="pin__tel" href="tel:<?php echo get_field('create_map_phone', $post) ?>"><?php echo get_field('create_map_phone', $post) ?></a>
				                <?php } ?>
				            </li>
				            <?php $counter++ ?>
						<?php } ?>
					<?php } ?>

				<?php } ?>
				<?php wp_reset_postdata() ?>
				</ul>
			</div>
			<div class="map-content">
<!-- 				<?php 
				$additionalBock = get_field('content-block', 'option');

				if ($additionalBock): ?>

					<?php echo $additionalBock; ?>

				<?php endif ?>	 -->			
			

				<div id="map" class="acf-map">
					<?php foreach ($posts as $post) {  ?>
						<?php setup_postdata( $post ) ?>

						<?php $point = get_field('create_map_pin', $post); ?>
						<?php $city_point = get_field('create_map_city', $post); ?>
						<?php $state_point = get_field('create_map_state', $post); ?>
						<?php if ($state_param == '' || $state_param == $state_point) { ?>
							<?php if ($city_param == '' || $city_param == $city_point) { ?>
								<div style="display: none;" class="marker" data-lat="<?php echo esc_attr($point['lat']); ?>" data-lng="<?php echo esc_attr($point['lng']); ?>" data-state="<?php echo esc_attr($state_point) ?>" data-city="<?php echo esc_attr($city_point) ?>">
					                <h3 class="marker__title"><?php echo esc_html( get_the_title($post) ); ?></h3>
					                <p><em><?php echo esc_html( $point['address'] ); ?></em></p>
					                <?php if (get_field('create_map_phone', $post)) { ?>
					                	<a class="pin__tel" href="tel:<?php echo get_field('create_map_phone', $post) ?>"><?php echo get_field('create_map_phone', $post) ?></a>
					                <?php } ?>
					            </div>
							<?php } ?>
						<?php } ?>

					<?php } ?>
					<?php wp_reset_postdata() ?>
				</div>
			</div>
		</div>
	</div>
</section>



<?php
get_footer();
