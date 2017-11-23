<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */

if ( ! function_exists( 'theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on theme, use a find and replace
	 * to change 'theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'theme', get_template_directory() . '/languages' );

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


	//@ajn@ -----------------------------------------------
	add_theme_support( 'post-thumbnails' );


	add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 3 );
	function special_nav_class( $classes, $item, $args ) {
	    if ( 'Contact' == $item->title ) {
	        $classes[] = 'contact';
	    }

	    return $classes;
	}



	//@ajn@ -----------------------------------------------


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'primary', 'tooblerOg' ),
		'secondary' => esc_html__( 'secondary', 'tooblerOg' ),
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
	add_theme_support( 'custom-background', apply_filters( 'theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );


add_theme_support( 'post-thumbnails' );

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function change_submenu_class($menu) {  
			 $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu mega-dropdown-menu row" /',$menu);  
			 return $menu;  
			}  
			add_filter('wp_nav_menu','change_submenu_class');  

			function wpdocs_add_menu_parent_class( $items ) {
			$parents = array();

			// Collect menu items with parents.
			foreach ( $items as $item ) {
			   if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				   $parents[] = $item->menu_item_parent;
			   }
			}

			// Add class.
			foreach ( $items as $item ) {
			   if ( in_array( $item->ID, $parents ) ) {
				   $item->classes[] = 'dropdown mega-dropdown';
			   }
			}
			return $items;
			}
			add_filter( 'wp_nav_menu_objects', 'wpdocs_add_menu_parent_class' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';