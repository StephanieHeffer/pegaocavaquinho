var $autoresCarousel = document.querySelector(".js-carousel--autores");

new Glider($autoresCarousel, {
  slidesToShow: 3,
  slidesToScroll: 3,
  draggable: true,
  dots: ".js-carousel--autores-dots",
  arrows: {
    prev: ".js-carousel--autores-prev",
    next: ".js-carousel--autores-next",
  },
});

