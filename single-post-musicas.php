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

                        <div class="displaybox">
                        <div id="sumario-doencas" class="col-12 col-sm-6">
				<?php the_content(); ?>
                        </div>
                        <!-- post content -->
                        <div class="col-12 col-sm-6">
				<h5 class="h3 somobile">Tradução</h5>
                        	<?php the_field('traducao_ptbr'); ?>
                        </div>
			<!-- /post content --> 
                       </div>
                    </article>
                </section>

                <?php get_template_part('sidebar-music'); ?>

                <div class="col-12 order-1 order-sm-12">
                    <?php $video_destacado = get_field('video_musica'); ?>
			<?php echo $video_destacado;?>
                    <!-- post tags -->
                    <div class="post-tags my-5">
                        <?php the_tags('<h6 class="font-weight-bold text-uppercase">Tópicos</h6> <ul class="list-unstyled d-flex p-0 flex-wrap"><li>', '</li><li>', '</li></ul>'); ?>
                    </div>
                    <!-- /post tags -->


                </div>
            </div>
        </main>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
