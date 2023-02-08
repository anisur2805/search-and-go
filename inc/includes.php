<?php

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
// require get_template_directory() . '/lib/redux-framework/metaboxes.php';

require get_template_directory() . '/inc/wishlist.php';

require get_template_directory() . '/inc/Admin/SetupWizard.php';