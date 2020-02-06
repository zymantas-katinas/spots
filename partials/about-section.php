<!-- ABOUT -->


<?php 
        $allPosts = get_posts();
        $postInfo = get_field('spot_coords', 242);
    
        dump($allPosts);
        dump($postInfo);
        ?>
<p> <?php the_field('spot_description', 242); ?> </p>


<section id="about-section" class="section">
	<div class="about container">

		<!-- heading -->
		<div class="heading">
			<h3><?php the_field('ab_heading'); ?></h3>
		</div>

		<!-- paragraph -->
		<p><?php the_field('ab_description'); ?></p>
		
	</div>
</section>