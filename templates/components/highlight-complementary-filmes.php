    <?php $terms = get_the_terms(get_the_ID(), 'category'); ?>
    <?php if ($terms && !is_wp_error($terms)) { ?>
        <?php foreach ($terms as $term) { ?>

        <?php } ?>
    <?php } ?>
    <div <?php post_class('highlight-complementary item'); ?>>
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
                   <!-- <img data-src="<?//php the_post_thumbnail_url($size); ?>" class="img-fluid w-100 lozad">-->
                  <img data-src="<?php the_post_thumbnail_url(); ?>" class="img-fluid w-100 lozad">
                <?php else : ?>
                    <?php echo '<img data-src="' . get_bloginfo('stylesheet_directory') . '/assets/img/thumb-vazio.jpg" class="img-fluid" />'; ?>
                <?php endif; ?>
            </a>
        <?php endif; ?>
        <!-- /post thumbnail -->

        <!-- chapeu -->
        <?php $chapeu = get_field('chapeu'); ?>
        <?php if ($chapeu) : ?>
            <?php
                $category = get_the_category();
                $link = get_category_link($category[0]->term_id);
                ?>
            <a href="<?php echo $link; ?>" class="highlight-chapeu d-inline-block text-uppercase my-2">
                <?php echo $chapeu; ?>
            </a>
        <?php endif; ?>
        <!-- chapeu -->
        <!-- post title -->
        <h3 class="mb-0 h4">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
                <?php the_title(); ?>
            </a>
        </h3>
        <!-- /post title -->

        <div class="excerpt">
            <a href="<?php the_permalink(); ?>" class="" title="<?php the_excerpt(); ?>">
                <?php the_excerpt(); ?>
            </a>
        </div>
    </div>
