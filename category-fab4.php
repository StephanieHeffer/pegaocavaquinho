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

 <?php $url =  "{$_SERVER['REQUEST_URI']}"; ?>
                <?php $e = explode('/', $url); ?>
                <//?php $taxonomy = wp_get_post_terms(get_the_ID(), 'category'); ?>
                <//?php $tax_names = ''; ?>
                <//?php foreach ($taxonomy as $tax) { ?>
                    <//?php $tax_names .= '&nbsp;' . $tax-><!--slug; -->
                <//?php } ?>
                <?php //$termo = get_term_by('slug', $e[1], 'category'); 
//			echo $url;
			$fab = "/category/fab4/";
			$paul = "/category/fab4/paul-mccartney/";
                        $john = "/category/fab4/john-lennon/";
			$george = "/category/fab4/george-harrison/";
			$ringo = "/category/fab4/ringo-starr/";
//			if ($url == $fab){
			//	echo "fab";
//			} if($url == $paul){
			//	echo "paul";
//			}
			switch($url){
				case $fab:
					get_template_part('fab4');
					break;
				case $paul:
					get_template_part('paul');
					break;
				case $john:
					get_template_part('john');
					break;
				case $george:
					get_template_part('george');
					wp_reset_query();

					break;
				
				case $ringo:
					get_template_part('ringo');
					break;
			}
			?>

<div>

</div>
<?php if (have_posts()) : ?>
	
        <section class="row mb-4" style="margin-top:50px;">
                    <?php while (have_posts()) :
                         the_post();
			if (!in_category('musicas')){
	                        get_template_part('templates/components/highlight-see-more');
			}
			 ?>
                    <?php endwhile; ?>
        </section>
    <?php endif; ?>


</main>

<?php get_footer(); ?>

