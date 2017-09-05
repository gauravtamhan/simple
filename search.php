<!-- SEARCH RESULTS -->

<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>
  <div class="container bumper content">
    <div class="row error">
      <div class="col full m10 offset-m1">
        <h2>Search Results</h2>
        <?php if ( have_posts() ) : ?>
          <h4 class="error-message"><?php printf( __( 'Here\'s what we found for "%s"', 'loft'), '<span>' . get_search_query() . '</span>' ); ?>.</h4>
        <?php else : ?>
          <h4 class="error-message"><?php _e('No results found! Try another search.', 'loft'); ?></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div class="container no-floating-footer">
    <!-- page content -->
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/posts/content', get_post_format() );

    endwhile; endif;
    ?>
    <?php loft_numeric_posts_nav(); ?>
  </div>

<!-- Footer -->
<?php get_footer(); ?>