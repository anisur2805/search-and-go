<?php
/**
 * Template Name: Listing Item Template
 *
 */

get_header();

if ( isset( $_GET['keyword'] ) || isset( $_GET['location'] ) || isset( $_GET['category'] ) ) {
    get_template_part( 'template-parts/sag_lists' );
} 
// else if ( isset( $_GET['category'] ) ) {
//     get_template_part( 'template-parts/sag_category' );

//     echo 'hey 3';
// } else if ( isset( $_GET['location'] ) ) {

//     echo 'hey 2';
//     get_template_part( 'template-parts/sag_location_location' );
// } else {
//     echo 'hey';
//     get_template_part( 'template-parts/sag_location' );
// }

get_footer();
