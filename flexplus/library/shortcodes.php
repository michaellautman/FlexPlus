<?php

// shortcodes

// Gallery shortcode

// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_tbs');

function gallery_shortcode_tbs($attr) {
	global $post, $wp_locale;

	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
	$attachments = get_posts($args);
	if ($attachments) {
		$output = '<ul class="block-grid four-up">';
		foreach ( $attachments as $attachment ) {
			$output .= '<li>';
			$att_title = apply_filters( 'the_title' , $attachment->post_title );
			$output .= wp_get_attachment_link( $attachment->ID , 'thumbnail', true );
			$output .= '</li>';
		}
		$output .= '</ul>';
	}

	return $output;
}



// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'radius', /* radius, round */
	'size' => 'medium', /* small, medium, large */
	'color' => 'blue',
	'nice' => 'false',
	'url'  => '',
	'text' => '', 
	), $atts ) );
	
	$output = '<a href="' . $url . '" class="button '. $type . ' ' . $size . ' ' . $color;
	if( $nice == 'true' ){ $output .= ' nice';}
	$output .= '">';
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
	
	$output = '<div class="fade in alert-box '. $type . '">';
	
	$output .= $text;
	if($close == 'true') {
		$output .= '<a class="close" href="#">×</a></div>';
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
	), $atts ) );
	
	$output = '<div class="panel">';
	$output .= $text;
	$output .= '</div>';
	
	return $output;
}

add_shortcode('panel', 'panels');

//Columns
//Row ShortCode
function flexplus_row ($atts, $content = null) {
return '<div class="row">' .do_shortcode($content) . '</div>';
}
add_shortcode('row', 'flexplus_row');

//Column Shortcodes
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
?>