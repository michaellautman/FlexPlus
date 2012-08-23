<?php

$shoutbox_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_shoutbox_meta',
	'title' => 'Shout Box Contents',
	'types' => array('page', 'events'), // added only for pages and to custom post type "events"
	'context' => 'normal', // same as above, defaults to "normal"
	'include_template' =>  'home-part-slider.php',
	'priority' => 'high', // same as above, defaults to "high"
	'template' => get_stylesheet_directory() . '/metaboxes/shoutbox-meta.php',
	//'autosave'=> true
));
