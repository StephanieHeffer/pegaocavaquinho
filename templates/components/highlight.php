<div class="">
    <?php $terms = get_the_terms(get_the_ID(), 'category'); ?>
    <?php if ($terms && !is_wp_error($terms)) { ?>
        <?php foreach ($terms as $term) { ?>

        <?php } ?>
    <?php } ?>
    <div <?php post_class('highlight-complementary item'); ?>>
        <!-- post title -->
        <h3 class="highlight-chapeu d-inline-block text-uppercase">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
                <?php the_title(); ?>
            </a>
        </h3>
        <!-- /post title -->

    </div>
</div>
