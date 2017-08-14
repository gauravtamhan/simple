<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>
  <div class="container bumper">
    <div class="row error">
      <div class="col full m10 offset-m1">
        <div style="margin: 0 auto;">
          <!-- <h2><?php the_archive_title(); ?></h2> -->
          <h2>Archives</h2>
          <h4 class="error-message">Viewing posts from <span class="as"><?php echo str_replace('Month: ','',get_the_archive_title()); ?></span></h4>
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