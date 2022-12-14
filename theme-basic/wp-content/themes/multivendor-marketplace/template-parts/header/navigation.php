<?php
/**
 * The template part for header
 *
 * @package Multivendor Marketplace 
 * @subpackage multivendor-marketplace
 * @since multivendor-marketplace 1.0
 */
?>

<div id="header">
  <?php if(has_nav_menu('primary')){ ?>
    <div class="toggle-nav mobile-menu text-lg-end text-md-end text-end">
      <button role="tab" onclick="multivendor_marketplace_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','multivendor-marketplace'); ?></span></button>
    </div>
  <?php } ?>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'multivendor-marketplace' ); ?>">
      <?php if(has_nav_menu('primary')){
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu clearfix' ,
          'menu_class' => 'clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
      } ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="multivendor_marketplace_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','multivendor-marketplace'); ?></span></a>
    </nav>
  </div>
</div>