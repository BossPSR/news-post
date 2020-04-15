		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element clearfix" style="height: 400px; background: url('public/assets/front-end/demos/interior-design/images/about/hero.jpg') center 70% no-repeat; background-size: cover;">
			<div class="container clearfix">

				<div class="clearfix center divcenter" style="max-width: 700px;">
					<div class="emphasis-title topmargin">
                    <h2 class="font-secondary" style="color: #222; font-size: 70px; font-weight: 900; text-shadow: 0 7px 5px rgba(0,0,0,0.01), 0 4px 4px rgba(0,0,0,0.1);">เติมเครดิต</h2>
						<p style="font-weight: 300; opacity: .7; color: #444; text-shadow: 0 -4px 20px rgba(0, 0, 0, .25);">Sell your home to us and skip the hassle of<br>repairs, showings and months of uncertainty</p>
					</div>
				</div>

			</div>
		</section>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap clearfix">

				<div class="container">

					<div class="row">
						<div class="col-12 mb-3">
							<div class="feature-box fbox-small fbox-center fbox-plain fbox-large nobottomborder">
								<div class="fbox-icon">
									<i class="icon-line2-home"></i>
								</div>
								<h3 class="ls0 t400 nott" style="font-size: 20px;">บริษัท แอค แทกซ์ นิวส์ จำกัด</h3>

                               <div class="card">
									<div class="card-header text-left" style="color:#000;">เติมเครดิต</div>
									<div class="card-body" id="detail_credit">
										<h4 style="margin: 0;">ระบุจำนวนเอง</h4> 
										<h4>( 45 บาท ต่อเครดิต )</h4> 
										<input type="number" class="form-control" style="margin: 0 auto 15px; width:50%;" id="credit">
										<button type="button" class="btn btn-primary" onClick="before_buy();">ซื้อตอนนี้</button>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>



			</div>

		</section><!-- #content end -->


<?php 
	$user = $this->db->get_where('tbl_user',['email' => $this->session->userdata('email')])->row_array(); 
	if (!empty($user)) {
	
?>		
		<!-- Modal -->
		<div class="modal fade" id="omise_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">เติมเงิน</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="saveRecord_checkout" method="POST" class="checkout-form">
				<div class="modal-body">
				
					<div id="omise_detail">
					
					</div>

					<!-- <script type="text/javascript" src="https://cdn.omise.co/omise.js"
						data-key="pkey_test_5jj79losaq3gdkmmo4x"
						data-image=""
						data-frame-label="One Business"
						data-button-label="ชำระเงิน"
						data-submit-label="ชำระเงิน"
						data-amount="100.00"
						data-currency="บาท"
					>
					</script> -->
				
				</div>
				<div class="modal-footer">
					<!-- <button type="submit" class="btn btn-primary">เติมเงิน</button> -->
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
				</div>
			</form>
			</div>
		</div>
		</div>
<?php } ?>
<script src="https://cdn.omise.co/omise.js"></script>
<script>
	function address_user(e) {
		if (e == 1) {
			$('#new_address').css("display","block");
		}else{
			$('#new_address').css("display","none");
		}
		
	}

	function before_buy() {
		let credit = $('#credit').val();
			credit_new = credit * 45;
		if (credit > 0) {
			let detailCredit = '<div style="width:70%; margin: auto;">';
			 	detailCredit += '<h4 style="margin:0;">สรุปยอดการชำระเงิน</h4>';
				detailCredit += '<hr>';
				detailCredit += '<h5 style="margin:0;">ระบุจำนวนเอง : '+credit+' เครดิต</h5>';
				detailCredit += '<h5>ยอดเงินที่ต้องชำระ : <span style="color:red;">'+parseFloat(credit_new)+' บาท</span></h5>';
				detailCredit += '<div class="card">';
				detailCredit += '<div class="card-header text-left" style="color:#000;">ที่อยู่ใบเสร็จรับเงิน</div>';
				detailCredit += '<div class="card-body">';
				detailCredit += '<input type="hidden" name="count" value="'+credit+'">';
				detailCredit += '<input type="hidden" name="price" value="'+parseFloat(credit_new)+'">';
				detailCredit += '<div class="text-left">';
				detailCredit += '<input type="radio" name="address" class="form-group" style="cursor:pointer;" onclick="address_user(0);" checked value="ที่อยู่เดียวกันกับตอนลงทะเบียน">';
				detailCredit += '<label style="font-size:18px;cursor: auto;">';
				detailCredit += 'ที่อยู่เดียวกันกับตอนลงทะเบียน';
				detailCredit += '</label>';
				detailCredit += '</div>';
				detailCredit += '<div class="text-left">';
				detailCredit += '<input type="radio" name="address" class="form-group" style="cursor:pointer;" onclick="address_user(1);" value="กรอกที่อยู่ใหม่">';
				detailCredit += '<label style="font-size:18px;cursor: auto;">';
				detailCredit += 'กรอกที่อยู่ใหม่';
				detailCredit += '</label>';
				detailCredit += '</div>';
				detailCredit += '<div class="form-group" id="new_address" style="display:none;">';
				detailCredit += '<div class="row">';
				detailCredit += '<div class="col-6 text-left form-group">';
				detailCredit += '<label style="font-size:18px;cursor: auto;">เลขประจำตัวผู้เสียภาษี,สาขา</label>';
				detailCredit += '<input type="text" name="number_address" class="form-control">';
				detailCredit += '</div>';
				detailCredit += '<div class="col-6 text-left form-group">';
				detailCredit += '<label style="font-size:18px;cursor: auto;">บริษัท</label>';
				detailCredit += '<input type="text" name="compony_address" class="form-control">';
				detailCredit += '</div>';
				detailCredit += '<div class="col-12 text-left">';
				detailCredit += '<label style="font-size:18px;cursor: auto;">ที่อยู่</label>';
				detailCredit += '<textarea name="detail_address" class="form-control" rows="10" col="30"></textarea>';
				detailCredit += '</div>';
				detailCredit += '</div>';
				detailCredit += '</div>';
				detailCredit += '<button type="button" onClick="send_data(this);" class="btn btn-primary">ดำเนินการต่อ</button>';
				detailCredit += '</div>';
				detailCredit += '</div>';
				detailCredit += '</div>';

			$('#detail_credit').html(detailCredit);
		}
	}
	function send_data(e) {
		$.ajax({
			url: "check_user_credit",
			method: "GET",
			success: function(getData) {
				if (getData == 0) {
					$('body').addClass('side-panel-open');
				}else{
					$('#omise_modal').modal("toggle");
					const count = $('[name="count"]').val();
					let price = $('[name="price"]').val();
					const type_address = $('[name="address"]:checked').val();
					let number_address = 0;
					let compony_address = 0;
					let detail_address = 0;
					if (type_address == "กรอกที่อยู่ใหม่") {
						number_address = $('[name="number_address"]').val();
						compony_address = $('[name="compony_address"]').val();
						detail_address = $('[name="detail_address"]').val();	
					}
					let detail_omise = '<h4 style="margin:0;">ระบุจำนวนเอง : '+count+' เครดิต</h4>';
						detail_omise += '<h4>ยอดเงินที่ต้องชำระ : <span style="color:red;">'+parseFloat(price)+' บาท</span></h4>';
						detail_omise += '<input type="hidden" name="result_count" value="'+count+'">';
						detail_omise += '<input type="hidden" name="result_price" value="'+price+'">';
						detail_omise += '<input type="hidden" name="result_number_address" value="'+number_address+'">';
						detail_omise += '<input type="hidden" name="result_compony_address" value="'+compony_address+'">';
						detail_omise += '<input type="hidden" name="result_detail_address" value="'+detail_address+'">';
						detail_omise += '<input type="hidden" class="form-control" name="id_user" value="<?php echo $user['id_user'];?>">';
						detail_omise += '<script type="text/javascript" src="https://cdn.omise.co/omise.js" data-key="pkey_test_5jj79losaq3gdkmmo4x" data-image=""data-frame-label="One Business"data-button-label="ชำระเงิน"data-submit-label="ชำระเงิน"data-amount="'+price+'00"data-currency="บาท">'+'<'+'/script>';

					$('#omise_detail').html(detail_omise);
				}

			}
    	});
	}
	
	
</script>