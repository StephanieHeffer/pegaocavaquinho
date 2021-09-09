<?php
add_theme_support('post-thumbnails');
add_image_size('thumbnail', 215, 121, true);
add_image_size('medium', 460, 259, true);
add_image_size('large', 1000, 563, true);

// Removes width and height attributes from image tags
function remove_image_size_attributes($html)
{
	return preg_replace('/(width|height)="\d*"/', '', $html);
}
// Remove image size attributes from post thumbnails
add_filter('post_thumbnail_html', 'remove_image_size_attributes');
// Remove image size attributes from images added to a WordPress post
add_filter('image_send_to_editor', 'remove_image_size_attributes');
