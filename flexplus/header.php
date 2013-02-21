<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

  

	<!-- Included CSS Files -->
 <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">


        		

	<!-- IE Fix for HTML5 Tags -->

	<!--[if lt IE 9]>

		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->

    <!-- icons & favicons -->

		<!-- For iPhone 4 -->

		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/icons/h/apple-touch-icon.png">

		<!-- For iPad 1-->

		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/icons/m/apple-touch-icon.png">

		<!-- For iPhone 3G, iPod Touch and Android -->

		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/icons/l/apple-touch-icon-precomposed.png">

		<!-- For Nokia -->

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/l/apple-touch-icon.png">

		<!-- For everything else -->

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	

	<?php wp_head(); ?>



</head>



<body <?php body_class(); ?>  itemscope itemtype="http://schema.org/WebPage" > 

	<div id="wrapper" class="off-canvas hide-extras">

<header itemscope itemtype="http://schema.org/WPHeader">		
<div id="top-bar" class="container">

<div class="row">
<div class="four mobile-three columns">
	<a href="<?php echo site_url(); ?>"><h3 class="site_title"><?php bloginfo('title'); ?></h3></a>
	
	</div>
<div class="eight mobile-one columns" >
	<nav id="menu" role="navigation" class="hide-for-small right" itemscope itemtype="http://schema.org/SiteNavigationElement"  ><?php bones_main_nav (array( 'theme_location' => 'top-menu','menu_class' => 'nav-bar', 'container' => 'nav', 'fallback_cb' =>'wp_page_menu'	) ); ?></nav>
	<div class="show-for-small  menu-action">
  	    <a class='sidebar-button small secondary button' id='sidebarButton' href="#sidebar">
    	    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="24px" height="24px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
            <line fill="none" stroke="#c3c3c3" stroke-width="8" stroke-miterlimit="10" x1="0" y1="8.907" x2="48" y2="8.907"/>
            <line fill="none" stroke="#c3c3c3" stroke-width="8" stroke-miterlimit="10" x1="0" y1="24.173" x2="48" y2="24.173"/>
            <line fill="none" stroke="#c3c3c3" stroke-width="8" stroke-miterlimit="10" x1="0" y1="39.439" x2="48" y2="39.439"/>
                     </svg>
  	    </a>
	
  	  </div>
	</div>
	</div>
	
	


</div>

</header>
	
		

		

				