<?php 

/*
Template Name: Home(2/3 Slider)
*/

get_header(); ?>
<?php $meta = get_post_meta(get_the_ID(), $slider_mb->get_the_id(), TRUE); ?>
<?php $meta = get_post_meta(get_the_ID(),$shoutbox_mb->get_the_id(),TRUE); ?>

<div class="eight columns">

<div id="flexplus_slider">
<?php echo $meta['flexplus_slider_code']; ?>

	
</div>	</div>
<div class="four columns">
<div id="flexplus_shoutbox">
<?php echo $meta['flexplus_shoutbox_code']; ?>
</div>
</div>
</div>
<div class="row">
<div class="four columns">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage 1')) : ?>
					<h4>Homepage Widget 1</h4>
					
					<?php endif; ?>
</div>
<div class="four columns">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage 2')) : ?>
					<h4>Homepage Widet 2</h4>
					
					<?php endif; ?>
                    </div>
  <div class="four columns">
   <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage 3')) : ?>
					<h4>Homepage Widet 3</h4>
					
					<?php endif; ?>
                    </div>                 
                    
</div>
<script type="text/javascript">
						   $(window).load(function() {
						       $('#flexplus_slider').orbit({ 
						       	fluid: '16x6'
						       });
						   });
						</script>


<?php get_footer(); ?>