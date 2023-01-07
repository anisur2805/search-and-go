;( function( $ ) {
  $( '#sag-listing-search-form' ).submit( function( e ) {
    e.preventDefault();

    var data     = $( this ).serializeArray();
    var category = $( "#sag_category" ).val()
    var keyword  = $( "#keyword-hp" ).val()
    var location = $( ".sag_location" ).val()

    $.ajax( {
      method: 'POST',
      url: formObj.url,
      beforeSend: function( xhr ) {
        xhr.setRequestHeader( 'X-WP-Nonce', formObj.nonce )
      },
      data: {
        action: 'search_form_handler',
        data: data,
        security: formObj.nonce
      },
      success: function( r ) {
        console.log( "Success ", r )
      },
      error: function( r ) {
        console.log( "Error ", r )

      }
    } );
  } );
} )( jQuery );
