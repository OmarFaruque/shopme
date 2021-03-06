<?php
/*
* Template Name: Contact Us
*/
get_header( );
global $post;
	if(isset($_POST['email'])){
		send_email($_POST, $_FILES);	
	}
?>
<div class="page_contactus">
	<div class="jumbotron jumbotron-fluid jumbotron-custom mt30">
		<h4 class="display-3 text-normal">Please contact us with your questions, we will get back with you as soon as possible.</h4>
	</div>
	<form enctype="multipart/form-data" action="<?= get_permalink($post->ID); ?>" method="POST" accept-charset="utf-8">
		<fieldset class="form-group">
			<label for="name">Name</label>
			<input name="p_name" type="text" value="" class="form-control" id="name" placeholder="Enter Full Name">
		</fieldset><br/>

		<fieldset class="form-group">
			<label for="emal">Email address</label>
			<input name="email" type="email" value="<?= (isset($_GET['email']) )?$_GET['email']:''; ?>" class="form-control" id="email" placeholder="Enter email">
			<small class="text-muted">We'll never share your email with anyone else.</small>
		</fieldset><br/>
		<fieldset class="form-group">
			<label for="subject">Subject</label>
			<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
		</fieldset><br/>
		<fieldset class="form-group">
			<label for="product_select">Product select</label>
			<select multiple="multiple" class="form-control" id="product_select" name="product_select[]">
				<?php 	/**
					 * The WordPress Query class.
					 * @link http://codex.wordpress.org/Function_Reference/WP_Query
					 *
					 */
					$args = array(
						//Type & Status Parameters
						'post_type'   => 'product',
						'post_status' => 'publish');
					$products = new WP_Query( $args );  
					if($products->have_posts()): while($products->have_posts()): $products->the_post();
					?>
					<option value="<?= get_the_title(); ?>"><?= get_the_title(); ?></option>
				<?php endwhile; endif;  ?>
			</select>
			<small class="text-muted">Press 'Ctrl' from keyboard for <b>Multiple</b> select.</small>
		</fieldset><br/>
		<fieldset class="form-group">
			<label for="message">Message</label>
			<textarea name="message" class="form-control" id="message" rows="3"></textarea>
		</fieldset><br/>
		<fieldset class="form-group">
			<label for="attachment">File input</label>
			<input type="file" class="form-control-file" name="attachment" id="attachment">
			<small class="text-muted">Choose file if you have any attachment like Water Test Report. If you have multiple file, zip all file in a single folder and send.</small>
		</fieldset>
		<br/>
		<label>Project for / Product you need for:</label>
		<div class="radio">
			<label><input type="radio" name="foruse" value="For Home Usage">For Home Usage</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="foruse" value="For Industry">For Industry</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="foruse" value="Jar Water">Jar Water</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="foruse" value="Iron Removal Plant">Iron Removal Plant</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="foruse" value="STP">STP</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="foruse" value="ETP">ETP</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="foruse" value="Small Plant">Small Plant</label>
		</div>
		<br/>
		
		<button type="submit" class="btn btn-dark btn-primary">Submit</button>
	</form>
</div>
<?php
get_footer( );
?>