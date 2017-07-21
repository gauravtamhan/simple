
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <input type="text" placeholder="Search" name="s" id="search" value="<?php the_search_query(); ?>" />
    <!-- <input type="submit" id="searchsubmit" class="waves-effect waves-teal btn-flat" value="Go" /> -->
</form>