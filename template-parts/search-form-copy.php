<?php
$cats = get_terms(
    array(
        'taxonomy'  => 'sag_category',
        'number'    => 0,
    )
);
?>
<form class="sag-listing-search-form" id="sag-listing-search-form">

    <div class="sg-filter-row">
        <div class="sg-filter-row-keyword flex1 mb-20px">
            <h5><?php _e('Keywords', 'search-and-go'); ?></h5>
            <input type="text" name="keyword" id="keyword-hp" class="" placeholder="Keyword" value="" autocomplete="off">

            <?php
            $url              = site_url() . $_SERVER['REQUEST_URI'];
            $extract_url      = explode('/', $url);
            $location_item    = $extract_url[sizeof($extract_url) - 2];
            $sg_location_args = array(
                'post_type'      => 'sag_listing',
                'post_status'    => 'publish',
            );
            $location_query =  new WP_Query($sg_location_args);

            if ($location_query->have_posts()) {
                while ($location_query->have_posts()) {
                    $location_query->the_post();
                    $keywords = get_the_term_list($post->ID, 'sag_keywords', '<ul><li>', '</li><li>', '</li></ul>');
                }
                wp_reset_postdata();
            }
            ?>

        </div>

        <div class="sg-filter-row-category flex1 mb-20px">
            <h5><?php _e('Category', 'search-and-go'); ?></h5>
            <select name="sag_category" class="sag_category" id="sag_category">
                <option value="">All</option>
                <?php
                foreach ($cats as $cat) {
                    $cat_meta  = get_term_meta($cat->term_id, 'sg_term_icon', true);
                ?>
                    <option value="<?php echo esc_attr($cat->slug); ?>">
                        <?php echo esc_attr($cat->name); ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="sg-filter-row-location flex1 mb-20px">
            <h5><?php _e('Location', 'search-and-go'); ?></h5>
            <?php
            $args = array(
                'show_option_none' => __('Select Location', 'search-and-go'),
                'orderby'          => 'name',
                'taxonomy'         => 'sag_location',
                'name'             => 'sag_location',
                'value_field'      => 'slug',
                'class'            => 'sag_location',
            );
            wp_dropdown_categories($args);
            ?>
        </div>
    </div>
    
    <?php wp_nonce_field( 'sag-form-nonce' ); ?>
    <input type="hidden" name="action" value="search_form_handler" />
    <button type="submit" name="form_data" class="sg-btn"><i class="bi bi-search"></i> Search place</button>
    
</form>