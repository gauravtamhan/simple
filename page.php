<!-- PAGE INDEX -->

<!-- Header with nav -->
<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>
  <div class="container bumper">
    <div class="row">
      <div class="col full m10 offset-m1">
        <div style="margin: 0 auto;">
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div class="container">

    <!-- page content -->
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();

      get_template_part( 'content-page', get_post_format() );

    endwhile; endif;
    ?>

    <!-- <div class="row">
      <div class="col m10 offset-m1">
        <p class="flow-text">Cliche godard scenester, affogato cornhole pop-up humblebrag ullamco post-ironic DIY anim before they sold out. Heirloom kitsch flexitarian, williamsburg sriracha nostrud semiotics pickled flannel green juice ut fugiat sartorial. VHS do knausgaard dolore. Jean shorts vero cillum assumenda readymade, franzen paleo. Umami accusamus yr cupidatat. Aliqua letterpress chia, cardigan green juice synth jean shorts PBR&B gluten-free. Bespoke fixie excepteur street art shabby chic, microdosing brooklyn selfies mixtape duis food truck pinterest nisi austin.</p>
        <img class="responsive-img materialboxed" src="https://static.pexels.com/photos/169573/pexels-photo-169573.jpeg">
        <p class="flow-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed ullamcorper ligula. Ut mollis vehicula eros, in semper est imperdiet sit amet. Phasellus gravida condimentum commodo. Curabitur efficitur nisl blandit laoreet sollicitudin. Suspendisse eu quam lacus. Vestibulum vitae turpis urna. Nulla facilisi. Etiam feugiat ex vitae neque iaculis viverra. Sed mollis ornare vestibulum. Fusce consectetur sapien vitae elementum tempus. Duis elementum sem ante, et mattis felis pulvinar at. Maecenas urna arcu, finibus ac vehicula vitae, commodo in risus.</p>
        <p class="flow-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed ullamcorper ligula. Ut mollis vehicula eros, in semper est imperdiet sit amet. Phasellus gravida condimentum commodo. Curabitur efficitur nisl blandit laoreet sollicitudin. Suspendisse eu quam lacus. Vestibulum vitae turpis urna. Nulla facilisi. Etiam feugiat ex vitae neque iaculis viverra. Sed mollis ornare vestibulum. Fusce consectetur sapien vitae elementum tempus. Duis elementum sem ante, et mattis felis pulvinar at. Maecenas urna arcu, finibus ac vehicula vitae, commodo in risus.</p>
      </div>
    </div> -->
  </div>

<!-- Footer -->
<?php get_footer(); ?>





