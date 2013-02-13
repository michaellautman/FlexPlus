	<!-- Footer -->

	<footer class="container">
	<div class="row">
	<div class="row">
    <div class="three columns">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area 1')) : ?>
	<div class="alert-box"><h4>Hey! You!</h4>
		You should like, so test out this dynamic sidebar. Check it out in Appearance > Widgets!</div>
		<?php endif; ?>
        </div>
            <div class="three columns">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area 2')) : ?>
		<div class="alert-box"><h4>Hey! You!</h4>
		You should like, so test out this dynamic sidebar. Check it out in Appearance > Widgets!</div>
		<?php endif; ?>
        </div>
            <div class="three columns">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area 3')) : ?>
		<div class="alert-box"><h4>Hey! You!</h4>
		You should like, so test out this dynamic sidebar. Check it out in Appearance > Widgets!</div>
		<?php endif; ?>
        </div>
            <div class="three columns">
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area 4')) : ?>
		<div class="alert-box"><h4>Hey! You!</h4>
		You should like, so test out this dynamic sidebar. Check it out in Appearance > Widgets!</div>
		<?php endif; ?>
        </div>
        </div>
        <div class="row">
		<div class="twelve columns"><hr></div>
	</div>
			<div class="row">
			<div class="twelve columns">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar')) : ?>
					<h4>Hey! You!</h4>
					<p>You should like, so test out this dynamic footer sidebar. Check it out in Appearance > Widgets!</p>
					<?php endif; ?>
				
			</div>
			</div>
            <div class="row">
            <div class="four columns">
            <p>&copy;</p>
            </div>
            <div class="two columns"></div>
            <div class="six columns">
            <span class="site_credits">FlexPlus for Wordpress.  Lovingly crafted by <a href="http://lautman.ca" target="_blank">Montreal Web Designers - The Lautman Group</a>.</span>
	</div>
   
	</div>
	</footer>
	
</div>
	<?php wp_footer(); ?>


</body>
</html>