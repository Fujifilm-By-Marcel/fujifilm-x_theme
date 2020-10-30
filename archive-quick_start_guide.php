<?php get_header(); ?>

<main>
  <section class="events__first lower__first">
    <div class="inner">
      <h1 class="headline_underline headline_h1">Quick Start Guides</h1> 
      <div class="tagline"></div>
    </div>
  </section>


  <style>
    @media screen and (max-width: 767px), print{
      .eventlist li:last-child {
        margin-bottom: 7.5vw;
      }
    }
  </style>

  <section class="events__contents lower__contents">
    <div class="inner">
      <div class="tab__wrap" data-tabnum="1">
        <div class="tab__box tab-localLatest on">
          <div class="eventlist">
            <ul>
             <?php
              //$paged = ( $_GET['page'] ) ? $_GET['page'] : 1;

              $args = array(
                'post_type' => 'quick-start-guide',
                'post_status' => array('publish'),
                'orderby' => 'publish_date',  
                //'posts_per_page' => 1,
                'order' => 'DESC',
                //'paged' => $paged,
              );

              $the_query = new WP_Query( $args );
              if ( $the_query->have_posts() ) : 
              while ( $the_query->have_posts() ) : $the_query->the_post();
              ?>
              <li>
                <a href="<?php echo get_permalink(); ?>">
                  <div class="eventlist__image" style="background-image:url(<?php the_field('archive_page_image') ?>)"><img src="//fujifilm-x.com/en-us/wp-content/themes/fujifilm-x_jp/assets/img/common/cover.png"></div>
                  <div class="eventlist__texts">
                    <p class="eventlist__texts_tag"></p>
                    <b class="eventlist__texts_title">
                      <span><?php the_title(); ?></span>
                    </b>
                    <!--<small class="eventlist__texts_date"><?php echo get_post_time('m.d.y'); ?></small>-->
                  </div>
                  <span class="icn_arrow"></span>
                </a>
              </li>  
              <?php
              endwhile; 
              endif;  
              ?>
            </ul>
          </div>
        </div>
      </div>
      <!--<div class="pagination">
      <?php 
        /*$the_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1; 
          $pagination = paginate_links( array(
              'base'         => @add_query_arg('page','%#%'),
              'total'        => $the_query->max_num_pages,
              'current'      => $current,
              'format'       => '?paged=%#%',
              'show_all'     => false,
              'type'         => 'list',
              'end_size'     => 2,
              'mid_size'     => 1,
              'prev_next'    => false,
              'add_fragment' => '',
          ) );
          //str_replace( "pagination", 'pagenation', $pagination );
          print_r($pagination);*/
      ?>
      </div>-->
    </div>
  </section>


</main>


<?php
get_sidebar();
get_footer();
?>