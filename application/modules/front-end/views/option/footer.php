		<!-- Footer
		============================================= -->
		<footer id="footer" class="topmargin noborder" style="background-color: #1c85e8;">

			<div class="container clearfix">

				<!-- Footer Widgets ============================================= -->
				<div class="footer-widgets-wrap clearfix">
					<div class="row">
						<div class="col-12 text-center" style="font-size:17px;color:#fff;">
							<p><i class="icon-map-marker1"></i> บริษัท วัน ศิริ แอคเคาน์ติ้ง แอนด์ แทกซ์ จำกัด 445 ถนนวิภาวดีรังสิต แขวงจอมพล เขตจตุจักร กรุงเทพมหานครฯ 10900<br></p>
							<p><i class="icon-phone3"></i> 098-281-1599 <i class="icon-email"></i> nlohapitak@gmail.com<br></p>
							<p>&copy; Onesiri Accounting And Tax Co.,Ltd. All Right Reserved.</p>
						</div>
					</div>
				</div>
				<!-- .footer-widgets-wrap end -->

			</div>

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
			<?php if ($this->session->flashdata('success_profile')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'สำเร็จ',
					showConfirmButton: false,
					timer: 1500
				});
			<?php endif; ?>
			<?php if ($this->session->flashdata('fail_profile')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'เกิดข้อผิดพลาด',
					showConfirmButton: true,
				});
			<?php endif; ?>
			<?php if ($this->session->flashdata('success_login')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'Welcome',
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
					title: 'ลงโฆษณาตาม template เรียบร้อยแล้ว!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($error = $this->session->flashdata('msgA')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'ล้มเหลวในการลงโฆษณาตาม template กรุณาลงใหม่อีกครั้ง!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($error = $this->session->flashdata('msgB')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'warning',
					title: 'กรุณากรอกข้อมูลให้ครบ !!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($suss = $this->session->flashdata('responsepdf')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'ลงโฆษณา เรียบร้อยแล้ว!!',
					showConfirmButton: true,
				});
			<?php endif; ?>
			<?php if ($error = $this->session->flashdata('msgpdf')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'ล้มเหลวในการลงโฆษณา กรุณาลงใหม่อีกครั้ง!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($suss = $this->session->flashdata('check_login')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'ท่านยังไม่เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อนนะค่ะ!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($suss = $this->session->flashdata('point_user')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'เครดิตของท่านไม่เพียงพอ กรุณาเติมเครดิตด้วยค่ะ!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($this->session->flashdata('response_contact')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'การส่งข้อความเรียบร้อยแล้ว',
					showConfirmButton: false,
					timer: 1500
				});
			<?php endif; ?>
			<?php if ($this->session->flashdata('msg_contact')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'ล้มเหลวในการส่งข้อความ กรุณาลองใหม่อีกครั้ง!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($suss = $this->session->flashdata('responseG')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'บันทึกออเดอร์เครดิตของคุณเรียบร้อยแล้ว กรุณาตราขสอบที่ประวัติการเติมเครดิตของตุณ!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($error = $this->session->flashdata('msgG')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'การเติมเครดิตของคุณล้มเหลว กรุณาลองใหม่อีกครั้ง!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($suss = $this->session->flashdata('responseH')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'success',
					title: 'แจ้งการชำระเงินเรียบร้อย กรุณารอ Admin อนุมัติภายใน 24 ชั่วโมง!!',
					showConfirmButton: true,
				});
			<?php endif; ?>

			<?php if ($error = $this->session->flashdata('msgH')) : ?>
				Swal.fire({
					position: 'start-end',
					icon: 'error',
					title: 'ล้มเหลวการแจ้งชำระเงิน กรุณาลองใหม่อีกครั้ง!!',
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

		<script src="public/assets/front-end/ckeditor/ckeditor.js"></script>
		<script>
			CKEDITOR.replace('editor1', {
				language: 'fr',
			});
		</script>
		<script>
			$(document).ready(function() {
				$("#inputfile").fileinput({
					allowedFileExtensions: ['pdf'],
					previewClass: "bg-warning",
					browseClass: "btn btn-primary",
					removeClass: "btn btn-secondary",
					showUpload: false
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$(".inputfileIMG").fileinput({
					allowedFileExtensions: ["png", "jpg", "jpeg"],
					previewClass: "bg",
					browseClass: "btn btn-primary",
					removeClass: "btn btn-secondary",
					showUpload: false
				});
			});
		</script>
		
		<script>
			$(function() {
				$('.travel-date-group .default').datepicker({
					autoclose: true,
					endDate: "yesterday",
					format: "dd/mm/yyyy",
				});

				$('.travel-date-group .today').datepicker({
					autoclose: true,
					startDate: "today",
					format: "dd/mm/yyyy",
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
		<!-- 
		<script type="text/javascript">
			$("#uploadFile").change(function() {
				$('#image_preview').html("");
				var total_file = document.getElementById("uploadFile").files.length;


				for (var i = 0; i < total_file; i++) {
					$('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' style='margin-bottom: 10px;'>");
				}


			});

		</script> -->

		</body>

		</html>