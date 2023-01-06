;(function($) {
    $( '#sag-listing-search-form' ).submit( function ( e ) {
        e.preventDefault();
        var data = $( this ).serialize();
        var category = $("#sag_category").val()
        var keyword = $("#keyword-hp").val()
        var location = $(".sag_location").val()
        // var data = {
        //     keyword: keyword,
        //     category: category,
        //     location: location,
        // };

        $.post( formObj.url, data, function( response ) {
            console.log( response )
            if( response.success ) {
                console.log( "histir", window.history.pushState( {}, '' ));
                console.log( "red ", response.redirect_url );
            } else {
                console.log( "response" )
            }
        })
        .fail(function() {
            console.log( formObj.error );
        })
    });
} )( jQuery );
