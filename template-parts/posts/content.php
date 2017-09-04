<div class="row">
  <div <?php post_class( 'col s12 m10 offset-m1 links content' ); ?>>
    <h4><?php the_title(); ?></h4>
    <span class="subtitle">
      <?php
      echo _x('By', 'Preposition: the post was written by the author', 'minimal') . ' ' . get_the_author() . ' '
      . _x('on', 'Preposition: the post was written on a particular day', 'minimal') . ' ' . get_the_date() . ' - '
      . get_the_time();
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
      $format = get_post_format() ? : 'standard';
      if ( $post->post_content=="" ) {
        if ($post->post_excerpt != "") {
          the_excerpt();
        } elseif ($format == 'standard') {
          echo "<p></p>";
        }
      } else {
        // do something for posts with content
          the_excerpt();
      };




      ?>
    <a href="<?php the_permalink(); ?>" class="waves-effect waves-teal btn-flat"><?php _e('Read More', 'minimal'); ?><span class="screen-reader-text"> about <?php the_title();?></span></a>
    <div class="post-meta-data">
      <a href="<?php comments_link(); ?>"><i class="tiny material-icons">chat_bubble</i>
        <?php
        // comments_number('No Comments', '1 Comment', '% Comments');
        $num_comments = get_comments_number();
        if ($num_comments > 0) {
          printf( _n( '%1$s Comment', '%1$s Comments', $num_comments, 'minimal' ), number_format_i18n($num_comments) );
        } else {
          _e("No Comments", "minimal");
        }
        ?>
      </a>
    </div>
    <div class="line-break"></div>
  </div>
</div>