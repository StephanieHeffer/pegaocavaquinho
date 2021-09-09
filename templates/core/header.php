<header id="header">
    <div class="container somobile">
        <div class="row justify-content-between align-items-end">
            <div class="col-12 col-lg-8 mb-4 mb-lg-0 justify-content-between">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo site_url(''); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo2.png" class="header-logo" alt="Logo The Beatles na Abbey Road">

                    </a>

                    <a href="#" id="openmenu" class="hamburger d-lg-none" aria-label="Abrir menu">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>

            <div class="col-12 col-lg-2">
                <?//php get_template_part('templates/components/searchform'); ?>
                 <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
            </div>
         <!--  <div class="col-12 col-lg-2" id="mobilesocial">
                <?//php get_template_part('templates/components/social-media'); ?>
            </div>-->
        </div>
    </div>
    <nav class="site-navigation somobile" style="background-color: #5B5758;">
        <div class="d-block d-lg-none text-right">
            <div class="container">
                <a href="#" id="closemenu" class="closemenu" aria-label="Fechar menu">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div>

        <div class="container">
            <?php wp_nav_menu(array('container_class' => 'menu-primary', 'theme_location' => 'first-menu')); ?>
        </div>
    </nav>
     <div class="container sodesk">
        <div class="row justify-content-between align-items-end">
            <div class="col-12 col-lg-4 mb-4 mb-lg-0 justify-content-between">
            </div>

        </div>
    </div>
    <nav class="site-navigation sodesk" style="background-color: transparent;">
        <div class="d-block d-lg-none text-right">
            <div class="container">
                <a href="#" id="closemenu" class="closemenu" aria-label="Fechar menu">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div>

        <div class="container" style="display: -webkit-box; margin-left: 0; margin-right: 0;">
                <div class="col-sm-3 d-flex justify-content-between align-items-center">
                    <a href="<?php echo site_url(''); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo2.png" class="header-logo" alt="Logo The Beatles na Abbey Road">
                    </a>

                    <a href="#" id="openmenu" class="hamburger d-lg-none" aria-label="Abrir menu">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            <?php wp_nav_menu(array('container_class' => 'menu-primary col-sm-8', 'theme_location' => 'first-menu')); ?>
            <div class="col-12 col-sm-2" style="padding-top: 20px;">
                 <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
            </div>

        </div>
    </nav>

</header>
