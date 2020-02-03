<?php
if(have_posts()):
	while(have_posts()):
		the_post();
		?>
		<!-- HTML KODAS KURIS KARTOJASI -->
		<?php
	endwhile;
endif;
?>