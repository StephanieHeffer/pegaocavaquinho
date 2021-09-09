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

    <h2 class="h5 section-title text-white p-2 text-uppercase mb-4">
       <?php single_cat_title(); ?>
    </h2>
<form name="FiltroBuscaItinerario" id="FiltroBuscaItinerario" method="post" class="mb-4 text-center" >
<select name="sub-dropdown-itinerario" id="sub-dropdown-itinerario" class="form-style">

 <option selected disabled><?php echo esc_attr( __( 'Destinos' ) ); ?></option>
                        <?php
                        global $ancestor;

                            $childiti = get_categories('orderby=name&child_of=2&show_count=1');
                            foreach ($childiti as $child) {
                                if (cat_is_ancestor_of($ancestor, $child->cat_ID) == false){
                                        echo '<option value="'.$child->cat_ID.'">';
                                        echo $child->cat_name;
                                        echo '</option>';
                                }
                        }
                        ?>

</select>
</form>

<div id="mapa-itinerario" class="text-center">
<section class="row">
                <div class="row list">
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                        <?php get_template_part('templates/components/highlight-see-more'); ?>
                    <?php endwhile; ?>
                </div>
        </section>

</div>


</main>

<?php get_footer(); ?>

