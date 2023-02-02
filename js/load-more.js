; ( function ( $ ) {
    $( document ).ready( function () {

        // Ajax load more posts
        $( '.sag-load-more:not(.loading)' ).on( 'click', function ( e ) {
            e.preventDefault();

            var $button = $( this );
            var paged = $button.data( 'paged' ),
                newPaged = paged + 1,
                $loading = $( '<div class="loading-animation"></div>' );

            $button.before( $loading );
            $button.hide();
            var data = {
                action: 'sag_load_more_post',
                security: load_obj.security,
                dataType: 'json',
                paged: paged
            }

            $button.addClass( 'loading' ).find( '.text' ).slideUp( 320 );
            $button.find( '.sag-icon' ).addClass( 'spin' )

            $.post( load_obj.ajaxUrl, data, function ( response ) {
                if ( response.success ) {

                    $loading.remove();
                    var data = response.data.data;

                    if ( data ) {
                        setTimeout( () => {

                            $( '.sg-result-posts ul' ).append( data );
                            $button.data( 'paged', newPaged ); 

                            $button.removeClass( 'loading' ).find( '.text' ).slideDown( 320 )
                            $button.find( '.sag-icon' ).removeClass( 'spin' )
                            
                        }, 2000 );

                        $button.data( 'paged', paged + 1 );
                        $button.show();
                    } else {
                        $button.text( 'No More Posts' );
                    }

                    

                } else {
                    console.log( 'vua' )
                }
            } )
                .fail( function ( err ) {
                    alert( 'Something went wrong' + err.message )
                    console.dir( err )
                } )
        } );

    } );
} )( jQuery );