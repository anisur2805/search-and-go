
; ( function ( $ ) {
    $( document ).ready( function () {
        const loadAjaxPostBtn = document.getElementById( 'ajax-fetch-posts' );
        const loadRestPostBtn = document.getElementById( 'rest-fetch-posts' );
        const clearPostBtn = document.getElementById( 'reset-fetch-posts' );
        const textarea = document.getElementById( 'fetch-posts-container' );

        // Fetch Post using AJAX
        if ( typeof ( loadAjaxPostBtn ) != 'undefined' && loadAjaxPostBtn != null ) {
            loadAjaxPostBtn.addEventListener( 'click', function () {

                var data = {
                    action: 'ajax_fetch_posts'
                }
                $.post( obj.ajax_url, data, function ( posts ) {
                    posts.forEach( function ( post ) {
                        textarea.append( post.post_title + '\n' )
                    } )

                } )


            } )
        }

        // Fetch Post using Rest API ( Backbone JS )
        if ( typeof ( loadRestPostBtn ) != 'undefined' && loadRestPostBtn != null ) {
            loadRestPostBtn.addEventListener( 'click', function () {
                var postsCollection = new wp.api.collections.Posts();
                postsCollection.fetch().done(function( posts ){
                    posts.forEach( function( post ) {
                        console.log( 'post ', post )
                        textarea.append( post.title.rendered + '\n' )
                    } )
                })
            } )

        }

        if ( typeof ( clearPostBtn ) != 'undefined' && clearPostBtn != null ) {
            clearPostBtn.addEventListener( 'click', function () {
                textarea.value = ''
            } )
        }

    } );
} )( jQuery );