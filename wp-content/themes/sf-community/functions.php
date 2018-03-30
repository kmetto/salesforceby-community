<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function hit_theme_setup() {

	remove_action( 'omega_before_header', 'omega_get_primary_menu' );	
	add_action( 'omega_header', 'omega_get_primary_menu' );
	add_action( 'omega_header', 'hit_header_search' );

	add_theme_support( 'custom-background', 
		array(
			'default-color' => 'FFFFFF',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'center',
			'default-attachment'     => 'fixed',
			'default-image' => get_stylesheet_directory_uri() . '/images/background.jpg',
		));

	add_action( 'omega_after_header', 'hit_intro' );

	add_filter( 'omega_site_description', 'hit_site_description' );

	add_action( 'wp_enqueue_scripts', 'hit_scripts_styles' );

	load_child_theme_textdomain( 'hit', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'hit_theme_setup', 11 );

/**
 * Loads the intro.php template.
 */
function hit_intro() {
	$id = get_option('page_for_posts');
	// get title		
	if (is_front_page() || (is_home() && ($id=='0'))) {
		$the_title = "<h1 class='intro-title site-description'>" . get_bloginfo ( 'description' ) . "</h1>";
	} elseif ( is_day() || is_month() || is_year() || is_tag() || is_category() || is_home() ) {
		$id = get_option('page_for_posts');
		if ( 'posts' == get_option( 'show_on_front' ) ) {
			$the_title = get_bloginfo ( 'description' );
		} else {
			$the_title = get_the_title($id);
		}
		$the_title = "<h2 class='intro-title'>$the_title</h2>";
	} elseif (is_singular('post' )) {
		$the_title = "<h3 class='intro-title'>" . get_the_title($id) . "</h3>"; 
	} else {
		$the_title = "<h1 class='intro-title'>" . get_the_title() . "</h1>"; 
	}

	echo '<div class="site-intro">'.$the_title.'</div>';
}

function hit_site_description($desc) {
	$desc = "";
	return $desc;
}

function hit_scripts_styles() {
	$query_args = array(
	 'family' => 'Libre+Franklin:300,400'
	);
 	wp_enqueue_style('hit-google-fonts-libre', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null  );

 	wp_enqueue_script('jquery-superfish', get_stylesheet_directory_uri() . '/js/superfish.js', array('jquery'), '1.0.0', true );
 	wp_enqueue_script('hit-init', get_stylesheet_directory_uri() . '/js/init.js', array('jquery'));
}

function hit_header_search() {
	get_search_form();
}