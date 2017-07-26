<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>
  <div class="container bumper">
    <div class="row">
      <div class="col full m10 offset-m1">
        <div style="margin: 0 auto;">
          <h2><?php the_archive_title(); ?></h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div class="container content">

      <!-- blog content -->
      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();

        get_template_part( 'content', get_post_format() );

      endwhile; endif;
      ?>

  </div>

<!-- Footer -->
<?php get_footer(); ?>