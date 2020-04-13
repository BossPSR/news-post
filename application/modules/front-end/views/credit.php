		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element clearfix" style="height: 550px; background: url('public/assets/front-end/demos/interior-design/images/about/hero.jpg') center 70% no-repeat; background-size: cover;">
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
										<input type="number" class="form-control form-group" id="credit">
										<button type="button" class="btn btn-primary" onClick="before_buy();">ซื้อตอนนี้</button>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>



			</div>

		</section><!-- #content end -->

<script>
	function before_buy() {
		let credit = $('#credit').val();
			credit_new = credit * 45;
		if (credit > 0) {
			let detailCredit = '<div style="width:70%; margin: auto;">';
			 	detailCredit += '<h4 style="margin:0;">สรุปยอดการชำระเงิน</h4>';
				detailCredit += '<hr>';
				detailCredit += '<h5 style="margin:0;">ระบุจำนวนเอง : '+credit+' เครดิต</h5>';
				detailCredit += '<h5>ยอดเงินที่ต้องชำระ : <span style="color:red;">'+credit_new+' บาท</span></h5>';
				detailCredit += '<div class="card">';
				detailCredit += '<div class="card-header text-left" style="color:#000;">ที่อยู่ใบเสร็จรับเงิน</div>';
				detailCredit += '<div class="card-body">';
				detailCredit += '<form style="margin-bottom:0;">';
				detailCredit += '<div class="text-left">';
				detailCredit += '<input type="radio" name="address" class="form-group" style="cursor:pointer;" checked value="ที่อยู่เดียวกันกับตอนลงทะเบียน">';
				detailCredit += '<label style="font-size:18px;cursor: auto;">';
				detailCredit += 'ที่อยู่เดียวกันกับตอนลงทะเบียน';
				detailCredit += '</label>';
				detailCredit += '</div>';
				detailCredit += '<div class="text-left">';
				detailCredit += '<input type="radio" name="address" class="form-group" style="cursor:pointer;" value="กรอกที่อยู่ใหม่">';
				detailCredit += '<label style="font-size:18px;cursor: auto;">';
				detailCredit += 'กรอกที่อยู่ใหม่';
				detailCredit += '</label>';
				detailCredit += '</div>';
				detailCredit += '<button type="button" class="btn btn-primary">ดำเนินการต่อ</button>';
				detailCredit += '</form>';
				detailCredit += '</div>';
				detailCredit += '</div>';
				detailCredit += '</div>';

			$('#detail_credit').html(detailCredit);
		}
	}

	function address() {
		let address = $('[name="address"]:checked').val();
		if (address == "กรอกที่อยู่ใหม่") {
			console.log(address)
		}
		
	}
	address();
	
				
</script>