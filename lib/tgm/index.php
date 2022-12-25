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
            'name' => 'Advanced Custom Fields', // The plugin name.
            'slug' => 'advanced-custom-fields', // The plugin slug (typically the folder name).
           // 'source' => 'js_composer.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name' => 'Gutenberg Template and Pattern Library & Redux Framework', // The plugin name.
            'slug' => 'redux-framework', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name' => 'FakerPress', // The plugin name.
            'slug' => 'fakerpress', // The plugin slug (typically the folder name).
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
    );

    tgmpa($plugins, $config);
}
