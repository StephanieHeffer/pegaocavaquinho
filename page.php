<?php get_header(); ?>

<?php if (have_posts()) : ?>
<main role="main" class="container">
    <?php get_template_part('templates/components/loop-page'); ?>
</main>
<?php endif; ?>

<?php get_footer(); ?>