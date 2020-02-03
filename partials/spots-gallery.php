
<!-- FEATURED SPOTS SECTION -->

<section id="spots-section" class="section">

	<!-- heading -->
	<div class="heading container">
		<h3><?php the_field('fs_heading'); ?> </h3>
	</div>

	<!-- spots navbar -->
	<nav class="spots-navbar container">
		<ul class="spots-navbar__list">
		<?php
		if(have_rows('fs_spot_type_repeater')):
			while(have_rows('fs_spot_type_repeater')):
				the_row();	
					?>
					<li class="spots-navbar__item navbar-item">
						<a onclick="filterSelection('.<?php echo the_sub_field('spot_type_name'); ?>'); "> 
							<h3><?php echo the_sub_field('spot_type_name'); ?></h3>
						</a>
					</li>
					<?php
				endwhile;
			endif;
		?>	
		</ul>
	</nav>	

	<!-- GALLERY -->
	<div class="gallery show-less">
		<div class="gallery__overlay">
		</div>
		<div class="spots-gallery container">
		<?php
		if(have_rows('add_location_repeater')):
			while(have_rows('add_location_repeater')):
				the_row();
				$image = get_sub_field('spot_image');
				?>
				<div class="spots-gallery__image <?php echo the_sub_field('city_name'); ?> <?php echo the_sub_field('spot_type'); ?>" data-coords='<?php echo the_sub_field('location'); ?>'>		
					<img src="<?php echo esc_url($image['sizes']['spot']); ?>" alt="<?php the_sub_field('spot_heading'); ?>">
					<div class="spots-gallery__text">
						<h3><?php echo the_sub_field('spot_heading'); ?> </h3>
					</div>
				</div>
				<?php
			endwhile;
		endif;
		?>		
		</div>		
	</div>
</section> 

<!-- LOAD MORE ICON -->
<div class="load-more">
	<button class="load-more__button"> 
		<i class="<?php the_field('load_more_button'); ?> load-more__icon"></i>
	</button>
	<p>load-more</p>
</div>	

<!-- Add markers from 'add_location_repeater' -->
<?php 
	$spot = get_field('add_location_repeater');
	$ml = get_field('ml_marker_name_repeater');
	$blue = wp_get_attachment_url( 224 );
	$red = wp_get_attachment_url( 223 );
	$green = wp_get_attachment_url( 222 );
?>

<script> 
	let markers = [];
	let spotsArray =  <?php echo json_encode($spot); ?>; 	
	let mapLegendArray =  <?php echo json_encode($ml); ?>; 	
	let blueMarker =<?php echo json_encode($blue); ?>; 
	let greenMarker =<?php echo json_encode($green); ?>; 
	let redMarker =<?php echo json_encode($red); ?>; 

	for(let i = 0; i < spotsArray.length ; i++){ 
		let latitude = spotsArray[i].location.lat * 1;
		let longtitude = spotsArray[i].location.lng * 1;
		let description = spotsArray[i].spot_description;
		let heading = spotsArray[i].spot_heading;
		let type = spotsArray[i].spot_type;
		let color = '';

		for(let j = 0; j < mapLegendArray.length; j++){
				let markerTypeName = mapLegendArray[j].marker_name;		
			if(type == markerTypeName) {
				color = mapLegendArray[j].marker_color;			
			}
		};
		
		marker = 
			{	
				coords:{lat: latitude, lng: longtitude},
				content: '<h3>'+heading+'</h3> <p>'+description+'</p>',
				icon: {				
					url: eval(color + "Marker")
				  }			
			}		
		markers.push(marker);
		
 	} 
</script>  