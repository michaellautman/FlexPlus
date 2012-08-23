<div class="my_meta_control">
	<label>Shoutbox Contents</label>
 
	<p>
		<?php $metabox->the_field('flexplus_shoutbox_code'); ?>
		<textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
		<span>This is a great place for a call to action or newsletter signup.</span>
	</p>
    </div> 