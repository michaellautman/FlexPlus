<div class="my_meta_control">
 
	<p>Enter the HTML or shortcode for your form.</p>
 
	
 
	<p>
		<?php $mb->the_field('form'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
	</p>
 

</div>