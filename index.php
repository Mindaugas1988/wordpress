<?php get_header();?>



<div class="w3-row">

  <div class=" w3-twothird" id="content">

            <?php
  			if ( have_posts() ) : while ( have_posts() ) : the_post();

  				get_template_part( 'content', get_post_format() );

  			endwhile;
  			else:

                echo '<div id="not_found">
                         <h2> Nieko nėra </h2>
                       </div>';

  			endif;
  			?>

        </div>

<?php get_sidebar(); ?>


</div>

<?php get_footer();?>
