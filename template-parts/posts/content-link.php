<div class="row">
  <div <?php post_class( 'col s12 m10 offset-m1 links content' ); ?>>
    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <?php
      // check if the post has a Post Thumbnail assigned to it.
      if ( has_post_thumbnail() ) : ?>
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('full'); ?>
        </a>
      </div>
      <?php
        endif;
        if ( is_single() || '' === get_the_post_thumbnail() ) {
          the_content();
        }
      ?>
    <div class="post-meta-data">
    </div>
    <div class="line-break"></div>
  </div>
</div>