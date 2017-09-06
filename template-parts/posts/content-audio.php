<div class="row">
  <div <?php post_class( 'col s12 m10 offset-m1 links content' ); ?>>
    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <span class="subtitle">
      <?php
      echo _x('By', 'Preposition: the post was written by the author', 'merlot') . ' ' . get_the_author() . ' ';
      ?>
    </span>

    <?php
      $content = apply_filters( 'the_content', get_the_content() );
      $audio = false;

      // Only get audio from the content if a playlist isn't present.
      if ( false === strpos( $content, 'wp-playlist-script' ) ) {
        $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
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
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };

        if ( is_single() || empty( $audio ) ) {
          the_content();
        }

      ?>
    <div class="post-meta-data">
    </div>
    <div class="line-break"></div>
  </div>
</div>