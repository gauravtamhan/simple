<?php

// Add scripts and stylesheets
function simple_scripts() {
  wp_enqueue_style('stylesheet', get_template_directory_uri() . '/css/stylesheet.css');
  // wp_enqueue_script('materialize_js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js', array('jquery'));
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');
}

add_action( 'wp_enqueue_scripts', 'simple_scripts' );

// WordPress Titles
add_theme_support( 'title-tag' );