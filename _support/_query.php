<?php
$uzklausos_parametrai = [
	'parametro_pavadinimas' => 'reiksme',
	'parametro_pavadinimas2' => 'reiksme2'
];

$result = new WP_Query($uzklausos_parametrai);

if($result->have_posts()):
	while($result->have_posts()):
		$result->the_post();
		?>
		<!-- HTML KODAS KURIS KARTOJASI -->
		<?php
	endwhile;
endif;
wp_reset_postdata();
?>