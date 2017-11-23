<?php
/**
 * The header for toobler theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Tooblers
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<!-- <head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head> -->


                               <!--  TOOBLER HEAD OPEN -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Custom built software solutions | Web and mobile app development | Internet of Things services</title>
   
    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon.png">
    
    <!--build:css css/styles.min.css-->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css">
	<!--endbuild-->
		
    <!-- Open Graph Data -->
    <meta property="og:title" content="Toobler">
    <meta property="og:url" content="http://toobler.com/">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Engineering &amp; Design for Startups and Enterprises - Toobler">
    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri() ?>/images/openGraphCover.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="Toobler">
    <meta name="title:card" content="Engineering &amp; Design for Startups and Enterprises - Toobler">
    <meta name="twitter:description" content="Engineering &amp; Design for Startups and Enterprises - Toobler">
    <meta name="twitter:url" content="http://toobler.com/">
    <meta name="twitter:image" content="images/openGraphCover.jpg">
    
    <!--Media query and html5 support in old IE-->
	<!--[if IE]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script> 
	<![endif]--> 
	<?php wp_head(); ?>

</head>
 									<!--  TOOBLER HEAD CLOSE -->

<body <?php body_class(); ?>>
 									<!--  TOOBLER NAVBAR OPEN -->

<header id="masthead" class="site-header" role="banner">
   <div class="layout-container">
       <div class="site-branding">
           <a href="#"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/toobler.png" alt=""></a>        
       </div>
       <nav id="site-navigation" class="main-navigation" role="navigation">
           <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'tooblerOg' ); ?></button>
          <?php wp_nav_menu(
                      array(
                        'display_location'  => 'primary',
                          'container'=>'ul',
                          'menu_class'=>'nav navbar-nav navbar-right'
                        )
                    ); ?>
       </nav>  
   </div>
</header>

 									<!--  TOOBLER NAVBAR CLOSE -->



