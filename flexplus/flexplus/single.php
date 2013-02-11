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
	
		<!-- Begin the first article -->
	<article itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header">
			<!-- Display the Title as a link to the Post's permalink. -->
			 <h1 class="h2" itemprop="name"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
							
			
			<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
		<p class="byline vcard"><?php _e('Posted', 'flexplustheme'); ?> <time class="updated" itemprop="datePublished" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time> <?php _e('by', 'flexplustheme'); ?> <span class="author" itemprop="author"><?php the_author_posts_link(); ?></span> <span class="amp">&</span> <span itemprop="articleSection"><?php _e('filed under', 'flexplustheme'); ?> <?php the_category(', '); ?></span>.</p>
						
		</header>
			<!-- Display the Post's Content in a div box. -->
			<section class="entry">
				<?php the_content(); ?>
			</section>
			
			<!-- Display a comma separated list of the Post's Categories. -->
		<footer>
			<p class="tags" itemprop="keywords"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>

		</footer>
		</article>
		<!-- Closes the first article -->
		
		<!-- Begin Comments -->
	    <?php comments_template(); ?>
	    <!-- End Comments -->
	
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">Sorry, no posts matched your criteria.</div>
	
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