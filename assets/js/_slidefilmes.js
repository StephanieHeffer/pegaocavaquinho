var $filmeCarousel = document.querySelector(".js-carousel--filme");

new Glider($filmeCarousel, {
  slidesToShow: 1,
  slidesToScroll: 1,
  draggable: true,
  dots: ".js-carousel--filme-dots",
  arrows: {
    prev: ".js-carousel--filme-prev",
    next: ".js-carousel--filme-next",
  },
 responsive: [
   {
      breakpoint: 900,
      settings: {
       slidesToShow: 3,
       slidesToScroll:3,
     },
    },
  ],

});

