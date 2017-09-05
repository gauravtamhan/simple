<?php

// Add scripts and stylesheets
function minimal_scripts() {
    wp_enqueue_style('materialize_css', get_template_directory_uri() . '/css/materialize.css');
    wp_enqueue_script('materialize_js', get_template_directory_uri() . '/js/materialize.js', array('jquery'));

    wp_enqueue_style('semantic_css', get_template_directory_uri() . '/css/semantic.css');
    wp_enqueue_script('semantic_js', get_template_directory_uri() . '/js/semantic.js', array('jquery'));

    wp_enqueue_script('tweenmax_js', get_template_directory_uri() . '/js/TweenMax.min.js');
    wp_enqueue_script('scrollmagic_js', get_template_directory_uri() . '/js/ScrollMagic.js');
    wp_enqueue_script('animation_js', get_template_directory_uri() . '/js/animation.gsap.js');

    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/css/stylesheet.css');
    wp_enqueue_style( 'minimal-style', get_stylesheet_uri() );
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'minimal_scripts' );

// Make theme available for translation
load_theme_textdomain( 'minimal' );

// WordPress Titles
add_theme_support( 'title-tag' );


// Adding thumbnail support
add_theme_support( 'post-thumbnails' );


// Adding support for wp_nav_menu()
function register_my_menu() {
  register_nav_menu('primary-menu',__( 'Primary Menu', 'minimal' ));
}
add_action( 'init', 'register_my_menu' );


// Adding post format support
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );


if ( ! isset( $content_width ) ) {
    $content_width = 800;
}

// Resize embeded videos
add_filter( 'embed_defaults', 'smaller_embed_size' );

function smaller_embed_size() {
    return array( 'width' => 525, 'height' => 295 );
}

// Adding editor style
function minimal_add_editor_styles() {
    add_editor_style('editor-style.css');
}
add_action( 'after_setup_theme', 'minimal_add_editor_styles' );


// Adding feed links support
add_theme_support( 'automatic-feed-links' );


// Adding custom logo support
function minimal_custom_logo_setup() {
    $defaults = array(
        'height'      => 24,
        'width'       => 24,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'minimal_custom_logo_setup' );




// Changing excerpt more - only works where excerpt is NOT hand-crafted
add_filter('excerpt_more', 'auto_excerpt_more');
function auto_excerpt_more($more) {
    return '&hellip;';
}


// Custom leave a comment section
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
                <?php printf( __( '<p class="name">%s</p>', 'minimal'), get_comment_author_link() ); ?>
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __('<p class="date">%1$s at %2$s</p>', 'minimal'), get_comment_date(),  get_comment_time() );
                ?>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                     <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'minimal' ); ?></p>
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

// Reordering comment field to bottom or reply form
function wp34731_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;

    return $fields;
}
add_filter( 'comment_form_fields', 'wp34731_move_comment_field_to_bottom' );


// Adding numbered pagination
function wpbeginner_numeric_posts_nav() {
    if( is_singular() )
        return;
    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );


    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;


    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="row"><div class="col s12"><div class="navigation"><ul class="pagination center-align">' . "\n";


    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="waves-effect">%s</li>' . "\n", get_previous_posts_link('<i class="material-icons">chevron_left</i>') );
    else
        printf('<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>' . "\n");

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : ' class="waves-effect"';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );


        if ( ! in_array( 2, $links ) )
            echo '<li>...</li>';
    }


    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : ' class="waves-effect"';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }


    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>...</li>' . "\n";


        $class = $paged == $max ? ' class="active"' : ' class="waves-effect"';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }


    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="waves-effect">%s</li>' . "\n", get_next_posts_link('<i class="material-icons">chevron_right</i>') );
    else
        printf( '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>' . "\n");

    echo '</ul></div></div></div>' . "\n";
}


// Customizing Password Protected Post output
function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<p>' . __( 'This post is password protected. To view it please enter your password below.', 'minimal' ) . '</p>'
        . '<div class="small-bumper"></div>'
        . '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">'
        . '<div class="row">'
        . '<div class="input-field col s12 m6">'
        . '<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />'
        . '<label for="' . $label . '">' . __( "Password", 'minimal' ) . ' </label>'
        . '</div>'
        . '</div>'
        . '<div class="row">'
        . '<div class="col s12">'
        . '<button class="waves-effect waves-teal btn-flat" type="submit" name="Submit">' . __("Submit", 'minimal') . '</button>'
        . '</div>'
        . '</div>'
        . '</form>'
    ;
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );


// Adding the lock icon to protected posts
function change_protected_title_prefix() {
    return '%s <i class="material-icons protect">lock</i>';
}
add_filter('protected_title_format', 'change_protected_title_prefix');


// Customizing the excerpt text of protected posts
function my_excerpt_protected( $excerpt ) {
    if ( post_password_required() )
        $excerpt = '<p>' . __("This post is password protected.", 'minimal') . '</p>';
    return $excerpt;
}
add_filter( 'the_excerpt', 'my_excerpt_protected' );


// Adding icon to title of private posts
function change_private_title_prefix() {
    return '%s <i class="material-icons private">visibility_off</i>';
}
add_filter('private_title_format', 'change_private_title_prefix');


// Helper function to get menu
function wpse45700_get_menu_by_location( $location ) {
    if( empty($location) ) return false;

    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;

    $menu_obj = get_term( $locations[$location], 'nav_menu' );

    return $menu_obj;
}