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
        'title'      => esc_html__( 'List Items', 'your-textdomain-here' ),
        'id'         => 'list-items-section',
        'fields'     => array(
            array(
                'title'  => 'Lists Group',
                'id'     => 'listitem-title',
                'type'   => 'repeater',
                'fields' => array(
                    array(
                        'id'          => 'listitem-title',
                        'type'        => 'text',
                        'placeholder' => esc_html__( 'Title', 'your-textdomain-here' ),
                    ),
                    array(
                        'id'          => 'listitem-subtitle',
                        'type'        => 'textarea',
                        'placeholder' => esc_html__( 'Sub Title', 'your-textdomain-here' ),
                    ),
                ),
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
