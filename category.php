<?php get_header(); ?>

<?php
global $wp_query;
$ajax = $_GET['ajax'];
$paged = get_query_var('paged');
$paged = $paged ? $paged : 1;

$term = get_queried_object();
$color = get_field('cor_da_categoria', $term);
?>

<style type="text/css">
    .highlight-primary,
    .highlight-secondary,
    .highlight-complementary .image:before,
    .highlight-see-more .image:before,
    .highlight-complementary .highlight-chapeu,
    .highlight-see-more .highlight-chapeu,
    .section-title {
        background-color: <?php echo $color; ?> !important;
    }
</style>

<main role="main" class="container" style="background-color:;">

    <h2 class="h5 section-title p-2 text-uppercase mb-4">
       <?php single_cat_title(); ?>
    </h2>
 <?php if (have_posts() && ($wp_query->post_count >= 1 || $ajax)) : ?>
        <section class="row">
                <div class="row list">
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                        <?php get_template_part('templates/components/highlight-see-more'); ?>
                    <?php endwhile; ?>
                </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('templates/components/pagination'); ?>
</main>

<?php get_footer(); ?>

