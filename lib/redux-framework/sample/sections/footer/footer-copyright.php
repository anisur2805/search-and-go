<?php
/**
 * Redux Framework ACE editor config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__( 'Footer', 'your-textdomain-here' ),
        'id'         => 'footer-section',
        'subsection' => true,
        'fields'     => array(
            array(
                'title'   => 'Search Label',
                'id'      => 'search_label',
                'type'    => 'text',
                'default' => "Search",
            ),
            array(
                'title'   => 'Footer BG Image',
                'id'      => 'footer_bg_image',
                'type'    => 'background',
                'default'  => array(
					'background-color' => '#d1b7e2',
                    'background-image' => get_template_directory_uri() . '/images/footer-background.jpg',
				), 
            ),
            array(
                'title'   => 'Vimeo URL',
                'id'          => 'vimeo_url',
                'type'        => 'text',
                'placeholder' => __( 'Vimeo Url', 'redux-framework-demo' ),
                'default'     => '#',
            ),
            array(
                'title'   => 'Instagram URL',
                'id'          => 'ig_url',
                'type'        => 'text',
                'placeholder' => __( 'Instagram Url', 'redux-framework-demo' ),
                'default'     => '#',
            ),
            array(
                'title'   => 'Twitter URL',
                'id'          => 'tt_url',
                'type'        => 'text',
                'placeholder' => __( 'Twitter Url', 'redux-framework-demo' ),
                'default'     => '#',
            ),
            array(
                'title'   => 'Pinterest URL',
                'id'          => 'pt_url',
                'type'        => 'text',
                'placeholder' => __( 'Pinterest Url', 'redux-framework-demo' ),
                'default'     => '#',
            ),
            array(
                'title'   => 'Facebook URL',
                'id'          => 'fb_url',
                'type'        => 'text',
                'placeholder' => __( 'Facebook Url', 'redux-framework-demo' ),
                'default'     => '#',
            ),
            array(
                'title'   => 'Footer Logo',
                'id'      => 'footer_logo',
                'type'    => 'media',
                'default' => array(
                    'url' => get_template_directory_uri() . '/images/footer-logo.png',
                ),
            ),
            array(
                'title' => 'Copyright text',
                'id'    => 'copyright_text',
                'type'  => 'editor',
                'args'  => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    'teeny'         => false,
                    'quicktags'     => false,
                ),
            ),
            array(
                'title' => 'Copyright Background',
                'id'    => 'copyright_bg',
                'type'    => 'color_rgba',
                'default' => array(
                    'color'     => 'rgba(0,0,0,.5)',
                    'alpha'     => 1
                ),
            ),
        ),
    )
);
