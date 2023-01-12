<?php

function sag_author_shortcode( $atts, $content = null ){

    ob_start();
    include __DIR__ . "/author-shortcode.php";
    return ob_get_clean();
}
add_shortcode( 'sag_author_profile', 'sag_author_shortcode' );