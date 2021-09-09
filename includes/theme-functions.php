<?php

//Remove jQuery from wp_head
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery');
}

// Remove wordpress junks
remove_action('wp_head', 'wp_generator');                   // wordpress version from header
remove_action('wp_head', 'rsd_link');                       // link to Really Simple Discovery service endpoint
remove_action('wp_head', 'wlwmanifest_link');               // link to Windows Live Writer manifest file
remove_action('wp_head', 'feed_links', 2);                  // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'feed_links_extra', 3);            // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'index_rel_link');                 // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0);    // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0);     // Start link
remove_action('wp_head', 'start_post_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('template_redirect', 'wp_shortlink_header', 11); // Remove WordPress Shortlinks from HTTP Headers

// Add page slug to body class 
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove version numbers from css and js src
add_filter('style_loader_src', 'wp_remove_versions', 9999);
add_filter('script_loader_src', 'wp_remove_versions', 9999);
function wp_remove_versions($src)
{
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Remove emoji from wordpress 
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove block library from wordpress
function wpassist_remove_block_library_css()
{
    wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');

// Add Additional File Types to be Uploaded in WordPress
function my_myme_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

// Add rel=”lightbox” to All Images Embedded in a Post
add_filter('the_content', 'my_addlightboxrel');
function my_addlightboxrel($content)
{
    global $post;
    $pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
    $replacement = '<a$1href=$2$3.$4$5 rel="lightbox" title="' . $post->post_title . '"$6>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}

// Disable YARPP CSS
add_action('wp_print_styles', 'tj_deregister_yarpp_header_styles');
function tj_deregister_yarpp_header_styles()
{
    wp_dequeue_style('yarppWidgetCss');
    // Next line is required if the related.css is loaded in header when disabled in footer.
    wp_deregister_style('yarppRelatedCss');
}

add_action('wp_footer', 'tj_deregister_yarpp_footer_styles');
function tj_deregister_yarpp_footer_styles()
{
    wp_dequeue_style('yarppRelatedCss');
}

// Dynamic sidebar
register_sidebar(array(
    'name' => __('Footer widget area', 'cavaquinho'),
    'id' => 'footer-widget-area',
    'description' => __('Widgets on footer', 'cavaquinho'),
    'before_widget' => '<div id="%1$s" class="col-xs-7 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
));


function get_post_primary_category($post_id, $term = 'category', $return_all_categories = false)
{
    $return = array();

    if (class_exists('WPSEO_Primary_Term')) {
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term($term, $post_id);
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)) {
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories) {
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)) {
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories) {
            $return['all_categories'] = array();

            if (!empty($categories_list)) {
                foreach ($categories_list as &$category) {
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}
