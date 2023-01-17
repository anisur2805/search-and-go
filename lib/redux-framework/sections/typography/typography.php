<?php
defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name, array(
        'title' => esc_html__( 'Typography', 'your-textdomain-here' ),
        'id'    => 'typography-section',
        'icon'  => 'el el-font',
        'fields' => array(
			array(
				'id'                => 'opt-typography-body',
				'type'              => 'typography',
				'title'             => esc_html__( 'Body Font', 'your-textdomain-here' ),
				'subtitle'          => esc_html__( 'Specify the body font properties.', 'your-textdomain-here' ),
				'google'            => true,
				'font_family_clear' => false,
				'default'           => array(
					'color'       => '#dd9933',
					'font-size'   => '30px',
					'font-family' => 'Arial, Helvetica, sans-serif',
					'font-weight' => 'Normal',
				),
				'output'            => array( 'p' ),
			),
            array(
				'id'                => 'opt-typography-link',
				'type'              => 'typography',
				'title'             => esc_html__( 'Link Style', 'your-textdomain-here' ),
				'subtitle'          => esc_html__( 'Specify the link properties.', 'your-textdomain-here' ),
				'google'            => true,
				'font_family_clear' => true,
				'default'           => array(
					'color'       => '#000',
					'font-size'   => '16px',
					'font-family' => 'Raleway, Arial, Helvetica, sans-serif',
					'font-weight' => 'Normal',
				),
				'output'            => array( 'a' ),
			),
			array(
				'id'          => 'opt-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography Site Description', 'your-textdomain-here' ),

				// Use if you want to hook in your own CSS compiler.
				'compiler'    => true,

				// Select a backup non-google font in addition to a Google font.
				'font-backup' => true,

				// Enable all Google Font style/weight variations to be added to the page.
				'all-styles'  => true,
				'all-subsets' => true,
				'units'       => 'px',
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'your-textdomain-here' ),
				'default'     => array(
					'color'       => '#333',
					'font-style'  => '700',
					'font-family' => 'Abel',
					'google'      => true,
					'font-size'   => '33px',
					'line-height' => '40px',
				),
				'output'      => array( 'h2.site-description, h2.entry-title, .site-description, h2.wp-block-post-title' ),
				// Disable google fonts.
				// 'google'      => false,.

				// Includes font-style and weight. Can use font-style or font-weight to declare.
				// 'font-style'    => false,.

				// Only appears if Google is true and subsets not set to false.
				// 'subsets'       => false,.

				// Hide or show the font size input.
				// 'font-size'     => false,.

				// Hide or show the line height input.
				// 'line-height'   => false,.

				// Hide or show the word spacing input. Defaults to false.
				// 'word-spacing'  => true,.

				// Hide or show the word spacing input. Defaults to false.
				// 'letter-spacing'=> true,.

				// Hide or show the font color picker.
				// 'color'         => false,.

				// Disable the font previewer
				// 'preview'       => false,.

				// An array of CSS selectors in which to apply dynamically to this font style.
				// 'compiler'    => array( 'h2.site-description-compiler' ),.

			),
			array(
				'id'                => 'opt-typography-body-shadow',
				'type'              => 'typography',
				'title'             => esc_html__( 'Title Font', 'your-textdomain-here' ),
				'subtitle'          => esc_html__( 'Specify the body font properties.', 'your-textdomain-here' ),
				'google'            => true,
				'font_family_clear' => false,
				'text-shadow'       => true,
				'color_alpha'       => true,
				'margin-top'        => true,
				'margin-bottom'     => true,
				'default'           => array(
					'color'         => '',
					'font-size'     => '30px',
					'font-family'   => 'Arial, Helvetica, sans-serif',
					'font-weight'   => 'Normal',
					'margin-top'    => '20px',
					'margin-bottom' => '20px',
				),
				'output'            => array( '.site-title, .wp-block-site-title' ),
			),
		),
    )
);
