<?php

// Disable WordPress version reporting as a basic protection against attacks
function remove_generators() {
	return '';
}		
// Adding Translation Option
load_theme_textdomain( 'flexplustheme', TEMPLATEPATH.'/languages' );
$locale = get_locale();
$locale_file = TEMPLATEPATH."/languages/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);
add_filter('the_generator','remove_generators');

// Add thumbnail support

add_theme_support( 'post-thumbnails' );

// Disable the admin bar, set to true if you want it to be visible.

show_admin_bar(FALSE);

// Shortcodes
// Options panel
//require_once('library/options-panel.php');

require_once('library/bones.php');
include('library/shortcodes.php');
if (file_exists('/custom-functions.php'))
	include_once('/custom-functions.php');

// Add theme support for Automatic Feed Links

add_theme_support( 'automatic-feed-links' );

// Custom Navigation


add_filter( 'the_category', 'replace_cat_tag' );

function replace_cat_tag ( $text ) {
$text = str_replace('rel="category tag"', 'rel="tag"', $text); return $text;
}

if ( ! isset( $content_width ) ) $content_width = 900;
/************* ENQUEUE CSS AND JS *****************/
$filename = '/custom.css';
if (file_exists($filename))
{
function custom_style() {
	wp_register_style('custom-css', get_template_directory_uri() . '/custom.css');
		wp_enqueue_style ( 'custom-css', array(), array(), false);
				}
				
add_action ('wp_enqueue_scripts','custom_style');
}

function theme_styles()  
{  
	
	wp_register_style('foundation-css', get_template_directory_uri() . '/stylesheets/foundation.css');
	//wp_register_style('flexplus-css', get_template_directory_uri() . '/stylesheets/flexplus.css');
	
	//wp_enqueue_style( 'app-css', array(), array(), false);
	wp_enqueue_style( 'foundation-css', array(), array(), false);
	}

add_action('wp_enqueue_scripts', 'theme_styles');

/************* ENQUEUE JS *************************/

/* pull jquery from google's CDN. If it's not available, grab the local copy. Code from wp.tutsplus.com :-) */
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}
/* load modernizr from foundation */
function modernize_it(){
    wp_register_script( 'modernizr', get_template_directory_uri() . '/javascripts/foundation/modernizr.foundation.js', array(), false, true ); 
    wp_enqueue_script( 'modernizr' );
}

add_action( 'wp_enqueue_scripts', 'modernize_it' );

function foundation_js(){
   wp_register_script( 'foundation-app', get_template_directory_uri() . '/javascripts/foundation/app.min.js', __FILE__, false, true);
	wp_enqueue_script ( 'foundation-app');
	wp_register_script ('foundation-js', get_template_directory_uri() . '/javascripts/foundation/foundation.min.min.js', __FILE__, 'jQuery', false, true);
	wp_enqueue_script ('foundation-js');
	wp_register_script( 'foundation-mediaQueryToggle', get_template_directory_uri() . '/javascripts/foundation/jquery.foundation.mediaQueryToggle.min.js', 'jQuery', false, true);
	wp_enqueue_script ( 'foundation-mediaQueryToggle');
	wp_register_script( 'foundation-navigation', get_template_directory_uri() . '/javascripts/foundation/jquery.foundation.navigation.min.js', array(), false, false);
	wp_enqueue_script ( 'foundation-navigation');
	wp_register_script( 'foundation-offcanvas', get_template_directory_uri() . '/javascripts/foundation/jquery.offcanvas.min.js', 'jQuery', false, true);
	wp_enqueue_script('foundation-offcanvas');
	  wp_register_script( 'foundation-placeholder', get_template_directory_uri() . '/javascripts/foundation/jquery.placeholder.min.js', 'jQuery', false, true ); 
    wp_enqueue_script( 'foundation-placeholder');

}

add_action('wp_enqueue_scripts', 'foundation_js');

function wp_foundation_js(){
    wp_register_script( 'wp-foundation-js', get_template_directory_uri() . '/library/js/scripts.min.js', 'jQuery', '1.0', true);
    wp_enqueue_script( 'wp-foundation-js' );
}

add_action('wp_enqueue_scripts', 'wp_foundation_js');


// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
// Sidebars

if (function_exists('register_sidebar')) {

	// Right Sidebar

	register_sidebar(array(
		'name'=> 'Right Sidebar',
		'id' => 'right_sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	//Left Sidebar
	register_sidebar(array(
		'name'=> 'Left Sidebar',
		'id' => 'left_sidebar',
		'before_widget' => '<div id="%1$s" class="four columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
		//Homepage Widgets
	register_sidebar(array(
		'name'=> 'Homepage 1',
		'id' => 'homepage_1',
		'before_widget' => '<div id="%1$s" class="three columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name'=> 'Homepage 2',
		'id' => 'homepage_2',
		'before_widget' => '<div id="%1$s" class="three columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name'=> 'Homepage 3',
		'id' => 'homepage_3',
		'before_widget' => '<div id="%1$s" class="three columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	// Footer Sidebar
	
	register_sidebar(array(
		'name'=> 'Footer Sidebar',
		'id' => 'footer_sidebar',
		'before_widget' => '<div id="%1$s" class="four columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	//Footer Areas
	register_sidebar(array(
		'name'=> 'Footer Area 1',
		'id' => 'footer_1',
		'before_widget' => '<div id="%1$s" class="three columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
		register_sidebar(array(
		'name'=> 'Footer Area 2',
		'id' => 'footer_2',
		'before_widget' => '<div id="%1$s" class="three columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
		register_sidebar(array(
		'name'=> 'Footer Area 3',
		'id' => 'footer_3',
		'before_widget' => '<div id="%1$s" class="three columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
		register_sidebar(array(
		'name'=> 'Footer Area 4',
		'id' => 'footer_4',
		'before_widget' => '<div id="%1$s" class="three columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

}

// Comments

// Custom callback to list comments in the Foundation style
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
        <div class="comment-author vcard"><?php commenter_link() ?></div>
        <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'Foundation'),
                    get_comment_date(),
                    get_comment_time(),
                    '#comment-' . get_comment_ID() );
                    edit_comment_link(__('Edit', 'Foundation'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'Foundation') ?>
          <div class="comment-content">
            <?php comment_text() ?>
        </div>
        <?php // echo the comment reply link
            if($args['type'] == 'all' || get_comment_type() == 'comment') :
                comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Reply','Foundation'),
                    'login_text' => __('Log in to reply.','Foundation'),
                    'depth' => $depth,
                    'before' => '<div class="comment-reply-link">',
                    'after' => '</div>'
                )));
            endif;
        ?>
<?php } // end custom_comments

// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'Foundation'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'Foundation'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'Foundation') ?>
            <div class="comment-content">
                <?php comment_text() ?>
            </div>
<?php } // end custom_pings

// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
    $commenter = get_comment_author_link();
    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
        $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
    } else {
        $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
    }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 35 ) );
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link


// Orbit, for WordPress

//add_action('init', 'Orbit');

//function Orbit(){
//$Orbit_args = array(
//'label'	=> __('Orbit'),
//		'singular_label' =>	__('Orbit'),
//		'public'	=>	true,
//		'show_ui'	=>	true,
//		'capability_type'	=>	'post',
//		'hierarchical'	=>	false,
//		'rewrite'	=>	true,
//		'supports'	=>	array('title', 'editor','page-attributes','thumbnail')
//		);
//		register_post_type('Orbit', $Orbit_args);
//}

//function SliderContent(){

//	$args = array( 'post_type' => 'Orbit');
//	$loop = new WP_Query( $args );
	
//		while ( $loop->have_posts() ) : $loop->the_post();
		
//			if(has_post_thumbnail()) {
			
//				the_post_thumbnail();
				
//			} else {
			
//				echo '<div class="content" style="background:#FFF;">';
			
//					the_title();
//					the_content();
					
//				echo '</div>';
			
//			}
		
//		endwhile;
		
//}



// Custom Pagination
/**
// * Retrieve or display pagination code.
// *
// * The defaults for overwriting are:
// * 'page' - Default is null (int). The current page. This function will
 // *      automatically determine the value.
 // * 'pages' - Default is null (int). The total number of pages. This function will
 // *      automatically determine the value.
 // * 'range' - Default is 3 (int). The number of page links to show before and after
 // *      the current page.
 // * 'gap' - Default is 3 (int). The minimum number of pages before a gap is 
 // *      replaced with ellipses (...).
 // * 'anchor' - Default is 1 (int). The number of links to always show at begining
 // *      and end of pagination
 // * 'before' - Default is '<div class="emm-paginate">' (string). The html or text 
 // *      to add before the pagination links.
 // * 'after' - Default is '</div>' (string). The html or text to add after the
 // *      pagination links.
 // * 'next_page' - Default is '__('&raquo;','flexplustheme')' (string). The text to use for the 
 // *      next page link.
 // * 'previous_page' - Default is '__('&laquo','flexplustheme')' (string). The text to use for the 
 // *      previous page link.
 // * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 // *      to 0 (zero).
 // *
 // * @author Eric Martin <eric@ericmmartin.com>
 // * @copyright Copyright (c) 2009, Eric Martin
 // * @version 1.0
 // *
 //* @param array|string $args Optional. Override default arguments.
 // * @return string HTML content, if not displaying.
 */
function emm_paginate($args = null) {
	$defaults = array(
		'page' => null, 'pages' => null, 
		'range' => 3, 'gap' => 3, 'anchor' => 1,
		'before' => '<ul class="pagination">', 'after' => '</ul>',
		'title' => __('<li class="unavailable"></li>'),
		'nextpage' => __('&raquo;','flexplustheme'), 'previouspage' => __('&laquo','flexplustheme'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if (!$page && !$pages) {
		global $wp_query;

		$page = get_query_var('paged');
		$page = !empty($page) ? intval($page) : 1;

		$posts_per_page = intval(get_query_var('posts_per_page'));
		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
	}
	
	$output = "";
	if ($pages > 1) {	
		$output .= "$before<li>$title</li>";
		$ellipsis = "<li class='unavailable'>...</li>";

		if ($page > 1 && !empty($previouspage)) {
			$output .= "<li><a href='" . get_pagenum_link($page - 1) . "'>$previouspage</a></li>";
		}
		
		$min_links = $range * 2 + 1;
		$block_min = min($page - $range, $pages - $min_links);
		$block_high = max($page + $range, $min_links);
		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

		if ($left_gap && !$right_gap) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $pages, $page)
			);
		}
		else if ($left_gap && $right_gap) {
			$output .= sprintf('%s%s%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $block_high, $page), 
				$ellipsis, 
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else if ($right_gap && !$left_gap) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else {
			$output .= emm_paginate_loop(1, $pages, $page);
		}

		if ($page < $pages && !empty($nextpage)) {
			$output .= "<li><a href='" . get_pagenum_link($page + 1) . "'>$nextpage</a></li>";
		}

		$output .= $after;
	}

	if ($echo) {
		echo $output;
	}

	return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 * @access private
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */
function emm_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i)) 
			? "<li class='current'><a href='#'>$i</a></li>" 
			: "<li><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
	}
	return $output;
} 

function flexplus_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
function my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'flexplus_formatter', 99);
add_filter('widget_text', 'flexplus_formatter', 99);
add_filter('the_content', 'my_formatter', 99);

//include_once 'metaboxes/modalbox-spec.php';
//NAVIGATION

function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['has-flyout'] = 'has-flyout';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );

// change the standard class that wordpress puts on the active menu item in the nav bar
//Deletes all CSS classes and id's, except for those listed in the array below

function custom_wp_nav_menu($var) {
        return is_array($var) ? array_intersect($var, array(
                //List of allowed menu classes
                'current_page_item',
                'current_page_parent',
                'current_page_ancestor',
                'first',
                'last',
                'vertical',
                'horizontal',
				'has-flyout',
				'flyout',
				'flyout-toggle',
				'has-dropdown',
				'dropdown',
				'active'
				
                )
        ) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

//Replaces "current-menu-item" with "active"
function current_to_active($text){
        $replace = array(
                //List of menu item classes that should be changed to "active"
                'current_page_item' => 'active',
                'current_page_parent' => 'active',
                'current_page_ancestor' => 'active',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
                return $text;
        }
add_filter ('wp_nav_menu','current_to_active');

function submenu_to_flyout ($text){
	$replace = array(
		'sub-menu' => 'sub-menu flyout'
		);
	$text = str_replace(array_keys($replace), $replace, $text);
				return $text;
		}
add_filter ('wp_nav_menu', 'submenu_to_flyout');




 
//Deletes empty classes and removes the sub menu class
/*
function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
    return $menu;
}
add_filter ('wp_nav_menu','strip_empty_classes');
*/

// add the 'has-flyout' class to any li's that have children and add the arrows to li's with children

class description_walker extends Walker_Nav_Menu{
	
	function start_el(&$output, $item, $depth, $args)
      {
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            
            $class_names = $value = '';
            
            // If the item has children, add the dropdown class for foundation
            if ( $args->has_children ) {
                $class_names = "has-flyout ";
            }
            
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            
            $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="'. esc_attr( $class_names ) . '"';
           
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		  /* $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';*/
            // if the item has children add these two attributes to the anchor tag
          if ( $args->has_children ) {
               $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
            }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            // if the item has children add the caret just before closing the anchor tag
            if ( $args->has_children ) {
                $item_output .= '</a><a href="#" class="flyout-toggle"><span> </span></a>';
            }
            else{
                $item_output .= '</a>';
            }
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
		
           
        function start_lvl(&$output, $depth) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"flyout\">\n";
        }
            
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
            {
                $id_field = $this->db_fields['id'];
                if ( is_object( $args[0] ) ) {
                    $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
                }
                return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
            }       
}


// Walker class to customize footer links
class footer_links_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            
            $class_names = $value = '';
            
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            
            $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="'. esc_attr( $class_names ) . '"';
           
            $output .= $indent . '<li ' . $value . $class_names .'>';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
            
        function start_lvl(&$output, $depth) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"flyout\">\n";
        }
            
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
            {
                $id_field = $this->db_fields['id'];
                if ( is_object( $args[0] ) ) {
                    $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
                }
                return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
            }       
}
/* Add Search Box to Mobile Menu*/

add_filter('wp_nav_menu_items','add_search_box', 1, 2);
function add_search_box($items, $args) {
	if ( $args -> menu == 'mobile_nav'){
         ob_start();
        get_search_form();
        $searchform = ob_get_contents();
        ob_end_clean();

        $items .= '<li>' . $searchform . '</li>';
	}

    return $items;
}



/*********** update standard wp tag cloud widget so it looks better ************/

// filter tag clould output so that it can be styled by CSS
function add_tag_class( $taglinks ) {
    $tags = explode('</a>', $taglinks);
    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";
        foreach( $tags as $tag ) {
            $tagn[] = preg_replace($regex, "('$1$2 label radius tag-'.get_tag($2)->slug.'$3')", $tag );
        }
    $taglinks = implode('</a>', $tagn);
    return $taglinks;
}

add_action('wp_tag_cloud', 'add_tag_class');

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

add_filter('wp_tag_cloud','wp_tag_cloud_filter', 10, 2);

function wp_tag_cloud_filter($return, $args)
{
  return '<div id="tag-cloud"><p>'.$return.'</p></div>';
}

function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="label success radius"',$html);
    return $html;
}
add_filter('the_tags','add_class_the_tags',10,1);

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Disable jump in 'read more' link
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
	}
	

?>