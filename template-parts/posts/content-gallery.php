<div class="row">
  <div <?php post_class( 'col s12 m10 offset-m1 links content' ); ?>>
    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <!-- <h4><?php the_title(); ?></h4> -->
    <span class="subtitle">
      <?php
      echo _x('By', 'Preposition: the post was written by the author', 'minimal') . ' ' . get_the_author() . ' ';
      ?>
    </span>
    <?php
      // check if the post has a Post Thumbnail assigned to it.
      if ( has_post_thumbnail() ) : ?>
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('full'); ?>
        </a>
      </div>
      <?php endif;
      if ( get_post_gallery() ) {
        echo '<div class="entry-gallery">';
          echo get_post_gallery();
        echo '</div>';
      };




      ?>
    <!-- <a href="<?php the_permalink(); ?>" class="waves-effect waves-teal btn-flat"><?php _e('View Gallery', 'minimal'); ?><span class="screen-reader-text"> about <?php the_title();?></span></a> -->
    <div class="post-meta-data">
    </div>
    <div class="line-break"></div>
  </div>
</div>