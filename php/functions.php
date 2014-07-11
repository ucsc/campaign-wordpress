<?php

/*
 *  Action: bootstrap menus
 *  Walk through the nav menu to add classes to the sub-elements
 */
require_once ('bootstrap_walker.php');

function register_campaign_menus() {
	register_nav_menus(
		array(
			'header-menu' => __('Header Menu'),
			'main-menu'   => __('Main Menu')
		)
	);
}
add_action('init', 'register_campaign_menus');

/**
 *  Action: sidebars
 *  Register our sidebars and widgetized areas. *
 */
function campaign_widgets_init() {

	register_sidebar(array(
			'name'          => 'Home Page Left',
			'description'   => __('Widgets in this area will be shown in the left column of the home page.'),
			'class'         => 'left-column',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		));

	register_sidebar(array(
			'name'          => 'Home Page Center',
			'description'   => __('Widgets in this area will be shown in the center column of the home page.'),
			'class'         => 'center-column',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		));

	register_sidebar(array(
			'name'          => 'Home Page Right',
			'description'   => __('Widgets in this area will be shown in the right column of the home page.'),
			'class'         => 'right-column',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		));

	register_sidebar(array(
			'name'          => 'Internal Page Sidebar',
			'id'            => 'rightside',
			'before_widget' => '<div class="col-md-2">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		));
}
add_action('widgets_init', 'campaign_widgets_init');



/*
 *  Filter: columns
 *  We filter the content for a string to delineate bootstrap columns.
 *  @todo: make this a real shortcode and not just a filter
 */
function bootstrap_columns($content) {
	$columns  = explode("[end-column]", $content);
	$strapped = "<!-- columns requested: ".count($columns)." -->";
	$cols     = '';
	switch (count($columns)) {
		case 4:
			$cols = '3';
			break;
		case 3:
			$cols = '4';
			break;
		case 2:
			$cols = '6';
			break;
		default:
			$cols = '12';
			break;
	}
	foreach ($columns as $c) {
		$strapped .= "<div class=\"col-xs-12 col-md-".$cols."\">".$c."</div>";
	}
	return $strapped;
}
add_filter('the_content', 'bootstrap_columns', 10);



/*
 *  Filter: link posts
 *  Set link post permalinks to the external URL
 *  go to filter post title for tumblr-style links
 */
function sd_link_filter($link, $post) {
	if (has_post_format('link', $post) && get_post_field('post_content', $post->ID, 'display')) {
		$link = get_post_field('post_content', $post->ID, 'display');
	}
	return $link;
}
add_filter('post_link', 'sd_link_filter', 10, 2);



/**
 *  Theme support: header image
 *  You can set a custom image for the top-left of the theme.
 */
$header_vars = array(
	'width'         => 140,
	'height'        => 140,
	'default-image' => get_template_directory_uri().'/images/header.jpg',
	'uploads'       => true,
);
add_theme_support('custom-header', $header_vars);
add_theme_support('post-formats', array('link', 'gallery'));
add_theme_support('html5', array('search-form'));
add_theme_support('post-thumbnails', array('post', 'page'));
set_post_thumbnail_size( 730, 488, true );
add_post_type_support( 'page', 'excerpt' ); // Enable excerpts for pages.

/**
 *  Theme support: custom image size for features slider
 */
add_image_size('feature-slider', 730, 488, true);
add_filter('image_size_names_choose', 'campaign_image_sizes');

function campaign_image_sizes($sizes) {
	return array_merge($sizes, array(
			'feature-slider' => __('Home Page Billboards'),
		));
}

/**
 *  Theme scripts: Add js files in the right order
 */
function my_scripts_method() {
	wp_enqueue_script(
		'custom-script',
		get_stylesheet_directory_uri().'/scripts/bundle.js',
		array('jquery'),
		'',
		true
	);
}

add_action('wp_enqueue_scripts', 'my_scripts_method');

?>