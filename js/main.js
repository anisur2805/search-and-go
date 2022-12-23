( function ( $ ) {
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
  } );
} )( jQuery );
