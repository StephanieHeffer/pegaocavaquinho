<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>

        <main role="main" class="container">
            <h2 class="h5 section-title text-white p-2 text-uppercase mb-4">
                <?php $url =  "{$_SERVER['REQUEST_URI']}"; ?>
                <?php $e = explode('/', $url); ?>
                <?php $taxonomy = wp_get_post_terms(get_the_ID(), 'category'); ?>
                <?php $tax_names = ''; ?>
                <?php foreach ($taxonomy as $tax) { ?>
                    <?php $tax_names .= '&nbsp;' . $tax->slug; ?>
                <?php } ?>
                <?php if (isset($e[1]) && strpos($tax_names, $e[1]) !== false) { ?>
                    <?php $term = get_term_by('slug', $e[1], 'category'); ?>
                    <?php _e($term->name); ?>
                <?php } else { ?>
                    <?php _e($e[1] . ' is not a valid taxonomy for this post'); ?>
                <?php } ?>
            </h2>

            <style>
                .section-title,
                .single-post article.type-post h1,
                .single-post article.type-post h2,
                .single-post article.type-post h3,
                .single-post article.type-post h4,
                .single-post article.type-post h5,
                .single-post article.type-post h6 {
                    background-color: <?php echo get_field('cor_da_categoria', 'category_' . $term->term_id); ?>
                }

                .ads_text {
                    border: 0pt none;
                    float: left;
                    padding-right: 10px;
                    padding-bottom: 1px;
		}

            </style>

            <h1 class="h3 mb-3 text-uppercase" style="background-color:;">
                <?php the_title(); ?>
            </h1>
            <!-- section -->
            <div class="row">

                <section class="col-12 col-sm-7 col-md-8 order-0">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <!-- post content -->
                         <?//php get_template_part('subcategory-videos'); ?>
                        <?php the_content(); ?>
                      <input type="button" value="Calcular" class="w-50 btn text-uppercase btn-light avancar" id="btn-calc">
                      <div class="resposta text-center text-uppercase font-weight-bold">
	                    <div id="result-calc"></div>
		      <?php if (have_rows('flex')):

			while (have_rows('flex')): the_row(); 
                              $valor = get_sub_field('valor_flex');
?>
				
			<div class="resultado-quiz <?php echo $valor; ?>">
		<?php
				$titulo_quizz =  get_sub_field('nome_flex'); 
				 $image = get_sub_field('imagem_flex');
            ?>
		<p><?php echo  $titulo_quizz; ?></p>
            <figure>
                <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
                <figcaption><?php echo $image['caption']; ?></figcaption>
            </figure>

		<?php
			$texto_quizz = get_sub_field('texto_flex');
		?>
			<p><?php echo $texto_quizz; ?></p>
			</div>
			<?php
			endwhile;
			endif;
			?>
        	        </div>
                        <a href="" class="w-100 btn btn-yellow text-white my-3 text-uppercase">Fazer o teste novamente</a>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/_quizz.js"></script>
			<!-- /post content -->
                    </article>
                </section>

                <?php get_sidebar(); ?>

                <div class="col-12 order-1 order-sm-12">
                    <!-- post tags -->
                    <div class="post-tags my-5">
                        <?php the_tags('<h6 class="font-weight-bold text-uppercase">Tópicos</h6> <ul class="list-unstyled d-flex p-0 flex-wrap"><li>', '</li><li>', '</li></ul>'); ?>
                    </div>
                    <!-- /post tags -->

                    <!-- post author -->

                </div>
            </div>
        </main>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
