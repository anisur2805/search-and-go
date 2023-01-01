<?php

/**
 * Template Name: Pricing Page 
 */

get_header();
global $sr_redux;
$pricing_id     = $sr_redux['pricing-rep-id'];
unset($pricing_id['redux_repeater_data']);
?>
<main id="primary" class="site-main sag-gallery-wrapper sag-gallery-masonry-wrapper">
    <div class="sag-blog-banner"></div>

    <div class="container sag-container sag-pricing-container">

        <div class="sag-blog-topbar text-center">
            <h3 class="page-title">
                <?php _e('Add Your Own Listing', 'search-and-go'); ?>
            </h3>
            <p>
                <?php _e('Choose one of our three pricing packages and start adding your own listings today. It’s really so easy that anyone can do it.', 'search-and-go'); ?>
            </p>
        </div>

        <div class="sag-pricing-wrapper">
            <div class="sag-pricing row align-items-center">
                <?php

                $count = count($pricing_id['pricing-title']);
                for ($i = 0; $i < $count; $i++) {
                    $featured = ($pricing_id['pricing-featured'][$i] == 1) ? ' is-featured ' : '';
                ?>
                    <div class="sag-single-pricing col-md-4 col-sm-6 <?php echo $featured; ?>">
                        <div class="sag-single-pricing-inner">
                            <?php if ($featured) : ?>
                                <span class="featured-content">
                                    Most Popular
                                </span>
                            <?php endif; ?>
                            <div class="sag-pricing-header">
                                <h3><?php echo $pricing_id['pricing-title'][$i]; ?></h3>
                                <span class="sag-price"><?php echo $pricing_id['pricing-amount'][$i]; ?> $</span>
                            </div>
                            <?php
                            $content = $pricing_id['pricing-content'][$i];
                            $newContent = explode("\n", $content);
                            ?>
                            <ul>
                                <?php foreach ($newContent as $val) : ?>
                                    <li><i class="bi bi-check-circle"></i><?php echo $val; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="#" class="sag-button"><?php _e('Purchase', 'search-and-go'); ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="sag-gold-member">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $gold_member = get_template_directory_uri() . '/images/pricing-image.jpg';
                    ?>
                    <img src="<?php echo esc_url($gold_member); ?>" />
                </div>
                <div class="col-md-6">
                    <h4>Become a Gold Member</h4>
                    <p>Want even more? No problem, just send us an email with the subject line “Gold”, and tell us why you want to join. Ten users who send in the best answers will get:</p>

                    <ul class="sag-gold-list">
                        <li>Their Own Account Manager</li>
                        <li>Their Own Account Manager</li>
                        <li>Their Own Account Manager</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</main><!-- #main -->

<?php get_footer();
