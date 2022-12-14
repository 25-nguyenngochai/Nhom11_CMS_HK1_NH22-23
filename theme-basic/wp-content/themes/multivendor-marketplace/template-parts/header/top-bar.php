<?php
/**
 * The template part for Middle Header
 *
 * @package Multivendor Marketplace
 * @subpackage multivendor-marketplace
 * @since multivendor-marketplace 1.0
 */
?>

<?php if( get_theme_mod( 'multivendor_marketplace_topbar_hide_show', false) != '') { ?>
  <div class="top-bar p-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 text-lg-start text-md-start text-center align-self-center">
          <div class="row">
            <div class="col-lg-5 col-md-6 text-lg-start text-center align-self-center">
              <?php if( get_theme_mod( 'multivendor_marketplace_free_delivery_link') != '' || get_theme_mod( 'multivendor_marketplace_free_delivery_text') != ''){ ?>
                <a href="<?php echo esc_html(get_theme_mod('multivendor_marketplace_free_delivery_link',''));?>" ><i class="fas fa-truck me-2"></i><?php echo esc_html(get_theme_mod('multivendor_marketplace_free_delivery_text',''));?></a>
              <?php } ?>
            </div>
            <div class="col-lg-7 col-md-6 text-lg-start text-center align-self-center">
              <?php if( get_theme_mod( 'multivendor_marketplace_return_policy_link') != '' || get_theme_mod( 'multivendor_marketplace_return_policy_text') != ''){ ?>
                <a href="<?php echo esc_html(get_theme_mod('multivendor_marketplace_return_policy_link',''));?>" ><i class="fas fa-undo me-2"></i><?php echo esc_html(get_theme_mod('multivendor_marketplace_return_policy_text',''));?></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 text-lg-end text-md-end text-center align-self-cen
        ter">
          <?php if(get_theme_mod('multivendor_marketplace_topbar_text') != ''){ ?>
            <p class="topbar-text mb-lg-0"><?php echo esc_html(get_theme_mod('multivendor_marketplace_topbar_text')); ?></p>
          <?php }?>
        </div>
        <div class="col-lg-4 col-md-4 text-lg-end text-md-end text-center align-self-center">
          <div class="social-icons">
            <?php esc_html_e('Follow Us:','multivendor-marketplace');?> <strong><?php dynamic_sidebar('topbar-social-icons'); ?></strong>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>