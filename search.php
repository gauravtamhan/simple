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
          <h4 class="error-message">Here's <?php printf( __( 'what we found for "%s"'), '<span>' . get_search_query() . '</span>' ); ?>.</h4>
        <?php else : ?>
          <h4 class="error-message">No results found! Try another search.</h4>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div class="container no-floating-footer">
    <!-- page content -->
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();

      get_template_part( 'content', get_post_format() );

    endwhile; endif;
    ?>
    <?php wpbeginner_numeric_posts_nav(); ?>
  </div>

<!-- Footer -->
<?php get_footer(); ?>