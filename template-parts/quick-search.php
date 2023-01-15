
<?php
    $sag_header         = get_option_value( 'quick-easy-header' );
    $quick_searches     = get_option_value( 'quick-easy-section-rep-id' );
?>
<!-- Quick Search -->
<section id="quick-search" class="quick-search" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/images/parallax2.jpg') ?>);">
    <div class="container">
        <div class="row">
            <h2 class="section-title"><?php echo esc_html( get_option_value( 'quick-easy-header') ); ?></h2>
        </div>
        <div class="row">
            <?php 
                $count = count($quick_searches['quick-easy-title']);
                for ($i = 0; $i < $count; $i++) {
                    echo '<div class="col-md-4 single-qs-item">';
                        echo "<div class='single-qs-item-top'><h3>{$quick_searches['quick-easy-title'][$i]}</h3>";
                        echo "<h5>{$quick_searches['quick-easy-subtitle'][$i]}</h5></div>";
                        echo "<p>{$quick_searches['quick-easy-content'][$i]}</p>";
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</section>
<!-- #Quick Search -->