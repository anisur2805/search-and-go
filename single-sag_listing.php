<?php
get_header(); ?>

<div id="<?php get_the_ID() ?>" <?php echo post_class('single-location-wrapper'); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="single-listing-banner" style="background-image: url(<?php echo esc_url(the_post_thumbnail_url('large')); ?>)"></div>
    <?php
    }
    ?>

    <div class="sag-container">
        <?php
        $the_cat = get_the_category();
        ?>
        <?php
        $the_cat  = get_the_category();
        $cat_link = get_category_link($the_cat[0]->cat_ID);
        ?>
        <p><a href="<?php echo $cat_link; ?>"><?php echo $the_cat[0]->cat_name; ?></a></p>

        <h1><?php the_title(); ?></h1>
        <?php
        if ( class_exists('ACF') ) {
            $sag_features       = get_field('sag-features');
            $sag_call           = get_field('sag-call-us');
            $sag_website        = get_field('sag-website');
            $sag_office_hours   = get_field('sag-office-hours');
        ?>
            <div class="row single-listing-features">
                <div class="col-md-6">
                    <p> <?php echo esc_attr($sag_features); ?></p>
                    <p> <?php echo esc_attr( get_field('sag-address') ) ?></p>
                </div>
                <div class="col-md-6">
                    <p class="text-start text-sm-start text-lg-end"> call us anytime <?php echo esc_attr($sag_call); ?></p>
                    <p class="text-start text-sm-start text-lg-end"> 
                        <a href="<?php echo esc_url($sag_website); ?>"><?php echo esc_url($sag_website); ?></a> 
                        <?php echo esc_attr($sag_office_hours); ?>
                    </p>
                </div>
            </div>
        <?php } ?>

        <div class="single-listing-gallery">
            <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/Club-Apex-gallery4.jpg" />
            <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/Club-Apex-gallery4.jpg" />
            <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/Club-Apex-gallery4.jpg" />
            <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/Club-Apex-gallery4.jpg" />
            <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/Club-Apex-gallery4.jpg" />
            <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/Club-Apex-gallery4.jpg" />
            <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/Club-Apex-gallery4.jpg" />
        </div>

        <div class="row">
            <div class="col-md-8">
                <?php
                if (class_exists('ACF')) {
                    $sag_specifications = get_field('sag-specification');

                    if ($sag_specifications) {
                        echo '<h4 class="single-listing-title">Specification</h4>';
                        echo '<ul class="sag-ul">';
                        foreach ($sag_specifications as $specification) {
                            echo '<li><i class="bi bi-check-circle"></i>' . $specification . '</li>';
                        }
                        echo '</ul>';
                    }
                } else {
                    echo '<p class="plugin-not-active">ACF not install/ activate</p>';
                }
                ?>

                <p><?php the_content(); ?></p>

                <?php
                if (class_exists('ACF')) {
                    $sag_amenities = get_field('sag-amenities');

                    if ($sag_amenities) {
                        echo '<h4 class="single-listing-title">Amenities</h4>';
                        echo '<ul class="sag-amenities">';
                        foreach ($sag_amenities as $amenity) {
                            echo '<li><i class="bi bi-check-circle"></i>' . $amenity . '</li>';
                        }
                        echo '</ul>';
                    }
                } else {
                    echo '<p class="plugin-not-active">ACF not install/ activate</p>';
                }
                ?>

                <?php
                $sag_tags = get_the_tags();
                if ($sag_tags) {
                    echo '<h4 class="single-listing-title">Tags</h4>';
                    echo "<ul class='sag-tags'>";
                    foreach ($sag_tags as $tag) {
                        echo '<li><a href="' . get_term_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                    }
                    echo "</ul>";
                }
                ?>

                <!-- Video  -->
                <?php 
                if (class_exists('ACF')) {
                    $sag_video = get_field('sag-video');
                        if ($sag_video) : ?>
                            <div class="sag-video">
                                <iframe src="<?php echo esc_url($sag_video); ?>"></iframe>
                            </div>
                        <?php endif; } ?>
                <!-- !Video  -->
                
            </div>
            <div class="col-md-4">
                <?php if (class_exists('ACF')) { ?>
                <div class="sag-g-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14591.539986136593!2d90.38575195!3d23.893696400000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1sen!2sbd!4v1671977160180!5m2!1sen!2sbd" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="sag-address">
                        <p>
                            <?php echo get_field('sag-address') ?>
                        </p>
                        <span><a target="_blank" href="<?php echo esc_url(get_field("sag-get-directions")); ?>"><i class="bi bi-map me-2"></i>Get Directions</a></span>
                    </div>
                </div>
                <?php } ?>

                <?php
                global $sr_redux;
                $fb_url = $sr_redux['facebook_url'];
                $tt_url = $sr_redux['twitter_url'];
                $ig_url = $sr_redux['instagram_url'];
                $li_url = $sr_redux['linkedin_url'];
                $vimeo_url = $sr_redux['vimeo_url'];
                ?>
                <div class="sag-listing-socials sag-listing-sidebar-item">
                    <h4 class="single-listing-title">Social Profiles</h4>
                    <ul>
                        <li><a href="<?php echo esc_url($fb_url); ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo esc_url($tt_url); ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                    </ul>
                </div>
                
                <?php if (class_exists('ACF')) { ?>
                <div class="sag-listing-sidebar-item sag-booking-wrapper">
                    <h4 class="single-listing-title">Book a table online <span class="float-end text-muted">Powered by OpenTable</span></h4>
                    <form class="sag-form ">
                        <?php wp_nonce_field( 'sag-booking' ); ?>
                        <div class="sag-enquire-div">
                            <select name="sag-booking-persons" id="sag-booking-persons">
                                <option value="1">1 Person</option>
                                <option value="2">2 Persons</option>
                                <option value="3">3 Persons</option>
                                <option value="4">4 Persons</option>
                            </select>
                            <input type="text" name="sag-booking-date" id="sag-booking-date" placeholder="Booking Date" />
                            <input type="text" name="sag-booking-time" id="sag-booking-time" placeholder="Booking Time" />
                        </div>
                        <input type="submit" name="sag-booking-submit" id="sag-booking-submit" value="Book Now" />
                    </form>                    
                </div>
                <?php } ?>

                <?php if (class_exists('ACF')) { ?>
                <div class="sag-listing-sidebar-item sag-recommended-post">
                    <h4 class="single-listing-title">Recommended</h4>
                    <?php

                    $related = get_posts( 
                        array( 
                            'category__in' => wp_get_post_categories($post->ID), 
                            'numberposts' => 1, 
                            'post__not_in' => array($post->ID) 
                        ) 
                    );

                    if( $related ) foreach( $related as $post ) {
                    setup_postdata($post); ?>
                    
                    <ul> 
                        <li>
                            <div class="feature-img">
                                <?php if(has_post_thumbnail()) the_post_thumbnail(); ?>
                                <div class="">
                                    <a href="<?php the_permalink(); ?>">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </div>
                            </div>
                            <?php the_excerpt(); ?>
                        </li>
                    </ul>   
                    <?php }
                    wp_reset_postdata(); ?>
                </div>
                <?php } ?>

                <div class="sag-listing-sidebar-item sag-enquire-now sag-form-wrapper">
                    <h4 class="single-listing-title">Enquire now</h4>
                    <form class="sag-form">
                        <?php wp_nonce_field( 'sag-enquire' ); ?>
                        <div class="sag-enquire-div sag-enquire">
                            <input type="text" name="sag-name" id="sag-name" placeholder="Enter Name" />
                            <input type="text" name="sag-email" id="sag-email" placeholder="Enter Email" />
                            <input type="text" name="sag-phone" id="sag-phone" placeholder="Enter Phone" />
                            <textarea placeholder="Enter Message" name="sag-message" id="sag-message"></textarea>
                        </div>
                        <input type="submit" name="sag-submit" id="sag-submit" value="Submit" />
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php

get_footer();
