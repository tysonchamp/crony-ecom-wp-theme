<?php // custom functions.php template for WordPress Theme Development

add_filter( 'woocommerce_product_get_rating_html', 'custom_woocommerce_product_get_rating_html', 10, 3 );

function custom_woocommerce_product_get_rating_html( $html, $rating, $count ) {
    $html = '<div class="star-rating">';
    for ( $i = 1; $i <= 5; $i++ ) {
        if ($rating >= $i) {
            $html .= '<span class="star filled"></span>';
        } elseif ($rating > $i-1) {
            $html .= '<span class="star half-filled"></span>';
        } else {
            $html .= '<span class="star"></span>';
        }
    }
    $html .= '</div>';

    return $html;
}

// query string remover from static content
function _remove_script_version( $src ){ 
    $parts = explode( '?', $src ); 	
    return $parts[0]; 
} 
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 ); 
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


// Advanced Custom fields section
// define( 'ACF_LITE', true );


/**
 * Include the TGM_Plugin_Activation class.
 */
// require_once dirname( __FILE__ ) . '/inc/auto-plugin-install.php';


// Mailchimp 3.0 API integration in wordpress
function rudr_mailchimp_subscriber_status( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '') ){
	$data = array(
		'apikey'        => $api_key,
    	'email_address' => $email,
		'status'        => $status,
		'merge_fields'  => $merge_fields
	);
	$mch_api = curl_init(); // initialize cURL connection
 
	curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
	curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
	curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
	curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
	curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch_api, CURLOPT_POST, true);
	curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
 
	$result = curl_exec($mch_api);
	return $result;
}
// End of Mailchimp API Function


// enable featured image support for posts
add_theme_support( 'post-thumbnails' ); 


// add woocommerce support
add_theme_support( 'woocommerce' );
add_filter( 'woocommerce_currencies', 'add_inr_currency' );
add_filter( 'woocommerce_currency_symbol', 'add_inr_currency_symbol' );
function add_inr_currency( $currencies ) {
    $currencies['INR'] = 'INR';
    return $currencies;
}
function add_inr_currency_symbol( $symbol ) {
	$currency = get_option( 'woocommerce_currency' );
	switch( $currency ) {
		case 'INR': $symbol = 'Rs.'; break;
	}
	return $symbol;
}
// define('WOOCOMMERCE_USE_CSS', false);


// Pagination function
if ( ! function_exists( 'yourtheme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 * Based on paging nav function from Twenty Fourteen
 */

function custom_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 3,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'yourtheme' ),
		'next_text' => __( 'Next &rarr;', 'yourtheme' ),
		'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;
// end of pagination


// nav menu start
class desktop_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	    // depth dependent classes
	    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
	    $classes = array(
	        'dropdown-menu'
	    );
	    $class_names = implode( ' ', $classes );
	  
	    // build html
	    $output .= "\n" . $indent . '<ul role="menu" class="' . $class_names . '">' . "\n";
	}
	  
	// add main/sub classes to li's and links
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	    global $wp_query;
	    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		  $class_names = $value = '';
	        //$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	        $class_names = in_array("current_page_item",$item->classes) ? 'current' : '';
			$class_names1 = in_array("current-menu-ancestor",$item->classes) ? 'current' : '';
	        //$class_names1 = in_array("current_page_item",$item->menu_item_children->classes) ? ' active' : '';
	    // depth dependent classes
	    $depth_classes = array(
	        ( $depth == 0 ? '' : '' ),$class_names,$class_names1
	    );
	    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	  
	    // passed classes
	    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
	  
	    $parents = array();
		if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $args->theme_location ] ) ) {
			$menu = wp_get_nav_menu_object( $locations[ $args->theme_location ] );
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			foreach( $menu_items as $menu_item ) {
			  	if( $menu_item->menu_item_parent != 0 )
			    	$parents[] = $menu_item->menu_item_parent;
			}
		}

		$liClassDropdown = 'nav-item';
		$aTagClass = 'nav-link';
		$aTagdataToogle = '';
		$liextra = '';
		$liUnderDropdownClass = '';

		if( in_array($item->ID, $parents ) ) {
			$liClassDropdown = ( $depth == 0 ? 'nav-item' : '' );
			$aTagClass = ( $depth == 0 ? 'nav-link dropdown-toggle' : 'dropdown-item' );
			$aTagdataToogle = 'data-bs-toggle="dropdown" aria-expanded="false"';
			// $liextra = ( $depth == 0 ? 'id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false"' : '' );
		}else{
			$liClassDropdown = ( $depth > 0 ? '' : 'nav-item' );
			$aTagClass = ( $depth > 0 ? 'dropdown-item' : 'nav-link' );
			// $liUnderDropdownClass = ( $depth == 0 ? '' : 'dropdown-item' );
		}

	    // build html
	    $output .= $indent . '<li class="' . $class_names . ' ' . $depth_class_names . ' ' . $liClassDropdown . ' ' . $liUnderDropdownClass . '" '. $liextra .'>';
	  
	    // link attributes
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= 'class="' . $aTagClass . '" ' . $aTagdataToogle . '';
	    $attributes .= ' class="' . ( $depth > 0 ? 'menu-button' : '' ) . '"';
	    $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
	  	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	  	$item_output .= '</a>';
        $item_output .= $args->after;
	   	/* $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
	        $args->before,
	        $attributes,
	        $args->link_before,
	        apply_filters( 'the_title', $item->title, $item->ID ),
	        $args->link_after,
	        $args->after
	    );*/
	    // build html
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}


// nav menu start
class footer_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	    // depth dependent classes
	    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
	    $classes = array(
	        ''
	    );
	    $class_names = implode( ' ', $classes );
	  
	    // build html
	    $output .= "\n" . $indent . '<ul role="menu" class="' . $class_names . '">' . "\n";
	}
	  
	// add main/sub classes to li's and links
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	    global $wp_query;
	    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		  $class_names = $value = '';
	        //$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	        $class_names = in_array("current_page_item",$item->classes) ? 'current' : '';
			$class_names1 = in_array("current-menu-ancestor",$item->classes) ? 'current' : '';
	        //$class_names1 = in_array("current_page_item",$item->menu_item_children->classes) ? ' active' : '';
	    // depth dependent classes
	    $depth_classes = array(
	        ( $depth == 0 ? '' : '' ),$class_names,$class_names1
	    );
	    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	  
	    // passed classes
	    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
	  
	    $parents = array();
		if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $args->theme_location ] ) ) {
			$menu = wp_get_nav_menu_object( $locations[ $args->theme_location ] );
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			foreach( $menu_items as $menu_item ) {
			  if( $menu_item->menu_item_parent != 0 )
			    $parents[] = $menu_item->menu_item_parent;
			}
		}

		$liClassDropdown = '';
		$aTagClass = '';
		$aTagdataToogle = '';
		$liUnderDropdownClass = '';

		if( in_array($item->ID, $parents ) ) {
			// $liClassDropdown = ( $depth == 0 ? 'has-children' : '' );
			// $aTagClass = ( $depth == 0 ? 'dropdown-toggle nav-link' : '' );
			// $aTagdataToogle = 'data-toggle="dropdown"';
		}else{
			// $liClassDropdown = ( $depth == 0 ? 'nav-item' : '' );
			// $aTagClass = ( $depth == 0 ? 'nav-link' : '' );
			// $liUnderDropdownClass = ( $depth == 0 ? '' : 'dropdown-item' );
		}

	    // build html
	    $output .= $indent . '<li class="' . $class_names . ' ' . $depth_class_names . ' ' . $liClassDropdown . ' ' . $liUnderDropdownClass . '">';
	  
	    // link attributes
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		// $attributes.='class="' . $aTagClass . '" ' . $aTagdataToogle . '';
	    //$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
	    $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
	  	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
	    $item_output .= $args->after;
	   /* $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
	    	$args->before,
	    	$attributes,
	    	$args->link_before,
	    	apply_filters( 'the_title', $item->title, $item->ID ),
	    	$args->link_after,
	        $args->after
	    );*/
	    // build html
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}


add_action( 'after_setup_theme', 'td_setup' );

function td_setup() {
	register_nav_menus( array(
		'desktop_menu' => 'Main Menu',
		'footer_menu' => 'Footer Menu',
		'footer_menu1' => 'Footer Menu 1',
		// 'service_menu' => 'Service Page Menu',
	) );
}
// menu end


// Creating theme Option using ACF
require_once dirname( __FILE__ ) . '/inc/theme-option.php';
// WP Customizer API init
require_once dirname( __FILE__ ) . '/inc/customizer.php';
// widgets init
// require_once dirname( __FILE__ ) . '/inc/widgets.php';


// remove version info from head and feeds
function complete_version_removal() {
	return '';
}
add_filter('the_generator', 'complete_version_removal');


// customize admin footer text
// function custom_admin_footer() {
// 	echo '<a href="http://www.tysonchamp.com/">Developed By Tyson Champ</a>';
// } 
// add_filter('admin_footer_text', 'custom_admin_footer');


// enable html markup in user profiles
remove_filter('pre_user_description', 'wp_filter_kses');


// delay feed update
function publish_later_on_feed($where) {
	global $wpdb;
	if (is_feed()) {
		// timestamp in WP-format
		$now = gmdate('Y-m-d H:i:s');
		// value for wait; + device
		$wait = '5'; // integer
		// http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_timestampdiff
		$device = 'MINUTE'; // MINUTE, HOUR, DAY, WEEK, MONTH, YEAR
		// add SQL-sytax to default $where
		$where .= " AND TIMESTAMPDIFF($device, $wpdb->posts.post_date_gmt, '$now') > $wait ";
	}
	return $where;
}
add_filter('posts_where', 'publish_later_on_feed');


// count words in posts
function word_count() {
	global $post;
	echo str_word_count($post->post_content);
}


// spam & delete links for all versions of wordpress
function delete_comment_link($id) {
	if (current_user_can('edit_post')) {
		echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?action=cdc&c='.$id.'">del</a> ';
		echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?action=cdc&dt=spam&c='.$id.'">spam</a>';
	}
}


// disable auto formatting in posts
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
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter', 99);


// escape html entities in comments
function encode_code_in_comment($source) {
	$encoded = preg_replace_callback(
		'/<code>(.*?)<\/code>/ims',
		function ($matches) {
			$matches[1] = preg_replace(array("/^[\r|\n]+/i", "/[\r|\n]+$/i"), "", $matches[1]); 
			return "<code>" . htmlentities($matches[1]) . "</code>";
		},
		$source
	);
	if ($encoded)
		return $encoded;
	else
		return $source;
}
add_filter('pre_comment_content', 'encode_code_in_comment');


// custom comments callback function
function custom_comments_callback($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-wrap">
			<?php echo get_avatar(get_comment_author_email(), $size = '50', $default = bloginfo('stylesheet_directory').'/images/gravatar.png'); ?>

			<div class="comment-intro">
            			<?php printf(__('%s'), get_comment_author_link()); ?> &ndash; <a class="comment-permalink" href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php comment_date('F j, Y'); ?> @ <?php comment_time(); ?></a><?php edit_comment_link('Edit', ' &ndash; ', ''); ?>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>

			<p class="comment-moderation"><?php _e('Your comment is awaiting moderation.'); ?></p>
			<?php endif; ?>

			<div class="comment-text"><?php comment_text(); ?></div>

			<div class="reply" id="comment-reply-<?php comment_ID(); ?>">
				<?php comment_reply_link(array_merge($args, array('reply_text'=>'Reply', 'login_text'=>'Log in to Reply', 'add_below'=>'comment-reply', 'depth'=>$depth, 'max_depth'=>$args['max_depth']))); ?> 

			</div>
		</div>

<?php } // WP adds the closing </li>
?>
