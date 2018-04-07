<!DOCTYPE html>
<html>
<head>
	<?= get_header('common') ?>
  <script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.5/lodash.min.js"></script>
</head>
<body>

	<?php
	get_template_part('navbar');
	?>

  <div class="payments">

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

				<div class="success-message">
					<h1>Payment Successful</h1>
				</div>

				<div class="form-fields">
					<div class="customer-info">
						<div class="input-group name">
							<span class="input-group-addon">First Name</span>
							<input type="text" class="form-control name" id="firstName" />
							<span class="input-group-addon">Last Name</span>
							<input type="text" class="form-control name" id="lastName" />
						</div>

						<div class="input-group">
		        	<span class="input-group-addon">$</span>
		        	<input type="number" value="200.00" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="paymentAmount" />
						</div>
					</div>

			    <div id="dropin-container"></div>
			    <button id="submit-button">Verify Payment Method</button>
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
									name: _.reduce($('.input-group.name input'),function(name,i){
										return name+$(i).val();
									},'')
								},
								success: function(data){
									$('.payments-form').addClass('success');
									console.log(data)
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
