<?php

/**
 * Redux Framework Testimonials config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined('ABSPATH') || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__('Socials Profile', 'search-and-go'),
        'id'         => 'sag-socials-section',
        'icon'       => 'el el-user',
        'fields'     => array(
            // array(
                // 'id'       => 'social_links',
                // 'type'     => 'repeater',
                // 'title'    => __('Social Links', 'redux-framework-demo'),
                // 'subtitle' => __('Add and manage your social media links', 'redux-framework-demo'),
                // 'fields'   => array(
                //     array(
                //         'id'       => 'social_network',
                //         'type'     => 'social_profiles',
                //         'title'    => __('Social Network', 'redux-framework-demo'),
                //         'subtitle' => __('Select the social network', 'redux-framework-demo'),
                //     ),
                //     array(
                //         'id'       => 'social_url',
                //         'type'     => 'text',
                //         'title'    => __('URL', 'redux-framework-demo'),
                //         'subtitle' => __('Enter the URLL for your social media profile', 'redux-framework-demo'),
                //     ),
                // ),
                array(
                    'id'       => 'facebook_url',
                    'type'     => 'text',
                    'title'    => __('Facebook URL', 'redux-framework-demo'),
                ),
                array(
                    'id'       => 'twitter_url',
                    'type'     => 'text',
                    'title'    => __('Twitter URL', 'redux-framework-demo'),
                ),
                array(
                    'id'       => 'instagram_url',
                    'type'     => 'text',
                    'title'    => __('Instagram URL', 'redux-framework-demo'),
                ),
                array(
                    'id'       => 'linkedin_url',
                    'type'     => 'text',
                    'title'    => __('Linked In URL', 'redux-framework-demo'),
                ),
                array(
                    'id'       => 'vimeo_url',
                    'type'     => 'text',
                    'title'    => __('Vimeo URL', 'redux-framework-demo'),
                ),
            // ),
        ),
    )
);
