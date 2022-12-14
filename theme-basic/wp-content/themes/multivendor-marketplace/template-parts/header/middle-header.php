<?php
/**
 * The template part for Middle Header
 *
 * @package Multivendor Marketplace
 * @subpackage multivendor-marketplace
 * @since multivendor-marketplace 1.0
 */
?>

<div class="middle-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12 text-lg-start text-md-start text-center align-self-center">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('multivendor_marketplace_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('multivendor_marketplace_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('multivendor_marketplace_tagline_hide_show',true) != ''){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 col-12 align-self-center">
        <?php if(class_exists('woocommerce')){ ?>
          <div class="search-box">
            <?php get_product_search_form(); ?>
          </div> 
        <?php }?>
      </div>
      <div class="col-lg-3 col-md-3 col-12 align-self-center px-md-0 text-lg-end text-md-end text-center">
        <?php if(class_exists('woocommerce')){ ?>
            <span class="account me-4">
                <?php if ( is_user_logged_in() ) { ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','multivendor-marketplace'); ?>"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','multivendor-marketplace' );?></span></a>
                <?php }
                else { ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','multivendor-marketplace'); ?>"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'Login / Register','multivendor-marketplace' );?></span></a>
                <?php } ?>
            </span>
            <span class="wishlist me-4">
                <?php if(defined('YITH_WCWL')){ ?>
                  <a class="wishlist_view position-relative" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><i class="fas fa-heart"></i>
                  <?php $wishlist_count = YITH_WCWL()->count_products(); ?>
                  <span class="wishlist-counter"><?php echo $wishlist_count; ?></span></a>
                <?php }?>
            </span>
            <span class="cart_no">
                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','multivendor-marketplace' ); ?>"><i class="fas fa-shopping-bag"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','multivendor-marketplace' );?></span></a>
                <span class="cart-value"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></span>
            </span>
        <?php }?>
      </div>
    </div>
  </div>
</div>