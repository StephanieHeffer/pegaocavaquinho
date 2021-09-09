<footer id="footer"  style="padding-left: 15px;padding-right: 15px;background-image: url('https://pegaocavaquinho.com.br/wp-content/themes/cavaquinho/assets/img/abbey1.jpg');background-size: cover;">
    <div class="container container-fluid">

          <?php wp_nav_menu(array('container_class' => 'footer-menu-category','theme_location' => 'footer-menu-category')); ?>
      
        <div class="footer py-3">
            <div class="text-black"><a class="text-black" href="https://pegaocavaquinho.com.br/sobre-nos/">Sobre Nós</a></div>
            <a class="text-black" href="https://www.nousk.com.br/" target="_blank" rel="noopener">Nousk
            </a>
        </div>
    </div>
</footer>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  </script>
<!--END galeria-->

