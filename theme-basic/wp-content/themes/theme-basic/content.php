<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <div class="entry-thumbnail">
        <?php mytheme_thumbnail('thumbnail');?>
    </div>
    <div class="entry-header">
        <?php mytheme_entry_header(); ?>
        <!-- <?php mytheme_entry_meta(); ?> -->
    </div>
    <div class="entry-content">
        <?php mytheme_entry_content(); ?>
        <?php ( is_single() ? mytheme_entry_tag(): '');  ?>
    </div>

</article>