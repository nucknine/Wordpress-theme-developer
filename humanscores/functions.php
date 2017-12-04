<?php
/**
 * Humanscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Humanscores
 */

if ( ! function_exists( 'humanscores_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function humanscores_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Humanscores, use a find and replace
		 * to change 'humanscores' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'humanscores', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        /**
         * Register diferent sizes for featured images
         */
        add_image_size('humanscores-full-bleed', 2000, 1600, true);
        add_image_size('humanscores-index-img', 800, 450, true);



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'ForHeader', 'humanscores' ),
            'social' => esc_html__( 'Social Media Menu', 'humanscores' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'humanscores_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/* editor styles */

		add_editor_style( array('inc/editor-styles.css', humanscores_fonts_url()));

	}
endif;
add_action( 'after_setup_theme', 'humanscores_setup' );

/**
 * Register custom fonts.
 */
function humanscores_fonts_url() {
    $fonts_url = '';

    /*
     * Translators: If there are characters in your language that are not
     * supported by Pt Serif and Oswald, translate this to 'off'. Do not translate
     * into your own language.
     *
     */

    $pt_serif = _x( 'on', 'Pt_serif font: on or off', 'humanscores' );

    $oswald = _x( 'on', 'Oswald font: on or off', 'humanscores' );

    $font_families = array();

    if ( 'off' !== $pt_serif ) {
        $font_families[] = 'PT+Serif:400,400i,700,700i';
    }

    if ( 'off' !== $oswald ) {
        $font_families[] = 'Oswald:400,600,700';
    }

    if ( in_array('on', array($pt_serif, $oswald)) ) {

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,cyrillic' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function humanscores_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'humanscores-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'humanscores_resource_hints', 10, 2 );

/**
 * Function that tells WP how wide images inside the content can be
 * @param $sizes
 * @param $size
 * @return string
 */
function humanscores_content_image_size_attr($sizes, $size) {
    $width = $size[0];
    /**
     * Если ширина экрана больше 900px (в этом случае ширина контента максимум 700 так настроено)
     * то картинки получают ширину 700.
     * Если меньше 900px (пропадает сайдбар)
     * то картинки получают 900px
     */

    if ( 900 <= $width ) {
        $sizes = '(min-width: 900px) 700px, 900px';
    }

    if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) ) {
        $sizes = '(min-width: 900px) 600px, 900px';
    }

    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'humanscores_content_image_size_attr', 10, 2);

/**
 * Filter the sizes value in the header image markup
 * Задаем необходимую ширину (100vw в нашем случае) для header-image
 */
function humanscores_header_image_tag($html, $header, $attr) {
    if( isset($attr['sizes'])){
        $html = str_replace($attr['sizes'], '100vw', $html);
    }
    return $html;
}

add_filter( 'get_header_image_tag', 'humanscores_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 * Тоже саморе но для Featured images
 */

function humanscores_post_thumbnails_sizes_attr($attr, $attachment, $size) {
    /**
     * Если это страница поста то ничего не меняем картинка full-bleed
     * если это archive, index или др. ставим ограничение учитывая sidebar
     */
    if ( !is_singular()) {
        if (is_active_sidebar('sidebar-1')) {
            $attr['sizes'] = '(max-width: 900px) 90vw, 800px';
        } else {
            $attr['sizes'] = '(max-width: 1000px) 90vw, 1000px';
        }
    }

    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'humanscores_post_thumbnails_sizes_attr', 10, 3);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function humanscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'humanscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'humanscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function humanscores_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-main', 'humanscores' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'humanscores' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar-footer', 'humanscores' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add footer widgets here.', 'humanscores' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar-page', 'humanscores' ),
        'id'            => 'page-1',
        'description'   => esc_html__( 'Add widgets for static pages here.', 'humanscores' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'humanscores_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function humanscores_scripts() {
    // Enqueue google fonts Pt Serf an Oswald
    wp_enqueue_style('humanscores-fonts', humanscores_fonts_url());

	wp_enqueue_style( 'humanscores-style', get_stylesheet_uri() );

    //navigation js script
	wp_enqueue_script( 'humanscores-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	wp_localize_script('humanscores-navigation', 'humanscoresScreenReaderText', array(
	    'expand' => __('Expand child menu', 'humanscores'),
	    'collapse' => __('Collapse child menu', 'humanscores')
    ));
	wp_enqueue_script( 'humanscores-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20170910', true );

	wp_enqueue_script( 'humanscores-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'humanscores_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';