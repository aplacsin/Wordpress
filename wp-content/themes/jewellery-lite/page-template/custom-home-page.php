<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php do_action( 'jewellery_lite_before_slider' ); ?>

<?php if(get_theme_mod('jewellery_lite_slider_hide_show',true)==1){ ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $jewellery_lite_pages = array();
      for ( $count = 1; $count <= 4; $count++ ) {
        $mod = intval( get_theme_mod( 'jewellery_lite_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $jewellery_lite_pages[] = $mod;
        }
      }
      if( !empty($jewellery_lite_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $jewellery_lite_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( jewellery_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewellery_lite_slider_excerpt_number','30')))); ?></p>
              <div class="more-btn">
                <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'jewellery-lite' ); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>
<?php } ?>

<?php do_action( 'jewellery_lite_after_slider' ); ?>

<section id="second_section">
  <div class="container">
    <div class="row">
      <?php if( get_theme_mod( 'jewellery_lite_sidebar') != '') { ?>
      <div class="col-lg-3 col-md-4">
        <div id="sidebar">
          <?php dynamic_sidebar('sidebar-4'); ?>
        </div>
      </div>
      <?php }?>
      <div class="<?php if( get_theme_mod( 'jewellery_lite_sidebar') != '') { ?>col-lg-9 col-md-8"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
        <div id="content-vw">
          <div class="container">
            <?php while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
          </div>
        </div>
      </div>
    </div>
  </div>  
</section>

<?php do_action( 'jewellery_lite_after_second_section' ); ?>

<?php get_footer(); ?>