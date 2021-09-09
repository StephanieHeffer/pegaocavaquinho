<!--<div class="col-12 col-md-8 mb-4">-->
    <?php $terms = get_the_terms(get_the_ID(), 'category'); ?>
    <?php if ($terms && !is_wp_error($terms)) { ?>
        <?php foreach ($terms as $term) { ?>

        <?php } ?>
    <?php } ?>
    <div <?php post_class('highlight-primary'); ?>>
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
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block">
                <?php if (has_post_thumbnail()) : ?>
                    <!--<img data-src="<?//php the_post_thumbnail_url($size); ?>" class="img-fluid w-100 lozad">--!>
                    <img data-src="<?php the_post_thumbnail_url(); ?>" class="img-fluid w-100 lozad">
                <?php else : ?>
                    <?php echo '<img data-src="' . get_bloginfo('stylesheet_directory') . '/assets/img/thumb-vazio.jpg" class="img-fluid lozad" />'; ?>
                <?php endif; ?>
            </a>
        <?php endif; ?>
        <!-- /post thumbnail -->
        <!-- post title -->
        <h2 class="p-3 mb-0 text-uppercase h4">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <!-- /post title -->


       <div class="excerpt p-3">
            <a href="<?php the_permalink(); ?>">
                <?php the_excerpt(); ?>
            </a>
        </div>
    </div>
<!--</div>-->
