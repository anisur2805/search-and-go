<?php
/**
 * Redux Framework Testimonials config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__( 'Quick and Easy Section', 'your-textdomain-here' ),
        'id'         => 'quick-easy-section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'quick-easy-header',
                'title'   => 'Title',
                'type'    => 'text',
                'default' => 'Quick and Easy Search',
            ),
            array(
                'id'      => 'quick-easy-subtitle',
                'title'   => 'Description',
                'type'    => 'textarea',
                'default' => '',
            ),
            array(
                'id'     => 'quick-easy-section-rep-id',
                'title'  => 'Quick and Easy Group',
                'type'   => 'repeater',
                'group_values' => true,
                'fields' => array(
                    array(
                        'id'      => 'quick-easy-title',
                        'title'   => 'Name',
                        'type'    => 'text',
                        'default' => 'Choose a Category',
                    ),
                    array(
                        'id'      => 'quick-easy-subtitle',
                        'title'   => 'Subtitle',
                        'type'    => 'text',
                        'default' => 'Sed ut perspiciatis unde omnis iste',
                    ),
                    array(
                        'id'      => 'quick-easy-content',
                        'title'   => 'Content',
                        'type'    => 'textarea',
                        'default' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.',
                    ),
                ),
            ),
            array(
                'title'       => 'Bg Image',
                'id'          => 'quick-easy-bg',
                'type'        => 'background',
                'placeholder' => esc_html__( 'Background Image', 'your-textdomain-here' ),
                'default'     => array(
                    'background-color' => '#f00',
                    'background-image' => get_template_directory_uri() . '/images/parallax2.jpg',
                ),
            ),
        ),
    )
);
