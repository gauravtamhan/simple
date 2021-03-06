<?php if ( post_password_required() ) {
  return;
} ?>
  <div id="comments" class="comments-area">
    <?php
      $comments_args = array(
          'fields' => apply_filters( 'comment_form_default_fields', array(

            'author' => '<p class="comment-form-author">' . '<div class="row">' . '<div class="input-field col s12 m7">' .

              '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . ' />'
              . '<label for="author">' . __( 'Name', 'merlot' ) . '</label> ' . '</div></div></p>',

            'email'  => '<p class="comment-form-email">' . '<div class="row">' . '<div class="input-field col s12 m7">' .

              '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' .  ' />'.

              '<label for="email">' . __( 'Email', 'merlot' ) . '</label> ' .

              '</div></div></p>',

            'url'    => ''
          ) ),
          // change the comment notes
          'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.', 'merlot' ) . '</p>',
          // change the title of send button
          'label_submit'=>__('Post', 'merlot'),
          // change the html of the title of the reply section
          'title_reply_before'=>'<h5 id="reply-title" class="comment-reply-title">',
          // change the html of the title of the reply section
          'title_reply_after'=>'</h5>',
          // remove "Text or HTML to be displayed after the set of comment fields"
          'comment_notes_after' => '',
          // remove logged in as html"
          'logged_in_as' => '',
          // redefine your own textarea (the comment body)
          'comment_field' => '<p class="comment-form-comment"><div class="row"><div class="input-field col s12 m7"><textarea id="comment" class="materialize-textarea" name="comment"></textarea><label for="comment">'
          . _x( 'Message', 'noun', 'merlot' ) . '</label></div></div></p>',
          // cancel reply
          'cancel_reply_link'=>__('or cancel reply', 'merlot'),
          'cancel_reply_before'=>'<div class="cancel_reply"><span>',
          'cancel_reply_after'=>'</span></div>',
          'submit_button'=>'<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
      );

      comment_form($comments_args);
    ?>
    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <p class="no-comments"><?php _e('Commenting is closed for this post.', 'merlot'); ?></p>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( have_comments() ) : ?>
      <div class="small-bumper"></div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <h5><?php _e("Discussion", "merlot"); ?></h5>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <ul class="comment-list">
            <?php
            wp_list_comments('callback=mytheme_comment');
            ?>
          </ul>
        </div>
      </div>
      <?php
        $prev_link = get_previous_comments_link(__("&#8592; Older Comments", 'merlot'));
        $next_link = get_next_comments_link(__("Newer Comments &#8594;", 'merlot'), 0);

        if ($prev_link || $next_link) {
          echo '<div id="comment-pagination" class="row no-row-spacing">';

          if ($prev_link) {
            echo '<div class="col s12 m5 offset-m1 center-align">' .
            '<div class="comment-pager ll">' . $prev_link . '</div>' .
            '</div>';
          }
          if ($next_link) {
            echo '<div class="col s12 m5 center-align">' .
            '<div class="comment-pager">' . $next_link . '</div>' .
            '</div>';
          }
          echo '</div>';
        }
        ?>

    <?php endif; ?>


  </div>