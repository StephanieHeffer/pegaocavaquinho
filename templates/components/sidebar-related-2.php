<div class="col-12 col-sm-6">
<div <?php post_class('highlight-see-more'); ?>>
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
            <?php endif; ?>
        </a>
    <?php endif; ?>
    <!-- /post thumbnail -->
        <!-- post title -->
        <h3 class="highlight-chapeu d-inline-block text-uppercase">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
                <?php the_title(); ?>
            </a>
        </h3>
        <!-- /post title -->

        </div>

</div>
</div>
