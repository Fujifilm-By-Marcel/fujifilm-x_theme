<?php
    /*
     Template Name: Free Template NoIndex NoFollow
     */
	 
	 
	 
    ?>
	
<?php

function nofollownoindexhead(){
	echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
}

add_action('wp_head', 'nofollownoindexhead');

?>
	
<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<style>
.free__first{
  width: 100%;
  text-align: center;
}
.iframe_container iframe {
  max-height: none !important;
}
@media screen and (min-width: 1240px), print{
  .iframe_container {
    margin-left: -27.5% !important;
  }
}
<?php
    the_field('free_heads');
    ?>
</style>
<main id="f_template">
<section class="free__first lower__first">
<div class="inner">
  <div class="wp_content">
  <?php remove_filter ('acf_the_content', 'wpautop'); ?>
  <?php the_field('free_content'); ?>
  </div>
<a href="#wrap" id="pagetop"></a>
</div>
</section>
</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
