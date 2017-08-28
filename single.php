<!-- PAGE INDEX -->

<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>


  <!-- Blog body -->
  <div class="container content no-floating-footer protection">

    <!-- page content -->
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();

      get_template_part( 'content-single', get_post_format() );

      wp_link_pages(array(
          'before'  => '<div class="row"><div class="col s12 m10 offset-m1"><ul class="pagination content-pagination"><li class="waves-effect">',
          'after'   => '</li></ul></div></div>',
          'separator'   => '</li><li class="waves-effect">',
          'next_or_number'    => 'next',
          'previouspagelink'   =>  '<i class="material-icons">arrow_back</i>',
          'nextpagelink'      =>  '<i class="material-icons">arrow_forward</i>',
        ));
    ?>

    <div class="row">
      <div class="col s12 m10 offset-m1">
        <?php the_tags( '<div class="line-break for-tag-top"></div> <table><tr><td width="13%"><div><i class="tag material-icons">local_offer</i><h5 class="tag-title">Tags:</h5></div></td> <td><div class="chip-holder"><div class="chip">', '</div><div class="chip">', '</div></div></td></tr></table> <div class="line-break for-tag-bottom"></div>' ); ?>
      </div>
    </div>
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





