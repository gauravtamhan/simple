<!-- BLOG INDEX -->

<!-- Header with nav -->
<?php get_header(); ?>


<?php if ( !is_paged() ) : ?>
  <!-- Title -->
  <div class="container full bumper">
    <div class="row full">
      <div class="col full m10 offset-m1 valign-wrapper" id="animate" style="text-align: center;">
        <div style="margin: 0 auto;">
          <h1><?php echo get_bloginfo( 'name' ); ?></h1>
          <h5><span class="subtitle"><?php echo get_bloginfo( 'description' ); ?></span></h5>
        </div>
      </div>
    </div>
  </div>
  <div id="trigger"></div>

<?php else : ?>
  <div class="bumper"></div>

<?php endif; ?>

  <!-- Blog body -->
  <div class="container no-floating-footer">

      <!-- blog content -->
      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();

        get_template_part( 'content', get_post_format() );

      endwhile;

      endif;
      ?>
      <?php wpbeginner_numeric_posts_nav(); ?>

  </div>

<!-- Footer -->
<?php get_footer(); ?>





