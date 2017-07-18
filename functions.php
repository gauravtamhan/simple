<?php

// Add scripts and stylesheets
function simple_scripts() {
  wp_enqueue_style('materialize_css', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css');
  wp_enqueue_script('materialize_js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js', array('jquery'));
  wp_enqueue_style('stylesheet', get_template_directory_uri() . '/css/stylesheet.css');
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'simple_scripts' );

// WordPress Titles
add_theme_support( 'title-tag' );


// Changing excerpt more - only works where excerpt is NOT hand-crafted
add_filter('excerpt_more', 'auto_excerpt_more');
function auto_excerpt_more($more) {
    return '&hellip;';
}

// Changing behavior of adding pics to content. Ignores alignment and width style
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
        $content = $matches[1];
        $attr['caption'] = trim( $matches[2] );
        }
    }

    $output = apply_filters('img_caption_shortcode', '', $attr, $content);
    if ( $output != '' )
    return $output;

    extract(shortcode_atts(array(
        'id' => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) )
    return $content;

    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

    return '<div ' . $id . 'class="wp-caption">' . do_shortcode( $content ) . '<p>' . $caption . '</p></div>';
}


// function improved_trim_excerpt($text) {
//         global $post;
//         if ( '' == $text ) {
//                 $text = get_the_content('');
//                 $text = apply_filters('the_content', $text);
//                 $text = str_replace('\]\]\>', ']]&gt;', $text);
                // $text = preg_replace('@<script[^>]*.*?</script>@si', '', $text);
//                 $text = strip_tags($text, '<img>');
//                 $excerpt_length = 80;
//                 $words = explode(' ', $text, $excerpt_length + 1);
//                 if (count($words)> $excerpt_length) {
//                         array_pop($words);
//                         array_push($words, '[...]');
//                         $text = implode(' ', $words);
//                 }
//         }
//         return $text;
// }
// remove_filter('get_the_excerpt', 'wp_trim_excerpt');
// add_filter('get_the_excerpt', 'improved_trim_excerpt');

// function image_tag_class($class) {
//     $class = ' responsive-img';
//     return $class;
// }
// add_filter('get_image_tag_class', 'image_tag_class' );

function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <div class="row">
            <div class="col s2">
                <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>
            <div class="col s10">
                <?php printf( __( '<p class="name">%s</p>'), get_comment_author_link() ); ?>
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __('<p class="date">%1$s at %2$s</p>'), get_comment_date(),  get_comment_time() );
                ?>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                     <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row no-row-spacing">
        <div class="col s10 push-s2">
            <?php comment_text(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col s10 push-s2">
            <div class="reply post-meta-data">
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'before'=>'<i class="tiny material-icons">reply</i>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        </div>
    </div>

    <div class="comment-spacer"></div>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>

    <?php
    }