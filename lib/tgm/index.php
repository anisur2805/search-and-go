<?php

add_action('tgmpa_register', 'theme_slug_register_required_plugins');
function theme_slug_register_required_plugins() {

    $config = array(
        'id'           => 'tgmpa',
        'default_path' => get_template_directory() . "/plugins/",
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => false,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    $plugins = array(
        //from WordPress plugins repo
        array(
            'name' => 'Advanced Custom Fields',
            'slug' => 'advanced-custom-fields',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => 'Gutenberg Template and Pattern Library & Redux Framework',
            'slug' => 'redux-framework',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => 'FakerPress',
            'slug' => 'fakerpress',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => 'ACF Photo Gallery Field',
            'slug' => 'navz-photo-gallery',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ),
    );

    tgmpa($plugins, $config);
}
