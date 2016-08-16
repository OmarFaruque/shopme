<?php 
/*
* Metabox
*/


/* Add metabox */
function product_add_meta_box() {
	$screens = array( 'product' );
	foreach ( $screens as $screen ) {
		add_meta_box( 'ProductDetails', __( 'Meta Box', 'Shop Me' ), 'product_meta_box_callback', $screen, 'side', 'high' );
	}
}
add_action( 'add_meta_boxes', 'product_add_meta_box' );


/* Metabox Call Back Function */
function product_meta_box_callback($post){
	wp_nonce_field( 'product_meta_box', 'product_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );


    $model 				= 	get_post_meta($post->ID, 'model', true);
    $price 				= 	get_post_meta($post->ID, 'price', true);
    $free_shipping 		= 	get_post_meta($post->ID, 'free_shipping', true);

    /* Model */
    echo '<label for="model">Model:</label>';
    echo '<input id="model" style="width: 100%;vertical-align: middle;" type="text" name="model" value="'.$model.'"/><br/>';

    /* Ragular Price */
    echo '<label for="price">Ragular Price:</label>';
    echo '<input id="price" style="width: 100%; vertical-align: middle;" type="number" min="0" name="price" value="'.$price.'"/><br/>';
    
    /**/
    echo '<label for="free_shipping">Free Shipping Msg.</label>';
    echo '<textarea style="width:100%;" placeholder="Receive free Shipping when you order Tk.30,000.00 or more." name="free_shipping" id="free_shipping" name="free_shipping">'.$free_shipping.'</textarea>';
}


function save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['product_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['product_meta_box_nonce'], 'product_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	// Background Meta get Post  background_position
	$post_model = sanitize_text_field($_POST['model']); 
	$post_price = sanitize_text_field($_POST['price']); 
	$post_freeShipping = sanitize_text_field($_POST['free_shipping']);

	// Update the meta field in the database.
	update_post_meta( $post_id, 'model', $post_model);
	update_post_meta( $post_id, 'price', $post_price);
	update_post_meta( $post_id, 'free_shipping', $post_freeShipping);
}
add_action( 'save_post', 'save_meta_box_data' );