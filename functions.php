<?php
/**
 * igc31w functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package igc31w
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function igc31w_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on underscore, use a find and replace
		* to change 'igc31w' to the name of your theme in all the template files.
		*/
	// load_theme_textdomain( 'igc31w', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	
	// add_theme_support( 'automatic-feed-links' );

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
	// add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.

	register_nav_menus(
		array(
			'principal' => esc_html__( 'Principal', 'igc31w' ),
			'footer' =>esc_html__( 'Footer', 'igc31w' ),
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
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	/*
	add_theme_support(
		'custom-background',
		apply_filters(
			'igc31w_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	*/

	// Add theme support for selective refresh for widgets.
	// add_theme_support( 'customize-selective-refresh-widgets' );

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
}
add_action( 'after_setup_theme', 'igc31w_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function igc31w_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'igc31w_content_width', 640 );
}
add_action( 'after_setup_theme', 'igc31w_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

 /*
function igc31w_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'igc31w' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'igc31w' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'igc31w_widgets_init' );
*/

/**
 * Enqueue scripts and styles.
 */
function igc31w_scripts() {
	//wp_enqueue_style( 'igc31w-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style('main-styles',
					get_template_directory_uri() . '/style.css',
					array(),
					filemtime(get_template_directory() . '/style.css'),
					 false);


	wp_style_add_data( 'igc31w-style', 'rtl', 'replace' );

	// wp_enqueue_script( 'igc31w-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	/*
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	*/
}
add_action( 'wp_enqueue_scripts', 'igc31w_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */

 /*
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
*/

function igc31w_filtre_choix_menu($obj_menu, $arg){
    //echo "/////////////////  obj_menu";
    // var_dump($obj_menu);
    //  echo "/////////////////  arg";
    //  var_dump($arg);
 
    if ($arg->menu == "aside"){
    foreach($obj_menu as $cle => $value)
    {
      //  print_r($value);
       $value->title = substr($value->title,7);
       $value->title = wp_trim_words($value->title,3,"...");
        //echo $value->title . '<br>';
     } 
    }
    //die();
    return $obj_menu;
}
add_filter("wp_nav_menu_objects","igc31w_filtre_choix_menu", 10,2);



add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id'            => 'aside-1',
			'name'          => __( 'Sidebar aside-1' ),
			'description'   => __( 'Un premier sidebar de colonne.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'aside-2',
			'name'          => __( 'Sidebar aside-2' ),
			'description'   => __( 'Un deuxièeme sidebar de colonne.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);


	register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'Sidebar footer-1' ),
			'description'   => __( 'Un premier  sidebar de footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'Sidear footer-2' ),
			'description'   => __( 'Un deuxième  sidebar de footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-3',
			'name'          => __( 'Sidear footer-3' ),
			'description'   => __( 'Un troisième  sidebar de footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'footer-4',
			'name'          => __( 'Sidebar footer-4' ),
			'description'   => __( 'Un quatrième  sidebar de footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
}
/////////////////////////////////////////////////////////////////  Filtre les choix menu
/**
 * Filtre les choix de menu contenant l'option description non vide
 * Dans ce cas la description est ajouté dans le choix de menu
 * @param  string $item_output la chaîne qui contient le choix de menu à traiter et qui sera retourner par la fonction
 * @param object $item l'élément de menu à traiter
 */
function prefix_nav_description( $item_output, $item) {
    // si l'option description est non vide 
    if ( !empty( $item->description ) ) {
        // remplace la fermeture de la balise </a> une structure HTML qui incluera la description
        // La div.menu-item-icone permettra d'inclure un îcone par css avec background-image
        // var_dump($item_output); 
        // var_dump($item->class); die();
        $item_output = str_replace('</a>',
        '<hr><span class="menu-item-description">' . 
                          $item->description . 
                         '</span><div class="menu-item-icone"></div></a>',
                                    $item_output );
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 2 );

/**
 * Modifie la requete principal de Wordpress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas çi nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */
function igc31w_modifie_requete_principal( $query ) {
	if ( $query->is_home() 
	     && $query->is_main_query() 
		 && ! is_admin() ) {
	$query->set( 'category_name', 'accueil' );
	}
	}
	add_action( 'pre_get_posts', 'igc31w_modifie_requete_principal' );