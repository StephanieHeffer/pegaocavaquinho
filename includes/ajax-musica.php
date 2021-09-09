<?php

/**

 * Function for ajax

 */

function musicas_discos()

{

    $ajax_params = (object) filter_input_array(INPUT_POST, [

        'id' => FILTER_VALIDATE_INT,

        'offset' => FILTER_VALIDATE_INT,

    ]);



    $args = array(

      'post_type' => 'post',

      'posts_per_page' => 1000,

//      'posts_per_page' => 9,

      'offset' => $ajax_params->offset ?? 0,

      'tax_query' => array(

          'relation' => 'AND',

          array(

              'taxonomy' => 'category',

              'field'    => 'term_id',

              'terms'    => $ajax_params->id,
 ),

          array(

              'taxonomy' => 'category',

              'field'    => 'slug',

              'terms'    => 'discos',

          ),

        array(

              'taxonomy' => 'category',

              'field'    => 'slug',

              'terms'    => 'musicas',

          ),


      ),

  );

  $query = new WP_Query( $args );



  $html = '';

  $template = '<a href="%1$s">%2$s</a><br/>';



  while ( $query->have_posts() ) {

    $query->the_post();
 $html.= sprintf($template,

    get_the_permalink(),

    //  get_the_post_thumbnail_url(get_the_ID(), 'medium_large'),

      get_the_title()

    );



  }

  wp_reset_postdata();



  echo $html;



  wp_die();

}

/**

 * actions for novos_videos

 */

add_action( 'wp_ajax_musicas_discos', 'musicas_discos' );

add_action( 'wp_ajax_nopriv_musicas_discos', 'musicas_discos' );

/**

 * JS for novos_videos

 */



 add_action('wp_footer', function(){

   ?>

  <script>

    jQuery("#sub-dropdown-disco").on("change", function(e){    

      e.preventDefault();

  

      jQuery.ajax({

          url: ajaxsearchlite.backend_ajaxurl,

          data: {

            id: jQuery(this).val(),

            action: "musicas_discos"

          },

          type: "post",

          beforeSend: function (load) {

             jQuery('.ajax_load').css("display", "flex");

          },

          success: function (su) {
         jQuery("#musicas-nousk").html(su);

            //jQuery("#cat.row.list").children().length

            document.querySelector("#load-more").dataset.offset = 9;

            jQuery('.ajax_load').css("display", "none");



          }

      });

    });




  </script>

   <?php

 });



/**

 * Function for ajax

 */

function musicas_fab4()

{

    $ajax_params = (object) filter_input_array(INPUT_POST, [
        'id' => FILTER_VALIDATE_INT,

        'offset' => FILTER_VALIDATE_INT,

    ]);



    $args = array(

      'post_type' => 'post',

      'posts_per_page' => 1000,

      'offset' => $ajax_params->offset ?? 0,

      'tax_query' => array(

          'relation' => 'AND',

          array(

              'taxonomy' => 'category',

              'field'    => 'term_id',

              'terms'    => $ajax_params->id,

          ),

          array(

              'taxonomy' => 'category',

              'field'    => 'slug',

              'terms'    => 'fab4',

          ),
        array(

              'taxonomy' => 'category',

              'field'    => 'slug',

              'terms'    => 'musicas',

          ),


      ),

  );

  $query = new WP_Query( $args );



  $html = '';

  $template = '<a href="%1$s">%2$s</a><br/>';



  while ( $query->have_posts() ) {

    $query->the_post();



    $html.= sprintf($template,

    get_the_permalink(),

    //  get_the_post_thumbnail_url(get_the_ID(), 'medium_large'),

      get_the_title()

    );
 }

  wp_reset_postdata();



  echo $html;



  wp_die();

}

/**

 * actions for novos_videos

 */

add_action( 'wp_ajax_musicas_fab4', 'musicas_fab4' );

add_action( 'wp_ajax_nopriv_musicas_fab4', 'musicas_fab4' );



/**

 * JS for novos_videos

 */
 add_action('wp_footer', function(){

   ?>

  <script>

    jQuery("#sub-dropdown-beatles").on("change", function(e){    

      e.preventDefault();

  

      jQuery.ajax({

          url: ajaxsearchlite.backend_ajaxurl,

          data: {

            id: jQuery(this).val(),

            action: "musicas_fab4"

          },

          type: "post",

          beforeSend: function (load) {

             jQuery('.ajax_load').css("display", "flex");

          },

          success: function (su) {

            jQuery("#musicas-nousk").html(su);

            //jQuery("#cat.row.list").children().length

            document.querySelector("#load-more").dataset.offset = 9;
           jQuery('.ajax_load').css("display", "none");



          }

      });

    });




  </script>

   <?php

 });

