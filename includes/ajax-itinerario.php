<?php

/**

 * Function for ajax

 */



function itinerario()

{

    $ajax_params = (object) filter_input_array(INPUT_POST, [

        'id' => FILTER_VALIDATE_INT,

        'offset' => FILTER_VALIDATE_INT,

    ]);



    $args = array(

      'post_type' => 'post',

      'posts_per_page' => 9, 

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

              'terms'    => 'itinerario',

          ),


      ),

  );

   if(!$ajax_params->id){

    $args = array(

      'post_type' => 'post',

      'posts_per_page' => 9,

      'offset' => $ajax_params->offset

    );

  }

  $query = new WP_Query( $args );



  $html = '';

  $template = '<div class="col-12 col-md-4 mb-4"><div class="highlight-see-more post-84042 post type-post status-publish format-standard has-post-thumbnail hentry"><a href="%1$s" class="image d-block mb-2 position-relative"><img data-src="%2$s" class="img-fluid lozad" src="%2$s" data-loaded="true"></a><h4 class="mb-0" style="padding-top: unset !important;font-weight: unset;padding-left: 1rem;"><a href="%1$s" class="">%3$s</a></h4></div></div>';

  $var = $ajax_params->id;

  $cate = get_cat_name( $cat_name = $var );

 if ($cate === "Londres"){ 
	if(wp_is_mobile()){
		echo '<iframe class="mb-4" src="https://www.google.com/maps/d/u/0/embed?mid=1eICeU6aCbZGCKf8USl9FwD_LH8X11_vz" height="480"></iframe>';
	}
	else{
	echo '<iframe class="mb-4" src="https://www.google.com/maps/d/u/0/embed?mid=1eICeU6aCbZGCKf8USl9FwD_LH8X11_vz" width="640" height="480"></iframe>';
	}
   }elseif ($cate === "Liverpool") {
	 if(wp_is_mobile()){
		echo '<iframe class="mb-4" src="https://www.google.com/maps/d/u/0/embed?mid=1aU7eFtspySGfNkG4Usp8sbaqV3pQdZim" height="480"></iframe>';
	}
	else{
		echo '<iframe class="mb-4" src="https://www.google.com/maps/d/u/0/embed?mid=1aU7eFtspySGfNkG4Usp8sbaqV3pQdZim" width="640" height="480"></iframe>';
	}
   }


  while ( $query->have_posts() ) {
 
   $query->the_post();

   $html.= sprintf($template,

      get_the_permalink(),

      get_the_post_thumbnail_url(get_the_ID(), 'medium_large'),

      get_the_title()

    );


  }


  wp_reset_postdata();



echo '<section class="row"><div class="row list">'.$html.'</div></section>';

  wp_die();

}

/**

 * actions for novos_videos

 */

add_action( 'wp_ajax_itinerario', 'itinerario' );

add_action( 'wp_ajax_nopriv_itinerario', 'itinerario' );

/**

 * JS for novos_videos

 */



 add_action('wp_footer', function(){

   ?>

  <script>

    jQuery("#sub-dropdown-itinerario").on("change", function(e){    

      e.preventDefault();

  

      jQuery.ajax({

          url: ajaxsearchlite.backend_ajaxurl,

          data: {

            id: jQuery(this).val(),

            action: "itinerario"

          },

          type: "post",

          beforeSend: function (load) {

             jQuery('.ajax_load').css("display", "flex");

          },

          success: function (su) {
         jQuery("#mapa-itinerario").html(su);

            //jQuery("#cat.row.list").children().length

            document.querySelector("#load-more").dataset.offset = 9;

            jQuery('.ajax_load').css("display", "none");



          }

      });

    });




  </script>

   <?php

 });



