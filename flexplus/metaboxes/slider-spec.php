<?php

$slider_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_slider_meta',
	'title' => 'Orbit Slider Input',
	'types' => array('page', 'events'), // added only for pages and to custom post type "events"
	'context' => 'normal', // same as above, defaults to "normal"
	'include_template' =>  array('home-full-slider.php','home-part-slider.php'),
	'priority' => 'high', // same as above, defaults to "high"
	'template' => get_stylesheet_directory() . '/metaboxes/slider-meta.php',
	//'autosave'=> true
));

/* eof */