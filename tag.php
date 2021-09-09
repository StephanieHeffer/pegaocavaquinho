<?php get_header(); ?>

<main class="container">
	<h2 class="h5 section-title text-white p-2 text-uppercase mb-4">
		Conteúdos sobre "<?php single_tag_title(); ?>"
	</h2>

	<?php if (have_posts()) : ?>
		<section class="row">
			<div class="col-12 col-md-3 mb-2">
				<h3 class="text-uppercase">
					Leia mais
					<strong class="d-block">
						<?php if (is_category()) : ?>
							<?php single_cat_title(); ?>
						<?php endif ?>
					</strong>
				</h3>
				<hr class="mt-0">
			</div>

			<div class="col-12 col-md-9">
				<div class="row list">
					<?php while (have_posts()) : ?>
						<?php the_post(); ?>
						<?php get_template_part('templates/components/highlight-see-more'); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php get_template_part('templates/components/pagination'); ?>
</main>

<?php get_footer(); ?>