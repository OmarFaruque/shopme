<?php 
/*
* Metabox
*/


/* Add metabox */
function product_add_meta_box() {
	$screens = array( 'product' );
	foreach ( $screens as $screen ) {
		add_meta_box( 'ProductDetails', __( 'Meta Box', 'Shop Me' ), 'product_meta_box_callback', $screen, 'side', 'top' );
	}
}
add_action( 'add_meta_boxes', 'product_add_meta_box' );


/* Metabox Call Back Function */
function product_meta_box_callback($post){
	wp_nonce_field( 'product_meta_box', 'product_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

    
}