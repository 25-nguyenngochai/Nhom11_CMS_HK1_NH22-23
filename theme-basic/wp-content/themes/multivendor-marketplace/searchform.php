<?php
/**
 * The template for displaying search forms in multivendor-marketplace
 *
 * @package Multivendor Marketplace
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'multivendor-marketplace' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'SEARCH', 'placeholder','multivendor-marketplace' ); ?>" value="<?php echo esc_attr( get_search_query()); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'SEARCH', 'submit button','multivendor-marketplace' ); ?>">
</form>