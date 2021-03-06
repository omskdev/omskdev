<?php
/**
 * omskdev functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package omskdev
 */

if ( ! defined( 'OMSKDEV_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'OMSKDEV_VERSION', '1.0.0' );
}

if ( ! function_exists( 'omskdev_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function omskdev_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on omskdev, use a find and replace
		 * to change 'omskdev' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'omskdev', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'omskdev' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'omskdev_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * Add responsive embeds and block editor styles.
		 */
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );
	}
endif;
add_action( 'after_setup_theme', 'omskdev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function omskdev_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'omskdev_content_width', 640 );
}
add_action( 'after_setup_theme', 'omskdev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function omskdev_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'omskdev' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'omskdev' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'omskdev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function omskdev_scripts() {
	wp_enqueue_style( 'omskdev-style', get_stylesheet_uri(), array(), OMSKDEV_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'omskdev_scripts' );

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




add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium ';
	}
	return $classes;
}
