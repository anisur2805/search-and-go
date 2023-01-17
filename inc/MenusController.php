<?php

class MenusController {
    public function __construct() {
        add_action('admin_menu', [$this, 'addMenus']);
    }

    public function initializeMenus() {
        return [
            'sag-menu' => [
                'page_title' => __('Fetch Posts', 'search-and-go'),
                'menu_title' => __('Fetch Posts', 'search-and-go'),
                'capability' => 'manage_options',
                'function'   => [$this, 'fetchPosts'],
                'icon_url'   => '',
                'priority'   => 90,
            ],
        ];
    }

    public function addMenus() {
        foreach ($this->initializeMenus() as $menuSlug => $menu) {
            add_menu_page($menu['page_title'], $menu['menu_title'], $menu['capability'], $menuSlug, $menu['function'], $menu['icon_url'], $menu['priority']);
        }
    }

    public function fetchPosts() { ?>
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
}
