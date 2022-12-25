<?php

function sg_sag_listing_cpt() {
    $args = array(
        'public' => true,
        'label' => __('All Listings', 'search-and-go'),
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('sag_listing', $args);

    //register taxonomy for custom post tags
    register_taxonomy( 
        'sag_keywords', //taxonomy 
        'sag_listing', //post-type
        array( 
            'hierarchical'  => false, 
            'label'         => __( 'Keywords','taxonomy general name'), 
            'singular_name' => __( 'Keyword', 'taxonomy general name' ), 
            'rewrite'       => true, 
            'query_var'     => true,
        )
    );

    //register Types for custom post tags
    // TODO: Linked with Categories 
    // like Category: Electronics and type could be New, Used
    // Also can be sell/ buy/ Ex-change/ Job/ Rent
    register_taxonomy( 
        'sag_type', //taxonomy 
        'sag_listing', //post-type
        array( 
            'hierarchical'  => false, 
            'label'         => __( 'Listing Types','taxonomy general name'), 
            'singular_name' => __( 'Listing Type', 'taxonomy general name' ), 
            'rewrite'       => true, 
            'query_var'     => true,
        )
    );

    //register categories for custom post tags
    // TODO: if there is/are any types they will display as checkbox in here
    register_taxonomy( 
        'sag_category', //taxonomy 
        'sag_listing', //post-type
        array( 
            'hierarchical'  => true, 
            'label'         => __( 'Categories','taxonomy general name'), 
            'singular_name' => __( 'Category', 'taxonomy general name' ), 
            'rewrite'       => true, 
            'query_var'     => true,
        )
    );
    
}
add_action('init', 'sg_sag_listing_cpt');

function sg_sag_listing_taxonomy() {
    $args = array(
        'label' => __('Locations', 'search-and-go'),
        'public' => true,
        'rewrite' => false,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'listing-item'],
    );

    register_taxonomy('sag_location', 'sag_listing', $args);
}
add_action('init', 'sg_sag_listing_taxonomy', 0);

// created term meta field for sag_listing cpt
add_action('sag_location_add_form_fields', 'sg_add_sg_term_img', 10, 2);
function sg_add_sg_term_img($taxonomy) { ?>
    <div class="form-field term-group">
        <div style="margin-bottom: 10px;">
            <label for="">Enter Icon class</label>
            <input type="text" name="sg_sag_listing_icon" placeholder="bi-search" id="sg_sag_listing_icon" value="bi-image">
            <small>Bootstrap(5) </small>
        </div>
        <div>
            <label for="">Upload an Image</label>
            <input type="text" name="sg_term_img_upload" id="sg_term_img_upload" value="" style="width: 77%">
            <input type="button" id="sg_term_img_upload_btn" class="button" value="Upload an Image" />
        </div>
    </div>
<?php
}

// Save image term meta value
add_action('created_sag_location', 'sg_sg_save_sg_term_img', 10, 2);
function sg_sg_save_sg_term_img($term_id, $tt_id) {
    if (isset($_POST['sg_term_img_upload']) && '' !== $_POST['sg_term_img_upload']) {
        $group = sanitize_url($_POST['sg_term_img_upload']);
        add_term_meta($term_id, 'sg_term_img', $group, true);
    }
    if (isset($_POST['sg_sag_listing_icon']) && '' !== $_POST['sg_sag_listing_icon']) {
        $group = sanitize_text_field($_POST['sg_sag_listing_icon']);
        add_term_meta($term_id, 'sg_term_icon', $group, true);
    }
}

// Edit image term meta
add_action('sag_location_edit_form_fields', 'sg_edit_image_upload', 10, 2);
function sg_edit_image_upload($term, $taxonomy) {
    $sg_term_img = get_term_meta($term->term_id, 'sg_term_img', true);
    $sg_term_icon = get_term_meta($term->term_id, 'sg_term_icon', true);
?>
    <div class="form-field term-group">
        <div style="margin-bottom: 10px;">
            <!-- TODO: Icon library -->
            <label for="">Enter Icon class</label>
            <input type="text" name="sg_sag_listing_icon" id="sg_sag_listing_icon" value="<?php echo $sg_term_icon; ?>">
            <small>Bootstrap(5) </small>
        </div>

        <div>
            <label for="">Upload and Image</label> <br/>
            <input type="text" name="sg_term_img_upload" id="sg_term_img_upload" value="<?php echo $sg_term_img ?>" style="width: 80%">
            <input type="button" id="sg_term_img_upload_btn" class="button" value="Upload an Image" />
        </div>
    </div>
<?php
}

// Update image term meta
add_action('edited_sag_location', 'sg_update_image_upload', 10, 2);
function sg_update_image_upload($term_id, $tt_id) {
    if (isset($_POST['sg_term_img_upload']) && '' !== $_POST['sg_term_img_upload']) {
        $group = sanitize_url($_POST['sg_term_img_upload']);
        update_term_meta($term_id, 'sg_term_img', $group);
    }
    
    if (isset($_POST['sg_sag_listing_icon']) && '' !== $_POST['sg_sag_listing_icon']) {
        $group = sanitize_text_field($_POST['sg_sag_listing_icon']);
        update_term_meta($term_id, 'sg_term_icon', $group);
    }
}
