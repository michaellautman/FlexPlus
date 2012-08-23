<?php 

/*
Template Name: Home(Full Slider)
*/

get_header(); ?>
<?php $meta = get_post_meta(get_the_ID(), $slider_mb->get_the_id(), TRUE); ?>
<div class="row">
<div class="twelve columns">

<div id="flexplus_slider">
<?php echo $meta['flexplus_slider_code']; ?>

	
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