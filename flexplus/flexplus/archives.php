<?php 
/*
Template Name: Archives
*/

get_header();

?>

<!-- archives -->
<div class="container">
<div class="row">
	<section role="main">	
<div class="row">
<div class="nine columns">

<!-- Skip Nav -->
<a id="content"></a>

	<?php the_post(); ?>
	<h2 class="entry-title"><?php the_title(); ?></h2>
				
	<h4 class="subheader">Archives by Month:</h4>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
		
	<h4 class="subheader">Archives by Subject:</h4>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

</div>

<?php get_sidebar(); ?>

	</div> <!--end content-->
	
	</section>
					
	<section id="sidebar" role="complementary">
				<nav id="sideMenu" role="navigation">
    			<ul id="sideMainNav" class="nav-bar">
    				<li><a href="">One</a></li>
    				<li><a href="">Two</a></li>
    				<li><a href="">Three</a></li>
    				<li><a href="">Four</a></li>
    			</ul>
    		</nav>
  		</section>


	   
				</div> <!-- end row -->
    
			</div> <!-- end container -->

<?php get_footer(); ?>

<!-- archives -->