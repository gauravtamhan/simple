<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>
  <div class="container bumper">
    <div class="row error">
      <div class="col full m10 offset-m1">
        <div class="desc" style="margin: 0 auto;">
          <h2><?php single_cat_title(); ?></h2>
          <?php echo category_description(); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div class="container no-floating-footer">

      <!-- blog content -->
      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();

        get_template_part( 'content', get_post_format() );

      endwhile; endif;
      ?>
      <?php wpbeginner_numeric_posts_nav(); ?>
  </div>

<!-- Footer -->
<?php get_footer(); ?>