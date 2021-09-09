<?php

/**

 * Function for ajax

 */



function discos()

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

              'terms'    => 'discos',

          ),
           array(

              'taxonomy' => 'category',

              'field'    => 'slug',

              'terms'    => 'musicas',

          )


      ),

  );

  $query = new WP_Query( $args );



  $html = '';

  $template = '<a href="%1$s">%2$s</a><br/>';

  $var = $ajax_params->id;

  $cate = get_cat_name( $cat_name = $var );

  while ( $query->have_posts() ) {
 
   $query->the_post();

   $html.= sprintf($template,

      get_the_permalink(),
 
      get_the_title(),


    );



  }


  $argsx = array(
    'post_type'         => 'disco',
    'post_status'       => 'publish',
  );

$posts = query_posts($argsx);

  foreach ($posts as $post) : setup_postdata($post);
       $title = get_the_title($post);
         if ($title == $cate){
            $cont = get_the_content($post);
            $thumb = get_the_post_thumbnail($post);
             echo '<h1>'.$title.'</h1><br><br>';
             echo $thumb.'<br><br>';
             echo $cont.'<br><br>';
          }
    endforeach;

  wp_reset_postdata();



  echo $html;

  wp_die();

}

/**

 * actions for novos_videos

 */

add_action( 'wp_ajax_discos', 'discos' );

add_action( 'wp_ajax_nopriv_discos', 'discos' );

/**

 * JS for novos_videos

 */



 add_action('wp_footer', function(){

   ?>

  <script>

    jQuery("#sub-dropdownDisco").on("change", function(e){    

      e.preventDefault();

  

      jQuery.ajax({

          url: ajaxsearchlite.backend_ajaxurl,

          data: {

            id: jQuery(this).val(),

            action: "discos"

          },

          type: "post",

          beforeSend: function (load) {

             jQuery('.ajax_load').css("display", "flex");

          },

          success: function (su) {
         jQuery("#ResultadoBuscaPostsDiscos").html(su);

            //jQuery("#cat.row.list").children().length

            document.querySelector("#load-more").dataset.offset = 9;

            jQuery('.ajax_load').css("display", "none");



          }

      });

    });




  </script>

   <?php

 });



