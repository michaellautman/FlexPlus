<?php get_header(); ?>
<div class="container">
<div class="row">
	<section role="main">	
<div class="row">

<div id="content">
				<div id="inner-content" class="wrap clearfix" >
			
				    <div id="main" class="nine columns first clearfix" >

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting" >
						
						    <header class="article-header">
							
							    <h1 class="h2" itemprop="name"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
							
								<p class="byline vcard"><?php _e('Posted', 'flexplustheme'); ?> <time class="updated" itemprop="datePublished" datetime="<?php echo the_time('Y-m-d'); ?>" ><?php the_time('F j, Y'); ?></time> <?php _e('by', 'flexplustheme'); ?> <span class="author" itemprop="author"><?php the_author_posts_link(); ?></span> <span class="amp">&</span> <span itemprop="articleSection"><?php _e('filed under', 'flexplustheme'); ?> <?php the_category(', '); ?></span>.</p>
						
						    </header> <!-- end article header -->
					
							<section class="entry-content clearfix" itemprop="articleBody">
							    <?php the_content(); ?>
						    </section> <!-- end article section -->
						
						    <footer class="article-footer">

    							<p class="tags" itemprop="keywords"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>

						    </footer> <!-- end article footer -->
						    
						    <?php // comments_template(); // uncomment if you want to use them ?>
					
					    </article> <!-- end article -->
					
						<?php endwhile; else: ?>	
					
					     
					    
					        <article id="post-not-found" class="hentry clearfix">
					            <header class="article-header">
					        	    <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					        	</header>
					            <section class="entry-content">
					        	    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					        	</section>
					        	<footer class="article-footer">
					        	    <p><?php _e("This is the error message in the index.php template.", "bonestheme"); ?></p>
					        	</footer>
					        </article>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
 
	</div>
	
	<?php get_sidebar(); ?>
	</div>
		</div>
	</section>
					
	<section id="sidebar" role="complementary">
				<nav id="sideMenu" role="navigation">
    		<?php bones_mobile_nav(); ?>
    		</nav>
  		</section>


	   
				</div> <!-- end row -->
    
			</div> <!-- end container -->

	
	<?php get_footer(); ?>
