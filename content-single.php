<div id="blog-post-content" class="row">
  <div id="post-<?php the_ID(); ?>" <?php post_class( 'col s12 m10 offset-m1 links content' ); ?>>
  <!-- <div class="col m10 offset-m1 links content"> -->
    <h1><?php the_title(); ?></h1>
    <span class="subtitle">
      <!-- By <?php the_author(); ?> on <?php the_date(); ?> - <?php the_time(); ?>     -->
      <?php
      echo _x('By', 'Preposition: the post was written by the author', 'minimal') . ' ' . get_the_author() . ' '
      . _x('on', 'Preposition: the post was written on a particular day', 'minimal') . ' ' . get_the_date() . ' - '
      . get_the_time();
      ?>
    </span>

    <?php the_content(); ?>

  </div>
</div>