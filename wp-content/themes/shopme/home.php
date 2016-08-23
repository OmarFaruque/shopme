<?php 
/*
* shopme home php file
*/
get_header();
 
										$topTaxs = get_terms('product-category', array( 'parent' => 0 ));
										$l_count = 0;								
										foreach($topTaxs as $s_tax):
											 
										echo ($l_count % 4 == 0 ) ? '<div class="s_box">':'';
										$thumbImage = get_tax_meta($s_tax->term_id,'ba_image_field_id');
										$imgAlt = get_post_meta($thumbImage['id'], '_wp_attachment_image_alt', true);
										$termChilds = get_term_children( $s_tax->term_id, 'product-category' );
										?>
											<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 singleItem mb30">
												<a href="<?= home_url('/product-category/' . $s_tax->slug . '/' ); ?>">
													<h4 class="text-center"><?= $s_tax->name; ?></h4>
													<div class="img">
														<img class="img-responsive center-block" src="<?= $thumbImage['url']; ?>" alt="<?= $imgAlt; ?>">
													</div>
												</a>
												<ul class="list-group custom-list-group mt10">
													<?php 
														for($i = 0; count($termChilds) > $i; $i++){
															$singleT = get_term_by('id', $termChilds[$i], 'product-category');
															if($singleT->count > 0){
													?>
															<li><a href="<?= home_url( '/product-category/' . $singleT->slug . '/' ); ?>"><?= $singleT->name; ?></a></li>
													<?php  } } ?>
													<li> <a href="<?= home_url( '/product-category/' . $s_tax->slug . '/' ); ?>">See all</a></li>
												</ul>
											</div>
											<?php echo ($l_count % 4 == 3 ) ? '</div>':'';  ?>
										<?php $l_count += 1; endforeach; ?>								
<?php get_footer(); ?>