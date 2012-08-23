<div class="my_meta_control">
<label>Item</label>
<p><?php $mb->the_field('item1'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter in a title</span>
		</p>
		
<label>Amount</label>
<p>
<?php $mb->the_field('amount'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		
		</p>
		
<label>Amount2</label>
<p>	<?php $mb->the_field('amount2'); ?>
<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter in a title</span>
		</p>
		




</div>
