<!-- PAGE INDEX -->

<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>
  <div class="container bumper protection">
    <div class="row">
      <div class="col full m10 offset-m1">
        <div style="margin: 0 auto;">
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div class="container content no-floating-footer">

    <!-- page content -->
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();

      get_template_part( 'content-page', get_post_format() );


    ?>

  </div>
  <div class="small-bumper"></div>
  <div class='container comments'>
    <?php
      if ( comments_open() ) :
        comments_template();
      endif;

    endwhile; endif;
    ?>

  </div>

<!-- Footer -->
<?php get_footer(); ?>





