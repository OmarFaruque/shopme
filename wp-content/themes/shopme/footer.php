<?php /* Footer shopme */ ?>
							</div>
						</div>
					</div>
				</section>
				<section class="footer top pt20 mt50">
					<div class="container">
						<div class="footerMenu center-block text-center">
							<?php
								if(has_nav_menu('footer_menu')){
									wp_nav_menu( array('theme_location' => 'footer_menu') );
								}
							?>
						</div>
						<div class="payment center-block">
							<?php if(!empty(ch_get_option('payment_gateway_logo'))): ?>
							<img class="center-block mt10 mb10" src="<?= ch_get_option('payment_gateway_logo'); ?>" alt="Shopme Payment System">
							<?php endif; ?>
						</div>
					</div>
				</section>
				<section class="footer bottom">
					<div class="container">
						<div class="footerotherBrand center-block">
							<?php $getBrand = ch_get_option('our_brand_(1)_image'); 
							if(!empty($getBrand)):
							?>
								<ul class="list-inline text-center">
									<?php for($obrand = 1; $obrand <= 4; $obrand++ ): ?>
										<li>
											<a href="<?= ch_get_option('our_brand_('.$obrand.')_url'); ?>">
												<img src="<?= ch_get_option('our_brand_('.$obrand.')_image'); ?>">
											</a>
										</li>
									<?php endfor; ?>
								</ul>
							<?php endif; ?>
						</div>
						<div class="footerCopyRight">
							<div class="text-center">
								<span><?= ch_get_option('footer_(copyright)'); ?></span>
							</div>
						</div>
					</div>
				</section>
				<?php wp_footer();?>
			</body>
		</html>