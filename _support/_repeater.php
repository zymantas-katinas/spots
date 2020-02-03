<?php
if(have_rows('repeater_lauko_pavadinimas')):
    while(have_rows('repeater_lauko_pavadinimas')):
        the_row();
        // Repeater lauku iskvietimas
        // the_sub_field('lauko_pavadinimas'); - reiksme spausdina
        // get_sub_field('lauko_pavadinimas'); - reiksme grazina
        ?>
        <!-- HTML KODAS KURIS KARTOJASI -->
        <?php
    endwhile;
endif;
?>