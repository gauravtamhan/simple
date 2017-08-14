<!-- PAGE INDEX -->

<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>


  <!-- Blog body -->
  <div class="container content no-floating-footer">

    <!-- page content -->
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();

      get_template_part( 'content-single', get_post_format() ); ?>
  </div>
  <div class="small-bumper"></div>
  <div class='container comments'>
    <?php
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endwhile; endif;
    ?>

  </div>

<!-- Footer -->
<?php get_footer(); ?>





