<!-- MAP -->

<div class="map-box" id="map-anchor">	
	<div id="map"></div>
	<div class="mapLegend container">
		<div class="mapLegend__row">
		<?php
		if(have_rows('ml_marker_name_repeater')):
			while(have_rows('ml_marker_name_repeater')):
				the_row();
				?>
				<div class="mapLegend__button">
					<i class="<?php the_sub_field('marker_icon')  ?> <?php the_sub_field('marker_color'); ?> "></i>
					<h3><?php the_sub_field('marker_name') ?></h3>
				</div>
				<?php
			endwhile;
		endif;
		?>
		</div>
	</div>
</div>	

