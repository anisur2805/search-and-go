
; ( function ( $ ) {
    $( document ).ready( function () {
        const loadAjaxPostBtn = document.getElementById( 'ajax-fetch-posts' );
        const loadRestPostBtn = document.getElementById( 'rest-fetch-posts' );
        const clearPostBtn = document.getElementById( 'reset-fetch-posts' );
        var textarea = document.getElementById( 'fetch-posts-container' );

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

        // Fetch Post using AJAX
        if ( typeof ( loadRestPostBtn ) != 'undefined' && loadRestPostBtn != null ) {
            loadRestPostBtn.addEventListener( 'click', function () {
                var postsCollection = new wp.api.collections.Posts();
                postsCollection.fetch( { data: { per_page: 8 } } ).done(function(posts){
                    posts.forEach( function ( post ) {
                        console.log( "post ", post )
                        textarea.append( post.title.rendered + '\n' )
                    } )
                })
            } )

        }

        if ( typeof ( clearPostBtn ) != 'undefined' && clearPostBtn != null ) {
            clearPostBtn.addEventListener( "click", function () {
                textarea.value = ''
            } )
        }

    } );
} )( jQuery );