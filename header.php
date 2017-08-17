<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>

  <!-- Nav Bar -->
  <nav class="nav-fixed">
    <div class="nav-wrapper white">
      <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
                echo '<a href="'. esc_url( site_url() ) .'"><img src="'. esc_url( $logo[0] ) .'" class="brand-logo custom-logo"></a>';
        } else {
                echo '<a href="'. esc_url( site_url() ) .'" class="brand-logo black-text"><i class="material-icons">turned_in_not</i></a>';
        }
      ?>

      <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="material-icons">menu</i></a>
      <!-- Top Nav -->
      <ul class="right hide-on-med-and-down thin-text full-nav">
        <li>
          <a class="dropdown-button" href="#" data-activates="dropdown1">Archives
            <i class="material-icons ag">arrow_drop_down</i>
          </a>
          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content'>
          <?php
            $args = array(
                'type'=>'monthly',
                'order'=>'ASC',
              );
            wp_get_archives($args);
          ?>
          </ul>
        </li>
        <li>
          <a class="dropdown-button" href="#" data-activates="dropdown2">Categories
            <i class="material-icons ag">arrow_drop_down</i>
          </a>
          <!-- Dropdown Structure -->
          <ul id='dropdown2' class='dropdown-content'>
          <?php
            $args = array(
                'title_li'=>'',
              );
            wp_list_categories($args);
          ?>
          </ul>
        </li>
        <li><a class="black-text" href="<?php echo esc_url( site_url() );?>">Home</a></li>
        <?php wp_list_pages('&title_li='); ?>
      </ul>
      <!-- //// END: Top Nav -->
      <a href="#search-modal" onclick="getFocus()" class="black-text search-position modal-trigger"><i class="material-icons">search</i></a>
    </div>
  </nav>
  <div class="fadeOut"></div>

  <!-- Side Nav -->
  <ul class="side-nav thin-text" id="mobile-demo">
    <li><a class="waves-effect waves-teal" href="<?php echo esc_url( site_url() );?>">Home</a></li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li>
          <a class="collapsible-header">Archives</a>
          <div class="collapsible-body collapsible-body-mod">
            <ul>
              <?php
                $args = array(
                    'type'=>'monthly',
                    'order'=>'ASC',
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
          <a class="collapsible-header">Categories</a>
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
    <?php wp_list_pages('&title_li='); ?>
  </ul>

  <!-- search modal -->
  <div id="search-modal" class="modal">
    <div class="modal-content">
      <?php get_search_form(); ?>
    </div>
  </div>