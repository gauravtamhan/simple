<div class="row">
  <div class="col m10 offset-m1 links content">
    <h4><?php the_title(); ?></h4>
    <span class="subtitle">By <?php the_author(); ?> on <?php the_time(get_option('date_format')); ?> - <?php the_time(); ?></span>

    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="waves-effect waves-teal btn-flat">Read More</a>
    <div class="post-meta-data">
      <a href="<?php comments_link(); ?>"><i class="tiny material-icons">chat_bubble</i>
        <?php
         // printf(_nx('%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title'), number_format_i18n(get_comments_number()));
        comments_number('No Comments', '1 Comment', '% Comments');
        ?>
      </a>
    </div>
    <div class="line-break"></div>
  </div>
</div>