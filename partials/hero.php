<!-- HERO -->

<section id="hero-section">
	<div class="hero">



		<?php 
			$image = get_field('hb_background_image');
		?>
		<header class="hero__title">
			<h1><?php the_field('hb_heading'); ?></h1>	
			<h2><?php the_field('hb_after_heading'); ?></h2>			
		</header>
			<div class="hero__image" style= "background-image: url(<?php echo $image['sizes']['1536x1536'] ?>);"></div>
		<div class="hero__icon">
			<a href=#cities-section><?php the_field('hb_icon');?></a>
		</div>

		<!-- // hero bottom white angle overlay -->
		<div class="hero__header-angle">
			<svg width="100%" height="200" xmlns="http://www.w3.org/2000/svg">
				<path stroke="null" fill="#ffffff" stroke-width="1.5" d="m3617.750585,214.551212l0,-221.051284l-3912.50235,224.142904l2312.50235,-3.09162z" id="svg_8"></path>
			</svg>
		</div>

	</div>
</section>

