(function ($) {
  $(document).ready(function () {
    var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC"];

    $("#keyword-hp").autocomplete({
      source: availableTags
    });

    // Testimonial 
    $('.testimonials-slider').slick({
      dots: true,
      speed: 500,
      fade: false,
      infinite: true,
      slidesToShow: 4,
      cssEase: 'linear',
      arrows: false,
      slidesToScroll: 4,
    });

  });
})(jQuery);
