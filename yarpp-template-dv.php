<div class="sidebar-related">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
                <?php get_template_part('templates/components/sidebar-related-2'); ?>
        <?php endwhile; ?>

    <?php else : ?>
        <p>Sem posts relacionados.</p>
    <?php endif; ?>
</div>
