<!-- Page Title
		============================================= -->
		<section id="page-title" class="parallax page-title-dark center" style="background-image: url('public/assets/front-end/demos/interior-design/images/single/1.jpg'); background-size: cover; padding: 100px 0;" data-100-bottom-top="background-position:0px 200px;" data-top-bottom="background-position:0px -200px;">

			<div class="container clearfix" style="z-index: 2">
				<span class="before-heading" style="color: #FFF;">info@canvas.com</span>
				<h2 class="font-body nott t500 mb-2" style="color: #FFF; font-size: 54px;">+91-800-9876-221</h2>
				<a href=https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" data-lightbox="iframe" class="d-inline-block"><i class="icon-map-marker mb-0 text-white notextshadow i-large i-plain dark divcenter d-block"></i><span class="text-white font-secondary lowercase font-italic ls1 mt-0"><u>Map</u></span></a>
				<span class="t400 text-white font-secondary mt-4">795 Folsom Ave, Suite 600<br>San Francisco, CA 94107</span>
			</div>

			<div class="video-overlay" style="background: rgba(28,133,232,0.55); z-index: 1"></div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap clearfix">

				<div class="container">

					<div class="form-widget mt-5 divcenter" style="max-width: 750px">

						<div class="form-result"></div>

						<form class="nobottommargin" id="template-contactform" name="template-contactform" action="../../include/form.php" method="post">

							<div class="form-process"></div>

							<div class="col_half">
								<label class="nott" for="template-contactform-name">Name <small>*</small></label>
								<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
							</div>

							<div class="col_half col_last">
								<label class="nott" for="template-contactform-email">Email <small>*</small></label>
								<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label class="nott" for="template-contactform-phone">Phone</label>
								<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label class="nott" for="template-contactform-message">Message <small>*</small></label>
								<textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
							</div>

							<div class="col_full hidden">
								<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
							</div>

							<div class="col_full">
								<button class="button button-rounded button-large nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
							</div>

							<input type="hidden" name="prefix" value="template-contactform-">

						</form>
					</div>

				</div>

			</div>

		</section><!-- #content end -->
