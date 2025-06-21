<?php // Creating the widget

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'urban' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'urban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="subcribe1"><font size="+2" >',
		'after_title'   => '</font><br><img src="' . get_template_directory_uri() . '/imgs/1.png"><br>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'urban' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'urban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'urban' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'urban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 3', 'urban' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'urban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 4', 'urban' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'urban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );



/**
 *
 * Follow Us On Social Network Widgets
 *
 **/
class ub_social extends WP_Widget {

function __construct() {
	parent::__construct(
		// Base ID of your widget
		'ub_social', 

		// Widget name will appear in UI
		__('Urban Social Follow', 'ub_social_domain'), 

		// Widget description
		array( 'description' => __( 'Urban Follow us Widgets', 'ub_social_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	// social network starts
	$facebook = apply_filters( 'widget_title', $instance['facebook'] );
	$twitter = apply_filters( 'widget_title', $instance['twitter'] );
	$pinterest = apply_filters( 'widget_title', $instance['pinterest'] );
	$youtube = apply_filters( 'widget_title', $instance['youtube'] );
	$instagram = apply_filters( 'widget_title', $instance['instagram'] );
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
		echo '<div class="flowus1"><font size="+2" >' . $title . '</font><br><img src="' . get_template_directory_uri() . '/imgs/1.png"><br>';

	// This is where you run the code and display the output
	$widget_html = '<a target="_blank" href="' . $instagram . '"><i class="fa fa-instagram icon1"></i></a>';
	$widget_html .= '<a target="_blank" href="' . $youtube . '"><i class="fa  fa-youtube icon1"></i></a>';
	$widget_html .= '<a target="_blank" href="' . $pinterest . '"><i class="fa fa-pinterest icon1"></i></a>';
	$widget_html .= '<a target="_blank" href="' . $facebook . '"><i class="fa fa-facebook  icon1"></i></a>';
	$widget_html .= '<a target="_blank" href="' . $twitter . '"><i class="fa fa-twitter icon1"></i></a>';
	
	echo __( $widget_html, 'ub_social_domain' );
	echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'New title', 'ub_social_domain' );
	}
	// Social network urls
	if ( isset( $instance[ 'facebook' ] ) or isset( $instance[ 'twitter' ] ) or isset( $instance[ 'pinterest' ] ) or isset( $instance[ 'youtube' ] ) or isset( $instance[ 'instagram' ] ) ) {

		$facebook = $instance[ 'facebook' ];
		$twitter = $instance[ 'twitter' ];
		$pinterest = $instance[ 'pinterest' ];
		$youtube = $instance[ 'youtube' ];
		$instagram = $instance[ 'instagram' ];
	}
	else {
		$facebook = __( 'http://facebook.com/tysonchampno1', 'ub_social_domain' );
		$twitter = __( 'http://twitter.com/tysonchampno1', 'ub_social_domain' );
		$pinterest = __( 'http://pinterest.com/tysonchampno1', 'ub_social_domain' );
		$youtube = __( 'http://youtube.com/tysonchampno1', 'ub_social_domain' );
		$instagram = __( 'http://instagram.com/tysonchampno1', 'ub_social_domain' );
	}

	// Widget admin form
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		<!-- social network links -->
		<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'twitter:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
		<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'pinterest:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
		<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'youtube:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
		<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'instagram:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
	</p>
	<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	// social network urls
	$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
	$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
	$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
	$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
	$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
	return $instance;
}
} // Class ub_social ends here


/**
 *
 * Urban Custom Latest Posts Widgets
 *
 **/
class ub_posts extends WP_Widget {

function __construct() {
	parent::__construct(
		// Base ID of your widget
		'ub_posts', 

		// Widget name will appear in UI
		__(' Urban Latest Posts', 'ub_posts_domain'), 

		// Widget description
		array( 'description' => __( 'Urban Latest Posts Widgets', 'ub_posts_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );

	// Changable Values below
	$recent_posts = apply_filters( 'widget_title', $instance['recent_posts'] );

	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
		echo '<div class="subcribe1"><font size="+2" >' . $title . '</font><br><img src="' . get_template_directory_uri() . '/imgs/1.png"><br>';

	// This is where you run the code and display the output. Changable Values below.
	// WP_Query arguments
    $args = array (
        'post_type'              => array( 'post' ),
        'post_status'            => array( 'publish' ),
        'showposts'               => $recent_posts,
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            	$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
    ?>
				<font color="#999999" size="-2"><?php the_time( 'F j, Y' ) ?> | <?php echo get_comments_number( $post->ID ) ?> Comments</font><br>
				<img src="<?php echo $image[0]; ?>" class="photosub1"  ><br>
				<h3><?php the_title() ?></h3>
				<h5><?php the_excerpt() ?></h5><br>
				<a href="<?php the_permalink(); ?>" class="buttonsub1">VIEW POST</a>
				
	<?php
		}
	}
	
	// Restore original Post Data
	wp_reset_postdata();

	echo __( "</div>" );
	echo "</section><br><br>";
}
		
// Widget Backend 
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'New title', 'ub_posts_domain' );
	}
	// Changable Values below
	if ( isset( $instance[ 'recent_posts' ] ) ) {

		$recent_posts = $instance[ 'recent_posts' ];
	}
	else {
		$recent_posts = __( '1', 'ub_social_domain' );
	}

	// Widget admin form
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		<!-- Changable Values below -->
		<label for="<?php echo $this->get_field_id( 'recent_posts' ); ?>"><?php _e( 'Number of Posts:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'recent_posts' ); ?>" name="<?php echo $this->get_field_name( 'recent_posts' ); ?>" type="text" value="<?php echo esc_attr( $recent_posts ); ?>" />
	</p>
	<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	// Changable Values below
	$instance['recent_posts'] = ( ! empty( $new_instance['recent_posts'] ) ) ? strip_tags( $new_instance['recent_posts'] ) : '1';
	return $instance;
}
} // Class ub_posts ends here


/**
 *
 * Urban Mailchimp Widgets
 *
 **/
class ub_mailchimp extends WP_Widget {

function __construct() {
	parent::__construct(
		// Base ID of your widget
		'ub_mailchimp', 

		// Widget name will appear in UI
		__(' Urban Mailchimp', 'ub_mailchimp_domain'), 

		// Widget description
		array( 'description' => __( 'Urban Mailchimp Widgets for newsletter subscriptions', 'ub_mailchimp_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );

	// Changable Values below
	$texts = apply_filters( 'widget_title', $instance['texts'] );
	$api = apply_filters( 'widget_title', $instance['api'] );
	$listid = apply_filters( 'widget_title', $instance['listid'] );

	// email subscription function
	if ( isset($_POST['subs']) ) {
		$fname = $_POST['cname'];
		$email = $_POST['cemail']; // email of user
		$status = 'pending'; // "subscribed" or "unsubscribed" or "cleaned" or "pending"
		$list_id = $listid; // where to get it read above
		$api_key = $api; // where to get it read above
		$merge_fields = array('FNAME' => $fname,'LNAME' => 'name');

		rudr_mailchimp_subscriber_status($email, $status, $list_id, $api_key, $merge_fields );
	}

	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
		echo '<div class="subcribe1"><font size="+2" >' . $title . '</font><br><img src="' . get_template_directory_uri() . '/imgs/1.png"><br>';

	// This is where you run the code and display the output. Changable Values below.
	echo "$texts";
    ?>
				
				<br><br><br>
				<form action="" method="POST">
					<input type="text" name="cname" placeholder="Your First Name"  class="foseb">
					<br><br>
					<input type="text" name="cemail" placeholder="Your Email address"  class="foseb">
					<div>
						<br><br> 
						<button type="submit" name="subs" class="mailchimpsub">SUBSCRIBE</button>
					</div>
				</form>
				</div>
	<?php
	// echo __( $widget_html );
	echo $args['after_widget'] . "<br><br>";
}
		
// Widget Backend 
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'New title', 'ub_mailchimp_domain' );
	}
	// Changable Values below
	if ( isset( $instance[ 'texts' ] ) or isset( $instance[ 'api' ] ) or isset( $instance[ 'listid' ] ) ) {

		$texts = $instance[ 'texts' ];
		$api = $instance[ 'api' ];
		$listid = $instance[ 'listid' ];
	}
	else {
		$texts = __( '', 'ub_mailchimp_domain' );
		$api = __( '', 'ub_mailchimp_domain' );
		$listid = __( '', 'ub_mailchimp_domain' );
	}

	// Widget admin form
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		<!-- Changable Values below -->
		<label for="<?php echo $this->get_field_id( 'texts' ); ?>"><?php _e( 'Texts:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'texts' ); ?>" name="<?php echo $this->get_field_name( 'texts' ); ?>" type="text" value="<?php echo esc_attr( $texts ); ?>" />
		<label for="<?php echo $this->get_field_id( 'api' ); ?>"><?php _e( 'API Key:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'api' ); ?>" name="<?php echo $this->get_field_name( 'api' ); ?>" type="text" value="<?php echo esc_attr( $api ); ?>" />
		<label for="<?php echo $this->get_field_id( 'listid' ); ?>"><?php _e( 'List ID:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'listid' ); ?>" name="<?php echo $this->get_field_name( 'listid' ); ?>" type="text" value="<?php echo esc_attr( $listid ); ?>" />
	</p>
	<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	// Changable Values below
	$instance['texts'] = ( ! empty( $new_instance['texts'] ) ) ? strip_tags( $new_instance['texts'] ) : '';
	$instance['api'] = ( ! empty( $new_instance['api'] ) ) ? strip_tags( $new_instance['api'] ) : '';
	$instance['listid'] = ( ! empty( $new_instance['listid'] ) ) ? strip_tags( $new_instance['listid'] ) : '';
	return $instance;
}
} // Class ub_mailchimp ends here


// Register and load the widget
function ub_widgets_load() {
	register_widget( 'ub_social' );
	register_widget( 'ub_posts' );
	register_widget( 'ub_mailchimp' );
}
add_action( 'widgets_init', 'ub_widgets_load' );

?>
