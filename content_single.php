<div id="post">
  <h6><?php the_title(); ?></h6>
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'cover', 'title' => 'Cover image']) ?>
  <p>
     <?php the_content(); ?>
  </p>
  <div class="meta">
    <a href="#"><?php the_date(); ?></a><a href="#"><?php comments_popup_link('', '1 Komentaras', '% Komentarai'); ?></a>
  </div>

    <?php
    if ( comments_open() || get_comments_number() ) :
   comments_template();
   endif;
      ?>

</div>
