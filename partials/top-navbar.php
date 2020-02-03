<!-- TOP NAVBAR -->

<nav class="top-navbar" id="navbar">
	<!-- logo is text -->
	<a class="top-navbar__logo" href="#hero-section">
		<h3><?php the_field('ho_logo', 'option')?></h3>	
	</a>

	<div class="top-navbar__menu">
		<div class="top-navbar__burger">
			<i class="fas fa-bars"></i>
		</div>
		<?php 
			$menu_settings = [
			'menu_class' => "top-navbar__list",
			'container' => false,
			'theme_location' => 'primary-navigation',
			'walker' => new Custom_navwalker()
			];
			wp_nav_menu($menu_settings);
		?>
	</div>
</nav>	 

