<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <div class="entry-thumbnail">
        <?php mytheme_thumbnail('large');?>
    </div>
    <div class="entry-header">
        <?php mytheme_entry_header(); ?>
        <?php $attachment = get_children(array('post_parent' => $post->ID)) ?>
        <?php $attachment_number = count ($attachment);
        printf(__('This image post contains %1$s photos','mytheme'),$attachment_number);
         ?>
    </div>
    <div class="entry-content">
        <?php mytheme_entry_content(); ?>
        <?php ( is_single() ? mytheme_entry_tag(): '');  ?>
    </div>

</article>