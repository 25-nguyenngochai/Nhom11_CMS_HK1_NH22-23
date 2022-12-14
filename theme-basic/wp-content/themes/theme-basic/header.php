<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title></title>
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="container">
        <div class="logo">
            <?php mytheme_header();?>
            <?php mytheme_menu('primary-menu');?>
        </div>