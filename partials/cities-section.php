<!-- CITIES SECTION  -->

<section id="cities-section" class="section">	

	<!-- heading -->
	<div class="heading">
		<h3><?php  the_field('cs_heading');?> </h3>
	</div>

	<!-- cities -->
	<div class="cities container">
		<div class="cities__row">
			<?php
			if(have_rows('cs_city_repeater')):
				while(have_rows('cs_city_repeater')):
					the_row();	
					$image = get_sub_field('cs_city_image');				
					?>		
					<div class="cities__city">
						<div class="cities__img <?php the_sub_field('cs_city_heading'); ?>" onclick="initMap(<?php the_sub_field('cs_city_heading'); ?>, 13); filterCity(this.className);" >
							<a href=#spots-section>
								 <img src="<?php echo esc_url($image['sizes']['spot']); ?>" alt="<?php the_sub_field('cs_city_heading'); ?>">							
							</a>
						</div>
						<h4><?php the_sub_field('cs_city_heading'); ?></h4>
					</div>	
					<?php
				endwhile;
			endif;
			?>						
		</div>			
	</div>	
		
</section>