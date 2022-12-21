
<?php

if ( ! class_exists( 'Redux' ) ) {
    return;
}

global $sr_redux; 
$sag_title          = $sr_redux['testimonials-section-title'];
$sag_subtitle       = $sr_redux['testimonials-section-subtitle'];
$testimonial_id     = $sr_redux['testimonials-rep-id'];
$testimonials     = $sr_redux['testimonials-rep-id'];

$testimonial_bg     = $sr_redux['testimonials-bg']['background-image'];

unset( $testimonials['redux_repeater_data']);

$testimonial_bg = (isset($testimonial_bg)) ? $testimonial_bg : esc_url(get_template_directory_uri() . '/images/parallax2.jpg');

?>
<section id="testimonials-wrapper" class="testimonials-wrapper" style="background-image: url(<?php echo esc_url($testimonial_bg); ?>);">
    <div class="container">
        <div class="row">
            <h2 class="section-title"><?php echo esc_html($sag_title); ?></h2>
            <p><?php echo esc_html($sag_subtitle); ?></p>
        </div>
        <div class="testimonials-slider">
        <?php 
                $count = count($testimonial_id['testimonial-title']);
                for ($i = 0; $i < $count; $i++) {
                    echo '<div class="single-testimonial-item">';
                        echo '<img src="'.$testimonial_id['testimonee'][$i]['url'].'" />';
                        echo "<div class='single-testimonial-item-top'><h3>{$testimonial_id['testimonial-title'][$i]}</h3>";
                        echo "<h5>{$testimonial_id['testimonial-designation'][$i]}</h5>";
                        echo "<p>{$testimonial_id['testimonial-content'][$i]}</p></div>";
                    echo '</div>';
                }
            ?>
        </div>
          
        </div>
    </div>
</section>