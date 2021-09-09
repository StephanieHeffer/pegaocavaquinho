<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<?php
$term = get_queried_object();
$color = get_field('cor_da_categoria', $term);
?>

<!--Destauqes Carousel--!>
<article class="row c-carousel c-carousel--simple" style="margin-bottom: 5rem; margin-top: 5rem;">
     <button class="col-12 col-sm-2 js-carousel--simple-prev sodesk" style="background-color: transparent;font-size: 80px;border-style:hidden;">&lt;</button>
 <?php if (have_rows('destaques_carousel')) : ?>
        <div class="c-carousel__slides js-carousel--simple col-12 col-md-8 mb-4">
            <?php while (have_rows('destaques_carousel')) : the_row(); ?>
                <?php $destaque_carousel = get_sub_field('destaque_carousel'); ?>
                <?php if ($destaque_carousel) : ?>
                    <?php $post = $destaque_carousel; ?>
                    <?php setup_postdata($post); ?>
                    <?php get_template_part('templates/components/highlight-complementary-2'); ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
  <button class="col-12 col-sm-2 js-carousel--simple-next sodesk" style="background-color: transparent;font-size: 80px;border-style:hidden;">&gt;</button>
   <div class="js-carousel--simple-dots"></div>
   <script src="<?php echo get_template_directory_uri(); ?>/assets/js/_slidepodcast.js"></script>
</article>
<!-- destaques_carousel e destaque_carousel--!>

<!--Fim Destaque Carousel--!>

<main class="container">
    <section class="row align-items-stretch" style="margin-bottom: 5rem;">
      <div class="col-12 col-md-8 mb-4">
        <?php $destaque_1 = get_field('destaque_1'); ?>
        <?php if ($destaque_1) : ?>
            <?php $post = $destaque_1; ?>
            <?php setup_postdata($post); ?>
            <?php get_template_part('templates/components/highlight-primary'); ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        
       </div>

<div class="col-12 col-md-4 mb-4">
       <!--Musicas--!>
        <?php if (have_rows('destaques_musica')) : ?>
        <div>
           <h3> Músicas </h3>
            <?php while (have_rows('destaques_musica')) : the_row(); ?>
                <?php $destaque_musica = get_sub_field('destaque_musica'); ?>
                <?php if ($destaque_musica) : ?>
                    <?php $post = $destaque_musica; ?>
                    <?php setup_postdata($post); ?>
                    <?php get_template_part('templates/components/highlight'); ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
     <!--Fim Musica--!>
</div>
    </section>

<!--Destaques Complementares--!>
<section class="row"> 
<?php if (have_rows('destaques_geral')) : ?>
            <?php while (have_rows('destaques_geral')) : the_row(); ?>
                <?php $destaque_geral = get_sub_field('destaque_geral'); ?>
                <?php if ($destaque_geral) : ?>
                    <?php $post = $destaque_geral; ?>
                    <?php setup_postdata($post); ?>
                    <?php get_template_part('templates/components/highlight-complementary-4'); ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php endwhile; ?>
    <?php endif; ?>
</section>
<!--Fim Destaques Complementares--!>


<!--Galeria--!>
<!--<section class="row" style="margin-top: 5rem; margin-bottom: 5rem;">
<?//php if (have_rows('destaques_galeria')) : ?>
            <?//php while (have_rows('destaques_galeria')) : the_row(); ?>
                <?//php $destaque_galeria = get_sub_field('destaque_galeria'); ?>
                <?//php if ($destaque_galeria) : ?>
                    <?//php $post = $destaque_galeria; ?>
                    <?//php setup_postdata($post); ?>
                    <?//php get_template_part('templates/components/highlight-galeria'); ?>
                    <?//php wp_reset_postdata(); ?>
                <?//php endif; ?>
            <?//php endwhile; ?>
    <?//php endif; ?>
</section>-->
<!--Fim Galeria--!>

</main>

<?php get_footer(); ?>
