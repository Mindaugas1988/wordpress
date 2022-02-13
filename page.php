<?php get_header();?>
<?php /* If there are no posts to display, such as an empty archive page */ ?>


<div class="w3-row">

<div class=" w3-twothird" id="content">

  <?php
  			if ( have_posts() ) : while ( have_posts() ) : the_post();

  				get_template_part( 'content', get_post_format() );

  			endwhile; endif;
  			?>

    </div>

<?php get_sidebar(); ?>


</div>

<?php get_footer();?>
