<?php
	if(!empty($press_quote)){
		$logo_url = $press_quote['logo'];
		$quote = $press_quote['quote'];
?>
<div class="container section quote">
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<div class="quote-text">
				"<?= $quote ?>"
			</div>
			<div class="logo">
				<img src="<?= $logo_url ?>" />
			</div>
		</div>
	</div>
</div>
<?php
	}
?>
