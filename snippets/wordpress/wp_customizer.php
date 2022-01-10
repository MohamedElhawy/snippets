<?php

    // this goes into the custom theme "functions.php" file OR custom plug-in file OR any file included in WordPress

    // create customize for the theme
    //------------------------------------------------------------------------
    function themeslug_customize_register( $wp_customize ) {

        // Do stuff with $wp_customize, the WP_Customize_Manager object.

        // add panel
        $wp_customize->add_panel( 'm_wp_theme_panel_id', array(
            'priority'       => 1000,
            'title'          => esc_html__( 'side bar', 'm_wp_theme' ),
            'description'    => esc_html__( 'customize the theme side bars.', 'm_wp_theme' ),
        ) );



        // add section
        $wp_customize->add_section( 'm_wp_theme_section_id', array(
            'title'          => esc_html__( 'right side bar', 'm_wp_theme' ),
            'description'    => esc_html__( 'customize the right side bar elements.', 'm_wp_theme' ),
            'panel'          => 'm_wp_theme_panel_id',
            'priority'       => 160,
        ) );



        // add setting
        $wp_customize->add_setting( 'm_wp_theme_setting_id' );



        // add control
        $wp_customize->add_control( 'm_wp_theme_control_id', array(
            'type'     => 'text',
            'settings' => 'm_wp_theme_setting_id',
            'label'    => esc_html__( 'Title', 'm_wp_theme' ),
            'section'  => 'm_wp_theme_section_id',
            'priority' => 10,
        ) );

    }

    add_action( 'customize_register', 'themeslug_customize_register' );


?>