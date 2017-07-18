<?php if ( post_password_required() ) {
  return;
} ?>
  <div id="comments" class="comments-area">
    <?php
      $comments_args = array(
          'fields' => apply_filters( 'comment_form_default_fields', array(

            'author' => '<p class="comment-form-author">' . '<div class="row">' . '<div class="input-field col s12 m7">' .

              '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'
              . '<label for="author">' . __( 'Name' ) . '</label> ' . '</div></div></p>',

            'email'  => '<p class="comment-form-email">' . '<div class="row">' . '<div class="input-field col s12 m7">' .

              '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.

              '<label for="email">' . __( 'Email' ) . '</label> ' .

              '</div></div></p>',

            'url'    => ''
          ) ),
          // change the comment notes
          'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.' ) . '</p>',
          // change the title of send button
          'label_submit'=>'Post',
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
          . _x( 'Message', 'noun' ) . '</label></div></div></p>',
          // cancel reply
          'cancel_reply_link'=>'or cancel reply',
          'cancel_reply_before'=>'<div class="cancel_reply"><span>',
          'cancel_reply_after'=>'</span></div>',
      );

      comment_form($comments_args);
    ?>
    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <p class="no-comments"><?php _e('Commenting is closed for this post.'); ?></p>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( have_comments() ) : ?>
      <div class="small-bumper"></div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <h5>Discussion</h5>
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
    <?php endif; ?>


  </div>