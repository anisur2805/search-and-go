
<?php

// if ( ! class_exists( 'Redux_Framework_Plugin', false ) ) {
// 	return;
// }

global $sr_redux; 
echo '<pre>';
      print_r( $sr_redux );
echo '</pre>';
$sag_header     = $sr_redux['quick-easy-header'];
$sag_title      = $sr_redux['quick-easy-title'];
$sag_subtitle   = $sr_redux['quick-easy-subtitle'];
$sag_content    = $sr_redux['quick-easy-content'];
?>
<section id="quick-search" class="quick-search" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/images/parallax2.jpg') ?>);">
    <div class="container">
        <div class="row">
            <h2><?php echo esc_html($sag_header); ?></h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="quick-search-item">
                    <h4><?php echo esc_html($sag_header); ?></h4>
                    <p><?php echo esc_html($sag_subtitle[0]); ?></p>
                    <p><?php echo esc_html($sag_content[0]); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>