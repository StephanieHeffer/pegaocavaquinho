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

<form name="FiltroBuscaDisco" id="FiltroBuscaDisco" method="post" class="text-center mb-4">
	<select name="sub-dropdownDisco" id="sub-dropdownDisco" class="form-style">
		<option selected disabled><?php echo esc_attr( __( 'The Beatles' ) ); ?></option>
			<?php
			global $ancestor;

			    $childvideos = get_categories('orderby=name&child_of=4&show_count=1');
			    foreach ($childvideos as $childvideo) {
			        if (cat_is_ancestor_of($ancestor, $childvideo->cat_ID) == false){
				        echo '<option value="'.$childvideo->cat_ID.'">';
        				echo $childvideo->cat_name;
				        echo '</option>';
        			}
    			}
			?>
	</select>
</form>

<!--<form name="FiltroBuscaRingo" id="FiltroBusca" method="post">
	<select name="sub-dropdown-ringo" id="sub-dropdown-ringo" onchange="this.form.submit();">
		<option selected disabled><?//php echo esc_attr( __( 'Ringo' ) ); ?></option>
	</select>

</form>

<form name="FiltroBuscaGeorge" id="FiltroBusca" method="post">

	<select name="sub-dropdown-george" id="sub-dropdown-george" onchange="this.form.submit();">
		<option selected disabled><?//php echo esc_attr( __( 'George' ) ); ?></option>
	</select>
</form>

<form name="FiltroBuscaPaul" id="FiltroBusca" method="post">
	<select name="sub-dropdown-paul" id="sub-dropdown-paul" onchange="this.form.submit();">
		<option selected disabled><?//php echo esc_attr( __( 'Paul' ) ); ?></option>
	</select>
</form>

<form name="FiltroBuscaJohn" id="FiltroBusca" method="post">
	<select name="sub-dropdown-john" id="sub-dropdown-john" onchange="this.form.submit();">
		<option selected disabled><?//php echo esc_attr( __( 'John' ) ); ?></option>
	</select>
</form>-->

<div id="ResultadoBuscaPostsDiscos" class="mb-4 text-center">
</div>


</main>

<?php get_footer(); ?>

