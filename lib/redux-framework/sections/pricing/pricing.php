<?php

/**
 * Redux Framework Pricing config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined('ABSPATH') || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__('Pricing Section', 'your-textdomain-here'),
        'id'         => 'pricing-section',
        'icon'       => 'el el-adjust',
        'fields'     => array(
            array(
                'id'      => 'pricing-section-title',
                'title'   => 'Section Title',
                'type'    => 'text',
                'default' => 'What Our Clients Say',
            ),
            array(
                'id'      => 'pricing-section-subtitle',
                'title'   => 'Add Your Own Listing',
                'type'    => 'textarea',
                'default' => 'Choose one of our three pricing packages and start adding your own listings today. It’s really so easy that anyone can do it.',
            ),
            array(
                'id'     => 'pricing-rep-id',
                'title'  => 'Pricing Group',
                'type'   => 'repeater',
                'group_values' => true,
                'fields' => array(
                    array(
                        'id'      => 'pricing-title',
                        'title'   => 'Plan Name',
                        'type'    => 'text',
                        'default' => 'Basic Package',
                    ),
                    array(
                        'id'      => 'pricing-amount',
                        'title'   => 'Plan Amount',
                        'type'    => 'text',
                        'default' => '0',
                    ),
                    array(
                        'id'      => 'pricing-content',
                        'title'   => 'Content',
                        'type'    => 'textarea',
                        'default' => "Sed ut perspiciatis \nunde omnis iste natus error\n sit voluptatem acantium laudan.",
                        "description" => 'Add item in new line, one line is one item'
                    ),
                    array(
                        'id'          => 'pricing-url',
                        'type'        => 'text',
                        'placeholder' => '#',
                        'default'     => '#',
                    ),
                    array(
                        'id'          => 'pricing-text',
                        'type'        => 'text',
                        'default'     => 'Purchase',
                    ),
                    array(
                        'id'       => 'pricing-featured',
                        'type'     => 'checkbox',
                        'title'    => __('Is Featured?', 'redux-framework-demo'),
                        'default'  => '0'
                    )
                ), // group end

            ),
        ),
        array(
            'title'       => 'pricing',
            'id'          => 'pricing-bg',
            'type'        => 'background',
            'placeholder' => esc_html__('Background Image', 'your-textdomain-here'),
            'default'     => array(
                'background-color' => '#f00',
                'background-image' => get_template_directory_uri() . '/images/bckg-map.jpg',
            ),
        )
    ),
);
