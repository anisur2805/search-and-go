<?php

function sg_location_cpt() {
    $args = array(
        'public' => true,
        'label' => __('Locations', 'search-and-go'),
    );
    register_post_type('location', $args);
}
add_action('init', 'sg_location_cpt');

function sg_location_taxonomy() {
    $args = array(
        'label' => __('Listings', 'textdomain'),
        'public' => true,
        'rewrite' => false,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'listing_item'],
    );

    register_taxonomy('listing_item', 'location', $args);
}
add_action('init', 'sg_location_taxonomy', 0);

// created term meta field for location cpt
add_action('listing_item_add_form_fields', 'sg_add_sg_term_img', 10, 2);
function sg_add_sg_term_img($taxonomy) { ?>
    <div class="form-field term-group">
        <label for="">Upload and Image</label>
        <input type="text" name="sg_term_img_upload" id="sg_term_img_upload" value="" style="width: 77%">
        <input type="button" id="sg_term_img_upload_btn" class="button" value="Upload an Image" />
    </div>
<?php
}

// Save image term meta value
add_action('created_listing_item', 'sg_sg_save_sg_term_img', 10, 2);
function sg_sg_save_sg_term_img($term_id, $tt_id) {
    if (isset($_POST['sg_term_img_upload']) && '' !== $_POST['sg_term_img_upload']) {
        $group = sanitize_url($_POST['sg_term_img_upload']);
        add_term_meta($term_id, 'sg_term_img', $group, true);
    }
}

// Edit image term meta
add_action('listing_item_edit_form_fields', 'sg_edit_image_upload', 10, 2);
function sg_edit_image_upload($term, $taxonomy) {
    $sg_term_img = get_term_meta($term->term_id, 'sg_term_img', true);
?>
    <div class="form-field term-group">
        <label for="">Upload and Image</label>
        <input type="text" name="sg_term_img_upload" id="sg_term_img_upload" value="<?php echo $sg_term_img ?>" style="width: 77%">
        <input type="button" id="sg_term_img_upload_btn" class="button" value="Upload an Image" />
    </div>
<?php
}

// Update image term meta
add_action('edited_listing_item', 'sg_update_image_upload', 10, 2);
function sg_update_image_upload($term_id, $tt_id) {
    if (isset($_POST['sg_term_img_upload']) && '' !== $_POST['sg_term_img_upload']) {
        $group = sanitize_url($_POST['sg_term_img_upload']);
        update_term_meta($term_id, 'sg_term_img', $group);
    }
}