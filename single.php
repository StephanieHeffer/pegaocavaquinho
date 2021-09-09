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
                        <!-- post thumbnail -->
                        <?php $video_destacado = get_field('video_destacado'); ?>
                        <?php if ($video_destacado) : ?>
                            <?php  ?>
                            <a class="video-featured d-block position-relative" data-fancybox href="<?php echo $video_destacado; ?>">
                                <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 lozad')); ?>
                                <span class="d-flex justify-content-center align-items-center h-100 w-100">
                                    <i class="fab fa-youtube"></i>
                                </span>
							</a>
							<?php  ?>
                        <?php else : ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 lozad')); ?>
                            <?php else : ?>
                                <?php echo '<img src="' . get_bloginfo('stylesheet_directory') . '/assets/img/thumb-vazio.jpg" class="img-fluid" />'; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <!-- /post thumbnail -->

                        <!-- post details -->
                        <?php if (!in_category('videos')) : ?>
                            <header class="post-info mb-4" style="background-color: ;">
                                <hr class="mt-0 mb-2">  
                                 <?php the_time('j \d\e F \d\e Y'); ?><br>
                                <hr class="mb-0 mt-2">
                            </header>
                        <?php endif; ?>
                        <!-- /post details -->
                        <br>
                        <!-- post content -->
                        <?php the_content(); ?>
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
