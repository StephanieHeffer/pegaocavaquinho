// @codekit-prepend "../../node_modules/jquery/dist/jquery.js";
// @codekit-prepend "../../node_modules/popper.js/dist/umd/popper.min.js";
// @codekit-prepend "../../node_modules/bootstrap/dist/js/bootstrap.min.js";
// @codekit-prepend "../../node_modules/lozad/dist/lozad.js";
// @codekit-prepend "../../node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js";

$(document).ready(function(){
    //Displaying an iframe, object or embed in a responsive design
    $('article.post iframe').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
    $('article.post iframe').addClass('embed-responsive-item');

    // Open menu
    $("#openmenu").click(function (event) {
        event.preventDefault;
        $('.site-navigation').addClass('active');
    });

    // Close menu
    $("#closemenu").click(function (event) {
        event.preventDefault;
        $('.site-navigation').removeClass('active');
    });

    // Lazy load
    const observer = lozad();
    observer.observe();
});