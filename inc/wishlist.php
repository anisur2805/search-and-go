<?php

// Add custom post meta for wishlist
// add_action('add_meta_boxes', 'sag_wishlist_add_meta_box');
function sag_wishlist_add_meta_box( $post_type ){
	$post_types = array('post', 'page');

	if( in_array( $post_type, $post_types ) ) {
		add_meta_box(
			'sag_wishlist', 
			'Wishlist', 
			'sag_wishlist_cb', 
			$post_type,
			'advanced',
			'high' );
		}
}

// add_action('save_post', 'sag_wishlist_save_post');
function sag_wishlist_save_post($post_id){
	if ( ! isset( $_POST['sag_wishlist_mb_nonce'] ) ) {
		return $post_id;
	}

	$nonce = $_POST['sag_wishlist_mb_nonce'];

	if( ! wp_verify_nonce( $nonce, 'sag_wishlist_mb')) {
		return $post_id;
	}

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	$sag_wishlist = sanitize_text_field( $_POST['sag_wishlist']);
	update_post_meta($post_id, '_sag_wishlist_key', $sag_wishlist );
}

function sag_wishlist_cb($post){
	wp_nonce_field('sag_wishlist_mb', 'sag_wishlist_mb_nonce');

	$value = get_post_meta( $post->ID, '_sag_wishlist_key', true ); ?>
	<label for="sag_wishlist">
		<?php _e('In wishlist? ', 'search-and-go') ?>
	</label> 
	<input type="checkbox" name="custom_checkbox" id="custom_checkbox" value="1" <?php checked( $value, 1 ); ?> />

	<?php
}

function the_wishlist_link( $post_id = 0 ) {
    if ( is_user_logged_in() ) {
        if ( $post_id == 0 ) {
            global $post;
            $post_id = $post->ID;
        }

        $wishlists = sag_get_user_wishlist( get_current_user_id() );
        if ( in_array( $post_id, $wishlists ) ) {
			$data = 'in_array';
			echo  esc_attr( $data );
            return '<a href="javascript:void(0)" class="sag-wishlist sag-added-to-wishlist sag-wishlist_"' .$post_id .' data-post_id="' . $post_id . '" data-wishlist-id='.$post_id.'></a>';
        } else {
			$data = 'not_in_array';
			echo esc_attr( $data );
            // return '<a href="javascript:void(0)" class="sag-wishlist sag-wishlist_" data-post_id="' . $post_id . '" data-wishlist-id='.$post_id.'></a>';
        }
    } else {
        // return '<a href="javascript:void(0)" class="sag-require-login"><i class="fa fa-heart"></i>"</a>';
		$data = 'login_required';
		echo esc_attr( $data );
		wp_die();
    }
}

function sag_get_user_wishlist( $user_id = 0 ) {
	$wishlists = get_user_meta( $user_id, 'sag_wishlist', true );

	if ( ! empty( $wishlists ) && is_array( $wishlists ) ) {
		$wishlists = sag_prepare_user_wishlist( $wishlists );
	} else {
		$wishlists = array();
	}

	$wishlists = apply_filters( 'sag_user_wishlists', $wishlists, $user_id );

	return $wishlists;
}

function sag_delete_user_wishlist( $user_id = 0, $listing_id = 271 ) {
	// if ( get_post_type( $listing_id ) !== 'sag_listing' ) {
	// 	return array();
	// }

	$old_wishlists = sag_get_user_wishlist( $user_id );
	$new_wishlists = array_filter( $old_wishlists, static function( $wishlist ) use ( $listing_id ) {
		return ( $wishlist !== $listing_id );
	} );
	
	if( in_array( $listing_id, $old_wishlists) ) {
		update_user_meta( $user_id, 'sag_wishlist', $new_wishlists );
	}	

	do_action( 'sag_user_wishlists_deleted', $user_id, $new_wishlists, $old_wishlists );

	return $new_wishlists;
}

function sag_add_user_wishlist( $user_id = 0, $listing_id = 0 ) {
	// if ( get_post_type( $listing_id ) !== ATBDP_POST_TYPE ) {
	// 	return array();
	// }

	$old_wishlist = sag_get_user_wishlist( $user_id );
	$new_wishlist = array_merge( $old_wishlist, array( $listing_id ) );
	$new_wishlist = sag_prepare_user_wishlist( $new_wishlist );

	update_user_meta( $user_id, 'sag_wishlist', $new_wishlist );

	$new_wishlist = sag_get_user_wishlist( $user_id );

	return $new_wishlist;
}

function is_wishlist( $post_id = 0) {
	$wishlists = sag_get_user_wishlist( get_current_user_id() );
	return in_array( $post_id, $wishlists );
}

add_action('wp_ajax_sag_wishlist_action', 'sag_add_remove_wishlist_all');
add_action('wp_ajax_nopriv_sag_wishlist_action', 'sag_add_remove_wishlist_all');
function sag_add_remove_wishlist_all(){
	// TODO: need to check nonce here
	$sag_wishlist_id  	= ( isset( $_POST['wishlist_post_id'] ) ) ? sanitize_text_field( $_POST['wishlist_post_id'] ) : 0;
	$user_id = get_current_user_id();
	$wishlist = sag_get_user_wishlist( $user_id );

	if ( in_array( $sag_wishlist_id, $wishlist ) ) {
		// TODO: delete wishlist
		sag_delete_user_wishlist( $user_id, $sag_wishlist_id );
	} else {
		sag_add_user_wishlist( $user_id, $sag_wishlist_id );
	}

	echo wp_kses_post( the_wishlist_link( $sag_wishlist_id ) );

	wp_die();
}

function sag_prepare_user_wishlist( $wishlist = array() ) {
	$wishlist = array_values( $wishlist );
	$wishlist = array_map( 'absint', $wishlist );
	$wishlist = array_filter( $wishlist );
	$wishlist = array_unique( $wishlist );

	return $wishlist;
}
