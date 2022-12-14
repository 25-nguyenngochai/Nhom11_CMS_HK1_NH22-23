<?php

	$multivendor_marketplace_custom_css= "";

	/*-------------------- Global Color -------------------*/

	$multivendor_marketplace_first_color = get_theme_mod('multivendor_marketplace_first_color');

	if($multivendor_marketplace_first_color != false){
		$multivendor_marketplace_custom_css .='{';
			$multivendor_marketplace_custom_css .='background: '.esc_attr($multivendor_marketplace_first_color).';';
		$multivendor_marketplace_custom_css .='}';
	}

	if($multivendor_marketplace_first_color != false){
		$multivendor_marketplace_custom_css .='{';
			$multivendor_marketplace_custom_css .='color: '.esc_attr($multivendor_marketplace_first_color).';';
		$multivendor_marketplace_custom_css .='}';
	}

	if($multivendor_marketplace_first_color != false){
		$multivendor_marketplace_custom_css .='{';
			$multivendor_marketplace_custom_css .='border-color: '.esc_attr($multivendor_marketplace_first_color).';';
		$multivendor_marketplace_custom_css .='}';
	}

	$multivendor_marketplace_custom_css .='@media screen and (max-width:1000px) {';
		if($multivendor_marketplace_first_color != false){
			$multivendor_marketplace_custom_css .='.main-navigation a:hover{
				color:'.esc_attr($multivendor_marketplace_first_color).' !important;
			}';
		}
	$multivendor_marketplace_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$multivendor_marketplace_theme_lay = get_theme_mod( 'multivendor_marketplace_width_option','Full Width');
    if($multivendor_marketplace_theme_lay == 'Boxed'){
		$multivendor_marketplace_custom_css .='body{';
			$multivendor_marketplace_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$multivendor_marketplace_custom_css .='}';
		$multivendor_marketplace_custom_css .='.scrollup i{';
			$multivendor_marketplace_custom_css .='right: 100px;';
		$multivendor_marketplace_custom_css .='}';
	}else if($multivendor_marketplace_theme_lay == 'Wide Width'){
		$multivendor_marketplace_custom_css .='body{';
			$multivendor_marketplace_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$multivendor_marketplace_custom_css .='}';
		$multivendor_marketplace_custom_css .='.scrollup i{';
			$multivendor_marketplace_custom_css .='right: 30px;';
		$multivendor_marketplace_custom_css .='}';
	}else if($multivendor_marketplace_theme_lay == 'Full Width'){
		$multivendor_marketplace_custom_css .='body{';
			$multivendor_marketplace_custom_css .='max-width: 100%;';
		$multivendor_marketplace_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$multivendor_marketplace_resp_slider = get_theme_mod( 'multivendor_marketplace_resp_slider_hide_show',false);
	if($multivendor_marketplace_resp_slider == true && get_theme_mod( 'multivendor_marketplace_slider_hide_show', false) == false){
    	$multivendor_marketplace_custom_css .='#slider{';
			$multivendor_marketplace_custom_css .='display:none;';
		$multivendor_marketplace_custom_css .='} ';
	}
    if($multivendor_marketplace_resp_slider == true){
    	$multivendor_marketplace_custom_css .='@media screen and (max-width:575px) {';
		$multivendor_marketplace_custom_css .='#slider{';
			$multivendor_marketplace_custom_css .='display:block;';
		$multivendor_marketplace_custom_css .='} }';
	}else if($multivendor_marketplace_resp_slider == false){
		$multivendor_marketplace_custom_css .='@media screen and (max-width:575px) {';
		$multivendor_marketplace_custom_css .='#slider{';
			$multivendor_marketplace_custom_css .='display:none;';
		$multivendor_marketplace_custom_css .='} }';
		$multivendor_marketplace_custom_css .='@media screen and (max-width:575px){';
		$multivendor_marketplace_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$multivendor_marketplace_custom_css .='margin-top: 45px;';
		$multivendor_marketplace_custom_css .='} }';
	}

	$multivendor_marketplace_resp_sidebar = get_theme_mod( 'multivendor_marketplace_sidebar_hide_show',true);
    if($multivendor_marketplace_resp_sidebar == true){
    	$multivendor_marketplace_custom_css .='@media screen and (max-width:575px) {';
		$multivendor_marketplace_custom_css .='#sidebar{';
			$multivendor_marketplace_custom_css .='display:block;';
		$multivendor_marketplace_custom_css .='} }';
	}else if($multivendor_marketplace_resp_sidebar == false){
		$multivendor_marketplace_custom_css .='@media screen and (max-width:575px) {';
		$multivendor_marketplace_custom_css .='#sidebar{';
			$multivendor_marketplace_custom_css .='display:none;';
		$multivendor_marketplace_custom_css .='} }';
	}

	$multivendor_marketplace_resp_scroll_top = get_theme_mod( 'multivendor_marketplace_resp_scroll_top_hide_show',true);
	if($multivendor_marketplace_resp_scroll_top == true && get_theme_mod( 'multivendor_marketplace_hide_show_scroll',true) == false){
    	$multivendor_marketplace_custom_css .='.scrollup i{';
			$multivendor_marketplace_custom_css .='visibility:hidden !important;';
		$multivendor_marketplace_custom_css .='} ';
	}
    if($multivendor_marketplace_resp_scroll_top == true){
    	$multivendor_marketplace_custom_css .='@media screen and (max-width:575px) {';
		$multivendor_marketplace_custom_css .='.scrollup i{';
			$multivendor_marketplace_custom_css .='visibility:visible !important;';
		$multivendor_marketplace_custom_css .='} }';
	}else if($multivendor_marketplace_resp_scroll_top == false){
		$multivendor_marketplace_custom_css .='@media screen and (max-width:575px){';
		$multivendor_marketplace_custom_css .='.scrollup i{';
			$multivendor_marketplace_custom_css .='visibility:hidden !important;';
		$multivendor_marketplace_custom_css .='} }';
	}

	/*-------------- Copyright Alignment ----------------*/

	$multivendor_marketplace_copyright_alingment = get_theme_mod('multivendor_marketplace_copyright_alingment');
	if($multivendor_marketplace_copyright_alingment != false){
		$multivendor_marketplace_custom_css .='.copyright p{';
			$multivendor_marketplace_custom_css .='text-align: '.esc_attr($multivendor_marketplace_copyright_alingment).';';
		$multivendor_marketplace_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$multivendor_marketplace_site_title_font_size = get_theme_mod('multivendor_marketplace_site_title_font_size');
	if($multivendor_marketplace_site_title_font_size != false){
		$multivendor_marketplace_custom_css .='.logo h1, .logo p.site-title{';
			$multivendor_marketplace_custom_css .='font-size: '.esc_attr($multivendor_marketplace_site_title_font_size).';';
		$multivendor_marketplace_custom_css .='}';
	}

	$multivendor_marketplace_site_tagline_font_size = get_theme_mod('multivendor_marketplace_site_tagline_font_size');
	if($multivendor_marketplace_site_tagline_font_size != false){
		$multivendor_marketplace_custom_css .='.logo p.site-description{';
			$multivendor_marketplace_custom_css .='font-size: '.esc_attr($multivendor_marketplace_site_tagline_font_size).';';
		$multivendor_marketplace_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$multivendor_marketplace_preloader_bg_color = get_theme_mod('multivendor_marketplace_preloader_bg_color');
	if($multivendor_marketplace_preloader_bg_color != false){
		$multivendor_marketplace_custom_css .='#preloader{';
			$multivendor_marketplace_custom_css .='background-color: '.esc_attr($multivendor_marketplace_preloader_bg_color).';';
		$multivendor_marketplace_custom_css .='}';
	}

	$multivendor_marketplace_preloader_border_color = get_theme_mod('multivendor_marketplace_preloader_border_color');
	if($multivendor_marketplace_preloader_border_color != false){
		$multivendor_marketplace_custom_css .='.loader-line{';
			$multivendor_marketplace_custom_css .='border-color: '.esc_attr($multivendor_marketplace_preloader_border_color).'!important;';
		$multivendor_marketplace_custom_css .='}';
	}