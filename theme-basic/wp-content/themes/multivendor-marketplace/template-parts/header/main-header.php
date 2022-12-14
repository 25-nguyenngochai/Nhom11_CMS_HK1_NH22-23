<?php
/**
 * The template part for header
 *
 * @package Multivendor Marketplace 
 * @subpackage multivendor-marketplace
 * @since multivendor-marketplace 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-9 align-self-center">
        <?php if(get_theme_mod('multivendor_marketplace_view_btn_link') != '' || get_theme_mod('multivendor_marketplace_view_btn_text') != ''){ ?>
          <div class="view-btn">
            <a href="<?php echo esc_url(get_theme_mod('multivendor_marketplace_view_btn_link')); ?>"><?php echo esc_html(get_theme_mod('multivendor_marketplace_view_btn_text')); ?> <i class="fas fa-angle-right me-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('multivendor_marketplace_view_btn_text')) ?></span></a>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-7 col-md-4 col-2 text-lg-center align-self-center">
        <?php get_template_part('template-parts/header/navigation'); ?>
      </div>
      <div class="col-lg-3 col-md-4 col-12 text-lg-end text-md-end text-center align-self-center">
        <?php if( get_theme_mod('multivendor_marketplace_phone_number') != ''){ ?>
            <p class="phone_no mb-0 text-md-right"><?php esc_html_e('Call Us Toll Free :','multivendor-marketplace');?> <strong><a href="tel:<?php echo esc_attr( get_theme_mod('multivendor_marketplace_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('multivendor_marketplace_phone_number',''));?></a></strong></p>
        <?php } ?>
      </div>
    </div>
  </div>
</div>