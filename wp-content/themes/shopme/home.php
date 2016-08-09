<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes();?>>
	<![endif]-->
	<!--[if IE 8]>
	<html class="ie ie8" <?php language_attributes();?>>
		<![endif]-->
		<!--[if !(IE 7) & !(IE 8)]><!-->
		<html <?php language_attributes();?>>
			<head>
				<meta charset="<?php bloginfo('charset');?>">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
				
				
				<title><?php
				/*
				* Print the <title> tag based on what is being viewed.
				*/
				global $page, $paged;
					if(!is_page_template('templateHomeProduct.php')):
					wp_title( '|', true, 'right' );
				endif;
				//wp_title ( string $sep = '&raquo;', bool $display = true, string $seplocation = '' );
				//wp_title('<!--blah-->');
				// Add the blog name.
				bloginfo( 'name' );
				// Add the blog description for the home/front page.
				$site_description = get_bloginfo( 'description' );
				if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
				// Add a page number if necessary:
				
				if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );
				?></title>
				<?php $ch_data = new ch_option; ?>
				<link rel="shortcut icon" type="image/png" href="<?= $ch_data->ch_get_option('favicon'); ?>"/>
				
				<?php wp_head();?>
				<?= dynamic_css(); ?>
			</head>
			<body>
				<section class="head">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="pull-left col-xs-push-0">
									<div class="toptabs mt25px">
										<?php
										for($i=1; $i <= 3; $i++){ ?>
										<div class="single_tab_item" style="background:url('<?= $ch_data->ch_get_option('top_tabs_(item_'.$i.')_image'); ?>')">
											<a href="<?= $ch_data->ch_get_option('top_tabs_(item_'.$i.')_url'); ?>"></a>
										</div>
										<?php }
										?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="pull-right col-xs-push-0">
									<div class="hotline">
										
										
										<span><h3><span class="glyphicon glyphicon-phone"></span><b>   <?= $ch_data->ch_get_option('hot_line'); ?></b></h3></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="headerMiddle">
					<div class="container mt25px">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="logo">
									<img src="<?= $ch_data->ch_get_option('logo'); ?>" alt="">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="shipping_ad pull-right ">
									<a href="<?= $ch_data->ch_get_option('top_banner_url'); ?>">
										<img src="<?= $ch_data->ch_get_option('top_banner_image'); ?>" alt="">
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="top_menu dynamicMenu">
					<div class="container">
						<nav class="menu">
							<?php
								if(has_nav_menu('top_menu')){
									wp_nav_menu( 'top_menu');
								}
							?>
						</nav>
					</div>
				</section>
				<section class="search">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pdr0">
								<div class="searchform">
									<?php get_search_form( $echo = true ); ?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 topinnershadow pdl0">
								<div class="save">
									        <h4 class="text-center text-danger">Save, Save, Save</h4>
								</div>	
							</div>
						</div>
					</div>
				</section>
				<section class="banner">
					<div class="container">
						<div class="banner_img mt30">
							<img class="img-responsive" src="<?= $ch_data->ch_get_option('home_top_banner_image'); ?>" alt="Home Banner">
						</div>
					</div>
				</section>
				<section class="main_body">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
								
							</div>
							<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
								
									<?php 
										$topTaxs = get_terms('product-category', array( 'parent' => 0 ));
										$l_count = 0;								
										foreach($topTaxs as $s_tax):
											 
										echo ($l_count % 4 == 0 ) ? '<div class="s_box">':'';
										$thumbImage = get_tax_meta($s_tax->term_id,'ba_image_field_id');
										$imgAlt = get_post_meta($thumbImage['id'], '_wp_attachment_image_alt', true);
										$termChilds = get_term_children( $s_tax->term_id, 'product-category' );
										?>
											<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 singleItem">
												<h4 class="text-center"><?= $s_tax->name; ?></h4>
												<img class="img-responsive center-block" src="<?= $thumbImage['url']; ?>" alt="<?= $imgAlt; ?>">
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
											<?php echo ($l_count % 4 == 3 ) ? '</div>':''; ?>
										<?php $l_count += 1; endforeach; ?>
								
							</div>
						</div>
					</div>
				</section>

				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5392e56256f58ac5"></script>
				<?php wp_footer();?>
			</body>
		</html>