<!-- CONTACT FORM -->

<div class="form" id="myForm">	
	<div class="form-popup container">

		<!-- form information block -->
		<div class="form-popup__block">
			<div class= "form-popup__info">		
				<?php
				if(have_rows('contact_info_repeater')):
					while(have_rows('contact_info_repeater')):
					the_row();	
					?>

					<!-- icon, label -->
					<?php
					if(have_rows('info_row_repeater')):
						while(have_rows('info_row_repeater')):
						the_row();	
						?>					
						<h4><?php echo the_sub_field('icon'); ?>   <?php echo the_sub_field('label'); ?> </h4>

						<!-- information -->
						<?php
						if(have_rows('information_repeater')):
							while(have_rows('information_repeater')):
							the_row();	
							?>
								<a href="mailto:<?php echo the_sub_field('email'); ?>"><p><?php echo the_sub_field('email'); ?></p></a>
								<a href="https://www.google.com/maps?q=<?php echo the_sub_field('address'); ?>" target = _blank><p><?php echo the_sub_field('address'); ?></p></a>
								<a href="tel:<?php echo the_sub_field('phone'); ?>"><p><?php echo the_sub_field('phone'); ?></p></a>
							<?php
							endwhile;
						endif;
						?>						
						<?php
						endwhile;
					endif;
					?>	

					<!-- social icons -->
					<div class="form-popup__social-icons">
						<?php
						if(have_rows('social_icons_repeater')):
							while(have_rows('social_icons_repeater')):
							the_row();	
								?>
								<a href="<?php echo the_sub_field('link'); ?> " target="_blank">
									<?php echo the_sub_field('icon'); ?> 
								</a>
								<?php
							endwhile;
						endif;
						?>	
					</div>	
					<?php
					endwhile;
				endif;
				?>	
				
			</div> 

			<!-- form close button -->
			<div class="form-popup__close">
				<i class="fas fa-times-circle"></i>
			</div>

			<!-- form inputs-->
			<div class= "form-popup__inputs">
				<?php 
					echo do_shortcode(get_field('form_shortcode'));
				?>
			</div>		
		</div>
	</div>	<!-- end of form-popup div 		 -->
</div>
