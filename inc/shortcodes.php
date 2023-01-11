<?php

function sag_author_shortcode( $atts, $content = null ){

    $html = '';
    $html .= '<div class="sag-author-profile">';
    
    $html .= '</div>';
    return "Hello";
}
add_shortcode( 'sag_author_profile', 'sag_author_shortcode' );