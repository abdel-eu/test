<?php include_once 'header.php'; ?>

<script>
	if(typeof fbq !== 'undefined')
		fbq('track', 'ViewContent');

</script>

			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="assets/css/<?=lang("lang_h40");?>/hobrt.css">
			<!-- Main -->
			<div class="lx-main">
				<!-- Main Content -->
				<div class="lx-main-content">
					<?php if(isset($msg)){ ?>
					<div class="t11">
						<?php echo $msg; ?>
					</div>
					<?php } ?>


					<?php foreach($info as $p) : ?>


					<div class="lx-g2 text-center-mobile" style="float: right;">
						<div class="lx-product-details" style="margin: 0; padding: 0;">
							<h1> <?php echo $p->title; ?></h1>
							<?php if($p->discount > 0) { ?> <p class="lx-product-disaccount"><span><?=lang("lang_h5");?>:</span> <?php echo $p->discount; ?>% </p> <?php } ?>

						</div>
					</div>

					<div class="lx-g2" style="float: left;">
						<div class="lx-product-images">
							<div class="lx-product-main-img">
								<img src="<?php echo base_url("uploads")."/".add_thumb($p->images , "") ?>" data-nb="0" />
							</div>
							<ul>
								<?php

								$images = explode(",", $p->images);

								foreach($images as $img) {
								?>
								<li><img src="<?php echo base_url("uploads")."/".add_thumb($img , "_m") ?>" /></li>
								<?php } ?>
								<div class="lx-clear-fix"></div>
							</ul>
						</div>
					</div>
					<div class="lx-g2" style="float: right;">
						<div class="lx-product-details">
							<div class="text-center-mobile">
								<?php if($p->discount > 0) { ?>
									<input type="hidden" value="<?php echo floor($p->price - ($p->price * $p->discount / 100)); ?>" id="value">
									<p class="lx-product-price"><span><?php echo $p->price; ?><?=$currency;?></span> <?php echo floor($p->price - ($p->price * $p->discount / 100)); ?><?=$currency;?></p>
								<?php }else{ ?>
									<p class="lx-product-price"><?php echo $p->price; ?><?=$currency;?></p>
									<input type="hidden" value="<?php echo $p->price; ?><?=$currency;?>" id="value">
								<?php } ?>

							</div>

							<form method="post" action="<?php echo base_url("cart"); ?>" id="sendcart">

								<div class="">
									<div class="lx-cart-total" style="margin-bottom: 0;">
										<div class="lx-cart-info-address">
											<h3 style="color: red;"><?=lang("lang_h21");?></h3>
											<label><span><?=lang("lang_h22");?> :</span><input type="text" name="fullname" placeholder="" /></label>
											<label><span><?=lang("lang_h23");?>:</span><input type="tel" name="phone" placeholder="" /></label>
											<label><span><?=lang("lang_h24");?>:</span><input type="text" name="address" placeholder="" /></label>			
											<label>
												<span><?=lang("lang_h25");?>:</span>
												<input type="text" name="city">
											</label>
											<div class="lx-clear-fix"></div>
										</div>
									</div>
								</div>

							</form>


							<form id="productInfo" >
							
								<input type="hidden" name="id" value="<?php echo $p->id; ?>">
								<div class="lx-product-qty">
									<ins><?=lang("lang_h7");?>: </ins>
									<span class="lx-minus">-</span>
									<input type="text" id="qty" name="qty" data-max="1000" value="1" />
									<span class="lx-plus">+</span>
								</div>


								<?php

								$variants = json_decode($p->variants, TRUE);

								if(count($variants) > 0){

								?>
								
								<?php foreach ($variants as $key => $value) { ?>

								<div class="abgne-menu-20140101-1">
									<span><b><?php echo $value['tp']; ?> : </b></span>

									<?php

									$opt = explode(",", $value['info']);

									foreach($opt as $i => $k) : 
									?>

									<input type="radio" id="for_<?=$key;?>_<?=$i;?>" name="option[<?php echo bin2hex(base64_encode($value['tp'])); ?>]" value="<?php echo $k; ?>">
									<label for="for_<?=$key;?>_<?=$i;?>"><?php echo $k; ?></label>

									<?php endforeach; ?>

								</div>
								<br>



								<?php } ?>
								

								<div class="clear"></div>

								<?php } ?>

							</form>

							<div class="lx-purchase-btns">
								<a href="javascript:;" class="lx-add-to-cart" data-id="<?php echo $p->id; ?>"><?=lang("lang_h8");?></a>
							</div>

							<div class="lx-purchase-btns-floating">
								<div class="lx-product-qty" style="display: inline-block;margin-bottom: 0;">
									<span class="lx-minus">-</span>
									<input type="text" id="qtyt" name="qty" data-max="1000" value="1" />
									<span class="lx-plus">+</span>
								</div>
								<a data-id="<?php echo $p->id; ?>"><?=lang("lang_h51");?></a>
							</div>

							<div >
								<?php $teles = explode(";", setting("whs")); ?>
								<a href="https://wa.me/212<?php echo isset($teles[0]) ? $teles[0] : "0"; ?>?text=<?php echo lang("lang_h42"); ?> <?php echo base_url("show/$p->id"); ?>.html" data-action="share/whatsapp/share" class="lx-whatsapp" style="width: 100%;
    height: 50px;
    margin-top: 20px;
    text-align: center;
    display: block;
    background: #7ec855;
    line-height: 50px;
    font-weight: bold;
    color: white;"><i class="fab fa-whatsapp"></i> <?php echo lang("lang_h41"); ?> .</a>
								
							</div>
							<p class="lx-watching"><abbr><?php echo rand(100, 200); ?></abbr> <?=lang("lang_h6");?></p>
							
								<br>
							<div>

								<style type="text/css">
									
									iframe {
										width: 100%;
										height: 300px;
									}

								</style>

								<?php echo $p->descr; ?>

							</div>
							<div class="lx-share">
								<ul>
									<li><a href="https://www.facebook.com/sharer/sharer.php?u=" class="popup lx-facebook"><i class="fab fa-facebook-square"></i> Facebook</a></li>
									<li><a href="https://twitter.com/intent/tweet?url=" class="popup lx-twitter"><i class="fab fa-twitter"></i> Twitter</a></li>
									<li><a href="https://plus.google.com/share?url=" class="popup lx-google-plus"><i class="fab fa-google-plus"></i> Google+</a></li>
									<li><a href="whatsapp://send?text=" data-action="share/whatsapp/share" class="popup lx-whatsapp"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
									<div class="lx-clear-fix"></div>
								</ul>
							</div>
						</div>
					</div>

					<?php endforeach; ?>

					<div class="lx-clear-fix"></div>

					<div class="lx-bloc-title">

						<a href="#" data-izimodal-open="#modal-custom" data-izimodal-transitionin="fadeInDown" class="add_more"><?=lang("lang_h9");?></a>

						<div class="grid">
							
							<?php foreach($votes as $vote) : ?>
								<div class="grid-item">

									<article class="card">
										<figure class="card__thumbnail">
											<?php if(!empty($vote->img)){ ?> <img src="reviews/<?php echo $vote->img; ?>"> <?php } ?>
										</figure>
										<header class="card__title">
											<h4><?php echo $vote->name; ?></h4>
										</header>
										<main class="card__description">

											<small>12/05/2019</small>

											<fieldset class="rating">
												<input type="radio" id="star5<?=$vote->id;?>" disabled value="5" <?php if($vote->vote == 5) echo "checked"; ?> /><label class = "full" for="star5<?=$vote->id;?>"></label>
												<input type="radio" id="star4<?=$vote->id;?>" disabled value="4" <?php if($vote->vote == 4) echo "checked"; ?> /><label class = "full" for="star4<?=$vote->id;?>"></label>
												<input type="radio" id="star3<?=$vote->id;?>" disabled value="3" <?php if($vote->vote == 3) echo "checked"; ?> /><label class = "full" for="star3<?=$vote->id;?>"></label>
												<input type="radio" id="star2<?=$vote->id;?>" disabled value="2" <?php if($vote->vote == 2) echo "checked"; ?> /><label class = "full" for="star2<?=$vote->id;?>"></label>
												<input type="radio" id="star1<?=$vote->id;?>" disabled value="1" <?php if($vote->vote == 1) echo "checked"; ?> /><label class = "full" for="star1<?=$vote->id;?>"></label>
											</fieldset>

											<p><?php echo $vote->comment; ?></p>
										</main>
										<?php if(is_login("admin_login")){ ?>
										<footer class="container">
											<a class="btn red" onclick="delete_c(this, '<?=$vote->id;?>');"><i class="fa fa-remove"></i></a>
											<?php if($vote->ac == 0){ ?>
												<a class="btn green" onclick="approve_c(this, '<?=$vote->id;?>');"><i class="fa fa-check"></i></a>
											<?php } ?>

										</footer>
										<?php } ?>

									</article>

								</div>


							<?php endforeach; ?>

						</div>

						<div style="clear: both;"></div>

					</div>

					<div class="lx-bloc-title">
						<h3><?=lang("lang_h10");?></h3>
					</div>
					<div class="lx-products-list lx-bloc-content">

						<?php foreach($related as $key){ ?>

						<div class="lx-g4 lx-g5-to-g2">
							<div class="lx-products-item">
								<a href="<?php echo base_url("home/show/$key->id"); ?>">
									<div class="lx-products-item-img">
										<?php if($key->discount != 0){ ?>
										<span><?php echo $key->discount; ?>%<br />OFF</span>
										<?php } ?>
										<img src="uploads/<?php echo add_thumb($key->images , "_m") ?>" />
									</div>
									<div class="lx-products-item-detail">
										<h2><?php echo $key->title; ?> </h2>
										<p>
											<ins>
											<?php if($key->discount != 0){ ?>
											<span><?php echo $key->price; ?><?=$currency;?></span> <?php echo floor($key->price - ($key->price * $key->discount / 100)); ?><?=$currency;?>
											<?php }else{ ?>
												<?php echo $key->price; ?><?=$currency;?>
											<?php } ?>

											</ins>
										</p>
									</div>
								</a>
							</div>
						</div>
						<?php } ?>
						<div class="lx-clear-fix"></div>
					</div>
					<div class="lx-clear-fix"></div>
				</div>
			</div>

			<div id="modal-custom">
				
				<button data-izimodal-close="" class="icon-close" style="">x</button>

				<?php echo form_open_multipart(); ?>
					<section>
						<input type="" name="name" placeholder="<?=lang("lang_h11");?>" required>
						<label><?=lang("lang_h12");?> : </label>
						<input type="file" name="img" placeholder="Image" accept="image/jpeg,image/png">
						<textarea placeholder="<?=lang("lang_h13");?>" name="comment"></textarea>
						<label class="vote"><?=lang("lang_h14");?> : </label>
						<fieldset class="rating">
							<input type="radio" id="star5" name="starv" value="5" required /><label class = "full" for="star5" title="<?=lang("lang_h35");?>"></label>
							<input type="radio" id="star4" name="starv" value="4" required /><label class = "full" for="star4" title="<?=lang("lang_h36");?>"></label>
							<input type="radio" id="star3" name="starv" value="3" required /><label class = "full" for="star3" title="<?=lang("lang_h37");?>"></label>
							<input type="radio" id="star2" name="starv" value="2" required /><label class = "full" for="star2" title="<?=lang("lang_h38");?>"></label>
							<input type="radio" id="star1" name="starv" value="1" required /><label class = "full" for="star1" title="<?=lang("lang_h39");?>"></label>
						</fieldset>
						<br>

						<footer>
							<button data-izimodal-close="" data-izimodal-transitionout="bounceOutDown"><?=lang("lang_h16");?></button>
							<button class="submit" ><?=lang("lang_h15");?></button>
						</footer>

					</section>

				<?php echo form_close(); ?>

			</div>

			<div id="upSales">
				
				<button data-izimodal-close="" class="icon-close" style="">x</button>

					<section>
						<div class="lx-products-list lx-bloc-content">

							<?php foreach($related as $key){ ?>

							<div class="lx-g2">
								<div class="lx-products-item">
									<a>
										<div class="lx-products-item-img">
											<img src="uploads/<?php echo add_thumb($key->images , "_m") ?>" />
										</div>
										<div class="lx-products-item-detail">
											<h6 style="font-size: 20px;color: #444;"><?php echo $key->title; ?> </h6>
											<p>
												<ins>
												<?php if($key->discount != 0){ ?>
												<?php echo floor($key->price - ($key->price * $key->discount / 100)); ?>DH
												<?php }else{ ?>
													<?php echo $key->price; ?>DH
												<?php } ?>

												</ins>
											</p>
										</div>
									</a>

									<footer>
										<button class="add_ToCart" data-id="<?php echo $key->id; ?>"><?php echo lang("lang_h48"); ?></button>
									</footer>

									

								</div>
							</div>
							<?php } ?>
							<div class="lx-clear-fix"></div>
						</div>
									<footer>
										<button data-izimodal-close="" style="background: #7EC855;" ><?php echo lang("lang_h49"); ?></button>
									</footer>
					</section>
			</div>


<?php include_once 'footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

<script type="text/javascript">

function approve_c(hada, id) {
	hadaj = $(hada);
	$.post(base_url + "/admin/approve_comment", {id : id}, function(data) {
		if(data == 1)
		{
			hadaj.remove();
		}
	})
}

function delete_c(hada, id) {
	hadaj = $(hada);
	$.post(base_url + "/admin/delete_comment", {id : id}, function(data) {
		if(data == 1)
		{
			hadaj.parent().parent().parent().remove();
			$('.grid').masonry({
			  // options
			  itemSelector: '.grid-item',
			});
		}
	})
}

$(document).ready(function() {
	var _originalSize = $(window).width() + $(window).height()
	$(window).resize(function() {
		if ($(window).width() + $(window).height() != _originalSize) {
			$(".lx-purchase-btns-floating").hide();
		} else {
			$(".lx-purchase-btns-floating").show();
		}
	});
});



$("#modal-custom").iziModal();

$("#upSales").iziModal({
	onClosed: function(){
		$("#sendcart").submit();
	}
});


$('.grid').masonry({
  // options
  itemSelector: '.grid-item',
});

</script>