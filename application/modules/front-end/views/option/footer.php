		<!-- Footer
		============================================= -->
		<footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">

			<div class="container clearfix">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_one_fourth">
						<div class="widget clearfix">
							<div class="t400 lowercase nobottommargin" style="font-size: 36px; letter-spacing: -1px">Canvas</div>
							<p class="text-muted t300">@2017</p>

							<div class="app-links">
								<p>Get the app</p>
								<a href="#" class="link"><i class="icon-android2"></i> <span>Download for Android</span></a><br>
								<a href="#" class="link"><i class="icon-apple"></i> <span>Download for IOS</span></a><br>

							</div>
						</div>
					</div>

					<div class="col_one_fourth">
						<div class="widget widget_links clearfix">
							<h4>Blogroll</h4>
							<ul>
								<li><a href="#">Documentation</a></li>
								<li><a href="#">Feedback</a></li>
								<li><a href="#">Plugins</a></li>
								<li><a href="#">Support Forums</a></li>
								<li><a href="#">Themes</a></li>
							</ul>
						</div>
					</div>

					<div class="col_one_fourth">
						<div class="widget widget_links clearfix">
							<h4>Links</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">FAQs</a></li>
								<li><a href="#">Licence</a></li>
								<li><a href="#">Forums</a></li>
								<li><a href="#">Terms</a></li>
							</ul>
						</div>
					</div>

					<div class="col_one_fourth col_last">
						<div class="widget widget-twitter-feed clearfix">
							<h4>Twitter Feed</h4>
							<ul class="iconlist twitter-feed nobottommargin" data-username="envato" data-count="2">
								<li></li>
							</ul>
						</div>
					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<div class="line nomargin"></div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights" class="" style="background-color: #FFF">

				<div class="container clearfix">

					<div class="col_full center nomargin">
						<span>Copyrights &copy; 2017 All Rights Reserved by Canvas Inc.</span>
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

		</div><!-- #wrapper end -->

		<!-- Go To Top
	============================================= -->
		<div id="gotoTop" class="icon-angle-up"></div>

		<!-- External JavaScripts
	============================================= -->

		<script src="public/assets/front-end/js/plugins.js"></script>

		<!-- Footer Scripts
	============================================= -->
		<script src="public/assets/front-end/js/functions.js"></script>
		<script type="text/javascript">
			<?php if ($this->session->flashdata('success_login')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'Wellcome',
					showConfirmButton: false,
					timer: 1500
				});
			<?php endif; ?>
			<?php if ($this->session->flashdata('fail_login')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'รหัสผ่านไม่ถูกต้อง',
					showConfirmButton: true,
				});
			<?php endif; ?>
			<?php if ($this->session->flashdata('success_register')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'สมัครสมาชิกสำเร็จ',
					showConfirmButton: false,
					timer: 2500
				});
			<?php endif; ?>
			<?php if ($this->session->flashdata('fail_register')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'กรุณาออกจากระบบก่อนที่จะสมัครสมาชิก !!',
					showConfirmButton: true,
				});
			<?php endif; ?>
		</script>

		</body>

		</html>