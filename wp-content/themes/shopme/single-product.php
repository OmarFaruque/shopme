<?php 
/*
* single Product
*/
get_header();
?>

<div class="row">
	<?php if(have_posts()): while(have_posts()): the_post();
	$model = get_post_meta($post->ID, 'model', true);
	$price = get_post_meta($post->ID, 'price', true);
	$currentID = $post->ID;
	
	$term_list = wp_get_post_terms($post->ID, 'product-category', array("fields" => "names"));
	
	/*echo '<pre>';
	print_r($term_list);
	echo '</pre>';*/
	?>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="magnify">
			<!-- This is the magnifying glass which will contain the original/large version -->
			<div class="large"></div>
				<?php 
					if(has_post_thumbnail()):
						the_post_thumbnail( 'medium', array( 'id' => 'zoom', 'data-zoom-image' => wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ) );
					endif;
				?>
		</div>
		<div class="singleContent mt50">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			<?php if(function_exists('bcn_display'))
				{
				bcn_display();
				}?>
		</div>
		<h3 class="text-normal"><?= get_the_title(); ?></h3>
		<?php if(!empty($model)): ?>
		<h4 class="mt20 mb20  text-normal thin">Model: <?= $model; ?></h4>
		<?php endif; ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 priceDiv">
				<?php if(!empty($price)): ?>		
					<h4 class="text-normal"><b>Our Price: </b><span class="color-orange">Tk. <?= number_format($price, 2); ?><span></h4>
				<?php else: ?>
				<?php endif; ?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 singleShippinDiv">
				<h3 class="color-orange mt0">Free Shipping</h3>
				<p>Receive free Shipping Anywhere from Dhaka.</p>
			</div>
		</div>

		<div class="alsoLike mt50">
			<h3>You May Also Like</h3>
			<div class="row">
				<?php 
					/**
					 * The WordPress Query class.
					 * @link http://codex.wordpress.org/Function_Reference/WP_Query
					 *
					 */
					$args = array(
						//Type & Status Parameters
						'post_type'   => 'any',
						'post_status' => array(
							'publish'
						),
						//Order & Orderby Parameters
						'order'               => 'DESC',
						'orderby'             => 'date',
						//Pagination Parameters
						'posts_per_page'         => 10,
						'posts_per_archive_page' => 10,
						//Taxonomy Parameters
						'tax_query' => array(
						'relation'  => 'AND',
							array(
								'taxonomy'         => 'product-category',
								'field'            => 'slug',
								'terms'            =>  $term_list,
								'include_children' => true,
								'operator'         => 'IN'
							)
						),
						'post__not_in' => array($currentID)
					);
				
				$Query = new WP_Query( $args );
				if($Query->have_posts()): while($Query->have_posts()): $Query->the_post(); 
					$alsoModel = get_post_meta($post->ID, 'model', true);
					$alsoPrice = get_post_meta($post->ID, 'price', true);
				?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 singlealsoLike mt20 mb10">
						<a href="<?= get_the_permalink(); ?>">
							<div class="thumb">
								<?php if(has_post_thumbnail()):
										the_post_thumbnail('medium');
									endif;
								?>
							</div>
						</a>
						<div class="title">
							<h5 class="text-normal text-center thin">
								<a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
							</h5>
						</div>
						<?php if(!empty($alsoModel)):  ?>
						<div class="model">
							<h5 class="text-center">Model: <?= $alsoModel; ?></h5>
						</div>
						<?php endif; ?>
						<?php if(!empty($alsoPrice)): ?>
						<div class="price">
							<h4 class="text-center color-orange">Tk. <?= number_format($alsoPrice, 2); ?></h4>
						</div>
						<?php endif; ?>
					</div>
				<?php endwhile; endif;
				?>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>