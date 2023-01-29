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

        // Wishlist 
        $( 'body' ).on( 'click', '.sag-wishlist', function ( e ) {
            e.preventDefault();

            var self = $( this ),
                wishlist_id = self.data( 'wishlist-id' );

            var data = {
                'wishlist_post_id': wishlist_id,
                'action': 'sag_wishlist_action',
                'post_id': wishlist_id
            };

            $.post( sagObj.ajaxUrl, data, function ( res ) {
                var post_id = data['post_id'].toString();
                var staElement = $( '.sag-wishlist_' + post_id );
                var data_id = staElement.data( 'wishlist-id' );
                console.log( res )
                if ( "login_required" == res ) {
                    alert( "Please login to add favorite" )
                } else if ( "in_array" == res ) {
                    console.log( "help" )
                    staElement.removeClass( 'sag-added-to-wishlist' );
                } else {
                    console.log( "go away" )
                    if ( data_id == post_id ) {
                        staElement.addClass( 'sag-added-to-wishlist' );
                    }
                }
            } );
        } );

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

        // Masonry Blog Post
        var $grid = $( '.grid' ).masonry( {
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
        } );

        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function () {
            $grid.masonry();
        } );


        // Ajax Load More Posts
        //     let currentPage = 1;
        //     // let paged = 1;
        //     $('.sag-load-more').on('click', function(e){
        //         e.preventDefault();
        //         currentPage++;

        //         // var offset = 0,
        //         //     posts_per_page = 5,
        //         //     paged = 1;

        //         var data = {
        //             // offset: offset,
        //             // posts_per_page:posts_per_page,
        //             paged: currentPage,
        //             // dataType: 'json',
        //             action: 'sag_load_more_posts',
        //             // form_data: $('.load-more-posts form').serialize(),
        //         }

        //         var data = $(this).serialize();
        //         $.post(sagObj.ajaxUrl, data, function( response ) {
        //         if( response.success){
        //             console.log( 'Yeeeeeeeeeeeeee' )
        //             // offset += 1;
        //             $('.sg-result-posts').append(response)
        //             paged: currentPage
        //         } else {
        //             console.log( 'Nooooooooooooooooooooo' )
        //         }
        //         })
        //         .fail(function(){
        //         alert(sagObj.error)
        //         })
        //   });

 
        $( '.sag-load-more' ).on( 'click', function ( e ) {
            e.preventDefault();
             
            var button = $(this),
                data = {
                    'action': 'sag_load_more_posts',
                    'query': sagObj.posts, // that's how we get params from wp_localize_script() function
                    'page' : sagObj.current_page
                };

            $.ajax( {
                type: 'POST',
                url: sagObj.ajaxUrl,
                dataType: 'html',
                // paged: paged++,
                data: data,
                beforeSend : function ( xhr ) {
                    button.text('Loading...');
                },
                success: function ( data ) {
                    console.log(data);
                    if ( data ) {
                        button.text( 'More posts' ).prev().before(data);
                        sagObj.current_page++;

                        if( sagObj.current_page == sagObj.max_page )
                            button.remove();
                    } else {
                        button.remove();
                    }

                     
                }
            } );
        } );

    } );
} )( jQuery );
