
<?php
    $sag_title          = get_option_value( 'testimonials-section-title' );
    $sag_subtitle       = get_option_value( 'testimonials-section-subtitle' );
    $testimonial_id     = get_option_value( 'testimonials-rep-id' );
    $testimonials       = get_option_value( 'testimonials-rep-id' );
    // $testimonial_bg     = get_option_value( 'testimonials-bg' )[ 'background-image' ];
    $testimonial_bg     = (isset($testimonial_bg)) ? $testimonial_bg : esc_url(get_template_directory_uri() . '/images/parallax2.jpg');

    // unset( $testimonials['redux_repeater_data']);

    // Check BG Image
    $bg_image = get_option_value( 'testimonials-rep-id');
    if(!is_null($bg_image) && is_array($bg_image) && array_key_exists('background-image', $bg_image)) {
    $bg_url = $bg_image['background-image'];
    // Use $bg_url to set the background image
    } else {
    $bg_url = '';
    }

    // $title = get_option_value( 'testimonial-title');
    $testimonial_id     = get_option_value( 'testimonials-rep-id' );
    if(!is_null($title) && is_array($testimonial_id) && array_key_exists('testimonial-title', $testimonial_id)) {
        $title = $testimonial_id['testimonial-title'];
        // Use $bg_url to set the background image
    } else {
        $title = '';
    }

?>
<!-- Testimonials Section -->
<section id="testimonials-wrapper" class="testimonials-wrapper" style="background-image: url(<?php echo esc_url( $bg_url ); ?>);">
    <div class="container">
        <div class="row">
            <h2 class="section-title"><?php echo esc_html($sag_title); ?></h2>
            <p><?php echo esc_html($sag_subtitle); ?></p>
        </div>
        <div class="testimonials-slider">
            <?php 
                if( is_array($title) ) {
                $count = count( $title );
                for ($i = 0; $i < $count; $i++) {
                    echo '<div class="single-testimonial-item">';
                        echo '<img src="'.$testimonial_id['testimonee'][$i]['url'].'" />';
                        echo "<div class='single-testimonial-item-top'><h3>{$testimonial_id['testimonial-title'][$i]}</h3>";
                        echo "<h5>{$testimonial_id['testimonial-designation'][$i]}</h5>";
                        echo "<p>{$testimonial_id['testimonial-content'][$i]}</p></div>";
                    echo '</div>';
                }
                }
            ?>
        </div>
        </div>
    </div>
</section>
<!-- #Testimonials Section -->