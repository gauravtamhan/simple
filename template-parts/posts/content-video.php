<div class="row">
  <div <?php post_class( 'col s12 m10 offset-m1 links content' ); ?>>
    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <span class="subtitle">
      <?php
      echo _x('By', 'Preposition: the post was written by the author', 'loft') . ' ' . get_the_author() . ' ';
      ?>
    </span>

    <?php
      $content = apply_filters( 'the_content', get_the_content() );
      $video = false;

      // Only get video from the content if a playlist isn't present.
      if ( false === strpos( $content, 'wp-playlist-script' ) ) {
        $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
      }

    ?>

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
        if ( ! is_single() ) {
          // If not a single post, highlight the video file.
          if ( ! empty( $video ) ) {
            foreach ( $video as $video_html ) {
              echo '<div class="entry-video">';
                echo $video_html;
              echo '</div><!-- .entry-video -->';
            }
          };
        };

        if ( is_single() || empty( $video ) ) {
          the_content();
        }

      ?>
    <div class="post-meta-data">
    </div>
    <div class="line-break"></div>
  </div>
</div>