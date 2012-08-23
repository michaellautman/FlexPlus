<?php

$custom_metabox = $form_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_form_meta',
	'title' => 'Custom Form Code',
	'template' => get_stylesheet_directory() . '/metaboxes/form-meta.php',
));

/* eof */