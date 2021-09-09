<!-- sidebar -->
<aside class="sidebar col-12 col-sm-5 col-md-4 order-12 order-sm-1" role="complementary">

<!--    <div class="sticky-top">-->
      <div>
        <div><p>SOBRE A MUSICA</p>
           <?php the_field('informacao_musica'); ?>
        </div>

        <div <?php post_class(); ?>>
            <h3 class="h5 section-title p-2 text-uppercase mb-0">Relacionados</h3>
            <?php related_posts(); ?>
        </div>
    </div>
</aside>
