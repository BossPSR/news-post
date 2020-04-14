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

			<?php if ($suss = $this->session->flashdata('save_ss2')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'ยืนยัน Email เรียบร้อยแล้ว.กรุณาตั้งค่ารหัสผ่านใหม่ของท่าน !!',
					showConfirmButton: true,
				});
			<?php endif; ?>
			<?php if ($error = $this->session->flashdata('del_ss2')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'ไม่พบ E-mail ที่ท่านกรอกมา กรุณาตรวจสอบใหม่ค่ะ!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($suss = $this->session->flashdata('responseA')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'ลงโฆษณา เรียบร้อยแล้ว!!',
					showConfirmButton: true,
				});
			<?php endif; ?>
			<?php if ($error = $this->session->flashdata('msgA')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'ล้มเหลวในการลงโฆษณา กรุณาลงใหม่อีกครั้ง!!',
					showConfirmButton: true,
				});
			<?php endif; ?>
		</script>
		<!-- Date & Time Picker JS -->
		<script src="public/assets/front-end/js/components/moment.js"></script>
		<script src="public/assets/front-end/js/components/datepicker.js"></script>
		<script src="public/assets/front-end/js/components/timepicker.js"></script>

		<!-- Include Date Range Picker -->
		<script src="public/assets/front-end/js/components/daterangepicker.js"></script>
		<!-- Bootstrap File Upload Plugin -->
		<script src="public/assets/front-end/js/components/bs-filestyle.js"></script>
		<script>
			$(document).ready(function() {
				$("#inputfile").fileinput({
					allowedFileExtensions: ['pdf'],
					previewClass: "bg-warning",
					browseClass: "btn btn-primary",
					removeClass: "btn btn-secondary",
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$("#inputfileIMG").fileinput({
					allowedFileExtensions: ["png", "jpg", "jpeg"],
					previewClass: "bg-warning",
					browseClass: "btn btn-primary",
					removeClass: "btn btn-secondary",
				});
			});
		</script>inputfileIMG
		<script>
			$(function() {
				$('.travel-date-group .default').datepicker({
					autoclose: true,
					startDate: "today",
				});

				$('.travel-date-group .today').datepicker({
					autoclose: true,
					startDate: "today",
					todayHighlight: true
				});

				$('.travel-date-group .past-enabled').datepicker({
					autoclose: true,
				});

				$('.travel-date-group .format').datepicker({
					autoclose: true,
					format: "dd-mm-yyyy",
				});

				$('.travel-date-group .autoclose').datepicker();

				$('.travel-date-group .disabled-week').datepicker({
					autoclose: true,
					daysOfWeekDisabled: "0"
				});

				$('.travel-date-group .highlighted-week').datepicker({
					autoclose: true,
					daysOfWeekHighlighted: "0"
				});

				$('.travel-date-group .mnth').datepicker({
					autoclose: true,
					minViewMode: 1,
					format: "mm/yy"
				});

				$('.travel-date-group .multidate').datepicker({
					multidate: true,
					multidateSeparator: " , "
				});

				$('.travel-date-group .input-daterange').datepicker({
					autoclose: true
				});

				$('.travel-date-group .inline-calendar').datepicker();

				$('.datetimepicker').datetimepicker({
					showClose: true
				});

				$('.datetimepicker1').datetimepicker({
					format: 'LT',
					showClose: true
				});

				$('.datetimepicker2').datetimepicker({
					inline: true,
					sideBySide: true
				});

				$('.datetimepicker3').datetimepicker();

			});

			$(function() {
				// .daterange1
				$(".daterange1").daterangepicker({
					"buttonClasses": "button button-rounded button-mini nomargin",
					"applyClass": "button-color",
					"cancelClass": "button-light"
				});

				// .daterange2
				$(".daterange2").daterangepicker({
					"opens": "center",
					timePicker: true,
					timePickerIncrement: 30,
					locale: {
						format: 'MM/DD/YYYY h:mm A'
					},
					"buttonClasses": "button button-rounded button-mini nomargin",
					"applyClass": "button-color",
					"cancelClass": "button-light"
				});

				// .daterange3
				$(".daterange3").daterangepicker({
						singleDatePicker: true,
						showDropdowns: true
					},
					function(start, end, label) {
						var years = moment().diff(start, 'years');
						alert("You are " + years + " years old.");
					});

				// reportrange
				function cb(start, end) {
					$(".reportrange span").html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				}
				cb(moment().subtract(29, 'days'), moment());

				$(".reportrange").daterangepicker({
					"buttonClasses": "button button-rounded button-mini nomargin",
					"applyClass": "button-color",
					"cancelClass": "button-light",
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					}
				}, cb);

				// .daterange4
				$(".daterange4").daterangepicker({
					autoUpdateInput: false,
					locale: {
						cancelLabel: 'Clear'
					},
					"buttonClasses": "button button-rounded button-mini nomargin",
					"applyClass": "button-color",
					"cancelClass": "button-light"
				});

				$(".daterange4").on('apply.daterangepicker', function(ev, picker) {
					$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
				});

				$(".daterange4").on('cancel.daterangepicker', function(ev, picker) {
					$(this).val('');
				});

			});
		</script>

		</body>

		</html>