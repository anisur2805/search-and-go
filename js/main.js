; ( function ( $ ) {
  $( document ).ready( function () {

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

    // Single Listing Gallery 
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

    $('body').on('click', '.sag-wishlist', function( e ){
      e.preventDefault();

      var self = $( this ),
          wishlist_id = self.data('wishlist-id' );

      var data = {
        'wishlist_post_id': wishlist_id,
        'action': 'sag_wishlist_action',
        'post_id': wishlist_id
      };

      $.post( sagObj.ajaxUrl, data, function ( res ) {
        var post_id = data['post_id'].toString();
        var staElement = $( '.sag-wishlist_' + post_id );
        var data_id = staElement.data( 'wishlist-id' );

        if ( 'false' == res ) {
          staElement.removeClass( 'sag-added-to-wishlist' );
        } else {
          if ( data_id == post_id ) {
            staElement.addClass( 'sag-added-to-wishlist' );
          }
        }
      } );
    });

    // prevent logout user
    $( '.sag-wishlist-require-login' ).on( 'click', function ( e ) {
      e.preventDefault();
      alert( 'Sorry, you need to login first.' );
      return false;
    } );

    // Back to top
    var backTopBtn = $( '#back-to-top' );
    if ( $( window ).scrollTop() > 450 ) {
      backTopBtn.addClass( 'show' );
    } else {
      backTopBtn.removeClass( 'show' );
    }

    backTopBtn.on( 'click', function ( e ) {
      e.preventDefault();
      $( 'html, body' ).animate( { scrollTop: 0 }, '300' );
    } );

    // init Masonry
    var $grid = $( '.grid' ).masonry( {
      itemSelector: '.grid-item',
      percentPosition: true,
      columnWidth: '.grid-sizer'
    } );

    // layout Masonry after each image loads
    $grid.imagesLoaded().progress( function () {
      $grid.masonry();
    } );
  } );
} )( jQuery );
