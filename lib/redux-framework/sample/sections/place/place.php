<?php
/**
 * Redux Framework Place config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__( 'place Section', 'your-textdomain-here' ),
        'id'         => 'place-section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'     => 'place-rep-id',
                'title'  => 'Place Group',
                'type'   => 'repeater',
                'fields' => array(
                    array(
                        'id'      => 'place-title',
                        'title'   => 'Title',
                        'type'    => 'text',
                        'default' => 'What Our Clients Say',
                    ),
                    array(
                        'id'      => 'place-subtitle',
                        'title'   => 'Subtitle',
                        'type'    => 'textarea',
                        'default' => 'Student at the Faculty of Applierd Art',
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
