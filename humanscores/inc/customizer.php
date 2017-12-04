<?php
/**
 * Humanscores Theme Customizer
 *
 * @package Humanscores
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function humanscores_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


    /**
     * Custom Customizer Customization
     */
    //Setting for header and footer background color
    $wp_customize->add_setting('theme_bg_color', array(
        'default' => '#002254',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    //Setting for interactive color
    $wp_customize->add_setting('color_interactive', array(
        'default' => '#b51c35',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));



    //Control for for header and footer background color
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_bg_color', array(
                'label' => __('Header and footer background color', 'humanscores'),
                'section' => 'colors',
                'settings' => 'theme_bg_color',
            )
        )
    );

    //Control interactive color
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'color_interactive', array(
                'label' => __('Interactive color', 'humanscores'),
                'section' => 'colors',
                'settings' => 'color_interactive',
            )
        )
    );

    //Add new Sections
    $wp_customize->add_section('theme_options',
        array(
        'title'         => __('Theme options', 'humanscores'),
        'priority'      => 95,
        'capability'    => 'edit_theme_options',
        'description'   => __('Change how much a post is displayed on index and archive pages', 'humanscores')
         )
    );

    //Create excerpt or full content settings
    $wp_customize->add_setting('length_setting',
        array(
            'default'           => 'excerpt',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'humanscores_sanitize_length', //Sanitazion function bellow
            'transport'         => 'postMessage'

        ));

    //Add the controls for excepts settings
    $wp_customize->add_control('humanscores_length_control',
        array(
        'type'      => 'radio',
        'label'     => __('Index/archive displays', 'humanscores'),
        'section'   => 'theme_options',
        'choices'   => array(
            'excerpt'       => __('Excerpt (default)', 'humanscores'),
            'full-content'  => __('Full content', 'humanscores')
        ),
        'settings'  => 'length_setting' // mathes setting ID from above
    ));

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'humanscores_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'humanscores_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'humanscores_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function humanscores_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function humanscores_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function humanscores_customize_preview_js() {
	wp_enqueue_script( 'humanscores-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'humanscores_customize_preview_js' );

/**
 * Sanitize length options
 *
 *
 * @param $value
 * @return string
 */

function humanscores_sanitize_length($value) {
    if ( ! in_array($value, array('excerpt', 'full-content'))){
        $value = 'excerpt';
    }
    return $value;
}

if ( ! function_exists( 'humanscores_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see humanscores_custom_header_setup().
     */
    function humanscores_header_style() {
        $header_text_color = get_header_textcolor();
        $header_bg_color = get_theme_mod('theme_bg_color');
        $interactive_color = get_theme_mod('color_interactive');

        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
        if ( get_theme_support( 'custom-header', 'default-text-color' ) != $header_text_color ) {



            // If we get this far, we have custom styles. Let's do this.
            ?>
            <style type="text/css">
                <?php
                // Has the text been hidden?
                if ( ! display_header_text() ) :
                ?>
                .site-title,
                .site-description {
                    position: absolute;
                    clip: rect(1px, 1px, 1px, 1px);
                }
                <?php
                    // If the user has set a custom color for the text use that.
                    else :
                ?>
                .site-title a,
                .site-description,
                header .menu a,
                button.dropdown-toggle
                {
                    color: #<?php echo esc_attr( $header_text_color ); ?>;
                }
                <?php endif; ?>
            </style>
            <?php
        }

        if ( '#002254' != $header_bg_color) {?>
            <style type="text/css">
                .site-header,
                .site-footer {
                    background-color: <?=esc_attr( $header_bg_color )?>;
                }
            </style>
            <?php }


            if ( '#002254' != $interactive_color) {?>
            <style type="text/css">
                .comment-navigation a:hover,
                .comment-navigation a:focus,
                .posts-navigation a:hover,
                .posts-navigation a:focus,
                .post-navigation a:hover,
                .post-navigation a:focus,
                .paging-navigation a:hover,
                .paging-navigation a:focus,
                .continue-reading a:focus,
                .continue-reading a:hover,
                .cat-links a:focus,
                .cat-links a:hover,
                .reply a:hover,
                .reply a:focus,
                .comment-form .form-submit input:hover,
                .comment-form .form-submit input:focus,
                .pagination a:focus,
                .pagination a:hover
                {
                    background-color: <?=esc_attr( $interactive_color )?>;
                }

                a:hover,
                a:focus,
                a:active,
                .page-content a:focus,
                .page-content a:hover,
                .entry-content a:focus,
                .entry-summary a:focus,
                .entry-summary a:hover,
                .comment-content a:focus,
                .comment-content a:hover,
                .cat-links a,
                .pagination .current,
                header .menu a:hover
                {
                    color: <?=esc_attr( $interactive_color )?>;
                }

                .page-content a,
                .entry-content a,
                .entry-summary a,
                .comment-content a,
                .post-navigation .post-title,
                .comment-navigation a:hover,
                .comment-navigation a:focus,
                .posts-navigation a:hover,
                .posts-navigation a:focus,
                .post-navigation a:hover,
                .post-navigation a:focus,
                .paging-navigation a:hover,
                .paging-navigation a:focus,
                .entry-title a:hover,
                .entry-title a:focus,
                .entry-meta a:focus,
                .entry-meta a:hover,
                .entry-footer a:focus,
                .entry-footer a:hover,
                .reply a:hover,
                .reply a:focus,
                .comment-form .form-submit input:hover,
                .comment-form .form-submit input:focus,
                .widget a:hover,
                .widget a:focus
                {
                    border-color: <?=esc_attr( $interactive_color )?>;
                }
            </style>
            <?php }
    }
endif; ?>
