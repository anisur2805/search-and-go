<?php

// add_action('admin_menu', 'test_admin_menu');
function test_admin_menu(){
    add_menu_page('Fetch Posts', 'Fetch Posts', 'manage_options', 'fetch-posts', 'fetch_posts');
}

function fetch_posts() {?>
    <div class="wrap fetch-post-area">
        <div class="buttons">
            <button id="ajax-fetch-posts">Fetch Post By Ajax</button>
            <button id="rest-fetch-posts">Fetch Post By Rest API</button>
            <button id="reset-fetch-posts">Reset</button>
        </div>
        <div class="fetch-posts-wrapper" style="margin-top: 15px;">
            <textarea id="fetch-posts-container" cols="100" rows="6"></textarea>
        </div>
    </div>

<?php
}