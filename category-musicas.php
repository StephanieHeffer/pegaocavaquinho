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

<main role="main" class="container text-center" style="background-color:;">

    <h2 class="h5 section-title p-2 text-uppercase mb-4">
   <?php single_cat_title(); ?>
    </h2>
<div style="display:flex;justify-content: center;">
<form name="FiltroBusca-disco" id="FiltroBusca-disco" method="post" class="text-center mb-4">
<select name="sub-dropdown-disco" id="sub-dropdown-disco" class="form-style">
<!--<select name="sub-dropdown" id="sub-dropdown">-->
<option selected disabled><?php echo esc_attr( __( 'Discos' ) ); ?></option>
<?php
global $ancestor;

    $childdiscos = get_categories('orderby=name&child_of=4&show_count=1');
    foreach ($childdiscos as $childdisco) {
        if (cat_is_ancestor_of($ancestor, $childdisco->cat_ID) == false){
        echo '<option value="'.$childdisco->cat_ID.'">';
        echo $childdisco->cat_name;
        echo '</option>';
        }
    }
?>
</select>
</form>
<form name="FiltroBusca-fab4" id="FiltroBusca-fab4" method="post" class="text-center mb-4">
<select name="sub-dropdown-beatles" id="sub-dropdown-beatles" class="form-style">
<option selected disabled><?php echo esc_attr( __( 'Beatles' ) ); ?></option>
<?php
global $ancestor;

    $childbeatles = get_categories('orderby=name&child_of=7&show_count=1');
    foreach ($childbeatles as $childbeatle) {
        if (cat_is_ancestor_of($ancestor, $childbeatle->cat_ID) == false){
        echo '<option value="'.$childbeatle->cat_ID.'">';
        echo $childbeatle->cat_name;
        echo '</option>';
        }   
    }   
?>
</select>
</form>
</div>
<div id="musicas-nousk" class="mb-4">
</div>


</main>

<?php get_footer(); ?>
