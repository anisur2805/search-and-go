;(function( $ ) {
  $( document ).ready( function () {
    var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC"];

    $( "#keyword-hp" ).autocomplete( {
      source: availableTags
    } );

    // Testimonial 
    $( '.testimonials-slider' ).slick( {
      dots: false,
      speed: 500,
      infinite: true,
      slidesToShow: 4,
      cssEase: 'ease',
      arrows: false,
      slidesToScroll: 2,
    } );

    // Testimonial 
    $( '.single-listing-gallery' ).slick( {
      dots: false,
      arrows: true,
      speed: 500,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 2,
      centerMode: true,
      variableWidth: true,
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style=""><i class="bi bi-arrow-left"></i></button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style=""><i class="bi bi-arrow-right"></i></button>'
    } );

    let wishlist_btns = document.querySelectorAll( '.sag-wishlist' )

    wishlist_btns.forEach( function ( single_btn ) {
      single_btn.addEventListener( 'click', function ( e ) {
        e.preventDefault();

        var self = $( this );
        var wishlist_id = single_btn.getAttribute( 'data-wishlist-id' );

        console.log( wishlist_id )
        var data = {
          'wishlist_post_id': wishlist_id,
          'action': 'sag_wishlist_action',
        };

        $.post(
          wishlist.ajaxUrl,
          data,
          function ( res ) {
            console.log( single_btn );
            single_btn.classList.toggle( 'wishlisted' )
          }
        )
      } )

    } );

    // Back to top
    /**
 * back to top
 */
    var backTopBtn = $( '#back-to-top' );
      if ( $( window ).scrollTop() > 450 ) {
        console.log( "yehe" )
        backTopBtn.addClass( 'show' );
      } else {
        backTopBtn.removeClass( 'show' );
      }
  } );
} )( jQuery );
