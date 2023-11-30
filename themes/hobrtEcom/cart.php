<?php include_once 'header.php'; ?>


			<!-- Main -->
			<div class="lx-main">
				<!-- Main Content -->
				<div class="lx-main-content">
					<form action="" method="post" id="sendcart">
						<div class="lx-g2">
							<div class="lx-cart-products-list">
								<?php if(count($info) > 0){ ?>
								<table cellpadding="0" cellspacing="0">
									<?php $tprice = 0;$ship = 0; foreach($info as $cart){ $pr = floor($cart->price - ($cart->price * $cart->discount / 100)); $tpr = isset($arr[$cart->id]['q']) ? $pr * $arr[$cart->id]['q'] : $pr; ?>
									<tr class="items">
										<td>
											<div class="lx-cart-products-list-img" data-id="93">
												<a href=""><img src="<?php echo base_url("uploads")."/".add_thumb($cart->images, "_m"); ?>" /></a>
											</div>
											<h3><a href="<?php echo base_url("home/show/$cart->id"); ?>"><?php echo $cart->title; ?></a></h3>

											<a href="javascript:;" data-id="<?php echo $cart->id; ?>" class="lx-delete-cookie"><?=lang("lang_h18");?></a>
										</td>
										<td class="lx-desktop lx-price-total"><strong><?php echo $tpr; ?><?=$currency;?></strong></td>

										<?php $tprice = $tprice + $tpr; $ship = $ship + $cart->shipping; ?>

									</tr>
									<?php } ?>
								</table>
								<p class="couponUse"></p>
								<p class="lx-shipping-costs"><?=lang("lang_h19");?> : <b  class="ship"><?php echo $ship; ?><?=$currency;?></b></p>
								<p class="lx-total-costs"><?=lang("lang_h20");?> : <strong class="totalprice"><?php echo $tprice; ?><?=$currency;?></strong></p>
								<input type="hidden" name="totalprice" id="value" value="427" />
								<?php }else { ?>

									<em><?=lang("lang_h29");?></em>

								<?php } ?>
							</div>
						</div>
						<div class="lx-g2">
							<div class="lx-cart-total">
								<div class="lx-cart-info-address">
									<h3><?=lang("lang_h21");?></h3>
									<label><span><?=lang("lang_h22");?> :</span><input type="text" name="fullname" placeholder="" /></label>
									<label><span><?=lang("lang_h23");?>:</span><input type="tel" name="phone" placeholder="" /></label>
									<label><span><?=lang("lang_h24");?>:</span><input type="text" name="address" placeholder="" /></label>						
									<label>
										<span><?=lang("lang_h25");?>:</span>
										<input type="text" name="city">
									</label>
									<label><span><?=lang("lang_h26");?>:</span><input type="text" name="coupon" placeholder="" id="coupon" /><a href="javascript:;" class="lx-applycoupon" data-activated="no"><?=lang("lang_h27");?></a></label>
									<p class="lx-coupon-warning"></p>
									<div class="lx-cart-next-step">
										<a href="javascript:;"><?=lang("lang_h28");?></a>
									</div>
									<div class="lx-clear-fix"></div>
								</div>
							</div>
						</div>
						<div class="lx-clear-fix"></div>
					</form>
				</div>
			</div>
			

<?php include_once 'footer.php'; ?>