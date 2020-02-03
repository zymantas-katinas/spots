<!-- FOOTER -->

<footer class="footer">
	<div class="footer__content container">	

		<div class="footer__row">
		<?php
		if(have_rows('footer_repeater')):
			while(have_rows('footer_repeater')):
			the_row();	
				?>
				<div class="footer__column">
					<h3><?php echo the_sub_field('footer_column_heading'); ?> </h3>
					<p><?php echo the_sub_field('footer_column_description'); ?> </p>											
					<div class="footer__contact-icon">
						<a href="#myForm">
							<?php echo the_sub_field('footer_contact_icon'); ?> 
						</a>
					</div>
					<div class="footer__social-icons">
						<?php
						if(have_rows('footer_icons_repeater')):
							while(have_rows('footer_icons_repeater')):
							the_row();	
							?>
							<a href="<?php echo the_sub_field('footer_icon_link'); ?> " target="_blank" >
								<?php echo the_sub_field('footer_icon'); ?> 
							</a>
							<?php
							endwhile;
						endif;
						?>	
					</div>								
				</div>	
				<?php
				endwhile;
			endif;
			?>			
		</div>

		<div class="footer__copyright">
			<p>
				&copy; 							
				<?php echo date("Y"); ?>
				<?php echo the_field('footer_copyright_name'); ?> 
			</p>							
		</div>

	</div>
</footer>