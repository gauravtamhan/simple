<div class="row">
  <div id="post-<?php the_ID(); ?>" <?php post_class( 'col m10 offset-m1 links content' ); ?>>
  <!-- <div class="col m10 offset-m1 links content"> -->
    <h1><?php the_title(); ?></h1>
    <span class="subtitle">By <?php the_author(); ?> on <?php the_date(); ?> - <?php the_time(); ?></span>

    <?php the_content(); ?>

  </div>
</div>