<?php
$terms = get_terms(
    array(
        'taxonomy'  => 'sag_location',
    )
);
?>
<section id="banner" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/images/home-image-new.jpg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Find the Best Places to Be</h1>
                <p>All the top locations – from restaurants and clubs, to cinemas, galleries, and more.</p>
                <?php
                get_template_part('/template-parts/search', 'form' );
                ?>
                <ul class="location-lists">
                    <?php
                    foreach ($terms as $term) {
                        $term_meta  = get_term_meta($term->term_id, 'sg_term_icon', true); ?>
                        <li>
                            <a href="<?php echo esc_url(get_term_link($term)); ?>">
                                <i class="bi <?php echo $term_meta; ?>"></i>
                                <h3><?php echo esc_attr($term->name); ?></h3>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

            </div>
        </div>
    </div>
</section>