<?php $terms = get_the_terms(get_the_ID(), 'category'); ?>
<?php if ($terms && !is_wp_error($terms)) { ?>
    <?php foreach ($terms as $term) { ?>
        <style>
            .highlight-complementary .image:before,
            .highlight-see-more .image:before {
                background-color: <?php echo get_field('cor_da_categoria', 'category_' . $term->term_id); ?>
            }
        </style>
    <?php } ?>
<?php } ?>

<section class="row">
    <div class="col-12 col-md-3 mb-2">
        <h3 class="read-more-title h5 text-uppercase">
            Leia mais
        </h3>
        <hr class="mt-0">
    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <?php
            global $post;
            $categories = get_the_category($post->ID);
            $catidlist = '';
            foreach ($categories as $category) {
                $catidlist .= $category->cat_ID . ",";
            }
            $custom_query_args = array(
                'posts_per_page' => 6,
                'post__not_in' => array($post->ID),
                'orderby' => 'rand',
                'cat' => $catidlist,
            );
            $custom_query = new WP_Query($custom_query_args);

            if ($custom_query->have_posts()) : ?>
                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                    <div class="col-12 col-md-4 mb-4">
                        <div <?php post_class('highlight-see-more'); ?>>
                            <!-- post thumbnail -->
                            <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'large'); ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="image d-block mb-2 position-relative">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img data-src="<?php the_post_thumbnail_url($size); ?>" class="img-fluid lozad">
                                <?php else : ?>
                                    <?php echo '<img data-src="' . get_bloginfo('stylesheet_directory') . '/assets/img/thumb-vazio.jpg" class="img-fluid lozad" />'; ?>
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

                            <hr class="w-25 mx-0 my-2">

                            <div class="excerpt">
                                <a href="<?php the_permalink(); ?>" class="" title="<?php the_excerpt(); ?>">
                                    <?php echo get_the_excerpt(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Sem posts relacionados.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
