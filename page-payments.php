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
		    		<p class="payments-message">Thank you for choosing Wild SF Tours. Please follow these steps to complete your payment.</p>
		    	</div>
		    	<div class="payment-success">
					<h1>Payment Successful</h1>
					<h2>Thank you for your payment!</h2>
					<p>A receipt has been emailed.</p>
					<div class="row">
						<div class="col-12">
							<p><strong>Name: </strong><span id="name-success"></span></p>
							<p><strong>Tour ID: </strong><span id="group-success"></span></p>
							<p><strong>Transaction ID: </strong><span id="tid-success"></span></p>
							<p><strong>Email: </strong><span id="email-success"></span></p>
						</div>
						<br/>
						<div class="col-md-6">
							<p><strong>Payment Amount: </strong><span id="amount-success" class="float-right"></span></p>
							<p><strong>Tip: </strong><span id="tip-success" class="float-right"></span></p>
							<hr>
							<p><strong>Total: </strong><span id="total-success" class="float-right"></span></p>
						</div>
					</div>
				</div>
				<div class="payment-mail-error">
					<h1>We couldn't send your receipt</h1>
					<h2>Thank you for your payment!</h2>
					<p>We had trouble e-mailing your receipt. Please contact us at booking@wildsftours.com for a new receipt.</p>
					<div class="row">
						<div class="col-12">
							<p><strong>Name: </strong><span id="name-error"></span></p>
							<p><strong>Tour ID: </strong><span id="group-error"></span></p>
							<p><strong>Transaction ID: </strong><span id="tid-error"></span></p>
							<p><strong>Email: </strong><span id="email-error"></span></p>
						</div>
						<br/>
						<div class="col-md-6">
							<p><strong>Payment Amount: </strong><span id="amount-error" class="float-right"></span></p>
							<p><strong>Tip: </strong><span id="tip-error" class="float-right"></span></p>
							<hr>
							<p><strong>Total: </strong><span id="total-error" class="float-right"></span></p>
						</div>
					</div>
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
							<h3>Payment Information <span id="step-1">(Step 1 of 2)</span></h3>
						    <div id="dropin-container"></div>
						</div>
					</div>
					<div class="payment-info row" style="margin-top: 30px;">
						<div class="col-12">
							<div class="form-2">
								<div class="row">
									<div class="field col-md-6 input-group">
										<div class="field-label">First Name</div>
										<input type="text" class="form-control field-input name" id="firstNameInput" autocomplete='given-name' />
									</div>
									<div class="field col-md-6 input-group">
										<div class="field-label">Last Name</div>
										<input type="text" class="form-control field-input name" id="lastNameInput" autocomplete='family-name' />
									</div>
								</div>
								<div class="row">
									<div class="field col-md-6 input-group">
										<div class="field-label">Tour ID</div>
										<input disabled type="text" class="form-control field-input groupName" id="groupName" />
									</div>
									<div class="field col-md-6 input-group">
										<div class="field-label">Email</div>
										<input type="text" class="form-control field-input email" id="email" />
									</div>
								</div>
								<div class="row">
									<div class="field col-md-6 input-group">
										<span class="field-label">Amount $</span>
										<input
											id="paymentAmount"
											class="form-control field-input currency"
											type="number"
											min="0"
											step="0.01"
											min-value="00.00"
										/>
									</div>
									<div class="field col-md-6 input-group">
										<span class="field-label">Tip $</span>
										<input
											id="tipAmount"
											type="number"
											class="form-control field-input"
											aria-label="Tip to Guide"
											step="0.01"
											min-value="00.00"
										/>
										<div class="input-group-append btn-group">
											<button id="15tip" class="btn btn-outline-secondary active">15%</button>
											<button id="20tip" class="btn btn-outline-secondary">20%</button>
											<button id="ctip" class="btn btn-outline-secondary">custom</button>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<p><em>*A 3% credit card processing fee will be added to your payment before finalizing</em></p>
									</div>
								</div>
							</div>
							<div class="preview-2 hidden" style="margin-top: 30px;">
								<div class="row">
									<div class="col-md-6">
										<p><strong>Name: </strong><span id="name-complete"></span></p>
										<p><strong>Tour ID: </strong><span id="group-complete"></span></p>
										<p><strong>Email: </strong><span id="email-complete"></span></p>
									</div>
									<div class="col-md-6">
										<p><strong>Payment Amount: </strong><span id="amount-complete" class="float-right"></span></p>
										<p><strong>Tip: </strong><span id="tip-complete" class="float-right"></span></p>
										<p><strong>3% Processing Fee: </strong><span id="fee" class="float-right"></span></p>
										<hr>
										<p><strong>Total: </strong><span id="total-complete" class="float-right"></span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tour-info hidden row">
						<hr class="dotted-line"/>
						<div class="col-12">
							<h3>Tour Details <span id="step-3">(Step 2 of 2)</span></h3>
							<div class="contact-info row">
								<div class="col-12">
									<h4>Point of Contact</h4>
									<p class="helper-text">Who is the point of contact on the day of your tour?</p>
								</div>
								<div class="field col-6 input-group">
									<div class="field-label">Name</div>
									<input
										type="text"
										class="form-control field-input"
										id="pocName" />
								</div>
								<div class="field col-6 input-group">
									<div class="field-label">Cell</div>
									<input
										type="tel"
										class="form-control field-input"
										id="pocPhone" />
								</div>
							</div>
							<div class="address-fields row">
								<div class="col-12">
									<h4>Mailing Address</h4>
									<p class="helper-text">(for us to send you a Wild SF postcard)</p>
								</div>
								<div class="field col-12 input-group">
									<div class="field-label">Street Address</div>
									<input
										type="text"
										class="form-control field-input street"
										id="streetAddress" />
								</div>
								<div class="field col-md-6 input-group">
									<div class="field-label">City</div>
									<input
										type="text"
										class="form-control field-input city"
										id="city"/>
								</div>
								<div class="field col-md-3 input-group">
									<div class="field-label sm">State</div>
									<input
										type="text"
										class="form-control field-input state"
										id="state"/>
								</div>
								<div class="field col-md-4 input-group">
									<div class="field-label">Postal Code</div>
									<input
										type="text"
										class="form-control field-input zip"
										id="zip"/>
								</div>
								<div class="field col-md-4 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text field-label" for="country">Country</span>
									</div>
									<select class="form-control field-input custom-select country" id="country">
											<option value=""></option>
											<option value="USA">United States</option>
											<option value="">-------</option>
											<option value="AFG">Afghanistan</option>
											<option value="ALA">Åland Islands</option>
											<option value="ALB">Albania</option>
											<option value="DZA">Algeria</option>
											<option value="ASM">American Samoa</option>
											<option value="AND">Andorra</option>
											<option value="AGO">Angola</option>
											<option value="AIA">Anguilla</option>
											<option value="ATA">Antarctica</option>
											<option value="ATG">Antigua and Barbuda</option>
											<option value="ARG">Argentina</option>
											<option value="ARM">Armenia</option>
											<option value="ABW">Aruba</option>
											<option value="AUS">Australia</option>
											<option value="AUT">Austria</option>
											<option value="AZE">Azerbaijan</option>
											<option value="BHS">Bahamas</option>
											<option value="BHR">Bahrain</option>
											<option value="BGD">Bangladesh</option>
											<option value="BRB">Barbados</option>
											<option value="BLR">Belarus</option>
											<option value="BEL">Belgium</option>
											<option value="BLZ">Belize</option>
											<option value="BEN">Benin</option>
											<option value="BMU">Bermuda</option>
											<option value="BTN">Bhutan</option>
											<option value="BOL">Bolivia, Plurinational State of</option>
											<option value="BES">Bonaire, Sint Eustatius and Saba</option>
											<option value="BIH">Bosnia and Herzegovina</option>
											<option value="BWA">Botswana</option>
											<option value="BVT">Bouvet Island</option>
											<option value="BRA">Brazil</option>
											<option value="IOT">British Indian Ocean Territory</option>
											<option value="BRN">Brunei Darussalam</option>
											<option value="BGR">Bulgaria</option>
											<option value="BFA">Burkina Faso</option>
											<option value="BDI">Burundi</option>
											<option value="KHM">Cambodia</option>
											<option value="CMR">Cameroon</option>
											<option value="CAN">Canada</option>
											<option value="CPV">Cape Verde</option>
											<option value="CYM">Cayman Islands</option>
											<option value="CAF">Central African Republic</option>
											<option value="TCD">Chad</option>
											<option value="CHL">Chile</option>
											<option value="CHN">China</option>
											<option value="CXR">Christmas Island</option>
											<option value="CCK">Cocos (Keeling) Islands</option>
											<option value="COL">Colombia</option>
											<option value="COM">Comoros</option>
											<option value="COG">Congo</option>
											<option value="COD">Congo, the Democratic Republic of the</option>
											<option value="COK">Cook Islands</option>
											<option value="CRI">Costa Rica</option>
											<option value="CIV">Côte d'Ivoire</option>
											<option value="HRV">Croatia</option>
											<option value="CUB">Cuba</option>
											<option value="CUW">Curaçao</option>
											<option value="CYP">Cyprus</option>
											<option value="CZE">Czech Republic</option>
											<option value="DNK">Denmark</option>
											<option value="DJI">Djibouti</option>
											<option value="DMA">Dominica</option>
											<option value="DOM">Dominican Republic</option>
											<option value="ECU">Ecuador</option>
											<option value="EGY">Egypt</option>
											<option value="SLV">El Salvador</option>
											<option value="GNQ">Equatorial Guinea</option>
											<option value="ERI">Eritrea</option>
											<option value="EST">Estonia</option>
											<option value="ETH">Ethiopia</option>
											<option value="FLK">Falkland Islands (Malvinas)</option>
											<option value="FRO">Faroe Islands</option>
											<option value="FJI">Fiji</option>
											<option value="FIN">Finland</option>
											<option value="FRA">France</option>
											<option value="GUF">French Guiana</option>
											<option value="PYF">French Polynesia</option>
											<option value="ATF">French Southern Territories</option>
											<option value="GAB">Gabon</option>
											<option value="GMB">Gambia</option>
											<option value="GEO">Georgia</option>
											<option value="DEU">Germany</option>
											<option value="GHA">Ghana</option>
											<option value="GIB">Gibraltar</option>
											<option value="GRC">Greece</option>
											<option value="GRL">Greenland</option>
											<option value="GRD">Grenada</option>
											<option value="GLP">Guadeloupe</option>
											<option value="GUM">Guam</option>
											<option value="GTM">Guatemala</option>
											<option value="GGY">Guernsey</option>
											<option value="GIN">Guinea</option>
											<option value="GNB">Guinea-Bissau</option>
											<option value="GUY">Guyana</option>
											<option value="HTI">Haiti</option>
											<option value="HMD">Heard Island and McDonald Islands</option>
											<option value="VAT">Holy See (Vatican City State)</option>
											<option value="HND">Honduras</option>
											<option value="HKG">Hong Kong</option>
											<option value="HUN">Hungary</option>
											<option value="ISL">Iceland</option>
											<option value="IND">India</option>
											<option value="IDN">Indonesia</option>
											<option value="IRN">Iran, Islamic Republic of</option>
											<option value="IRQ">Iraq</option>
											<option value="IRL">Ireland</option>
											<option value="IMN">Isle of Man</option>
											<option value="ISR">Israel</option>
											<option value="ITA">Italy</option>
											<option value="JAM">Jamaica</option>
											<option value="JPN">Japan</option>
											<option value="JEY">Jersey</option>
											<option value="JOR">Jordan</option>
											<option value="KAZ">Kazakhstan</option>
											<option value="KEN">Kenya</option>
											<option value="KIR">Kiribati</option>
											<option value="PRK">Korea, Democratic People's Republic of</option>
											<option value="KOR">Korea, Republic of</option>
											<option value="KWT">Kuwait</option>
											<option value="KGZ">Kyrgyzstan</option>
											<option value="LAO">Lao People's Democratic Republic</option>
											<option value="LVA">Latvia</option>
											<option value="LBN">Lebanon</option>
											<option value="LSO">Lesotho</option>
											<option value="LBR">Liberia</option>
											<option value="LBY">Libya</option>
											<option value="LIE">Liechtenstein</option>
											<option value="LTU">Lithuania</option>
											<option value="LUX">Luxembourg</option>
											<option value="MAC">Macao</option>
											<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
											<option value="MDG">Madagascar</option>
											<option value="MWI">Malawi</option>
											<option value="MYS">Malaysia</option>
											<option value="MDV">Maldives</option>
											<option value="MLI">Mali</option>
											<option value="MLT">Malta</option>
											<option value="MHL">Marshall Islands</option>
											<option value="MTQ">Martinique</option>
											<option value="MRT">Mauritania</option>
											<option value="MUS">Mauritius</option>
											<option value="MYT">Mayotte</option>
											<option value="MEX">Mexico</option>
											<option value="FSM">Micronesia, Federated States of</option>
											<option value="MDA">Moldova, Republic of</option>
											<option value="MCO">Monaco</option>
											<option value="MNG">Mongolia</option>
											<option value="MNE">Montenegro</option>
											<option value="MSR">Montserrat</option>
											<option value="MAR">Morocco</option>
											<option value="MOZ">Mozambique</option>
											<option value="MMR">Myanmar</option>
											<option value="NAM">Namibia</option>
											<option value="NRU">Nauru</option>
											<option value="NPL">Nepal</option>
											<option value="NLD">Netherlands</option>
											<option value="NCL">New Caledonia</option>
											<option value="NZL">New Zealand</option>
											<option value="NIC">Nicaragua</option>
											<option value="NER">Niger</option>
											<option value="NGA">Nigeria</option>
											<option value="NIU">Niue</option>
											<option value="NFK">Norfolk Island</option>
											<option value="MNP">Northern Mariana Islands</option>
											<option value="NOR">Norway</option>
											<option value="OMN">Oman</option>
											<option value="PAK">Pakistan</option>
											<option value="PLW">Palau</option>
											<option value="PSE">Palestinian Territory, Occupied</option>
											<option value="PAN">Panama</option>
											<option value="PNG">Papua New Guinea</option>
											<option value="PRY">Paraguay</option>
											<option value="PER">Peru</option>
											<option value="PHL">Philippines</option>
											<option value="PCN">Pitcairn</option>
											<option value="POL">Poland</option>
											<option value="PRT">Portugal</option>
											<option value="PRI">Puerto Rico</option>
											<option value="QAT">Qatar</option>
											<option value="REU">Réunion</option>
											<option value="ROU">Romania</option>
											<option value="RUS">Russian Federation</option>
											<option value="RWA">Rwanda</option>
											<option value="BLM">Saint Barthélemy</option>
											<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
											<option value="KNA">Saint Kitts and Nevis</option>
											<option value="LCA">Saint Lucia</option>
											<option value="MAF">Saint Martin (French part)</option>
											<option value="SPM">Saint Pierre and Miquelon</option>
											<option value="VCT">Saint Vincent and the Grenadines</option>
											<option value="WSM">Samoa</option>
											<option value="SMR">San Marino</option>
											<option value="STP">Sao Tome and Principe</option>
											<option value="SAU">Saudi Arabia</option>
											<option value="SEN">Senegal</option>
											<option value="SRB">Serbia</option>
											<option value="SYC">Seychelles</option>
											<option value="SLE">Sierra Leone</option>
											<option value="SGP">Singapore</option>
											<option value="SXM">Sint Maarten (Dutch part)</option>
											<option value="SVK">Slovakia</option>
											<option value="SVN">Slovenia</option>
											<option value="SLB">Solomon Islands</option>
											<option value="SOM">Somalia</option>
											<option value="ZAF">South Africa</option>
											<option value="SGS">South Georgia and the South Sandwich Islands</option>
											<option value="SSD">South Sudan</option>
											<option value="ESP">Spain</option>
											<option value="LKA">Sri Lanka</option>
											<option value="SDN">Sudan</option>
											<option value="SUR">Suriname</option>
											<option value="SJM">Svalbard and Jan Mayen</option>
											<option value="SWZ">Swaziland</option>
											<option value="SWE">Sweden</option>
											<option value="CHE">Switzerland</option>
											<option value="SYR">Syrian Arab Republic</option>
											<option value="TWN">Taiwan, Province of China</option>
											<option value="TJK">Tajikistan</option>
											<option value="TZA">Tanzania, United Republic of</option>
											<option value="THA">Thailand</option>
											<option value="TLS">Timor-Leste</option>
											<option value="TGO">Togo</option>
											<option value="TKL">Tokelau</option>
											<option value="TON">Tonga</option>
											<option value="TTO">Trinidad and Tobago</option>
											<option value="TUN">Tunisia</option>
											<option value="TUR">Turkey</option>
											<option value="TKM">Turkmenistan</option>
											<option value="TCA">Turks and Caicos Islands</option>
											<option value="TUV">Tuvalu</option>
											<option value="UGA">Uganda</option>
											<option value="UKR">Ukraine</option>
											<option value="ARE">United Arab Emirates</option>
											<option value="GBR">United Kingdom</option>
											<option value="USA">United States</option>
											<option value="UMI">United States Minor Outlying Islands</option>
											<option value="URY">Uruguay</option>
											<option value="UZB">Uzbekistan</option>
											<option value="VUT">Vanuatu</option>
											<option value="VEN">Venezuela, Bolivarian Republic of</option>
											<option value="VNM">Viet Nam</option>
											<option value="VGB">Virgin Islands, British</option>
											<option value="VIR">Virgin Islands, U.S.</option>
											<option value="WLF">Wallis and Futuna</option>
											<option value="ESH">Western Sahara</option>
											<option value="YEM">Yemen</option>
											<option value="ZMB">Zambia</option>
											<option value="ZWE">Zimbabwe</option>
									</select>
								</div>
							</div>
							<div class="food-field row">
								<div class="col-12">
									<h4>For Food Tours:</h4>
								</div>
								<div class="field col-12 input-group">
									<div class="field-label" style="width: auto;">Dietary Restrictions / Allergies</div>
									<textarea class="form-control field-input city" id="foodPref"></textarea>
									<small id="foodPrefHelpBlock" class="form-text text-muted">
										Please note: it is your responsibility to communicate any dietary restrictions for your team. We can easily accommodate Vegetarians and Shellfish Allergy, but Vegan and Gluten-Free options (+$10/person) require much more creative thinking on our part, so please indicate whether a dietary restriction is a flexible preference or a strict constraint.
									</small>
								</div>
							</div>
							<div class="lead-source row">
								<div class="col-12">
									<h4>How did you hear about Wild SF Tours?</h4>
								</div>
								<div class="field col-md-6 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text field-label" for="leadSource">select one</span>
									</div>
									<select class="form-control field-input custom-select" id="leadSource">
								      <option>Previous tour with us</option>
								      <option>Word-of-mouth</option>
								      <option>Google</option>
								      <option>Social media</option>
								      <option>Flyer</option>
								      <option>Other</option>
								    </select>
								</div>
							</div>
							<div class="row" style="margin-top:20px;">
								<div class="col-12">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="terms-agree">
										<label class="form-check-label" for="terms-agree">
											<h4 style="margin-top:0;"> By submitting payment, I agree to Wild SF's <a href="https://wildsftours.com/policies-other-information/" target="_blank">Booking Policy</a> </h4>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div id="validation-alert" class="alert alert-danger hidden" role="alert">
								<span id="validation-error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button id="submit-button" class="button">Verify Payment Method</button>
						</div>
					</div>
				<hr class="dotted-line"/>
				<div class="row">
					<div class="col-12">
						<p>For any questions or other information regarding payments, please email: <a href="mailto:booking@wildsftours.com">booking@wildsftours.com</a> or call: <a href="tel:+14155801849">(415)580-1849</a></p>
					</div>
				</div>
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
								// fill preview-2
								$('#step-1').toggleClass('hidden');
								$('.form-2').toggleClass('hidden');
									var fullName = $('#firstNameInput').val() +" "+ $('#lastNameInput').val();
									$('#name-complete').html(fullName);

									var groupName = $('#groupName').val();
									$('#group-complete').html(groupName);

									var email = $('#email').val();
									$('#email-complete').html(email);

									var costString = $('#paymentAmount').val();
									var cost = Number.parseFloat(costString);
									$('#amount-complete').html('$' + costString);

									var tipString = $('#tipAmount').val();
									var tip = Number.parseFloat(tipString);
									$('#tip-complete').html('$' + tipString);

									var transactionFee = ((cost + tip) * .03);
									var fee = transactionFee.toFixed(3);
									$('#fee').html('$' + fee);

									var totalCost = (cost + tip + transactionFee).toFixed(2);
									$('#total-complete').html('$' + totalCost);

								// show preview-2
								$('.preview-2').toggleClass('hidden');

								// show tour-info
								$('#step-2').toggleClass('hidden');
								$('.tour-info').toggleClass('hidden');

								button.html('Submit Payment of $'+ totalCost).prop('disabled', true);

								var agree = $('#terms-agree');
								agree.change(function(){
									if(agree.prop('checked')) {
										button.prop('disabled', false);
									} else {
										button.prop('disabled', true);
									}
								});
								button.bind('click',{paymentMethod:payload},onMakePaymentClick);
							});
						}
						// all steps complete
						var onMakePaymentClick = function(event){
							var button = $('#submit-button');
							button.html("<div class='loader'></div>");
							button.toggleClass("loading");
							button.addClass("disabled");

							var paymentInput = $('#paymentAmount');
							var costString = paymentInput.val();
							var cost = Number.parseFloat(costString);

							var tipInput = $('#tipAmount');
							var tipString = tipInput.val();
							var tip = Number.parseFloat(tipString);

							var transactionFee = ((cost + tip) * .03);

							var totalCost = (cost + tip + transactionFee).toFixed(2);

							$.ajax({
								type: "POST",
								url: '/wp-json/braintree/v1/transact',
								data: {
									nonce: event.data.paymentMethod.nonce,
									amount: totalCost,
									first_name: $('#firstNameInput').val(),
									last_name: $('#lastNameInput').val(),
									group_name: $('#groupName').val(), // this is now the tourID
									email: $('#email').val(),
									tip_amount: tipString,
									base_amount: costString,
									processing: transactionFee,
									poc_name: $('#pocName').val(),
									poc_phone: $('#pocPhone').val(),
									street_address: $('#streetAddress').val(),
									locality: $('#city').val(),
									region: $('#state').val(),
									postal_code: $('#zip').val(),
									country_code_alpha3: $('#country').val(),
									food_preferences: $('#foodPref').val(),
									lead_source: $('#leadSource').val()
								},
								success: function(data) {
									console.log(data);
									// check for validation errors
									if ( data.transaction === null || data.transaction === (void 0)) {
										$('#validation-error').html(data.message);
										$('#validation-alert').toggleClass('hidden');
										$('#submit-button').html('Submit payment of '+ $('#total-complete').html()).prop('disabled', false).toggleClass('loading').toggleClass('disabled');
									}
									// else successful
									else {
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
				$('#tour-id').val(deet.customFields.group_name);
				$('#tour-base-amount').val(deet.customFields.base_amount);
				$('#tour-tip').val(deet.customFields.tip_amount);
				$('#tour-fee').val(deet.customFields.processing);
				$('#tour-total').val(deet.amount);
				$('#tour-payment-id').val(deet.id);
				$('#tour-credit-lastfour').val(deet.creditCard.last4);
				$('#tour-poc-name').val(deet.customFields.poc_name);
				$('#tour-poc-phone').val(deet.customFields.poc_phone);
				$('#tour-street-address').val(deet.shipping.streetAddress);
				$('#tour-city').val(deet.shipping.locality);
				$('#tour-region').val(deet.shipping.region);
				$('#tour-country').val(deet.shipping.countryName);
				$('#tour-postal-code').val(deet.shipping.postalCode);
				$('#tour-dietary-restrictions').val(deet.customFields.food_preferences);
				$('#tour-lead-source').val(deet.customFields.lead_source);

				//pre-fill mail success
				$('#name-success').html(deet.customer.firstName + ' ' + deet.customer.lastName);
				$('#group-success').html(deet.customFields.group_name);
				$('#tid-success').html(deet.id);
				$('#email-success').html(deet.customer.email);
				$('#amount-success').html(deet.customFields.base_amount);
				$('#tip-success').html(deet.customFields.tip_amount);
				$('#fee-success').html(deet.customFields.processing);
				$('#total-success').html(deet.amount);

				//pre-fill mail error
				$('#name-error').html(deet.customer.firstName + ' ' + deet.customer.lastName);
				$('#group-error').html(deet.customFields.group_name);
				$('#tid-error').html(deet.id);
				$('#email-error').html(deet.customer.email);
				$('#amount-error').html(deet.customFields.base_amount);
				$('#tip-error').html(deet.customFields.tip_amount);
				$('#fee-error').html(deet.customFields.processing);
				$('#total-error').html(deet.amount);

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

			// watches the tip input & amount
			$( "#paymentAmount" ).change(function() {
				if ($("#15tip").hasClass('active')) {
					var numAmt = Number.parseFloat($("#paymentAmount").val());
					var numTip = (numAmt * .15);
					$("#tipAmount").val(numTip.toFixed(2));
				} else if ($("#20tip").hasClass('active')) {
					var numAmt = Number.parseFloat($("#paymentAmount").val());
					var numTip = (numAmt * .20);
					$("#tipAmount").val(numTip.toFixed(2));
				}
			});

			$( "#tipAmount" ).change(function() {
				$("#ctip").addClass('active').siblings().removeClass('active');
			});

			$("#15tip").click(function(){
				$(this).addClass('active').siblings().removeClass('active');
				var numAmt = Number.parseFloat($("#paymentAmount").val());
				var numTip = (numAmt * .15);
				$("#tipAmount").val(numTip.toFixed(2));
			});
			$("#20tip").click(function(){
				$(this).addClass('active').siblings().removeClass('active');
				var numAmt = Number.parseFloat($("#paymentAmount").val());
				var numTip = (numAmt * .20);
				$("#tipAmount").val(numTip.toFixed(2));
			});
			$("#ctip").click(function(){
				$(this).addClass('active').siblings().removeClass('active');
			});


			// function to get the payment amount and tour id from the URL //
			function getUrlVars() {
			    var vars = {};
			    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			        vars[key] = value;
			    });
			    return vars;
			}

			function getUrlParam(parameter, defaultvalue){
			    var urlparameter = defaultvalue;
			    if(window.location.href.indexOf(parameter) > -1){
			        urlparameter = getUrlVars()[parameter];
			        }
			    return urlparameter;
			}

			$(document).ready(function() {
				$("#groupName").val(getUrlParam('tid','none'));
					var amt = getUrlParam('amt','00.00');
					var numAmt = Number.parseInt(amt);
					var numTip = (numAmt * .15);

					$("#paymentAmount").val(numAmt.toFixed(2));
					$("#tipAmount").val(numTip.toFixed(2));
			});

		    </script>
			</div>
  	</div>
  </div>
	<?php
	get_template_part('footer');
	?>
</body>
</html>
