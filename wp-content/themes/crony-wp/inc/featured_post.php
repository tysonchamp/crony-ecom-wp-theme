<?php

//hook to add a meta box
add_action( 'add_meta_boxes', 'ctf_tour_meta' );

function ctf_tour_meta() {
    //create a custom meta box
    add_meta_box( 'ctf-meta', 'Featured Post Selector', 'ctf_mbe_function', 'post', 'normal', 'high' );
}

function ctf_mbe_function( $post ) {

    //retrieve the meta data values if they exist
    $ctf_mbe_featured = get_post_meta( $post->ID, '_ctf_mbe_featured', true );

    echo 'Select yes below to make post featured';
    ?>
    <p>Featured: 
    <select name="ctf_mbe_featured">
        <option value="No" <?php selected( $ctf_mbe_featured, 'no' ); ?>>No Way</option>
        <option value="Yes" <?php selected( $ctf_mbe_featured, 'yes' ); ?>>Sure Feature This post</option>
    </select>
    </p>
    <?php
}

//hook to save the meta box data
add_action( 'save_post', 'ctf_mbe_save_meta' );
function ctf_mbe_save_meta( $post_ID ) {
    global $post;
    if( $post->post_type == "post" ) {
        if ( isset( $_POST ) ) {
            update_post_meta( $post->ID, '_ctf_mbe_featured', strip_tags( $_POST['ctf_mbe_featured'] ) );
        }
    }

}

?>
