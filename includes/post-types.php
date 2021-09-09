<?php

// ACF local JSON
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

// Register Custom Post Type
function custom_post_type()
{

    $labels = array(
        'name'                  => _x('Discos', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Disco', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Discos', 'text_domain'),
        'name_admin_bar'        => __('Discos', 'text_domain'),
        'archives'              => __('Arquivos', 'text_domain'),
        'attributes'            => __('Atributos', 'text_domain'),
        'parent_item_colon'     => __('Ascendente', 'text_domain'),
        'all_items'             => __('Todos os discos', 'text_domain'),
        'add_new_item'          => __('Adicionar novo item', 'text_domain'),
        'add_new'               => __('Adicionar novo', 'text_domain'),
        'new_item'              => __('Novo item', 'text_domain'),
        'edit_item'             => __('Editar item', 'text_domain'),
        'update_item'           => __('Atualizar item', 'text_domain'),
        'view_item'             => __('Visualizar item', 'text_domain'),
        'view_items'            => __('Visualizar itens', 'text_domain'),
        'search_items'          => __('Pesquisar item', 'text_domain'),
        'not_found'             => __('Não encontrado', 'text_domain'),
        'not_found_in_trash'    => __('Não encontrado na lixeira', 'text_domain'),
        'featured_image'        => __('Imagem de destaque', 'text_domain'),
        'set_featured_image'    => __('Definir imagem destacada', 'text_domain'),
        'remove_featured_image' => __('Remover imagem de destaque', 'text_domain'),
        'use_featured_image'    => __('Usar imagem de destaque', 'text_domain'),
        'insert_into_item'      => __('Inserir no item', 'text_domain'),
        'uploaded_to_this_item' => __('Enviado para este Item', 'text_domain'),
        'items_list'            => __('Lista de itens', 'text_domain'),
        'items_list_navigation' => __('Navegação de lista de itens', 'text_domain'),
        'filter_items_list'     => __('Filtrar lista de items', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Disco', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-book',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('disco', $args);

    $labels = array(
        'name'                  => _x('Fab4', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Fab4', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Fab4', 'text_domain'),
        'name_admin_bar'        => __('Fab4', 'text_domain'),
        'archives'              => __('Arquivos', 'text_domain'),
        'attributes'            => __('Atributos', 'text_domain'),
        'parent_item_colon'     => __('Ascendente', 'text_domain'),
        'all_items'             => __('Todos os Fab4', 'text_domain'),
        'add_new_item'          => __('Adicionar novo item', 'text_domain'),
        'add_new'               => __('Adicionar novo', 'text_domain'),
        'new_item'              => __('Novo item', 'text_domain'),
        'edit_item'             => __('Editar item', 'text_domain'),
        'update_item'           => __('Atualizar item', 'text_domain'),
        'view_item'             => __('Visualizar item', 'text_domain'),
        'view_items'            => __('Visualizar itens', 'text_domain'),
        'search_items'          => __('Pesquisar item', 'text_domain'),
        'not_found'             => __('Não encontrado', 'text_domain'),
        'not_found_in_trash'    => __('Não encontrado na lixeira', 'text_domain'),
        'featured_image'        => __('Imagem de destaque', 'text_domain'),
        'set_featured_image'    => __('Definir imagem destacada', 'text_domain'),
        'remove_featured_image' => __('Remover imagem de destaque', 'text_domain'),
        'use_featured_image'    => __('Usar imagem de destaque', 'text_domain'),
        'insert_into_item'      => __('Inserir no item', 'text_domain'),
        'uploaded_to_this_item' => __('Enviado para este Item', 'text_domain'),
        'items_list'            => __('Lista de itens', 'text_domain'),
        'items_list_navigation' => __('Navegação de lista de itens', 'text_domain'),
        'filter_items_list'     => __('Filtrar lista de items', 'text_domain'),
    );
    $args = array(
        'label'                 => __('fab4', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-book',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('fab4bio', $args);
}
add_action('init', 'custom_post_type', 0);

// Register menu
register_nav_menus(array(
    'first-menu' => __('Menu principal', 'partisan'),
    'footer-menu-category' => __('Menu Footer Categorias'),
));

// Color picker menu
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects($items, $args)
{
    foreach ($items as &$item) {
        $colorpicker = get_field('cor_da_borda', $item);
        if ($colorpicker) {
            $item->title = ' <span style="background-color: ' . $colorpicker . '"></span>' . $item->title;
        }
    }
    return $items;
}
