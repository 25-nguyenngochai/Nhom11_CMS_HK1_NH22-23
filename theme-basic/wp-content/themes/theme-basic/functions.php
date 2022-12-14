<?php

define('THEME_URL', get_stylesheet_directory());
define('CORE_URL', THEME_URL . "/core");
/**
 * Embed(nhúng) file "init.php" file.
 *
 */
require_once(CORE_URL . "/init.php");
/**
 * Set content width(thiết lập chìu rộng nd).
 */
if (!isset($content_width)) {
    $content_width = 620;
}
/**
 * Khai báo chức năng của theme.
 */
// if(function_exists('mytheme_theme_setup')){
//     function mytheme_theme_setup(){
//         /* Declare(thiet lap) text domain. */
//         $languages_folder = THEME_URL . '/languages';
//         load_theme_textdomain('mytheme', $languages_folder);
      
//     }
//     add_action('init','mytheme_theme_setup');
// }
if (function_exists('add_theme_support')) { 

    // if ( is_single() ) {
    //     the_title( '<h1 class="entry-title">', '</h1>' );
    // } else {
    //     the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
    // }
    /* Automatically add RSS feed links to <head> tag. */
    add_theme_support('automatic-feed-links');

     /* Add featured image for post. */
    add_theme_support('post-thumbnails');

     /* Automatically add website_name | website_description to <title> tag. */
     add_theme_support( 'title-tag' );

     /* Add post formats. */
     add_theme_support('post-formats', [
        'image',
        'video',
        'gallery',
        'quote',
        'link'
    ]);


     /* Add custom background. */
     $default_background = [
        'default-color' => '#ffffff',
    ];
    add_theme_support('custom-background', $default_background);

      /* Register menu. */
      register_nav_menu('primary-menu', __('Primary Menu', 'mytheme'));

       /* Register sidebar. */
       $sidebar = [
        'name' => __('Main Sidebar', 'mytheme'),
        'id' => 'main-sidebar',
        'description' => __('Default Sidebar'),
        'class' => 'main-sidebar',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ];
    register_sidebar($sidebar);
}

/*****************
 * Template function
 */
if(!function_exists('mytheme_header')){
    function mytheme_header(){ ?>
<div class="site-name">
    <?php
            if(is_home()){
            printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
            get_bloginfo('url'),
            get_bloginfo('description'),
            get_bloginfo('sitename'));
            }
            else{
                printf('<p><a href="%1$s" title="%2$s">%3$s</a></p>',
            get_bloginfo('url'),
            get_bloginfo('description'),
            get_bloginfo('sitename'));
            }
            ?>
</div>
<div class="site-description"><?php bloginfo('description')?></div>
<?php

}
}

/**
 * Thiet lap menu
 */
if(!function_exists('mytheme_menu')){
    function mytheme_menu($menu){
        $menu = array(
            'theme_location'=>$menu,
            'container'=>'nav',
            'container_class'=>$menu,
            'items_wrap'=> '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>'
        );
        wp_nav_menu($menu);

    }
} 

/**
 * Phan trang
 */
if ( ! function_exists( 'mytheme_pagination' ) ) {
    function mytheme_pagination() {
      /*
       * Không hiển thị phân trang nếu trang đó có ít hơn 2 trang
       */
      if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
        return '';
      }
    ?>
<nav class="pagination" role="navigation">
    <?php if ( get_next_post_link() ) : ?>
    <div class="prev"><?php next_posts_link( __('Older Posts', 'mytheme') ); ?></div>
    <?php endif; ?>


    <?php if ( get_previous_posts_link() ) : ?>
    <div class="next"><?php previous_posts_link( __('Newer Posts', 'mytheme') ); ?></div>
    <?php endif; ?>


</nav><?php
    }
  }

  /**
   * Hien thi thumbnail
   */
if(!function_exists('theme_thumbnail')){
    function mytheme_thumbnail($size) {
        if(!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')):?>
<figure class="post-thumbnail"><?php the_post_thumbnail($size); ?></figure>
<?php endif; ?>
<?php }
}
 /**
   * Hien thi tieu de post
   */
  if ( ! function_exists( 'mytheme_entry_header' ) ) {
    function mytheme_entry_header() {
      if ( is_single() ) : ?>
<h1 class="entry-title">
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
    </a>
</h1>
<?php else : ?>
<h2 class="entry-title">
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
    </a>
</h2><?php
      endif;
    }
  }

//Lay du lieu post
if(!function_exists('mytheme_entry_meta')){
    function mytheme_entry_meta(){?>
<?php if(is_page()) : ?>
<div class="entry-meta">
    <?php
    printf(__('<span class="author">Posted by %1$s','mytheme'),
    get_the_author());

    printf(__('<span class="date-published">at %1$s','mytheme'),
    get_the_date());

    printf(__('<span class="category">in %1$s','mytheme'),
    get_the_category_list( ',' ));

    if( comments_open() ) :
        echo '<span class="meta-reply">';
        comments_popup_link(
            __('Leave a comment', 'mytheme'),
            __('One a comment', 'mytheme'),
            __('% comments','mytheme'),
            __('Read all comments', 'mytheme')
        );
        echo '</span>'; 
    endif;
    ?>
</div>
<?php endif;?>
<?php }
}

//Ham hien thi nd cua post/page

if(!function_exists('mytheme_entry_content')){
    function mytheme_entry_content(){
        if(!is_single() && !is_page() ){
            the_excerpt();
        }
        else{
            the_content();

            /* Phan trang trong single */
            $link_pages = array(
                'before' => __('<p>Page:','mytheme'),
                'after' =>'</p>',
                'nextpagelink' =>__('Next Page','mytheme'),
                'previouspagelink' =>__('Previous','mytheme') 
            );
            wp_link_pages($link_pages);
        }
    }
}

function mytheme_readmore(){
    return'<a class="read-more"href=""'.get_permalink(get_the_ID()). '">'.__('...[Read More]','mytheme').'</a>';
}
add_filter('excerpt_more','mytheme_readmore');

///Hien thi tag
if(!function_exists('mytheme_entry_tag')){
    function mytheme_entry_tag(){
        if ( has_tag()  ):
            echo'<div class="entry-tag">';
            printf(__('Tagged in %1$s', 'mytheme'), get_the_tag_list('', ','));
            echo' </div>';
        endif;
    }
}

/**Nhung file style.css  */
function mytheme_style(){
    wp_register_style('main-style',get_template_directory_uri()."/style.css",'all');
    wp_enqueue_style('main-style');

    wp_register_style('reset-style',get_template_directory_uri()."/reset.css",'all');
    wp_enqueue_style('reset-style');

    //Supper fish Menu
    wp_register_style('superfish-style',get_template_directory_uri()."/superfish.css",'all');
    wp_enqueue_style('superfish-style');
    wp_register_script('superfish-script',get_template_directory_uri()."/superfish.js",array('jquery'));
    wp_enqueue_script('superfish-script');

    //Custom script
    wp_register_script('custom-script',get_template_directory_uri()."/custom.js",array('jquery'));
    wp_enqueue_script('custom-script');

}
add_action('wp_enqueue_scripts','mytheme_style');