<?php

$invoice_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_invoice_meta',
	'title' => 'Invoice',
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => get_stylesheet_directory() . '/metaboxes/invoice-meta.php'
));

/* eof */