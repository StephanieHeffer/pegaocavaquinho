<?php
    $args = array(
        'post_type'	     => 'cliente',
        'post_status'    => 'publish',
        'posts_per_page' =>  -1,
        'orderby'    	 => 'post_date',
        'order'    	     => 'desc',
    );

    $posts = query_posts($args);
?>
<?php foreach ( $posts as $post ) : setup_postdata($post); ?>
<?php the_title(); ?>
<?php the_content(); ?>
<?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) ); ?>
<?php endforeach; ?> 





<?php $cont=0; foreach ( $posts as $post ) : setup_postdata($post); ?>
<li data-target="#slider-home" data-slide-to="<?=$cont; ?>"></li>
<?php $cont++; endforeach; ?>





<?php
    $args = array(
        'post_type'      => 'page',
        'pagename'       => 'contato',   
    );

    $posts = query_posts($args);
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_title(); ?>
        <?php the_content(); ?>
        <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
    <?php endwhile; ?>
<?php endif; ?>





<?php echo types_render_field('nome'); ?>
<?php the_field('nome'); ?>
<?php echo site_url(''); ?>





<?php echo __("[:pb]lorem ipsum [:en]lorem ipsum[:]") ?>
<?php if(qtranxf_getLanguage() == "pb") : ?>

<?php endif ?>
<?php if(qtranxf_getLanguage() == "es") : ?>

<?php endif ?>
<?php if(qtranxf_getLanguage() == "en") : ?>

<?php endif ?>





<script>
    $(document).ready(function(){
        
        //Set first slider active
        $('#slider-home .carousel-indicators li:first').addClass('active');
        $('#slider-home .carousel-inner .carousel-item:first').addClass('active');
        
        //Displaying an iframe, object or embed in a responsive design
        $('iframe, object, emded').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
        
        //All images responsive
        $('img').addClass('img-fluid');
    });
</script>





[select Estado class:form-control first_as_label "Selecione o Estado*" "Acre" "Alagoas" "Amazonas" "Amapá" "Bahia" "Ceará" "Distrito Federal" "Espírito Santo" "Goiás" "Maranhão" "Mato Grosso" "Mato Grosso do Sul" "Minas Gerais" "Pará" "Paraíba" "Paraná" "Pernambuco" "Piauí" "Rio de Janeiro" "Rio Grande do Norte" "Rondônia" "Rio Grande do Sul" "Roraima" "Santa Catarina" "Sergipe" "São Paulo" "Tocantins"]