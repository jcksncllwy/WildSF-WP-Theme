<!DOCTYPE html>
<html>
<head>
	<?= get_header('common') ?>

	<?php
		global $post;
		$dotted_line_image_id = 172;
	 	$dotted_line_image_url = wp_get_attachment_image_src($dotted_line_image_id, 'full')[0];

	?>
	<style type="text/css" class="wp-dynamic-css">
	  .dotted-line{
	    background-image: url("<?= $dotted_line_image_url ?>");
	    border: 0;
	    height: 10px;
	    background-size: contain;
	  }
	</style>

	<script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.5/lodash.min.js"></script>
</head>
<body class="payments-page">

	<?php
	get_template_part('navbar');
	?>

  <div class="payments page-container">

    <div class="payments-inner">
	    	<div class="payments-top">
	    		<div class="payments-intro">
		    		<h1 class="payments-hero">Payments Portal</h1>
		    		<p class="payments-message">Thank you for chosing Wild SF Tours. Please follow these steps to complete your payment.</p>
		    	</div>
		    	<div class="payment-success">
					<h1>Payment Successful</h1>
					<h2>Thank you for your payment!</h2>
					<p>A receipt has been emailed.</p>
				</div>
				<div class="payment-mail-error">
					<h1>We couldn't send your receipt</h1>
					<h2>Thank you for your payment!</h2>
					<p>We had trouble e-mailing your receipt. Please contact us at booking@wildsftours.com for a new receipt.</p>
				</div>
				<div class="payment-process-error">
					<h1>Payment Error</h1>
					<h2>We had trouble processing your payment</h2>
					<p id="error-message"></p>
				</div>
		    	<hr class="dotted-line" />
	    	</div>
			<div class="payments-form row">
				<div class="form-fields col-12">
					<!-- Step 1 -->
					<div class="payment-verify row">
						<div class="col-12">
							<h3>Payment Method <span id="step-1">(Step 1 of 3)</span></h3>
						    <div id="dropin-container"></div>
						    <hr class="dotted-line" />
						</div>
					</div>

				    <!-- Step 2 -->
					<div class="payment-info hidden row">
						<div class="col-12">
							<h3>Payment Information <span id="step-2">(Step 2 of 3)</span></h3>
							<div class="form-2">
								<div class="row">
									<div class="field col-md-6">
										<div class="field-label">First Name</div>
										<input type="text" class="form-control field-input name" id="firstNameInput" autocomplete='given-name' />
									</div>
									<div class="field col-md-6">
										<div class="field-label">Last Name</div>
										<input type="text" class="form-control field-input name" id="lastNameInput" autocomplete='family-name' />
									</div>
								</div>
								<div class="row">
									<div class="field col-md-6">
										<div class="field-label">Co./Group Name</div>
										<input type="text" class="form-control field-input groupName" id="groupName" />
									</div>
									<div class="field col-md-6">
										<div class="field-label">Email</div>
										<input type="text" class="form-control field-input email" id="email" />
									</div>
								</div>
								<div class="row">
									<div class="field payment-amount col-md-6">
										<span class="field-label">Amount $</span>
										<input
											id="paymentAmount"
											class="form-control field-input currency"
											type="number"
											value="0.00"
											min="0"
											step="1.00"
											data-number-to-fixed="2"
											data-number-stepfactor="100"
										/>
									</div>
									<div class="field payment-amount col-md-6">
										<span class="field-label">Tip to Guide $</span>
										<input
											id="tipAmount"
											class="form-control field-input currency"
											type="number"
											value="0.00"
											min="0"
											step="1.00"
											data-number-to-fixed="2"
											data-number-stepfactor="100"
										/>
									</div>
								</div>
							</div>
							<div class="preview-2 hidden">
								<div class="row">
									<div class="col-md-6">
										<p><strong>Name: </strong><span id="name-complete"></span></p>
										<p><strong>Co./Group Name: </strong><span id="group-complete"></span></p>
										<p><strong>Email: </strong><span id="email-complete"></span></p>
									</div>
									<div class="col-md-6">
										<p><strong>Payment Amount: </strong>$<span id="amount-complete" class="text-right"></span></p>
										<p><strong>Tip: </strong>$<span id="tip-complete" class="text-right"></span></p>
										<p><strong>Total: </strong>$<span id="total-complete" class="text-right"></span></p>
									</div>
								</div>
							</div>
							<hr class="dotted-line"/>
						</div>
					</div>

				    <!-- Step 3 -->
					<div class="tour-info hidden row">
						<div class="col-12">
							<h3>Tour Details <span id="step-3">(Step 3 of 3)</span></h3>
							<div class="address-fields row">
								<div class="col-12">
									<h4>Mailing Address</h4>
									<p class="helper-text">(for us to send you a Wild SF postcard)</p>
								</div>
								<div class="field col-12">
									<div class="field-label">Street Address</div>
									<input
										type="text"
										class="form-control field-input street"
										id="streetAddress" />
								</div>
								<div class="field col-md-6">
									<div class="field-label">City</div>
									<input
										type="text"
										class="form-control field-input city"
										id="city"/>
								</div>
								<div class="field col-md-3">
									<div class="field-label sm">State</div>
									<input
										type="text"
										class="form-control field-input state"
										id="state"/>
								</div>
								<div class="field col-md-4">
									<div class="field-label">Postal Code</div>
									<input
										type="text"
										class="form-control field-input zip"
										id="zip"/>
								</div>
								<div class="field col-md-4">
									<div class="field-label">Country</div>
									<input
										type="text"
										class="form-control field-input country"
										id="country"/>
								</div>
							</div>
							<div class="food-field row">
								<div class="col-12">
									<h4>For Food Tours:</h4>
								</div>
								<div class="field col-12">
									<div class="field-label" style="width: auto;">Dietary Restrictions/Allergies</div>
									<textarea class="form-control field-input city" id="foodPref">
									</textarea>
								</div>
							</div>
							<div class="lead-source row">
								<div class="col-12">
									<h4>How did you hear about Wild SF Tours?</h4>
								</div>
								<div class="field col-md-6">
									<span class="field-label">select one</span>
									<select class="form-control field-input select" id="leadSource">
								      <option>Previous tour with us</option>
								      <option>Word-of-mouth</option>
								      <option>Google</option>
								      <option>Social media</option>
								      <option>Flyer</option>
								      <option>Other</option>
								    </select>
								</div>
							</div>
						</div>
						<hr class="dotted-line"/>
					</div>
			    <button id="submit-button" class="button">Verify Payment Method</button>
			</div>
			<div id="sheets-integration" style="display:none;">
				<?php echo do_shortcode( '[contact-form-7 id="2265" title="Payment Received"]' ); ?>
			</div>
		    <script>

		    $(function(){

		      braintree.dropin.create({
		        authorization: '<?= $BraintreeGateway->clientToken()->generate() ?>',
		        container: '#dropin-container'
		      }, function (createErr, instance) {
				var button = $('#submit-button');

						var onVerifyPaymentClick = function(){
							var button = $('#submit-button');
							button.html("<div class='loader'></div>");
							button.toggleClass("loading");
							button.unbind('click', onVerifyPaymentClick);
							instance.requestPaymentMethod(function (err, payload) {
								button.toggleClass("loading");
								if(err){
									alert('There was an error validating your payment method! Please re-enter your information and try again.');
									console.log(err);
								}
								// console.log('Payment Method: ', payload);
								$('#step-1').toggleClass('hidden');
								$('.payment-info').toggleClass('hidden');
								var paymentInput = $('#paymentAmount');
								paymentInput.change(function(){
									var amountString = paymentInput.val();
									var amount = Number.parseInt(amountString);
									if(amount>0){
										button.prop('disabled', false);
									}
								});
								button.html('Add Details').prop('disabled', true);
								button.bind('click',{paymentMethod:payload},onPaymentDetailsComplete);
							});
						}
						//Step 2 complete
						var onPaymentDetailsComplete = function(event) {
							// unbind previous button click
							var button = $('#submit-button');
							button.html("<div class='loader'></div>");
							button.toggleClass("loading");
							button.unbind('click', onPaymentDetailsComplete);

							// fill preview-2
							$('.form-2').toggleClass('hidden');
								var fullName = $('#firstNameInput').val() +" "+ $('#lastNameInput').val();
								$('#name-complete').html(fullName);

								var groupName = $('#groupName').val();
								$('#group-complete').html(groupName);

								var email = $('#email').val();
								$('#email-complete').html(email);

								var paymentInput = $('#paymentAmount');
								var costString = paymentInput.val();
								var cost = Number.parseInt(costString);
								$('#amount-complete').html(costString);

								var tipInput = $('#tipAmount');
								var tipString = tipInput.val();
								var tip = Number.parseInt(tipString);
								$('#tip-complete').html(tipString);

								var totalCost = cost + tip;
								$('#total-complete').html(totalCost);

							// show preview-2
							$('.preview-2').toggleClass('hidden');

							// show tour-info
							$('#step-2').toggleClass('hidden');
							$('.tour-info').toggleClass('hidden');

							// bind make payment
							button.toggleClass("loading");
							button.html('Send $'+ totalCost).prop('disabled', false);
							button.bind('click',{paymentMethod:event.data.paymentMethod},onMakePaymentClick);
						}
						// all steps complete
						var onMakePaymentClick = function(event){
							var button = $('#submit-button');
							button.html("<div class='loader'></div>");
							button.toggleClass("loading");
							button.unbind('click', onMakePaymentClick);

							var paymentInput = $('#paymentAmount');
							var costString = paymentInput.val();
							var cost = Number.parseInt(costString);

							var tipInput = $('#tipAmount');
							var tipString = tipInput.val();
							var tip = Number.parseInt(tipString);

							var totalCost = cost + tip;
							$.ajax({
								type: "POST",
								url: '/wp-json/braintree/v1/transact',
								data: {
									nonce: event.data.paymentMethod.nonce,
									amount: totalCost,
									first_name: $('#firstNameInput').val(),
									last_name: $('#lastNameInput').val(),
									group_name: $('#groupName').val(),
									email: $('#email').val(),
									tip_amount: tipString,
									base_amount: costString,
									street_address: $('#streetAddress').val(),
									locality: $('#city').val(),
									region: $('#state').val(),
									postal_code: $('#zip').val(),
									country: $('#country').val(),
									food_preferences: $('#foodPref').val(),
									lead_source: $('#leadSource').val()
								},
								success: function(data) {
									console.log(data);
									var status = Number.parseInt(data.transaction.processorResponseCode);
									// transaction accepted
									if (status < 2000) {
										logPaymentForm(data.transaction);
									}
									// transaction denied
									else if (status < 3000) {
										$('.payments-inner').addClass('payment-error');
										$('#error-message').html('Transaction was declined. Please refresh the page to try with another form of payment.');
									}
									//else network failed
									else {
										console.log(data.transaction);
										$('.payments-inner').addClass('payment-error');
										$('#error-message').html('There was a network error while processing your payment! Please refresh the page and try again.');
									}
								},
								fail: function(jqXHR, status, err){
									alert('There was an error processing your payment! Please refresh the page and try again');
									console.log(err);
								},
								always: function(){
									button.toggleClass("loading");
								}
							})
						}

		        button.bind('click', onVerifyPaymentClick);

		      });
		    })

			function logPaymentForm(deet) {
				// fill form
				$('#tour-payment-name').val(deet.customer.firstName + ' ' + deet.customer.lastName);
				$('#tour-email').val(deet.customer.email);
				$('#tour-company-name').val(deet.customer.company);
				$('#tour-base-amount').val(deet.customFields.base_amount);
				$('#tour-tip').val(deet.customFields.tip_amount);
				$('#tour-total').val(deet.amount);
				$('#tour-payment-id').val(deet.id);
				$('#tour-credit-lastfour').val(deet.creditCard.last4);
				$('#tour-street-address').val(deet.shipping.streetAddress);
				$('#tour-city').val(deet.shipping.locality);
				$('#tour-region').val(deet.shipping.region);
				$('#tour-country').val(deet.shipping.countryName);
				$('#tour-postal-code').val(deet.shipping.postalCode);
				$('#tour-dietary-restrictions').val(deet.customFields.food_preferences);
				$('#tour-lead-source').val(deet.customFields.lead_source);

				var formData = $('.wpcf7-form').serialize();
				//submit form through Google Sheets
				$.ajax({
					type: "POST",
					url: '/wp-json/contact-form-7/v1/contact-forms/2265/feedback',
					dataType: 'json',
					data: formData
				}).done(function(data){
					// console.log(data);
					var button = $('#submit-button');
					button.toggleClass("loading");
					if (data.status == 'mail_sent') {
						$('.payments-inner').addClass('success');
					} else {
						$('.payments-inner').addClass('mail-error');
					}
				}).fail(function(){$('.payments-inner').addClass('mail-error');});
			}
		    </script>
			</div>
  	</div>
  </div>
	<?php
	get_template_part('footer');
	?>
</body>
</html>
