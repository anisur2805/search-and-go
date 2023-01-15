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
