<?php
// Init
define("DEBUGGING", true); // or false in production enviroment
// Functions
function get_cache_prevent_string($always = false)
{
    return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
}
?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, viewport-fit=cover">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="author" content="" />
    <meta name="publisher" content="" />
    <meta name="copyright" content="" />
    <meta name="audience" content="All" />
    <meta name="page-topic" content="musica" />
    <meta name="revisit-after" content="1 day" />
    <title>
        <?php wp_title(''); ?>
        <?php if (wp_title('', false)) {
            echo ' -';
        } ?>
        <?php bloginfo('name'); ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/site.css?version=1.0<?php echo get_cache_prevent_string(); ?>">
<script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/site-min.js?version=1.0<?php echo get_cache_prevent_string(); ?>"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Source+Serif+Pro&display=swap" rel="stylesheet">
<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700|PT+Serif:400,400i,700,700i&display=swap" rel="stylesheet">-->
    <!--<link rel="apple-touch-icon" sizes="180x180" href="i<?//php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?//php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?//php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?//php echo get_template_directory_uri(); ?>/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?//php echo get_template_directory_uri(); ?>/assets/img/favicon/safari-pinned-tab.svg" color="#ffc20e">
    <link rel="shortcut icon" href="<?//php echo get_template_directory_uri(); ?>/assets/img/favicon/icon.jpeg">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="msapplication-config" content="<?//php echo get_template_directory_uri(); ?>/assets/img/favicon/browserconfig.xml">-->
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<style>
	.wp-caption-text{font-size: 80%; padding-top: 10px;}
	.single article a{word-break:normal;}
        .teste img {width:90px !important; height:90px !important; border-radius: 50%;}
</style>
</head>

<body <?php body_class(); ?> style="overflow-x: hidden;">
    <?php get_template_part('templates/core/header'); ?>
