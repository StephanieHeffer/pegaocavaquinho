//jQuery(document).ready(function(){


// var Root="http://"+document.location.hostname+"/";

 //   jQuery("#FiltroBusca").on("submit",function(e){
//        e.preventDefault();
//        var Dados=jQuery(this).serialize();

  //      jQuery.ajax({
      //      url: Root+"videos",
      //      method: "post",
    //        dataType: "html",
    //        data: Dados,
     //       success: function(Dados){
      //          jQuery('#ResultadoBuscaPosts').empty().html(Dados);
        //    }
   //     });
 //   });



 
//});

function vermaisClick(e){
  e.preventDefault();

}


jQuery(document).ready(function() {
    jQuery('#FiltroBusca').on('submit', vermaisClick);
});
