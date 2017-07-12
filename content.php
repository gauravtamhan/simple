<!-- <div class="col m10 offset-m1 links">
  <h4>Here is your first sentence that should be bold and exciting.</h4>
  <span class="subtitle">Posted by John Doe on 7/4/2017</span>
  <img class="responsive-img" src="https://static.pexels.com/photos/169573/pexels-photo-169573.jpeg">
  <p class="flow-text">Cliche godard scenester, affogato cornhole pop-up humblebrag ullamco post-ironic DIY anim before they sold out. Heirloom kitsch flexitarian, williamsburg sriracha nostrud semiotics pickled flannel green juice ut fugiat sartorial. VHS do knausgaard dolore. Jean shorts vero cillum assumenda readymade, franzen paleo. Umami accusamus yr cupidatat. Aliqua letterpress chia, cardigan green juice synth jean shorts PBR gluten-free. Bespoke fixie excepteur street art shabby chic, microdosing brooklyn...</p>
  <a href="article.html" class="waves-effect waves-teal btn-flat">Read More</a>
  <div class="post-meta-data">
    <a href="#"><i class="tiny material-icons">chat_bubble</i>2 comments</a>
  </div>
  <div class="line-break"></div>
  <h4>Blog Post Number 2.</h4>
  <span class="subtitle">Posted by George Smith on 2/22/2017</span>
  <p class="flow-text">Cliche godard scenester, affogato cornhole pop-up humblebrag ullamco post-ironic DIY anim before they sold out. Heirloom kitsch flexitarian, williamsburg sriracha nostrud semiotics pickled flannel green juice ut fugiat sartorial. VHS do knausgaard dolore. Jean shorts vero cillum assumenda readymade, franzen paleo. Umami accusamus yr cupidatat. Aliqua letterpress chia, cardigan green juice synth jean shorts PBR gluten-free. Bespoke fixie excepteur street art...</p>
  <a class="waves-effect waves-teal btn-flat">Read More</a>
  <div class="post-meta-data">
    <a href="#"><i class="tiny material-icons">chat_bubble</i>6 comments</a>
  </div>
  <div class="line-break"></div>
</div> -->
<div class="row">
  <div class="col m10 offset-m1 links content">
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <span class="subtitle">Posted by <?php the_author(); ?> on <?php the_date('n/j/Y'); ?></span>

    <?php the_content(); ?>
    <a href="<?php comments_link(); ?>">
      <?php
      printf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain'), number_format_i18n(get_comments_number()));
      ?>
    </a>
    <div class="line-break"></div>
  </div>
</div>