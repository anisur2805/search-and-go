
<?php
    $sag_header     = get_option_value( 'quick-easy-header' );
    $quick_searches = get_option_value( 'quick-easy-section-rep-id' );

    // $title = get_option_value( 'testimonial-title');
    $testimonial_id = get_option_value( 'testimonials-rep-id' );
    if ( !is_null( $title ) && is_array( $quick_searches ) && array_key_exists( 'testimonial-title', $quick_searches ) ) {
        $title = $quick_searches['testimonial-title'];
        // Use $bg_url to set the background image
    } else {
        $title = '';
    }

?>
<!-- Quick Search -->
<section id="quick-search" class="quick-search" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/images/parallax2.jpg' ) ?>);">
    <div class="container">
        <div class="row">
            <h2 class="section-title"><?php echo esc_html( get_option_value( 'quick-easy-header' ) ); ?></h2>
        </div>
        <div class="row">
            <?php
                if ( is_array( $title ) ) {
                    $count = count( $title );
                    for ( $i = 0; $i < $count; ++$i ) {
                        echo '<div class="col-md-4 single-qs-item">';
                        echo "<div class='single-qs-item-top'><h3>{$quick_searches['quick-easy-title'][$i]}</h3>";
                        echo "<h5>{$quick_searches['quick-easy-subtitle'][$i]}</h5></div>";
                        echo "<p>{$quick_searches['quick-easy-content'][$i]}</p>";
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </div>
</section>
<!-- #Quick Search -->