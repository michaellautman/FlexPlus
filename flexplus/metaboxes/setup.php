<?php

include_once WP_CONTENT_DIR . '/themes/flexplus/wpalchemy/MetaBox.php';
 
// global styles for the meta boxes
if (is_admin()) wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/meta.css');

/* eof */