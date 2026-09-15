(function ($) {

  "use strict";

  $('.owl-galeria').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 1000,
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 1
      },
      667: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

  $('.owl-depoimento').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 1000,
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 1
      },
      667: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });

  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });

  $('#galleryModal').on('show.bs.modal', function (e) {
    $('#galleryImage').attr("src",$(e.relatedTarget).data("large-src"));
  });
  
  document.querySelectorAll('[target="_blank"]').forEach(function(e) { e.rel = 'noopener noreferrer'; });

})(window.jQuery);