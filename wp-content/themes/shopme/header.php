<?php 
/*
* shopme header 
*/
?>
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
				<link rel="shortcut icon" type="image/png" href="<?= ch_get_option('favicon'); ?>"/>
				
				<?php wp_head();?>
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
										<div class="single_tab_item" style="background:url('<?= ch_get_option('top_tabs_(item_'.$i.')_image'); ?>')">
											<a href="<?= ch_get_option('top_tabs_(item_'.$i.')_url'); ?>"></a>
										</div>
										<?php }
										?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="pull-right col-xs-push-0">
									<div class="hotline">
										
										
										<span><h3><span class="glyphicon glyphicon-phone"></span><b>   <?= ch_get_option('hot_line'); ?></b></h3></span>
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
									<a href="<?= home_url('/'); ?>">
										<img src="<?= ch_get_option('logo'); ?>" alt="">
									</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="shipping_ad pull-right ">
									<a href="<?= ch_get_option('top_banner_url'); ?>">
										<img src="<?= ch_get_option('top_banner_image'); ?>" alt="">
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
									wp_nav_menu( array('theme_location' => 'top_menu') );
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
				<?php if(is_home()): ?>
				<section class="banner">
					<div class="container">
						<div class="banner_img mt30">
							<img class="img-responsive" src="<?= ch_get_option('home_top_banner_image'); ?>" alt="Home Banner">
						</div>
					</div>
				</section>
				<?php endif; ?>
				<section class="main_body mt30">
					<div class="container">
						<div class="row">
							<?php if(!is_singular('product')): ?>
							<aside class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar">
								<?php if(is_dynamic_sidebar('main_sidebar')){ ?>
                                    <ul class="list-inline">
                                        <?php dynamic_sidebar( 'main_sidebar' ); ?>
                                    </ul>
                                <?php } ?>
							</aside>
							<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
							<?php else: ?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php endif; ?>
							<?php if(!(is_home() || is_singular( 'product' ) ) ): ?>
							<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
							    <?php if(function_exists('bcn_display'))
							    {
							        bcn_display();
							    }?>
							</div>
							<?php endif; ?>