<?php
/**
 * The template for displaying single listing comments
 * 
*/
// Option #1
?>

<div class="comments">
	<h2 class="comments-title">
		<?php 
			$sag_comment_numbers = get_comments_number();
			if( 1 == $sag_comment_numbers ) {
				_e( "1 Comment", 'search-and-go' );
			} else {
				_e( " {$sag_comment_numbers} Comments", 'search-and-go' );
			}
		?>
	</h2>

	<div class="sag-comments-list">
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 74,
				) );
			?>
		</ol><!-- .comment-list -->
	</div>

<?php
	if( ! comments_open() ) {
		_e( 'Comments are closed', 'search-and-go' );
	} 
	
	echo '<div class="sag-comments-form">';
		comment_form();
	echo '</div>';

// Option #2
// $args = array(
// 	'status' => 'approve',
// 	'post_id' => get_the_ID(),
// );

// $comments_query = new WP_Comment_Query();
// $comments       = $comments_query->query( $args );
// if ( $comments ) {
// 	foreach ( $comments as $comment ) {
		?>
		<!-- <div class="d-flex" data-comment_id="<?php esc_attr_e($comment->comment_ID); ?>">
			<div class="flex-shrink-0">
				<?php echo get_avatar( $comment ); ?>
			</div>
			<div class="flex-grow-1 ms-3">
				<h5><?php esc_attr_e( comment_author( $comment ) ); edit_comment_link(); ?></h5>
				<?php esc_attr_e( comment_text( $comment ) ); ?>
				<?php comment_date('n-j-Y'); ?>
			</div>
		</div> -->
		<?php
// 	}
// } else {
// 	echo 'No comments found.';
// }
echo '</div>';