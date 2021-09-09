<section class="row c-carousel c-carousel--galeria">
        <button class=" col-12 col-sm-1 js-carousel--galeria-prev sodesk" style="color:black;background: transparent;font-weight: bold;border-color: transparent;outline: none !important;">&lt;</button>
        <div class="col-12 col-sm-10 c-carousel__slides js-carousel--galeria" style="padding-left: 0 !important; padding-right: 0 !important;">
            <?php foreach(get_field('gallery') as $image):?>
                                   <img class="" src="<?= $image['sizes']['large'];?>" alt="<?= $image['alt']?>" />
                                <?php endforeach;?>
        </div>
        <button class="col-12 col-sm-1 js-carousel--galeria-next sodesk" style="color:black;background: transparent;font-weight: bold;border-color: transparent;outline: none !important;">&gt;</button>
         <div class="js-carousel--galeria-dots"></div>
    </section>


<!--galeria-->
<script>
var $galeriaCarousel = document.querySelector(".js-carousel--galeria");

new Glider($galeriaCarousel, {
  slidesToShow: 1,
  slidesToScroll: 1,
  draggable: true,
  dots: ".js-carousel--galeria-dots",
  arrows: {
    prev: ".js-carousel--galeria-prev",
    next: ".js-carousel--galeria-next",
  },
  //scrollLock: true,
});
  </script>
<!--END galeria-->


