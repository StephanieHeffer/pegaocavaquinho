<div <?php post_class('highlight-see-more mb-4'); ?>>
    <!-- post thumbnail -->
    <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'large'); ?>
    <?php $video_destacado = get_field('video_destacado'); ?>
    <?php if ($video_destacado) : ?>
        <a class="video-featured d-block position-relative" data-fancybox href="<?php echo $video_destacado; ?>">
            <img data-src="<?php the_post_thumbnail_url($size); ?>" class="img-fluid w-100 lozad">
            <span class="d-flex justify-content-center align-items-center h-100 w-100">
                <i class="fab fa-youtube"></i>
            </span>
        </a>
    <?php else : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block mb-2">
            <?php if (has_post_thumbnail()) : ?>
                <img data-src="<?php the_post_thumbnail_url($size); ?>" class="img-fluid w-100 lozad">
            <?php else : ?>
                <?php echo '<img data-src="' . get_bloginfo('stylesheet_directory') . '/assets/img/thumb-vazio.jpg" class="img-fluid" />'; ?>
            <?php endif; ?>
        </a>
    <?php endif; ?>
    <!-- /post thumbnail -->

    <!-- post title -->
    <h3 class="h5 mb-0">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
            <?php the_title(); ?>
        </a>
    </h3>
    <!-- /post title -->

    <hr class="w-25 mx-0 my-2">

    <div class="excerpt">
        <a href="<?php the_permalink(); ?>" class="" title="<?php the_excerpt(); ?>">
            <?php echo get_the_excerpt(); ?>
        </a>
    </div>
    <hr>
</div>
