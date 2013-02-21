<?php

// shortcodes



// Gallery shortcode

function roots_gallery($attr) {
  $post = get_post();

  static $instance = 0;
  $instance++;

  if (!empty($attr['ids'])) {
    if (empty($attr['orderby'])) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $output = apply_filters('post_gallery', '', $attr);

  if ($output != '') {
    return $output;
  }

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) {
      unset($attr['orderby']);
    }
  }

  extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => '',
    'icontag'    => '',
    'captiontag' => '',
    'columns'    => 3,
    'size'       => 'thumbnail',
    'include'    => '',
    'exclude'    => ''
  ), $attr));

  $id = intval($id);

  if ($order === 'RAND') {
    $orderby = 'none';
  }

  if (!empty($include)) {
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif (!empty($exclude)) {
    $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  } else {
    $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  }

  if (empty($attachments)) {
    return '';
  }

  if (is_feed()) {
    $output = "\n";
    foreach ($attachments as $att_id => $attachment) {
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    }
    return $output;
  }

  $output = '<ul class="block-grid four-up mobile-two-up" data-clearing>';

  $i = 0;
  foreach ($attachments as $id => $attachment) {
    $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

    $output .= '<li>' . $link;
	  //if (trim($attachment->post_excerpt)) {
	  //     $output .= '<div class="caption hidden">' . wptexturize($attachment->post_excerpt) . '</div>';
	  //  }
    $output .= '</li>';
  }

  $output .= '</ul>';

  return $output;
}

remove_shortcode('gallery');
add_shortcode('gallery', 'roots_gallery');

// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'radius', /* radius, round */
	'size' => 'medium', /* small, medium, large */
	'color' => 'blue',
	'style' => '',
	'url'  => '',
	'text' => '', 
	), $atts ) );
	
	$output = '<a href="' . $url . '" class="button '. $type . ' ' . $size . ' ' . $color . ' ' . $style . ' ">';
	
	$output .= $text;
	$output .= '</a>';
	
	return $output;
}

add_shortcode('button', 'buttons'); 

// Alerts
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '	', /* warning, success, error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="alert-box '. $type . '">';
	
	$output .= $text;
	if($close == 'true') {
		$output .= '<a class="close" href="#">×</a></div>';
	}
	else {
	 $output .= '</div>';
	 }
	return $output;
}

add_shortcode('alert', 'alerts');

// Panels
function panels( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '	', /* warning, success, error */
	'close' => 'false', /* display close link */
	'text' => '', 
	'title' => '',	
	), $atts ) );
	
	$output .= '<div class="panel ' . $type .'">';
	$output .='<h5>';
	$output .= $title;
	$output .='</h5>';
	$output .= $text;
	$output .= '</div>';
	
	return $output;
}

add_shortcode('panel', 'panels');

//The Grid
//Container
function flexplus_container ($atts, $content = null){
extract( shortcode_atts( array(
	'id' => '	',
	'class' => '', /* css class */
	), $atts ) );
return '<div id="' . $id .'" class="container ' . $class .'">' .do_shortcode($content) . '</div>';
}
add_shortcode('container', 'flexplus_container');
//Row ShortCode
function flexplus_row ($atts, $content = null) {
return '<div class="row">' .do_shortcode($content) . '</div>';
}
add_shortcode('row', 'flexplus_row');

//Column Shortcodes
function flexplus_column ($atts, $content = null){
extract( shortcode_atts( array(
	'id' => '	',
	'size' => '', /*one two three four five six seven eight nine ten eleven twelve*/
	'class' => '', /* css class */
	), $atts ) );
return '<div id="' .$id . '" class="' . $size .' columns ' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode ('column' , 'flexplus_column');

function flexplus_one_columns( $atts, $content = null ) {

   return '<div class="one columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('1_col','flexplus_one_columns');

function flexplus_two_columns( $atts, $content = null ) {

   return '<div class="two columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('2_col','flexplus_two_columns');

function flexplus_three_columns( $atts, $content = null ) {

   return '<div class="three columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('3_col','flexplus_three_columns');

function flexplus_four_columns( $atts, $content = null ) {

   return '<div class="four columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('4_col','flexplus_four_columns');

function flexplus_five_columns( $atts, $content = null ) {

   return '<div class="five columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('5_col','flexplus_twelve_columns');

function flexplus_six_columns( $atts, $content = null ) {

   return '<div class="six columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('6_col','flexplus_six_columns');

function flexplus_seven_columns( $atts, $content = null ) {

   return '<div class="seven columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('7_col','flexplus_twelve_columns');

function flexplus_eight_columns( $atts, $content = null ) {

   return '<div class="eight columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('8_col','flexplus_eight_columns');

function flexplus_nine_columns( $atts, $content = null ) {

   return '<div class="nine columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('9_col','flexplus_twelve_columns');

function flexplus_ten_columns( $atts, $content = null ) {

   return '<div class="ten columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('10_col','flexplus_twelve_columns');

function flexplus_eleven_columns( $atts, $content = null ) {

   return '<div class="eleven columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('11_col','flexplus_eleven_columns');

function flexplus_twelve_columns( $atts, $content = null ) {

   return '<div class="twelve columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('12_col','flexplus_twelve_columns');

//clearing

function flexplus_clearing ( $atts, $content = null){

	$output .='<div class="clear"></div>';
	
	return $output;
}
add_shortcode ('clearing', 'flexplus_clearing');
?>