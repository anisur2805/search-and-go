<?php
/**
 * Template Name: Single Listing Item Template
 *
 */

get_header();

if (have_posts()): while (have_posts()): the_post();
        get_template_part('template-parts/sag_location');
    endwhile;
    wp_reset_postdata();
endif;

get_footer();
