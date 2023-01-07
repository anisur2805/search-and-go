<?php
/**
 * Template Name: Listing Item Template
 *
 */

get_header();

if (have_posts()): while (have_posts()): the_post();
        if( isset( $_GET['keyword'] ) ) {
            get_template_part('template-parts/sag_keyword');
        } else if( isset( $_GET['sag_category'] ) ) {
            get_template_part('template-parts/sag_category');
        }  else if( isset( $_GET['sag_location'] ) ) {
            get_template_part('template-parts/sag_location_location');
        } else {
            get_template_part('template-parts/sag_location');
        }
    endwhile;
    wp_reset_postdata();
endif;

get_footer();
