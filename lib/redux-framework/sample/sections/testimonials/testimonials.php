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
        'title'      => esc_html__( 'Testimonials Section', 'your-textdomain-here' ),
        'id'         => 'testimonials-section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'     => 'testimonials-rep-id',
                'title'  => 'Testimonials Group',
                'type'   => 'repeater',
                'fields' => array(
                    array(
                        'id'      => 'testimonials-title',
                        'title'   => 'Name',
                        'type'    => 'text',
                        'default' => 'What Our Clients Say',
                    ),
                    array(
                        'id'      => 'testimonials-designation',
                        'title'   => 'Designation',
                        'type'    => 'text',
                        'default' => 'Student at the Faculty of Applierd Art',
                    ),
                    array(
                        'id'      => 'testimonials-content',
                        'title'   => 'Content',
                        'type'    => 'textarea',
                        'default' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem acantium laudan.',
                    ),
                    array(
                        'id'          => 'testimonee',
                        'type'        => 'media',
                        'placeholder' => esc_html__( 'Image', 'your-textdomain-here' ),
                        'default'     => array(
                            'url' => get_template_directory_uri() . '/images/testimonial-image1.jpg',
                        ),
                    ),
                ),
            ),
            array(
                'title'       => 'Testimonial Bg Image',
                'id'          => 'testimonials-bg',
                'type'        => 'background',
                'placeholder' => esc_html__( 'Background Image', 'your-textdomain-here' ),
                'default'     => array(
                    'background-color' => '#f00',
                    'background-image' => get_template_directory_uri() . '/images/bckg-map.jpg',
                ),
            ),
        ),
    )
);
