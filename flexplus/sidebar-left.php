<!-- sidebar -->
<aside class="four columns">

	<ul>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar')) : ?>
		<li><h4>Hey! You!</h4></li>
		<li>You should like, so test out this dynamic sidebar. Check it out in Appearance > Widgets!</li>
		<?php endif; ?>
	</ul>

</aside>
<!-- sidebar -->