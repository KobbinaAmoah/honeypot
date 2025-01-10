(function ($) {

  "use strict";

  // PRE LOADER
  $(window).load(function(){
    $('.preloader').delay(500).slideUp('slow'); // set duration in brackets    
  });

  // NAVBAR
  $(".navbar").headroom();

  // Close the navbar collapse when a link is clicked
  $('.navbar-collapse a').click(function(){
    $(".navbar-collapse").collapse('hide');
  });

  // Slick Slideshow Initialization
  $('.slick-slideshow').slick({
    autoplay: true,
    infinite: true,
    arrows: false,
    fade: true,
    dots: true,
  });

  // Slick Testimonial Initialization
  $('.slick-testimonial').slick({
    arrows: false,
    dots: true,
  });

  // jQuery Hover dropdown
  $('.navbar-nav .nav-item.dropdown').hover(
    function () {
      // Show the dropdown menu when hovering over the dropdown item
      $(this).children('.dropdown-menu').stop(true, true).slideDown(200);
    },
    function () {
      // Hide the dropdown menu when leaving the dropdown item
      $(this).children('.dropdown-menu').stop(true, true).slideUp(200);
    }
  );

})(window.jQuery);
