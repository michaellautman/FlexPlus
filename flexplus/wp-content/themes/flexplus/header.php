<!DOCTYPE html> 

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="initial-scale=1.6; maximum-scale=1.0; width=device-width; "/>
	
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  
	<!-- Included CSS Files -->
	    
	<link rel="stylesheet" type='text/css' href="<?php bloginfo( 'url' ); ?>/?custom-theme-options=css" />

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <?php
$options = get_option('flexplus_options');
?>

<!-- Custom Styles -->
<style>
body {background-color:<?php echo $options['300']?>;}
h1.site_title {display:<?php echo $options['103']?>;}
.subheader {display:<?php echo $options['102']?>;}
#menu-main.nav-bar {background:<?php echo $options['200']?>;}
#menu-main.nav-bar li.menu-item a:hover {background:<?php echo $options['201']?> !important;}
.site_credits {display:<?php echo $options['003']?>;
</style>
        		
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

<body <?php body_class(); ?>> 


		
		<!-- Header Row -->
		<div class="row">
			
				<!-- Header Column -->
				<div class="four columns" id="access" role="navigation">
					
					<span id="skipnav" class="show-for-touch"><a href="#content">Skip to Content?</a></span>
				
					<!-- Site Description & Title -->
					<hgroup id="header">
               
                    
						<a href="<?php echo site_url(); ?>"><img src="<?php echo $options['100']?>"><h1 class="site_title"><?php bloginfo('title'); ?></h1></a>
						<h4 class="subheader"><?php bloginfo('description'); ?></h4>
					</hgroup>
</div>

<div class="eights columns">
					<!-- Navigation --> 					
 				    <?php wp_nav_menu( array( 'theme_location' => 'header-menu','menu_class' => 'nav-bar', 'container' => 'nav') ); ?>
		</div>		
				</div>
				<!-- Header Column -->
				
		<!-- Header Row -->
		
		<!-- Main Row -->
		<div class="row">
		
		
				