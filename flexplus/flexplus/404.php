<?php get_header(); ?>
<div class="container">
<div class="row">
	<section role="main">	
<div class="row">	
	<div class="nine columns">
	<div class="alert-box error">404!</div>
	<h1>!@!#@$@@!!</h1>  
	<p>404's are such a lovely thing. But you know, I'm not going to leave you stranded.</p>
	<p>Why don't you try a search?</p>
	
	<?php get_search_form(); ?>
	
	<a href="<?php echo home_url( '/' ); ?>">&larr; Go Home?</a>
	</div>
	
<?php get_sidebar(); ?>
		</div> <!--end content-->
	</div> <!--end row -->
	</section>
					
	<section id="sidebar" role="complementary">
				<nav id="sideMenu" role="navigation">
    		<?php bones_mobile_nav(); ?>
    		</nav>
  		</section>


	   
				</div> <!-- end row -->
    
			</div> <!-- end container -->

		
<?php get_footer(); ?>