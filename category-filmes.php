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

    <h2 class="h3 section-title p-2 text-uppercase mb-4">
	Filmes Oficiais
    </h2>

<article class="row c-carousel c-carousel--filme" id="destaque4home">
<button class="col-12 col-sm-2 js-carousel--filme-prev sodesk" style="background-color: transparent;font-size: 80px;border-style:hidden;">&lt;</button>
<?php $oficiais= new WP_Query('cat=20');?>
<?php if ($oficiais->have_posts()) :?>
<div class="c-carousel__slides js-carousel--filme col-12 col-md-8 mb-4">
<?php while ($oficiais->have_posts()) : $oficiais->the_post(); ?>
                    <?php get_template_part('templates/components/highlight-complementary-filmes'); ?>
                    <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
</div>
    <?php endif; ?>
 <button class="col-12 col-sm-2 js-carousel--filme-next sodesk" style="background-color: transparent;font-size: 80px;border-style:hidden;">&gt;</button>
   <div class="js-carousel--filme-dots"></div>
   <script src="<?php echo get_template_directory_uri(); ?>/assets/js/_slidefilmes.js"></script>
</article>


 <?php if (have_posts() && ($wp_query->post_count >= 1 || $ajax)) : ?>
        <section class="row">
                <div class="row list">
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
			<?php if (!in_category('filmesoficiais')){ ?>
                        <?php get_template_part('templates/components/highlight-see-more'); ?>
			<?php } ?>
                    <?php endwhile; ?>
                </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('templates/components/pagination'); ?>
</main>

<?php get_footer(); ?>

