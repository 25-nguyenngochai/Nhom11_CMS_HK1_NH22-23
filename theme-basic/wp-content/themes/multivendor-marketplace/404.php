<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Multivendor Marketplace
 */

get_header(); ?>

<div class="container">
	<main id="maincontent" role="main">
		<div class="page-content">
	    	<h1><?php esc_html_e('404 Not Found','multivendor-marketplace');?></h1>
			<p class="text-404"><?php esc_html_e('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','multivendor-marketplace');?></p>
			<div class="more-btn mt-4 mb-4">
			    <a class="p-3" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('multivendor_marketplace_button_text',__('Go Back','multivendor-marketplace')));?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('multivendor_marketplace_button_text',__('Go Back','multivendor-marketplace')));?></span></a>
			</div>
		</div>
		<div class="clearfix"></div>
	</main>
</div>

<?php get_footer(); ?>