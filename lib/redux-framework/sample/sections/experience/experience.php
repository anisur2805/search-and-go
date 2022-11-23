<?php
/**
 * Redux Framework Experience config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__( 'Experience', 'your-textdomain-here' ),
        'id'         => 'experience-section',
        'subsection' => true,
        'fields'     => array(
            array(
                'title'   => 'Experience Title',
                'id'      => 'experience-title',
                'type'    => 'text',
                'default' => "Share Your Experience",
            ),
            array(
                'title'   => 'Experience Sub Title',
                'id'      => 'experience-subtitle',
                'type'    => 'text',
                'default' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.

                ",
            ),
        ),
    )
);
