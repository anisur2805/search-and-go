<?php
/**
 * Redux Framework List Item config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__( 'CTA Section', 'your-textdomain-here' ),
        'id'         => 'cta-section', 
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'cta-title',
                'title'       => 'Title',
                'type'        => 'text',
                'placeholder' => esc_html__( 'Title', 'your-textdomain-here' ),
                'default'     => 'Special Offers Every Day',
            ),
            array(
                'id'          => 'cta-subtitle',
                'title'          => 'Subtitle',
                'type'        => 'textarea',
                'placeholder' => esc_html__( 'Sub Title', 'your-textdomain-here' ),
                'default'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.                        ',
            ),
            array(
                'id'          => 'cta-btn1-text',
                'type'        => 'text',
                'title'         => 'Button Text',
                'placeholder' => esc_html__( 'Button Text', 'your-textdomain-here' ),
                'default'     => 'See More',
            ),
            array(
                'id'          => 'cta-btn1-url',
                'type'        => 'text',
                'title'         => 'Button Url',
                'placeholder' => esc_html__( 'Button Url', 'your-textdomain-here' ),
                'default'     => '#',
            ),
            array(
                'id'          => 'cta-btn2-text',
                'type'        => 'text',
                'title'         => 'Button Text',
                'placeholder' => esc_html__( 'Button Text', 'your-textdomain-here' ),
                'default'     => 'Go Now',
            ),
            array(
                'id'          => 'cta-btn2-url',
                'type'        => 'text',
                'title'         => 'Button Url',
                'placeholder' => esc_html__( 'Button Url', 'your-textdomain-here' ),
                'default'     => '#',
            ),
            array(
                'id'          => 'cta-bg',
                'type'        => 'background',
                'placeholder' => esc_html__( 'Background Image', 'your-textdomain-here' ),
                'default'     => array(
                    'background-color' => '#d1b7e2',
                    'background-image' => get_template_directory_uri() . '/images/parallax1.jpg',
                ),
            ),

            array(
                'title'   => 'Experience Sub Title',
                'id'      => 'experience-subtitle',
                'type'    => 'text',
                'default' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. ",
            ),
        ),
    )
);
