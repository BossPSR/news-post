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
								<a href="#" class="button button-desc text-center">
									<div style="font-size:16px;">วิธีที่ 2 ลงด้วยรูปภาพและ PDF</div>
									<span>ลงได้หลายกรอบพร้อมกัน</span>
									<span>( ไม่จำกัดจำนวน )</span>
								</a>

								<div class="row" style="margin-top:20px;display:none" id="myTEM">
									<div class="col-1"></div>
									<div class="col-10" style="margin: auto;">
										<form action="">
											<div class="form-group" style="text-align: left;font-size:16px;">
												<b>เลือกหัวข้อ / เรื่อง</b>
												<select class="form-control" style="margin: 10px 0px 10px 0px;" id="op_title">
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
												<div class="form-group" style="text-align: left;font-size:16px;">
													<b>วาระการประชุม <span style="color:red;">( เพื่อความถูกต้องของข้อมูล แนะนำให้พิมพ์เท่านั้น !! ) จำกัดจำนวนบรรทัด 10 บรรทัด</span></b>
													<textarea class="form-control" name="" id="" rows="5" style="margin: 10px 0px 10px 0px;"></textarea>
												</div>
												<div class="form-group" style="text-align: left;font-size:16px;">
													<b>ชื่อบริษัท / ชื่อหน่วยงาน</b>
													<input type="text" class="form-control" placeholder="ชื่อบริษัท / ชื่อหน่วยงาน">
												</div>
												<div class="form-group" style="text-align: left;font-size:16px;">
													<b>ครั้งที่ประชุม</b>
													<input type="text" class="form-control" value="1 / <?= date('Y') + 543; ?>" placeholder="ครั้งที่ประชุม">
												</div>
												<div class="form-group" style="text-align: left;font-size:16px;">
													<b>ประกาศถึง</b>
													<input type="text" class="form-control" value="ท่านผู้ถือหุ้นของบริษัท" placeholder="ประกาศถึง">
												</div>
												<div class="row">
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
															<b>วันที่จัดประชุม</b>
															<input type="text" value="" class="form-control tleft default" placeholder="วันที่จัดประชุม">
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
														<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
															<b>เวลาจัดประชุม</b>
															<select class="form-control" name="" id="">
																<option selected disabled>--- เลือกเวลาจัดประชุม ---</option>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group" style="text-align: left;font-size:16px;">
													<b>สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)</b>
													<textarea class="form-control" name="" id="" rows="5" placeholder="สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)"></textarea>
												</div>
												<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
													<b>วันที่ลงโฆษณา</b>
													<input type="text" value="" class="form-control tleft default" placeholder="วันที่ลงโฆษณา">
												</div>
												<div class="form-group" style="text-align: left;font-size:16px;">
													<b>ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)</b>
													<input type="text" class="form-control" placeholder="ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)">
												</div>
												<div class="form-group" style="text-align: left;font-size:16px;">
													<b>ตำแหน่งผู้ลงนาม</b>
													<input type="text" class="form-control" placeholder="กรรมการผู้มีอำนาจลงนาม" value="ตำแหน่งผู้ลงนาม">
												</div>
												<div class="text-left">
													<button class="btn btn-info">ดูตัวอย่างโฆษณา</button>
													<button class="btn btn-success">ลงโฆษณา</button>
												</div>
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
		var x = document.getElementById("myTEM");
		$('#myTEM').css('display', 'block');
		$('#texA').css('display', 'none');

		$('#op_title').change(function() {
			$('#texA').css('display', 'block');
		});
	});


	// $('.ee').css('display', 'none');
	// $('.gg').css('display', 'flex');
</script>