<?php

if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function aiw_setup() {

	load_theme_textdomain( 'aiw' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'aiw-featured-image', 2000, 1200, true );

	add_image_size( 'aiw-thumbnail-avatar', 100, 100, true );

	// Add custom logo theme support
	add_theme_support( 'custom-logo' );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'aiw' ),
		'social' => __( 'Social Links Menu', 'aiw' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// // Define and register starter content to showcase the theme on new sites.
	// $starter_content = array(
	// 	'widgets' => array(
	// 		// Place three core-defined widgets in the sidebar area.
	// 		'sidebar-1' => array(
	// 			'text_business_info',
	// 			'search',
	// 			'text_about',
	// 		),
	//
	// 		// Add the core-defined business info widget to the footer 1 area.
	// 		'sidebar-2' => array(
	// 			'text_business_info',
	// 		),
	//
	// 		// Put two core-defined widgets in the footer 2 area.
	// 		'sidebar-3' => array(
	// 			'text_about',
	// 			'search',
	// 		),
	// 	),

		// // Specify the core-defined pages to create and add custom thumbnails to some of them.
		// 'posts' => array(
		// 	'home',
		// 	'about' => array(
		// 		'thumbnail' => '{{image-sandwich}}',
		// 	),
		// 	'contact' => array(
		// 		'thumbnail' => '{{image-espresso}}',
		// 	),
		// 	'blog' => array(
		// 		'thumbnail' => '{{image-coffee}}',
		// 	),
		// 	'homepage-section' => array(
		// 		'thumbnail' => '{{image-espresso}}',
		// 	),
		// ),

		// // Create the custom image attachments used as post thumbnails for pages.
		// 'attachments' => array(
		// 	'image-espresso' => array(
		// 		'post_title' => _x( 'Espresso', 'Theme starter content', 'aiw' ),
		// 		'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
		// 	),
		// 	'image-sandwich' => array(
		// 		'post_title' => _x( 'Sandwich', 'Theme starter content', 'aiw' ),
		// 		'file' => 'assets/images/sandwich.jpg',
		// 	),
		// 	'image-coffee' => array(
		// 		'post_title' => _x( 'Coffee', 'Theme starter content', 'aiw' ),
		// 		'file' => 'assets/images/coffee.jpg',
		// 	),
		// ),

		// // Default to a static front page and assign the front and posts pages.
		// 'options' => array(
		// 	'show_on_front' => 'page',
		// 	'page_on_front' => '{{home}}',
		// 	'page_for_posts' => '{{blog}}',
		// ),

		// // Set the front page section theme mods to the IDs of the core-registered pages.
		// 'theme_mods' => array(
		// 	'panel_1' => '{{homepage-section}}',
		// 	'panel_2' => '{{about}}',
		// 	'panel_3' => '{{blog}}',
		// 	'panel_4' => '{{contact}}',
		// ),

		// // Set up nav menus for each of the two areas registered in the theme.
		// 'nav_menus' => array(
		// 	// Assign a menu to the "top" location.
		// 	'top' => array(
		// 		'name' => __( 'Top Menu', 'aiw' ),
		// 		'items' => array(
		// 			'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
		// 			'page_about',
		// 			'page_blog',
		// 			'page_contact',
		// 		),
		// 	),
		//
		// 	// Assign a menu to the "social" location.
		// 	'social' => array(
		// 		'name' => __( 'Social Links Menu', 'aiw' ),
		// 		'items' => array(
		// 			'link_yelp',
		// 			'link_facebook',
		// 			'link_twitter',
		// 			'link_instagram',
		// 			'link_email',
		// 		),
		// 	),
		// ),
	//);

	$starter_content = apply_filters( 'aiw_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'aiw_setup' );


?>
