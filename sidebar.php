<!-- sidebar -->
<aside class="sidebar col-12 col-sm-5 col-md-4 order-12 order-sm-1" role="complementary">

    <div class="sticky-top">
       <?php if (in_category('discos')): get_template_part('templates/components/related-music-discos');?>
        <?php else: ?>
        <div <?php post_class(); ?>>
            <h3 class="h5 section-title p-2 text-uppercase mb-0">Relacionados</h3>
            <?php related_posts(); ?>
        </div>
        <?php endif;?>
        
    </div>
</aside>
<!-- /sidebar -->
