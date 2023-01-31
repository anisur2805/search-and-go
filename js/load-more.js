; ( function ( $ ) {
    $( document ).ready( function () {

        // Ajax load more posts
        $( '.sag-load-more' ).on( 'click', function ( e ) {
            e.preventDefault();
            // alert('fuck')
            var $button = $( this );
            var paged = $button.data( 'paged' );
            console.log( paged )
            // var $loading = $( '<div class="loading-animation"></div>' );
            // $button.before( $loading );
            $button.hide();
            var data = {
                action: 'sag_load_more_post',
                security: load_obj.security,
                paged: paged
            }

            console.log( data )

            $.post( load_obj.ajaxUrl, data, function ( response ) {
                if ( response.success ) {
                    console.log( "res ", response )
                    // console.log( response.data )
                    // $loading.remove();
                    // var data = response.data;
                    // if ( data.length > 0 ) {
                    //     // $.each(data, function(index, post) {
                    //     $( '.sg-result-posts ul' ).append( post );
                    //     // });

                    //     $button.data( 'paged', paged + 1 );
                    //     $button.show();
                    // } else {
                    //     $button.text( 'No More Posts' );
                    // }
                    // } else {
                    // console.log( 'vua' )
                } else {
                    console.log( 'amar' )
                }
            } )
                .fail( function ( err ) {
                    alert( 'Something went wrong'+ err.message )
                    console.dir(err)
                } )
        } );

    } );
} )( jQuery );