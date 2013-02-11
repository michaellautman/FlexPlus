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
		<div>
				
			<h2>
				<?php the_title(); ?>
			</h2>
			
			<!-- Display the Page's Content in a div box. -->
			<div class="entry">
				<?php the_content(); ?>
			</div>
		
		</div>
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