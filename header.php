<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>

  <!-- Nav Bar -->
  <nav class="nav-fixed">
    <div class="nav-wrapper white">
      <a href="<?php echo get_bloginfo( 'wpurl' );?>" class="brand-logo black-text"><i class="material-icons">turned_in_not</i></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down thin-text full-nav">
        <li><a class="black-text" href="<?php echo get_bloginfo( 'wpurl' );?>">Home</a></li>
        <?php wp_list_pages('&title_li='); ?>
      </ul>
    </div>
  </nav>
  <div class="fadeOut"></div>
  <ul class="side-nav thin-text" id="mobile-demo">
    <li><a class="waves-effect waves-teal" href="<?php echo get_bloginfo( 'wpurl' );?>">Home</a></li>
    <?php wp_list_pages('&title_li='); ?>
  </ul>