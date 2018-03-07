<!DOCTYPE html>
<html>
<head>
	<?= get_header('common') ?>
  <script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script>
</head>
<body>

  <div class="payments">
		<?php
	  get_template_part('navbar');
	  ?>
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

			<div class="payment-amount">
				<label for="c2">Payment Amount</label>
    		<div class="input-group">
        	<span class="input-group-addon">$</span>
        	<input type="number" value="200.00" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />
				</div>
			</div>

	    <div id="dropin-container"></div>
	    <button id="submit-button">Request payment method</button>
	    <script>
	    $(function(){
	      var button = document.querySelector('#submit-button');
	      braintree.dropin.create({
	        authorization: '<?= Braintree_ClientToken::generate() ?>',
	        container: '#dropin-container'
	      }, function (createErr, instance) {
	        button.addEventListener('click', function () {
	          instance.requestPaymentMethod(function (err, payload) {
	            console.log("PAYMENT METHOD PAYLOAD: ", payload);
	            $.ajax({
	              type: "POST",
	              url: '/wp-json/braintree/v1/transact',
	              data: {nonce: payload.nonce},
	              success: function(data){console.log(data)}
	            })
	          });
	        });
	      });
	    })
	    </script>
  	</div>
		<?php
	  get_template_part('footer');
	  ?>
  </div>

</body>
</html>
