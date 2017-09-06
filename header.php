<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- Nav Bar -->
  <nav class="nav-fixed">
    <div class="nav-wrapper white">
      <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
                echo '<a href="'. esc_url( site_url() ) .'">' .
                '<img src="'. esc_url( $logo[0] ) .'" class="brand-logo custom-logo"></a>';
        } else {
                echo '<a href="'. esc_url( site_url() ) .
                '" class="brand-logo black-text">' .
                '<i class="material-icons">turned_in_not</i></a>';
        }
      ?>

      <a href="#" data-activates="mobile-demo" class="button-collapse black-text">
        <i class="material-icons">menu</i>
      </a>

      <!-- Top Nav -->
      <?php
      #
      ##
      ###
      ### To change the order of the Archives dropdown list from ascending
      ### to descending change the value of the $order variable below.
      ###
      ### For an ascending list use: 'ASC'
      ### For a descending list use: 'DESC'

      $order = 'ASC';

      ### Be sure to click 'Update File' to save your changes.
      ###
      ##
      #
      $long_menu = '';
      $location = 'primary-menu';
      $menu_obj = merlot_get_menu_by_location($location);
      // check if menu object exists
      if (!$menu_obj) {
        $long_menu = '<li><a id="pages" class="dropdown-button" href="#" ' .
        'data-activates="dropdown3">' .
        __('Pages', 'merlot') . '<i class="material-icons ag">arrow_drop_down</i></a>' .
        '<ul id="dropdown3" class="dropdown-content">' . wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'items_wrap' => '%3$s',
        'echo' => false
        )). '</ul></li>';
      }
      // check if menu has location assigned
      elseif ($menu_obj->errors) {
        $long_menu = '<li><a id="pages" class="dropdown-button" href="#" ' .
              'data-activates="dropdown3">' .
              __('Pages', 'merlot') . '<i class="material-icons ag">arrow_drop_down</i></a>' .
              '<ul id="dropdown3" class="dropdown-content">' . wp_nav_menu(array(
              'theme_location' => 'primary-menu',
              'items_wrap' => '%3$s',
              'echo' => false
              )). '</ul></li>';
      } else {
        $menu_items = wp_get_nav_menu_items($menu_obj->name);
        $count = 0;
        foreach( $menu_items as $menu_item ) {
          if ($menu_item->menu_item_parent != 0) {
            $count++;
          }
        }

        if (count($menu_items) < 4 && $count == 0) {
          wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'container'      => 'ul',
            'menu_class'     => 'right hide-on-med-and-down thin-text full-nav',
            'fallback_cb'    => false
            ));
        } else {
          $long_menu = '<li><a id="pages" class="dropdown-button" href="#" ' .
              'data-activates="dropdown3">' .
              __('Pages', 'merlot') . '<i class="material-icons ag">arrow_drop_down</i></a>' .
              '<ul id="dropdown3" class="dropdown-content">' .
              wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'items_wrap' => '%3$s',
                'fallback_cb'    => false,
                'echo' => false)) .
              '</ul></li>';
        }
      }

      ?>

      <ul id="dd" class="right hide-on-med-and-down thin-text full-nav">
        <li>
          <a id="archive" class="dropdown-button" href="#" data-activates="dropdown1"><?php _e('Archives', 'merlot'); ?>
            <i class="material-icons ag">arrow_drop_down</i>
          </a>
          <ul id='dropdown1' class='dropdown-content'>
          <?php
            $args = array(
                'type'=>'monthly',
                'order'=>$order,
              );
            wp_get_archives($args);
          ?>
          </ul>
        </li>
        <li>
          <a id="category" class="dropdown-button" href="#" data-activates="dropdown2"><?php _e('Categories', 'merlot'); ?>
            <i class="material-icons ag">arrow_drop_down</i>
          </a>
          <ul id='dropdown2' class='dropdown-content'>
          <?php
            $args = array(
                'title_li'=>'',
              );
            wp_list_categories($args);
          ?>
          </ul>
        </li>
        <?php echo $long_menu; ?>
      </ul>


      <!-- //// END: Top Nav -->
      <a href="javascript:openModal();" class="black-text search-position"><i class="material-icons">search</i></a>
    </div>
  </nav>
  <div class="fadeOut"></div>

  <!-- Side Nav -->
  <ul class="side-nav thin-text" id="mobile-demo">
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header"><?php _e('Archives', 'merlot'); ?></a>
          <div class="collapsible-body collapsible-body-mod">
            <ul>
              <?php
                $args = array(
                    'type'=>'monthly',
                    'order'=>$order,
                  );
                wp_get_archives($args);
              ?>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header"><?php _e('Categories', 'merlot'); ?></a>
          <div class="collapsible-body collapsible-body-mod">
            <ul>
              <?php
                $args = array(
                    'title_li'=>'',
                  );
                wp_list_categories($args);
              ?>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <?php wp_nav_menu(
        array(
          'theme_location' => 'primary-menu',
          'items_wrap' => '%3$s'
          )
        ); ?>
  </ul>

  <!-- search modal -->
  <div class="ui tiny modal">
    <div class="ui icon header">
      <i class="material-icons large icon">search</i>
      <?php _e('Type a few words and hit Enter to search!', 'merlot'); ?>
    </div>
    <div class="content">
      <?php get_search_form(); ?>
    </div>
  </div>