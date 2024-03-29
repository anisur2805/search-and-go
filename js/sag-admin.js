jQuery( document ).ready( function ( $ ) {

    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;

    // Runs when the image button is clicked.
    $( '#sg_term_img_upload_btn' ).click( function ( e ) {

        // Prevents the default action from occuring.
        e.preventDefault();
        console.log( "hello" )

        // If the frame already exists, re-open it.
        if ( meta_image_frame ) {
            meta_image_frame.open();
            return;
        }

        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media( {
            title: sg_meta_image.title,
            button: { text: sg_meta_image.button },
            library: { type: 'image' }
        } );

        // Runs when an image is selected.
        meta_image_frame.on( 'select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get( 'selection' ).first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $( '#sg_term_img_upload' ).val( media_attachment.url );
        } );

        // Opens the media library frame.
        meta_image_frame.open();
    } );

} );