<?php
/*
	@package WordPress
	@subpackage PeteSchuster
*/

add_theme_support('menus');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
update_option('image_default_link_type','none');
if ( ! isset( $content_width ) ) $content_width = 960;

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');


// Obscure login screen error messages
function login_obscure(){ return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';}
add_filter( 'login_errors', 'login_obscure' );


// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);

//Custom Comments List
if ( ! function_exists( 'ps_comment' ) ) :

function ps_comment( $comment, $args, $depth ) {
	$GLOBALS[ 'comment' ] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p>Pingback: <?php comment_author_link(); ?><?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID(); ?>">
			<figure><?php echo get_avatar( $comment, 65 ); ?></figure>
			<div>
				<footer>
					<h3><?php comment_author_link(); ?></h3>
					<p>
					<time datetime="<?php echo get_comment_time( 'c' ); ?>" pubdate="pubdate"><?php echo get_comment_time( 'M d, Y' ); ?></time>
					<?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
	
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<br />
						<em>Your comment is awaiting moderation</em>
					<?php endif; ?>
					</p>
				</footer>
	
				<?php comment_text(); ?>
	
				<p class="right">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</p><!-- .reply -->
			</div>

	<?php
			break;
	endswitch;
}
endif; // ends check for ps_comment()

//Change the Excerpt Length
function new_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'new_excerpt_length' );

//Remove the [..] from the excerpt
function new_excerpt_more( $more ) {
       global $post;
	return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//Sidebars
function ps_widgets_init() {
	//Register Another Sidebar for Widgets Like Twitter
	register_sidebar( array(
		'name' => 'Widgets Right',
		'id' => 'ps_widgets',
		'description' => 'Widgets in this area will be shown on the right-hand side.',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'ps_widgets_init' );

/*
//Register Session
add_action( 'init', 'register_sesssion' );
function register_sesssion() {
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
    	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes', 'comments' )
  	); 
  	register_post_type( 'session', $args );
}

//add filter to ensure the text Session, or session, is displayed when user updates a session 
add_filter( 'post_updated_messages', 'sesssion_updated_messages' );
function sesssion_updated_messages( $messages ) {
	global $post, $post_ID;
  	$messages[ 'session' ] = array(
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
  	if ( 'session' == $screen->id ) {
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
function register_tracks() {
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
		'rewrite' => array( 'slug' => 'track' )
	);
register_taxonomy( 'track', 'session', $args );
}
*/

//Direct Gallery from Upload
/*
function propertyGallery() {
	global $post;
	$args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_parent' => $post->ID
	);
    $arrImages =& get_children( $args );
    if( $arrImages ) {
		usort( $arrImages, 'cmpMenuOrder' );
		echo "<ul class=\"gallery\">\n";
		$style_classes = array( 'odd', 'even' );
		$style_index = 0;
		foreach ( $arrImages as $key => $data ) {
			$k = $style_index%2;
			$imagelarge = wp_get_attachment_image_src( $data->ID, "full" );
			$imagesmall = wp_get_attachment_image_src( $data->ID, "thumbnail" );
			echo "<li class=\"".$style_classes[$k]."\"><a rel=\"prettyPhoto[gallery]\" href=\"".$imagelarge[0]."\"><img src=\"".$imagesmall[0]."\" /></a></li>\n";
			$style_index++;
		}
		echo "</ul>";
	}
}
function cmpMenuOrder( $a, $b ) {
	if( $a->menu_order ==  $b->menu_order ){ return 0 ; } 
	return ( $a->menu_order < $b->menu_order ) ? -1 : 1;
}

*/

?>