<script
    src="https://www.paypal.com/sdk/js?client-id=ATFjsBgpLf13IC-GVJumMggeaUc-4Kk6l28Q_YTSV0Elabwxb86JFONaaMy5cceARHfZCu7UAwVTw3kQ"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>		
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
                                <p style="font-size: 16px;">
								<div id="paypal-button-container"></div>


								<script>
									paypal.Buttons({
									createOrder: function(data, actions) {
									return actions.order.create({
										purchase_units: [{
										amount: {
											value: '1.0'
										}
										}]
									});
									},
									onApprove: function(data, actions) {
									return actions.order.capture().then(function(details) {
										alert('Transaction completed by ' + details.payer.name.given_name);
										// Call your server to save the transaction
										// return fetch('/ss', {
										//   method: 'post',
										//   headers: {
										//     'content-type': 'application/json'
										//   },
										//   body: JSON.stringify({
										//     orderID: data.orderID
										//   })
										// });
										console.log(details);
										$.ajax({
										url:'paypal_success',
										method: 'post',
										data:{
											orderId: data.orderID,
											payerId: data.payerID,
											name: details.payer.name.given_name +" "+details.payer.name.surname,
											create_time: details.create_time,
											amount: details.purchase_units['0'].amount.value,
											currency_code: details.purchase_units['0'].amount.currency_code,
										},
										success:function (response) {
											let dataSucces = JSON.parse(response);
											console.log(dataSucces);
										}
										});
										
									});
									}
								}).render('#paypal-button-container');
								</script>
                                </p>
							</div>
						</div>
						
					</div>
				</div>



			</div>

		</section><!-- #content end -->
