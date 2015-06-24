<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <title>

<?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title('|', true, 'right');

// Add the blog name.
bloginfo('name');

// Add the blog description for the home/front page.
$site_description = get_bloginfo('description', 'display');
if ($site_description && (is_home() || is_front_page())) {
	echo " | $site_description";
}

// Add a page number if necessary:
if ($paged >= 2 || $page >= 2) {
	echo ' | '.sprintf(__('Page %s', 'campaign'), max($paged, $page));
}

?>

  </title>
  <meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php bloginfo('template_url');?>/favicon.ico" rel="shortcut icon">
  <link href="<?php bloginfo('template_url');?>/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
	<!-- Font Awesome -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

	<!-- Custom assets -->
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/lib/flexslider.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>">

	<!-- OpenGraph meta -->
	<meta content="<?php the_title(); ?>" property="og:title">
  <meta content="<?php the_permalink(); ?>" property="og:url">
  <meta content="<?php bloginfo('description');?>" property="og:description">
	<meta content="website" property="og:type">
	<meta content="http://campaign.ucsc.edu/assets/images/dontgivein-promo.jpg" property="og:image">
	<meta content="<?php bloginfo('name');?>" property="og:site_name">
	<meta content="1322847221,508316988" property="fb:admins">

  <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />

<?php
/*
 * Always have wp_head() just before the closing </head>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */
wp_head();
?>

</head>

<body class="layout">
  <div class="container-fluid">

  <header>
    <!-- Header row -->
		<div class="row header">

      <!-- Site title -->
			<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 site-title">
				<h1>
          <a href="<?php echo esc_url(home_url('/'));?>" rel="home">
            <img src="<?php header_image();?>" alt="" class="hidden-xs" />
            <?php echo str_replace('for', 'for<br />', get_bloginfo('name'));?>
          </a>
        </h1>
			</div>

      <!-- UC Santa Cruz logo -->
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <a class="logo" href="http://www.ucsc.edu/" title="UCSC home page"><span class="sr-only">UC Santa Cruz</span></a>
      </div>

		</div>

		<!-- Primary Navigation row -->
    <div class="row primary">
    	<div class="col-md-12">

      	<nav class="navbar" role="navigation">
          <div class="navbar-header">
            <a href="#" class="btn btn-primary btn-sm visible-xs visible-sm" data-toggle="collapse" data-target=".bs-navbar-collapse">
              <span class="glyphicon glyphicon-list"></span> Menu
            </a>
          </div>

          <div class="collapse navbar-collapse bs-navbar-collapse">
<?php wp_nav_menu(array('menu_class' => 'nav navbar-nav', 'theme_location' => 'main-menu', 'walker' => new Bootstrap_Walker(), ));?>
<!-- Button trigger modal -->

<ul class="nav navbar-nav">
 <li> 
   <a href="#" class="search-form" data-toggle="popover" title="Search this site">Search</a>
 </li>
</ul>

<ul class="nav navbar-nav navbar-right">
  <li><a href="http://connect.ucsc.edu/givenow" class="btn btn-danger">Give now</a></li>
</ul>

    	</div>
    </nav>

  </div>
</div>

<?php if (!is_front_page() && function_exists('breadcrumb_trail')):?>
<!-- Breadcrumb row -->
		<div class="row hidden-sm hidden-xs">
			<div class="col-lg-12">
<?php breadcrumb_trail(array(
		'show_on_front' => false,
		'show_browse'   => false,
	));
?>
</div>
		</div>
<?php endif;?>
</header>


