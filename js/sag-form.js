; ( function ( $ ) {
    $( 'document' ).ready( function () {
        console.log( "response" );
        // Search Form
        $( '.sag-listing-search-form' ).submit(function ( e ) {
            alert("hey")
            e.preventDefault();
            var data = $( this ).serialize();

            jQuery.ajax( {
                type:'POST',
                url: sagFormObj.ajaxUrl,
                data: {
                    data: data,
                    param1: 'value1',
                    param2: 'value2'
                },
                success: function ( response ) {
                    console.log( response );
                },
                fail: function(err){
                    console.log( err );
                }
            } );


        } );
    } );
} );