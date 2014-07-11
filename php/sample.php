
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

  ?></title>

<link href="http://static.ucsc.edu/css/ucsc.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
  /*
   * We add some JavaScript to pages with the comment form
   * to support sites with threaded comments (when in use).
   */
  if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  /*
   * Always have wp_head() just before the closing </head>
   * tag of your theme, or you will break many plugins, which
   * generally use this hook to add elements to <head> such
   * as styles, scripts, and meta tags.
   */
  wp_head();
?>
 
</head>

<body class="contentLeftNav dept article">
<!-- Accessibility links. Hidden until they receive :focus -->
<ul id="access-links">
    <li><a href="#mainContent">Skip to main content</a></li>
    <li><a href="#mainNav">Skip to primary navigation</a></li>
</ul>

 <div id="wrap">
   <div id="container">
     <div id="content">
      
      <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'secondary' ) ); ?>
      


<div class="search">
  <?php get_search_form(); ?>
</div>

<div class="row" id="pageTitle">
    <a href="http://www.ucsc.edu/index.html" id="logo">UC Santa Cruz home</a>
    <?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
        <<?php echo $heading_tag; ?> id="site-title">
          <span>
            <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          </span>
        </<?php echo $heading_tag; ?>>
</div>

<div class="row">
  <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</div>    

 <!-- <div class="row" id="breadcrumbs">
        
 </div> -->

       <div class="row" id="sprflt">
         <div id="subNav">
            <!-- SIDEBAR -->
         </div>

         <div id="mainContent">
          <h1 id="title"></h1>
          <p id="subhead"></p>
          <p class="date">March 31, 2014</p>
          <p class="vcard">
            <a class="email fn" href="mailto:">Author</a>
          </p>
          <div class="imageHolder">
            <table border="0" cellpadding="0" class="mainImage" summary="Article image" valign="top" width="120">
              <tbody>
                <tr>
                  <td>
                    <img alt="kenneth-norris2-375.jpg" src="images/kenneth-norris2-375.jpg" />
                    <div class="prCaption"></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="article-body"></div>
          
         </div>
        
        <div id="footer">
          <p class="links"><a href="http://www.ucsc.edu/feedback/index.html">Feedback</a></p>
          <p class="address home">UC Santa Cruz, 1156 High Street, Santa Cruz, Ca 95064<br /> &#169;2014 Regents of the University of California. All Rights Reserved.</p>
<p class="social-media"><a href="http://www.facebook.com/ucsantacruz"><img alt="Facebook" height="24" src="http://www.ucsc.edu/images/interface/icon_facebook.png" width="48" /></a> <a href="http://twitter.com/ucsc"><img alt="Twitter" height="24" src="http://www.ucsc.edu/images/interface/icon_twitter.png" width="48" /></a> <a href="http://youtube.com/ucsantacruz"><img alt="YouTube" height="24" src="http://www.ucsc.edu/images/interface/icon_youtube.png" width="48" /></a> <a href="http://www.linkedin.com/groups?home=&amp;gid=102708"><img alt="UC Santa Cruz - LinkedIn" height="24" src="http://www.ucsc.edu/images/interface/icon_linkedin.png" width="48" /></a></p>
        </div>
       
       </div><!-- /sptflt -->

      <div class="row" id="page_bottom">
        <p><a href="http://its.ucsc.edu/terms/">Privacy Policy and Terms of Use</a></p>
      </div>

       <div class="sleed" style="background-color:#ece9d8">&#160;</div>

    </div><!-- /content -->
  </div><!-- /container -->
</div><!-- /wrap -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4301164-1']);
  _gaq.push(['_setDomainName', '.ucsc.edu']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>