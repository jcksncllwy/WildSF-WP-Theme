<!DOCTYPE html>
<html>
<head>
	<?= get_header('common') ?>
  <script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.5/lodash.min.js"></script>
</head>
<body class="payments-page">

	<?php
	get_template_part('navbar');
	?>

  <div class="payments page-container">

    <div class="payments-inner">
	    <?php
	    while (have_posts()) : the_post(); ?>
	        <div class="entry-content-page">
	            <?php the_content(); ?>
	        </div>
	    <?php
	    endwhile;
	    wp_reset_query();
	    ?>

			<div class="payments-form">

				<div class="payment-success">
					<h1>Payment Successful</h1>
					<h2>Can't wait for your tour!</h2>
				</div>

				<div class="form-fields">
					<div class="customer-info">
						<div class="name-fields">
							<div class="field">
								<div class="field-label">First Name</div>
								<input type="text" class="form-control field-input name" id="firstNameInput" />
							</div>
							<div class="field">
								<div class="field-label">Last Name</div>
								<input type="text" class="form-control field-input name" id="lastNameInput" />
							</div>
						</div>

						<div class="field">
		        	<span class="field-label">$</span>
		        	<input
								id="paymentAmount"
								class="form-control field-input currency"
								type="number"
								value="200.00"
								min="0"
								step="0.01"
								data-number-to-fixed="2"
								data-number-stepfactor="100"
							/>
						</div>
					</div>

			    <div id="dropin-container"></div>
			    <button id="submit-button" class="button">Verify Payment Method</button>
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
							button.unbind('click', onVerifyPaymentClick);
							instance.requestPaymentMethod(function (err, payload) {
								if(err){
									return alert('There was an error validating your payment method! Please re-enter your information and try again.');
									console.log(err);
								}
								console.log('Payment Method: ', payload);


								button.html('Make Payment');
								button.bind('click',{paymentMethod:payload},onMakePaymentClick);

							});
						}

						var onMakePaymentClick = function(event){
							var button = $('#submit-button');
							button.html("<div class='loader'></div>");
							button.unbind('click', onMakePaymentClick);
							$.ajax({
								type: "POST",
								url: '/wp-json/braintree/v1/transact',
								data: {
									nonce: event.data.paymentMethod.nonce,
									amount: $('#paymentAmount').val(),
									name: $('#firstNameInput').val() +" "+ $('#lastNameInput').val()
								},
								success: function(data){
									$('.payments-form').addClass('success');
									console.log(data);
								},
								fail: function(jqXHR, status, err){
									alert('There was an error processing your payment!');
									console.log(err);
								}
							})
						}

		        button.bind('click', onVerifyPaymentClick);

		      });
		    })
		    </script>
			</div>
  	</div>
  </div>
	<?php
	get_template_part('footer');
	?>
</body>
</html>
