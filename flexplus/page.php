<?php get_header(); ?>
<div class="container">
<div class="row">
	<section role="main">	
<div class="row">

<div class="nine columns">

<!-- Skip Nav -->
<a id="content"></a>

	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<!-- Begin the first div -->
		<article itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header">
		
				
			<h2 itemprop="name" class="page-title">
				<?php the_title(); ?>
			</h2>
			</header>
			<!-- Display the Page's Content in a div box. -->
			<section class="entry">
			
				<?php the_content(); ?>
			</section>
		
		<?php wp_link_pages(); ?>
		<!-- Closes the first div -->
	
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">Sorry, the page you requested was not found</div>
	
	<!--End the loop -->
	<?php endif; ?>
	
</div>
	
<?php get_sidebar(); ?>
</div> <!--end content-->

	</section>
					
	<section id="sidebar" role="complementary">
				<nav id="sideMenu" role="navigation">
    			<?php bones_mobile_nav(); ?>
    		</nav>
  		</section>


	   
				</div> <!-- end row -->
    
			</div> <!-- end container -->

<?php get_footer(); ?>