<!-- Content ============================================= -->
<section id="content">

	<div class="content-wrap clearfix">

		<div class="container">

			<div class="row">
				<div class="col-12 mb-3">
					<div class="feature-box fbox-small fbox-center fbox-plain fbox-large nobottomborder">
						<!-- <div class="fbox-icon">
							<i class="icon-line2-home"></i>
						</div>
						<h3 class="ls0 t400 nott" style="font-size: 20px;">บริษัท แอค แทกซ์ นิวส์ จำกัด</h3>
						<p style="font-size: 16px;">
							วิธีลงโฆษณา

							ขั้นตอนใช้งาน

							1. ลงทะเบียนและสมัครสมาชิกด้วย E-mail
							2. เข้าสู่ระบบจากเมนูด้านบนขวามือ หลังจากนั้นเลือกเติมเครดิต

							3. ชำระเงิน โดยเลือกช่องทางที่ท่านสะดวก หลังจากท่านชำระเงินแล้ว ระบบจะเติมเครดิตให้ท่านอัตโนมัติ
							4. สามารถลงโฆษณาได้ 3 วิธี
							4.1 ลงประกาศโฆษณาตาม template สำเร็จรูป หรือ กรอกข้อมูลเอง ลงโฆษณาได้ทีละ 1 กรอบ
							4.2 ลงประกาศโฆษณาด้วยรูปภาพ JPG, JPEG, PNG หรือไฟล์ PDF ลงโฆษณาได้ทีละหลายกรอบพร้อมกัน
							4.3 ลงประกาศโฆษณาเชิญประชุมผู้ถือหุ้นประจำปี (ปิดงบประจำปี) ลงโฆษณาได้หลายกรอบพร้อมกัน

							โดย download excel และกรอกข้อมูลลงตามที่กำหนดไว้
							5. ทุก 24.00 น. ระบบจะรวบรวมโฆษณาที่ผ่านการอนุมัติแล้วเพื่อผลิตเป็นหนังสือพิมพ์ สามารถดาวน์โหลดได้ในวันถัดไป
						</p> -->

						<div class="card">
							<div class="card-header text-left" style="color:#000;">ลงโฆษณา</div>
							<div class="card-body ">
								<a href="#" class="button button-desc text-center" id="btTEM">
									<div style="font-size:16px;">วิธีที่ 1 ลงตาม template</div>
									<span>ลงได้ครั้งละ 1 กรอบ</span>
									<span>( จำกัดจำนวน )</span>
								</a>
								<a href="#" class="button button-desc text-center" id="btPDF">
									<div style="font-size:16px;">วิธีที่ 2 ลงด้วยรูปภาพและ PDF</div>
									<span>ลงได้หลายกรอบพร้อมกัน</span>
									<span>( ไม่จำกัดจำนวน )</span>
								</a>

								<div class="row" style="margin-top:20px;display:none" id="myTEM">
									<div class="col-1"></div>
									<div class="col-10" style="margin: auto;">
										<form action="insert_ads" method="post">
											<div class="form-group" style="text-align: left;font-size:16px;">
												<b>เลือกหัวข้อ / เรื่อง</b>
												<select class="form-control" name="topic" style="margin: 10px 0px 10px 0px;" id="op_title">
													<option value="" selected disabled>** สามัญ **</option>
													<option value="เชิญประชุมปิดงบประมาณ">เชิญประชุมปิดงบประมาณ</option>
													<option value="กำหนดรายละเอียดการประชุมเอง">กำหนดรายละเอียดการประชุมเอง</option>
													<option selected disabled>** วิสามัญ **</option>
													<option value="เชิญประชุมย้ายที่อยู่">เชิญประชุมย้ายที่อยู่</option>
													<option value="เชิญประชุมลดทุน">เชิญประชุมลดทุน</option>
													<option value="เชิญประชุมเปลี่ยนกรรมการ">เชิญประชุมเปลี่ยนกรรมการ</option>
													<option value="เชิญประชุมเปลี่ยนชื่อบริษัท">เชิญประชุมเปลี่ยนชื่อบริษัท</option>
													<option value="เชิญประชุมเพิ่มทุน">เชิญประชุมเพิ่มทุน</option>
													<option value="เชิญประชุมเพิ่มวัตถุประสงค์">เชิญประชุมเพิ่มวัตถุประสงค์</option>
													<option value="เชิญประชุมเลิกบริษัท">เชิญประชุมเลิกบริษัท</option>
													<option value="เชิญประชุมเสร็จชำระบัญชี">เชิญประชุมเสร็จชำระบัญชี</option>
													<option value="เชิญประชุมแก้ไขเพิ่มเติมตราบริษัท">เชิญประชุมแก้ไขเพิ่มเติมตราบริษัท</option>
													<option value="เชิญประชุมอนุมัติงานปันผล">เชิญประชุมอนุมัติงานปันผล</option>
													<option value="เชิญประชุมแก้ไขข้อบังคับ">เชิญประชุมแก้ไขข้อบังคับ</option>
													<option value="เชิญประชุมควบรวมบริษัท">เชิญประชุมควบรวมบริษัท</option>
													<option value="ประกาศเลิกบริษัท">ประกาศเลิกบริษัท</option>
													<option value="ประกาศจ่ายเงินปันผล">ประกาศจ่ายเงินปันผล</option>
													<option value="กำหนดรายละเอียดการประชุมเอง">กำหนดรายละเอียดการประชุมเอง</option>
												</select>
											</div>
											<div id="texA">
												<?php include('option/texA.php'); ?>
											</div>
											<div id="texB">
												<?php include('option/texB.php'); ?>
											</div>
											<div id="texC">
												<?php include('option/texC.php'); ?>
											</div>
											<div class="text-left">
												<button type="button" class="btn btn-info">ดูตัวอย่างโฆษณา</button>
												<button type="submit" class="btn btn-success">ลงโฆษณา</button>
											</div>
										</form>
									</div>
									<div class="col-1"></div>
								</div>

								<div class="row" style="margin-top:20px;display:none" id="myPDF">
									<div class="col-1"></div>
									<div class="col-10" style="margin: auto;">
										<form action="">
											<div class="form-group" style="text-align: left;font-size:16px;">
												<b>เลือกหัวข้อ / เรื่อง</b>
												<select class="form-control" style="margin: 10px 0px 10px 0px;" id="op_title_PDF">
													<option value="" selected disabled>** กรุณาเลือก **</option>
													<option value="แบบไฟล์PDF">แบบไฟล์ PDF (ขนาดไฟล์เท่ากับ A4 เท่านั้น)</option>
													<option value="แนบรูปภาพ">แนบรูปภาพ (ขนาดไฟล์เท่ากับ A4 เท่านั้น)</option>
												</select>
											</div>
											<div id="pdfA">
												<?php include('option/pdfA.php'); ?>
											</div>
											<div id="pdfB">
												<?php include('option/pdfB.php'); ?>
											</div>

											<div class="text-left">
												<button type="submit" class="btn btn-success">ลงโฆษณา</button>
											</div>
										</form>
									</div>
									<div class="col-1"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>



	</div>

</section><!-- #content end -->

<script type="text/javascript">
	$('#btTEM').click(function() {
		$('#myTEM').css('display', 'block');
		$('#texA').css('display', 'none');
		$('#texB').css('display', 'none');
		$('#texC').css('display', 'none');
		$('#pdfA').css('display', 'none');
		$('#pdfB').css('display', 'none');
		$('#myPDF').css('display', 'none');

		$('#op_title').change(function() {
			if (this.value == "ประกาศเลิกบริษัท") {
				$('#texA').css('display', 'none');
				$('#texB').css('display', 'block');
				$('#texC').css('display', 'none');
			} else if (this.value == "ประกาศจ่ายเงินปันผล") {
				$('#texA').css('display', 'none');
				$('#texB').css('display', 'none');
				$('#texC').css('display', 'block');
			} else {
				$('#texA').css('display', 'block');
				$('#texB').css('display', 'none');
				$('#texC').css('display', 'none');
			}
		});
	});
	// $('.ee').css('display', 'none');
	// $('.gg').css('display', 'flex');
</script>

<script type="text/javascript">
	$('#btPDF').click(function() {
		$('#myPDF').css('display', 'block');
		$('#myTEM').css('display', 'none');
		$('#texA').css('display', 'none');
		$('#texB').css('display', 'none');
		$('#texC').css('display', 'none');
		$('#pdfA').css('display', 'none');
		$('#pdfB').css('display', 'none');

		$('#op_title_PDF').change(function() {
			if (this.value == "แบบไฟล์PDF") {
				$('#pdfA').css('display', 'block');
				$('#pdfB').css('display', 'none');
			} else {
				$('#pdfA').css('display', 'none');
				$('#pdfB').css('display', 'block');
			}
		});
	});
	// $('.ee').css('display', 'none');
	// $('.gg').css('display', 'flex');
</script>
<script>
	$("#NUMBER")
		.keyup(function() {
			var value = $(this).val();
			$("#TEXTNUMBER").val(ArabicNumberToText(value));
		})
		.keyup();
	$("#NUMBER2")
		.keyup(function() {
			var value = $(this).val();
			$("#TEXTNUMBER2").val(ArabicNumberToText(value));
		})
		.keyup();
	$("#NUMBER3")
		.keyup(function() {
			var value = $(this).val();
			$("#TEXTNUMBER3").val(ArabicNumberToText(value));
		})
		.keyup();
</script>