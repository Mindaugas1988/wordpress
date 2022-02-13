<ul class="w3-pagination w3-border w3-round">
  <li><?php next_posts_link( '&#10094; Senesnis' ); ?></li>
  <li><?php previous_posts_link( 'Naujesnis &#10095;' ); ?></li>
</ul>

  <div class="new">
    <?php  the_post_thumbnail() ;?>
    <h6><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h6>
    <p>
       <?php the_excerpt(); ?>
    </p>

    <a class="small" href="<?php the_permalink(); ?>">Daugiau...</a>
    <div class="meta">
      <a href="#"><?php the_date(); ?></a><a href="#"><?php comments_popup_link('', '1 Komentaras', '% Komentarai'); ?></a>
    </div>

  </div>

  <div class="clear"></div>

  <ul class="w3-pagination w3-border w3-round">
    <li><?php next_comments_link( '&#10094; Senesnis' ); ?></li>
    <li><?php previous_comments_link( 'Naujesnis &#10095;'); ?></li>
  </ul>
