<div class="col-12 col-md-4 mb-4">
    <div <?php post_class('highlight-see-more'); ?>>
        <!-- post thumbnail -->
        <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'large'); ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="image d-block mb-2 position-relative">
            <?php if (has_post_thumbnail()) : ?>
<!-- <img data-src="<?//php the_post_thumbnail_url($size); ?>" class="img-fluid lozad" src="<?//php the_post_thumbnail_url($size); ?>" data-loaded="true">
-->
 <img data-src="<?php the_post_thumbnail_url(); ?>" class="img-fluid lozad" src="<?php the_post_thumbnail_url(); ?>" data-loaded="true">
            <?php else : ?>
                <?php echo '<img data-src="' . get_bloginfo('stylesheet_directory') . '/assets/img/thumb-vazio.jpg" class="img-fluid" />'; ?>
            <?php endif; ?>
        </a>
        <!-- /post thumbnail -->

        <!-- post title -->
        <h4 class="mb-0">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
                <?php the_title(); ?>
            </a>
        </h4>
        <!-- /post title -->


    </div>
</div>
