<?php

require get_template_directory() . '/includes/admin-customization.php';
require get_template_directory() . '/includes/post-types.php';
require get_template_directory() . '/includes/images-sizes.php';
require get_template_directory() . '/includes/theme-functions.php';
require get_template_directory() . '/includes/ajax-musica.php';
require get_template_directory() . '/includes/ajax-discos.php';
require get_template_directory() . '/includes/ajax-itinerario.php';

add_filter('single_template', 'create_single_template');

function create_single_template( $template ) {
	global $post;

	$categories = get_the_category();
	// caso não tenhamos categoria retornamos o template default.
	if ( ! $categories )
			return $template; 

	//resgatando o post type
	$post_type = get_post_type( $post->ID );

	$templates = array();

	foreach ( $categories as $category ) {
			// adicionando templates por id e slug
			$templates[] = "single-{$post_type}-{$category->slug}.php";
			$templates[] = "single-{$post_type}-{$category->term_id}.php";
	}

	// adicionando os templates padrões
	$templates[] = "single-{$post_type}.php";
	$templates[] = 'single.php';
	$templates[] = 'singular.php';
	$templates[] = 'index.php';

	return locate_template( $templates );
}


function myTemplateSelect() {
    if (is_category() && !is_feed()) {
        if (is_category(get_cat_id('discos')) || cat_is_ancestor_of(get_cat_id('discos'), get_query_var('cat'))) {
            load_template(TEMPLATEPATH . '/category-discos.php');
            exit;
        }
    }
    if (is_category(get_cat_id('fab4')) || cat_is_ancestor_of(get_cat_id('fab4'), get_query_var('cat'))) {
                load_template(TEMPLATEPATH . '/category-fab4.php');
                exit;
        }

}

add_action('template_redirect', 'myTemplateSelect');



function lc_load_jquery(){
  wp_enqueue_script('lcjquerytest', get_template_directory() . '/assets/js/_quizz.js');
//  global $post;
  $teste = get_field('tt');
  $data = array( 'somestring' => $teste );
  wp_localize_script( 'lcjquerytest', 'lc_jqpost_info', $data );
}
add_action( 'wp_enqueue_scripts', 'lc_load_jquery' );
