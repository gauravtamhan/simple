<!-- BLOG INDEX -->

<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="container full bumper">
    <div class="row full">
      <div class="col full m10 offset-m1 valign-wrapper" id="animate" style="text-align: center;">
        <div style="margin: 0 auto;">
          <h1><?php echo get_bloginfo( 'name' ); ?></h1>
          <span class="subtitle"><?php echo get_bloginfo( 'description' ); ?></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div id="trigger"></div>
  <div class="container">

      <!-- blog content -->
      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();

        get_template_part( 'content', get_post_format() );

      endwhile; endif;
      ?>

  </div>

<!-- Footer -->
<?php get_footer(); ?>





