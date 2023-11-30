<?php include_once 'header.php'; ?>

<style>
	.well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}
</style>
			<!-- Main -->
			<div class="lx-main">
				<!-- Main Content -->
				<?php foreach($page as $p) :  ?>
				<div class="lx-main-content">
					<div class="lx-bloc-title">
						<h3><?php echo $p->title; ?></h3>
					</div>
					<div class="lx-products-list lx-bloc-content">
						<div class="lx-products-items well">
							
							<?php echo $p->content; ?>

							<div class="lx-clear-fix"></div>
						</div>
					</div>
					<div class="lx-clear-fix"></div>
				</div>
			<?php endforeach; ?>
			</div>


<?php include_once 'footer.php'; ?>