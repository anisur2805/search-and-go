; ( function( $ ) {
    $( '#sag-listing-search-form' ).submit( function( e ) {
        e.preventDefault();

        var data = $( this ).serialize();
        var category = $( "#sag_category" ).val()
        var keyword = $( "#keyword-hp" ).val()
        var location = $( ".sag_location" ).val()


        $.post( formObj.url, data, function( response ) {
            if ( response.success ) {
                console.log( response.data.redirected_to )
                window.location = response.data.redirected_to
            } else {
                console.log( response.data.message )
            }
        } )
        .fail( function () {
            alert( 'Something went wrong' )
        } )

        // $.ajax( {
        //   method: 'POST',
        //   url: formObj.url,
        //   beforeSend: function( xhr ) {
        //     xhr.setRequestHeader( 'X-WP-Nonce', formObj.nonce )
        //   },
        //   data: {
        //     action: 'search_form_handler',
        //     data: data,
        //     security: formObj.nonce
        //   },
        //   success: function( r ) {
        //     console.log( "Success ", r )
        //   },
        //   error: function( r ) {
        //     console.log( "Error ", r )

        //   }
        // } );
    } );
} )( jQuery );
