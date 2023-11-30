		<div class="lx-footer">
				<!-- Footer Bottom -->
				<div class="lx-footer-bottom ">
					<div class="lx-main-content" style="padding-top: 0px;">
					<ul class="list-unstyled">
						
						<?php
						$pages = $this->m_p->s_a("pages", array("footer" => 1), FALSE);

						foreach($pages as $page) :
						?>
				
						<li><a href="<?php echo base_url("page/$page->id") ?>"><?php echo $page->title; ?></a></li>
							
						<?php endforeach; ?>
					</ul>
					<div class="lx-footer-bottom-content">
						<div class="lx-copyright">
							<p>&copy; All rights reserved 2020 MAllMia <?php echo date("Y"); ?>.</p>
						</div>
						<div class="lx-clear-fix"></div>
					</div>
					</div>
				</div>
			</div>
		</div>

		<div style="height: 50px; margin-top: 10px; text-align: center;">
				
			<a href="https://www.facebook.com/" ><img src="logo/fb.png"  width="45px" alt=""></a>
			<a href="https://twitter.com/" ><img src="logo/t.png"  width="45px" alt=""></a>
			<a href="https://ig.com/"><img src="logo/ig.png"  width="45px" alt=""></a>

		</div>

		<div class="lx-popup">
			<div class="lx-popup-inside">
				<a href="javascript:;"><i class="material-icons lx-remove">close</i></a>
				<a href="javascript:;"><i class="material-icons lx-angle-left">keyboard_arrow_left</i></a>
				<a href="javascript:;"><i class="material-icons lx-angle-right">keyboard_arrow_right</i></a>
				<div class="lx-popup-content">
					<div class="lx-popup-image">
						<img src="#" alt="image title here" />
					</div>
				</div>
			</div>
		</div>

		
		<!-- JQuery -->
		<script src="assets/js/jquery-1.12.4.min.js"></script>
		<!-- Swipe Script -->
		<script src="assets/js/hammer.min.js"></script>

		<script src="assets/js/popup.js"></script>

		<script src="<?php echo base_url("home/js"); ?>"></script>

		<!-- Main Script -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>