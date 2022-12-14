<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'multivendor_marketplace_before_slider' ); ?>

  <?php if( get_theme_mod( 'multivendor_marketplace_slider_hide_show', false) != '' || get_theme_mod( 'multivendor_marketplace_resp_slider_hide_show', false) != '') { ?>
    <section id="slider" class="pt-5">
      <div class="container">
        <div class="row">
          <div class="<?php if( get_theme_mod( 'multivendor_marketplace_sale_banner_hide',false) == true) { ?>col-lg-8 col-md-8"<?php } else { ?>col-lg-12 col-md-8 <?php } ?>">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'multivendor_marketplace_slider_speed',4000)) ?>">
              <?php $multivendor_marketplace_sliders_page = array();
                for ( $count = 1; $count <= 3; $count++ ) {
                  $mod = intval( get_theme_mod( 'multivendor_marketplace_slider_page' . $count ));
                  if ( 'page-none-selected' != $mod ) {
                    $multivendor_marketplace_sliders_page[] = $mod;
                  }
                }
                if( !empty($multivendor_marketplace_sliders_page) ) :
                  $args = array(
                    'post_type' => 'page',
                    'post__in' => $multivendor_marketplace_sliders_page,
                    'orderby' => 'post__in'
                  );
                  $query = new WP_Query( $args );
                  if ( $query->have_posts() ) :
                    $i = 1;
              ?>
              <div class="carousel-inner" role="listbox">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                    <?php if(has_post_thumbnail()){
                      the_post_thumbnail();
                    } else{?>
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="" />
                    <?php } ?>
                    <div class="carousel-caption">
                      <div class="inner_carousel">
                        <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        <p class="wow slideInRight delay-1000" data-wow-duration="2s"><?php $multivendor_marketplace_excerpt = get_the_excerpt(); echo esc_html( multivendor_marketplace_string_limit_words( $multivendor_marketplace_excerpt, esc_attr(get_theme_mod('multivendor_marketplace_slider_excerpt_number','10')))); ?></p>
                        <div class="slider-btn wow slideInRight delay-1000" data-wow-duration="2s">
                          <a href="<?php the_permalink(); ?>"><?php echo esc_html('Read More','multivendor-marketplace');?><span class="screen-reader-text"><?php echo esc_html('Read More','multivendor-marketplace');?></span></a>
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
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
                <i class="fas fa-angle-left"></i>
                <span class="screen-reader-text"><?php echo esc_html('Previous','multivendor-marketplace'); ?></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
                <i class="fas fa-angle-right"></i>
                <span class="screen-reader-text"><?php echo esc_html('Next','multivendor-marketplace'); ?></span>
              </button>
            </div>
          </div>
          <?php if( get_theme_mod( 'multivendor_marketplace_sale_banner_hide',false) != false) { ?>
          <div class="col-lg-4 col-md-4">
            <div class="sale-banner">
              <?php $multivendor_marketplace_sale_pages = array();
                for ( $count = 0; $count <= 0; $count++ ) {
                  $mod = absint( get_theme_mod( 'multivendor_marketplace_sale_page' ));
                  if ( 'page-none-selected' != $mod ) {
                    $multivendor_marketplace_sale_pages[] = $mod;
                  }
                }
                if( !empty($multivendor_marketplace_sale_pages) ) :
                  $args = array(
                    'post_type' => 'page',
                    'post__in' => $multivendor_marketplace_sale_pages,
                    'orderby' => 'post__in'
                  );
                  $query = new WP_Query( $args );
                  if ( $query->have_posts() ) :
                    $i = 1;
              ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>            
                    <div class="banner-box" role="listbox">
                      <?php the_post_thumbnail(); ?>
                      <div class="banner-content">
                        <h3 class="text-center wow zoomInDown delay-1000" data-wow-duration="2s"><?php the_title(); ?></h3>

                        <div class="text-center wow zoomInDown delay-1000" data-wow-duration="2s">
                          <a href="<?php the_permalink(); ?>"><?php echo esc_html('Buy Now','multivendor-marketplace');?><span class="screen-reader-text"><?php echo esc_html('Buy Now','multivendor-marketplace');?></span></a>
                        </div>
                      </div>
                    </div>
                <?php $i++; endwhile; 
                  wp_reset_postdata();?>
                <?php else : ?>
                  <div class="no-postfound"></div>
                <?php endif;
                endif;?>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'multivendor_marketplace_after_slider' ); ?>

  <section id="best-seller-section" class="pt-5 px-2 wow bounceInDown delay-1000" data-wow-duration="3s">
    <div class="container">
      <?php if( get_theme_mod( 'multivendor_marketplace_bestseller_section_title') != '' ) { ?>
        <h2 class="mb-0"><?php echo esc_html(get_theme_mod('multivendor_marketplace_bestseller_section_title','') ); ?></h2>
        <hr class="mt-2 mb-4">
      <?php }?>

      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="sale-banner">
            <?php $multivendor_marketplace_bestseller_banner_pages = array();
              for ( $count = 0; $count <= 0; $count++ ) {
                $mod = absint( get_theme_mod( 'multivendor_marketplace_bestseller_banner_page' ));
                if ( 'page-none-selected' != $mod ) {
                  $multivendor_marketplace_bestseller_banner_pages[] = $mod;
                }
              }
              if( !empty($multivendor_marketplace_bestseller_banner_pages) ) :
                $args = array(
                  'post_type' => 'page',
                  'post__in' => $multivendor_marketplace_bestseller_banner_pages,
                  'orderby' => 'post__in'
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  $i = 1;
            ?>
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div class="seller-banner-box" role="listbox">
                    <?php the_post_thumbnail(); ?>
                    <div class="seller-banner-content">
                      <h3 class="text-center wow zoomInDown delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                  </div>
              <?php $i++; endwhile; 
                wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php endif;
              endif;?>
          </div>
        </div>
        <div class="col-lg-9 col-md-8">
          <?php $multivendor_marketplace_bestseller_product_pages = array();
            for ( $count = 0; $count <= 0; $count++ ) {
              $mod = absint( get_theme_mod( 'multivendor_marketplace_bestseller_product_page' ));
              if ( 'page-none-selected' != $mod ) {
                $multivendor_marketplace_bestseller_product_pages[] = $mod;
              }
            }
            if( !empty($multivendor_marketplace_bestseller_product_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $multivendor_marketplace_bestseller_product_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $count = 0;
                while ( $query->have_posts() ) : $query->the_post(); ?>
                  <?php the_content(); ?>
                <?php $count++; endwhile; ?>
              <?php else : ?>
                  <div class="no-postfound"></div>
              <?php endif;
            endif;
            wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
  </section>

  <?php do_action( 'multivendor_marketplace_after_best_seller_product_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>