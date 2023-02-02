<?php
    // $url            = site_url().$_SERVER['REQUEST_URI'];
    // $extract_url    = explode('/', $url);
    // $location_item  = $extract_url[sizeof($extract_url)-2];
    $get_keyword  = ( isset( $_GET['keyword'] ) ) ? esc_attr( $_GET['keyword'] ) : '';
    $get_category = ( isset( $_GET['category'] ) ) ? esc_attr( $_GET['category'] ) : '';
    $get_location = ( isset( $_GET['location'] ) ) ? esc_attr( $_GET['location'] ) : '';

    $sg_location_args = array(
        'post_type'      => 'sag_listing',
        'post_status'    => 'publish',
        // 'posts_per_page' => -1,
        'posts_per_page' => 1,
        'paged'          => 1,
        'tax_query'      => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'sag_keywords',
                'field'    => 'slug',
                'terms'    => $get_keyword, //$location_item,
            ),
            array(
                'taxonomy' => 'sag_location',
                'field'    => 'slug',
                'terms'    => $get_location, //$location_item,
            ),
            array(
                'taxonomy' => 'sag_category',
                'field'    => 'slug',
                'terms'    => $get_category, //$location_item,
            ),
        ),
    );
    $location_query = new WP_Query( $sg_location_args );
    // echo '<pre>';
    //       print_r( [$url, $extract_url, $location_item, $location_item, $location_query->found_posts] );
    // echo '</pre>';

?>
<section class="single-listing-item">
    <div class="container-fluid g-0">
        <div class="row g-0">
            <div class="col-md-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14591.539698443348!2d90.3847218!3d23.893698949999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1sen!2sbd!4v1671196247088!5m2!1sen!2sbd" width="100%" height="900px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-5 py-2 px-4">

            <?php //get_template_part('/template-parts/search', 'form' ); ?>

                <div class="sg-filter-row-2">
                    <p><?php echo esc_attr( $location_query->found_posts ); ?> Results Found</p>
                    <div class="sortby-row">
                        <p class="sortby">
                            Sortby
                        </p>
                        <select>
                            <option value="">All</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                    </div>
                </div>

                <div class="row sg-result-row">
                    <div class="sg-result-posts">
                        <?php
                        if ( $location_query->have_posts() ) {
                            echo '<ul>';
                                while ( $location_query->have_posts() ) {
                                    $location_query->the_post();
                                    get_template_part('template-parts/sag', 'posts');
                                }
                            echo '</ul>';
                            wp_reset_postdata();
                        } else {
                            _e( 'No Posts found!', 'search-and-go' );
                        } ?>
                    </div>

                    <?php if( $location_query->max_num_pages > 1) { ?>
                        <div class="load-more-posts yeeeeeeee">
                            <?php //wp_nonce_field('sag-load-more-posts'); ?>
                            <!-- <input type="hidden" name="load-more-nonce" value="<?php //echo wp_create_nonce('load-more'); ?>" /> -->
                            <!-- <input type="hidden" name="action" value="sag_load_more_post" />  -->
                            <button type="submit" class="sag-button sag-load-more mx-auto" name="sag-load-more" data-paged="1">
                                <span class="spin sag-icon">
                                    <i class="fa fa-refresh"></i>
                                </span>
                                <span class="text">
                                    <?php _e('Load More'); ?>
                                </span>
                            </button>
                        </div>
                    <?php } else {
                        echo 'Nooooooooooo';
                    }?>
                </div>
            </div>
        </div>
    </div>
</section>
