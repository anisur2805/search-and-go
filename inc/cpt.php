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

    register_taxonomy( 'listing_item', 'location', $args);
}
add_action('init', 'sg_location_taxonomy', 0);

add_action('listing_item_add_form_fields', 'add_term_image', 10, 2);
function add_term_image($taxonomy){
    ?>
    <div class="form-field term-group">
        <label for="">Upload and Image</label>
        <input type="text" name="txt_upload_image" id="txt_upload_image" value="" style="width: 77%">
        <input type="button" id="upload_image_btn" class="button" value="Upload an Image" />
    </div>
    <?php
}


add_action('created_listing_item', 'save_term_image', 10, 2);
function save_term_image($term_id, $tt_id) {
    if (isset($_POST['txt_upload_image']) && '' !== $_POST['txt_upload_image']){
        $group = sanitize_url($_POST['txt_upload_image']);
        add_term_meta($term_id, 'term_image', $group, true);
    }
}



add_action('listing_item_edit_form_fields', 'edit_image_upload', 10, 2);
function edit_image_upload($term, $taxonomy) {
    // get current group
    $txt_upload_image = get_term_meta($term->term_id, 'term_image', true);
?>
    <div class="form-field term-group">
        <label for="">Upload and Image</label>
        <input type="text" name="txt_upload_image" id="txt_upload_image" value="<?php echo $txt_upload_image ?>" style="width: 77%">
        <input type="button" id="upload_image_btn" class="button" value="Upload an Image" />
    </div>
<?php
}


add_action('edited_listing_item', 'update_image_upload', 10, 2);
function update_image_upload($term_id, $tt_id) {
    if (isset($_POST['txt_upload_image']) && '' !== $_POST['txt_upload_image']){
        $group = sanitize_url($_POST['txt_upload_image']);
        update_term_meta($term_id, 'term_image', $group);
    }
}


