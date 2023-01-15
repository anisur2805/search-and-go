<?php
/**
 * Search and Go functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Search_and_Go
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function search_and_go_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Search and Go, use a find and replace
		* to change 'search-and-go' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'search-and-go', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'search-and-go' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'search_and_go_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'search_and_go_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function search_and_go_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'search_and_go_content_width', 640 );
}
add_action( 'after_setup_theme', 'search_and_go_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function search_and_go_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'search-and-go' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'search-and-go' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'search_and_go_widgets_init' );

/**
 * Admin Enqueue Script for Location Media 
 *
 * @return void
 */
function sg_image_uploader_enqueue( $hooks ) {
    global $typenow;
    if( ($typenow == 'sag_listing') ) {
        wp_enqueue_media();

		wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css', array(), time() );
		wp_enqueue_style( 'sag-admin-css', get_template_directory_uri() . '/css/sag-admin.css', array(), time() );
        wp_register_script( 'sg-admin-js', get_template_directory_uri() . '/js/sag-admin.js', array( 'jquery' ) );
        wp_localize_script( 'sg-admin-js', 'sg_meta_image',
            array(
                'title' => 'Upload an Image',
                'button' => 'Use this Image',
            )
        );
        wp_enqueue_script( 'sg-admin-js' );
    }

	if( ( 'toplevel_page_sr_redux' == $hooks ) ) {
		wp_enqueue_style( 'redux-override-css', get_template_directory_uri() . '/css/redux-override.css', array(), time() );
	}

	wp_register_script( 'sag-admin-post-js', get_template_directory_uri() . '/js/sag-admin-post.js', array( 'jquery', 'wp-api' ) );
	wp_enqueue_script('sag-admin-post-js');
	wp_localize_script( 'sag-admin-post-js', 'obj',
		array(
			'nonce' => wp_create_nonce('sag-post'),
			'ajax_url' => admin_url('admin-ajax.php')
		)
	);
}
add_action( 'admin_enqueue_scripts', 'sg_image_uploader_enqueue' );

/**
 * Enqueue scripts and styles.
 */
function search_and_go_scripts() {
	wp_enqueue_style( 'search-and-go-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'search-and-go-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'search-and-go-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-auto-complete-ui', 'https://code.jquery.com/ui/1.13.2/jquery-ui.js', array('jquery') );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), time(), true );
	wp_enqueue_script( 'main-script-js', get_template_directory_uri() . '/js/main.js', array( 'jquery-auto-complete-ui', 'slick-js' ), time(), true );
	wp_localize_script( 'main-script-js', 'sagObj', array(
		'ajaxUrl' => admin_url('admin-ajax.php'),
	));

	wp_enqueue_script( 'jquery-masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js' );
	wp_enqueue_script( 'jquery-masonry-image-load', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js' );

	wp_enqueue_style( 'bootstrap-icon', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css' );
	wp_enqueue_style( 'auto-complete-ui', '//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css' );
	wp_enqueue_style( 'slick-min', get_template_directory_uri() . '/css/slick.min.css', array(), time() );
	wp_enqueue_style( 'bootstrap-icon', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css', array(), time() );

	wp_enqueue_script( 'sag-listing-search-form', get_template_directory_uri() . '/js/form.js', array('jquery'), time(), true );
	wp_localize_script( 'sag-listing-search-form', 'formObj', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('search-form-nonce'),
		'we_value' => 1234,
		'whatever' => 1234,
		'confirm' => __('Are you sure?', 'search-and-go'),
		'success' => __('Successfully done', 'search-and-go'),
		'error'   => __('Something went wrong', 'search-and-go'),
	));

	wp_enqueue_script( 'enquire-form', get_template_directory_uri() . '/js/enquire-form.js', array('jquery'), time(), true );
	wp_localize_script( 'enquire-form', 'enqObj', array(
		'url' => admin_url('admin-ajax.php'),
		'confirm' => __('Are you sure?', 'search-and-go'),
		'success' => __('Successfully done', 'search-and-go'),
		'error'   => __('Something went wrong', 'search-and-go'),
	));

}
add_action( 'wp_enqueue_scripts', 'search_and_go_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Location CPT.
 */
require get_template_directory() . '/inc/sag-listing-cpt.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load TGM
 */
require_once get_template_directory()."/lib/tgm/class-tgm-plugin-activation.php";
require_once get_template_directory()."/lib/tgm/index.php";

/**
 * Load Bootstrap Nav Walker
 */
require get_template_directory() . '/inc/Bootstrap-Nav-Walker.php';
/**
 * Redux Customize File 
 */
require get_template_directory() . '/lib/redux-framework/config.php';
require get_template_directory() . '/lib/redux-framework/metaboxes.php';

// Include Menu 
require get_template_directory() . '/inc/Menu.php';

// Custom excerpt length 
function sg_custom_excerpt_length( $length ) {
	if ( get_post_type( get_the_ID() ) == 'sag_listing' ) {
		print("You must print");
		return 30;
	}
}
add_filter( 'excerpt_length', 'sg_custom_excerpt_length', 999 );

function sag_default_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'sag_default_excerpt_length', 999 );

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

add_action('wp_ajax_sag_wishlist_action', 'sag_add_remove_wishlist_all');
add_action('wp_ajax_nopriv_sag_wishlist_action', 'sag_add_remove_wishlist_all');
function sag_add_remove_wishlist_all(){
	// if( !wp_verify_nonce()) {
	// 	wp_send_json(false, 200);
	// }
	$sag_wishlist_id  	= isset( $_POST['wishlist_post_id'] ) ? sanitize_text_field( $_POST['wishlist_post_id'] ) : 0;
	
	$user_id = get_current_user_id();
	$wishlist = get_user_meta( $user_id, 'sag_wishlist', true );
	$data = '';
	if( ! $user_id){
		$data = 'login_required';
		echo esc_attr( $data );
		wp_die();
	}

	if ( empty( $wishlist ) ) {
		echo "empty";
		$data = $sag_wishlist_id;
		add_user_meta( $user_id, 'sag_wishlist', $sag_wishlist_id );
	}else {
		echo "not empty";
		$data = '';
		update_user_meta( $user_id, 'sag_wishlist', $sag_wishlist_id );
	}
	
	echo wp_json_encode( $data );
	die();
}

// Socials share
function sag_socials(){ ?>
	<ul>
		<li><a href="<?php echo esc_url( get_option_value( 'facebook_url') ); ?>"><i class="fa fa-facebook"></i></a></li>
		<li><a href="<?php echo esc_url( get_option_value( 'twitter_url') ); ?>"><i class="fa fa-twitter"></i></a></li>
		<li><a href="<?php echo esc_url( get_option_value( 'instagram_url') ); ?>" href="#"><i class="fa fa-instagram"></i></a></li>
		<li><a href="<?php echo esc_url( get_option_value( 'linkedin_url') ); ?>" href="#"><i class="fa fa-linkedin"></i></a></li>
		<li><a href="<?php echo esc_url( get_option_value( 'vimeo_url') ); ?>" href="#"><i class="fa fa-vimeo"></i></a></li>
	</ul>
	<?php
}

add_action( 'wp_ajax_search_form_handler', 'search_form_handler' );
add_action( 'wp_ajax_nopriv_search_form_handler', 'search_form_handler' );

function search_form_handler() {

	if( ! check_ajax_referer('search-form-nonce','security',false)) {
        _e('Nonce verification failed', 'search-and-go');
		wp_die();
	} else {
		if ( isset( $_POST['data'] ) ) {

			$keyword  = isset($_POST['keyword']) ? $_POST['keyword'] : '';
			$category = isset($_POST['sag_category']) ? $_POST['sag_category'] : '';
			$location = isset($_POST['sag_location']) ? $_POST['sag_location'] : '';
			
			$data = [
				'keyword'	=> esc_attr( $keyword ),
				'category'	=> esc_attr( $category ),
				'location'	=> esc_attr( $location ),
				'message' 	=> __('Message send successfully', 'search-and-go'),
			];
			$redirect_url = add_query_arg( $data, home_url( '/listing-item/' ) );
			var_dump($redirect_url);
			echo json_encode(array('S'=>true,'M'=>'Response success','data_redirect'=>wp_redirect( $redirect_url )));
			die();
		}
	}
}

// Enquire Form
add_action( 'wp_ajax_enquire_form', 'enquire_form' );
add_action( 'wp_ajax_nopriv_enquire_form', 'enquire_form' );
function enquire_form(){
	if( ! wp_verify_nonce( $_REQUEST['sag-enquire'], 'sag-enquire' ) ) {
		wp_send_json_error( array(
			'message' => __('Nonce verify failed!', 'search-and-go')
		) );
	} else {
		$name  		= isset($_POST['sag-name']) ? sanitize_text_field( $_POST['sag-name'] ) : '';
		$enq_id  	= isset($_POST['enquiry-item-id']) ? sanitize_text_field( $_POST['enquiry-item-id'] ) : '';
		$post_id    = $enq_id;
		$email  	= isset($_POST['sag-email']) ? sanitize_email( $_POST['sag-email'] ) : '';
		$phone  	= isset($_POST['sag-phone']) ? sanitize_text_field( $_POST['sag-phone'] ) : '';
		$message  	= isset($_POST['sag-message']) ? sanitize_textarea_field( $_POST['sag-message'] ) : '';

		if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
			wp_send_json_error( array(
				'message' => 'Please fill out all required fields.'
			) );
		} else {
			// $data  = array(
			// 	'name'  		=> $name,
			// 	'email'  		=> $email,
			// 	'phone'  		=> $phone,
			// 	'enq-form-id'   => $enq_id,
			// 	'message'  		=> $message,
			// );
	
			$to = get_option('admin_email');
			$site_name = get_option('blogname');
			$title = get_the_title( $post_id );
			$subject =  $site_name ." Contact via " . $title;
			$listing_url   = get_permalink( $post_id );
			$date_format   = get_option( 'date_format' );
			$time_format   = get_option( 'time_format' );
			$current_time  = current_time( 'timestamp' );
			$now = date_i18n( $date_format . ' ' . $time_format, $current_time );

			$message_body = <<<OUTPUT
			{$site_name} Contact via {$title}
			Dear Administrator,

			A listing on your website {$site_name} received a message.

			Listing URL: {$listing_url}

			Name: {$name}
			Email: {$email}
			Message: $message
			Time: {$now}

			This is just a copy of the original email and was already sent to the listing owner. You don't have to reply this unless necessary.
OUTPUT;
			wp_mail( $to, $subject, $message_body );

			wp_send_json_success([
				'message' => __('Successfully send mail to admin email', 'search-and-go'),
			]);
		}
	}

}

/**
 * Create a post delete button
 *
 * @param [type] $content
 * @return void
 */
function sag_generate_delete_link( $content ){
	if( is_single() && in_the_loop() && is_main_query() ) {
		$url = add_query_arg([
			'action' 		=> 'sag_post_frontend_delete',
			'post'			=> get_the_ID(),
			'nonce'			=> wp_create_nonce('sag_post_frontend_delete'),
		], home_url());

		return $content .= ' <a class="sag-btn sag-button" href="'. esc_url( $url ).'">'. esc_html__('Delete Post').'</a>';

	}

	return null;
}

function sag_post_frontend_delete() {
	if( isset( $_GET['action']) && isset( $_GET['nonce']) && $_GET['action'] === 'sag_post_frontend_delete' && wp_verify_nonce( $_GET[ 'nonce' ], 'sag_post_frontend_delete' ) ) {
		$post_id = ( isset( $_GET['post'] ) ) ? ( $_GET['post'] ) : ( null );

		$post = get_post( (int) $post_id );
		if( empty( $post ) ) {
			return;
		}

		wp_trash_post( $post_id );
		$redirect = admin_url( 'edit.php' );
		wp_safe_redirect( $redirect );
		die();
	}
}

function sag_delete_post_capability() {
	if( current_user_can( 'edit_others_posts' ) ) {
		add_filter( 'the_content', 'sag_generate_delete_link' );
		add_action( 'init', 'sag_post_frontend_delete' );
	}
}
// add_action( 'init', 'sag_delete_post_capability' );

add_action('wp_ajax_ajax_fetch_posts', 'ajax_fetch_posts');
function ajax_fetch_posts(){
	$posts = get_posts(); 
	wp_send_json($posts);
}

/**
 * Undocumented Handle Redux so don't need to always check 
 * before use Redux is install/ enable or not
 *
 * @param string $key
 * @param string $default
 * @return void
 */
function get_option_value( $key, $default = '' ){
	if( class_exists( 'ReduxFramework' ) ) {
		return Redux::get_option( 'sr_redux', $key, $default );
	} else {
		return $default;
	}
}