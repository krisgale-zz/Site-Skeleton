<?php
/**
 * @package WordPress
 * @subpackage philmadelphia
 */

add_theme_support('menus');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
update_option('image_default_link_type','none');

//Register Sessions
/*
add_action('init', 'register_sesssion');
function register_sesssion() 
{
  $labels = array(
    'name' => _x('Sessions', 'post type general name'),
    'singular_name' => _x('Session', 'post type singular name'),
    'add_new' => _x('Add Session', 'book'),
    'add_new_item' => __('Add New Session'),
    'edit_item' => __('Edit Session'),
    'new_item' => __('New Session'),
    'view_item' => __('View Session'),
    'search_items' => __('Search Sessions'),
    'not_found' =>  __('No sessions found'),
    'not_found_in_trash' => __('No sessions found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Sessions'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'rewrite' => array('slug' => 'session'),
    'hierarchical' => true,
    'supports' => array('title','editor','author','thumbnail','excerpt','revisions','custom-fields')
  ); 
  register_post_type('session',$args);
}

//add filter to ensure the text Session, or session, is displayed when user updates a session 
add_filter('post_updated_messages', 'sesssion_updated_messages');
function sesssion_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['session'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Session updated. <a href="%s">View session</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Session updated.'),
    // translators: %s: date and time of the revision
    5 => isset($_GET['revision']) ? sprintf( __('Session restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Session Added! <a href="%s">View session</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Session saved.'),
    8 => sprintf( __('Session submitted. <a target="_blank" href="%s">Preview session</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Session scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview session</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Session draft updated. <a target="_blank" href="%s">Preview session</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}

//display contextual help for Sessions
add_action( 'contextual_help', 'session_help_text', 10, 3 );

function session_help_text($contextual_help, $screen_id, $screen) { 
  //$contextual_help .= var_dump($screen); // use this to help determine $screen->id
  if ('session' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a session:') . '</p>' .
      '<ul>' .
      '<li>' . __('Specify the correct track.') . '</li>' .
      '<li>' . __('Specify the correct Keynote Speaker of the session book.') . '</li>' .
      '</ul>' .
      '<p>' . __('If you want to schedule the session review to be published in the future:') . '</p>' .
      '<ul>' .
      '<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
      '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
      '</ul>' .
      '<p><strong>' . __('For more information:') . '</strong></p>' .
      '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
      '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
  } elseif ( 'edit-book' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of books blah blah blah.') . '</p>' ;
  }
  return $contextual_help;
}

//Register Tracks
add_action('init', 'register_tracks');
function register_tracks() 
{
	$labels = array(
		'name' => _x( 'Tracks', 'taxonomy general name' ),
		'singular_name' => _x( 'Track', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Tracks' ),
		'all_items' => __( 'All Tracks' ),
		'parent_item' => __( 'Parent Track' ),
		'parent_item_colon' => __( 'Parent Track:' ),
		'edit_item' => __( 'Edit Track' ), 
		'update_item' => __( 'Update Track' ),
		'add_new_item' => __( 'Add New Track' ),
		'new_item_name' => __( 'New Track' ),
	);
	$args = array(
		'labels' => $labels,			  	
		'hierarchical' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'track')
	);
register_taxonomy('track', 'session', $args);
}
*/

//Direct Gallery from Upload
/*
function propertyGallery() {
	global $post;
    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
    if($arrImages) {
		usort($arrImages, 'cmpMenuOrder');
		echo "<ul class=\"gallery\">\n";
		$style_classes = array('odd','even');
		$style_index = 0;
		foreach($arrImages as $key => $data) {
			$k = $style_index%2;
			$imagelarge = wp_get_attachment_image_src($data->ID, "full");
			$imagesmall = wp_get_attachment_image_src($data->ID, "thumbnail");
			echo "<li class=\"".$style_classes[$k]."\"><a rel=\"prettyPhoto[gallery]\" href=\"".$imagelarge[0]."\"><img src=\"".$imagesmall[0]."\" /></a></li>\n";
			$style_index++;
		}
		echo "</ul>";
	}
}
function cmpMenuOrder($a, $b) {
	if( $a->menu_order ==  $b->menu_order ){ return 0 ; } 
	return ($a->menu_order < $b->menu_order) ? -1 : 1;
}


// [google-map] shortcode
function map_shortcode( $atts, $content = NULL ) {
	$html ="<div id=\"map\"></div><div class=\"directionswrapper\"><div id=\"directionsform\"><h2>Get Driving Directions:</h2><form onsubmit=\"getdirections();return false;\" class=\"clearfix\"><p><label for=\"fromaddress\">From:</label> <input id=\"fromaddress\" class=\"textbox\" /> <label for=\"toaddress\">To:</label> <select id=\"toaddress\"><option value=\"321 Stonehenge Drive Phillipsburg, NJ 0886\">Middle School</option><option value=\"263 Route 57 Phillipsburg, NJ 08865\">Elementary School</option></select> <span class=\"button\"><input class=\"button\" type=\"submit\" value=\"Get Directions\" /></span></p></form></div><div id=\"dirholder\"></div></div>";
	return do_shortcode( $html );
}
add_shortcode( 'google-map', 'map_shortcode' );
*/

?>