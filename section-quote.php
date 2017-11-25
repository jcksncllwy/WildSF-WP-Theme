<?php
	if(!empty($press_quote)){
		$logo_url = $press_quote['logo'];
		$quote = $press_quote['quote'];
		$open_quote_url = wp_get_attachment_image_url(
			get_field('open_quote', $frontpage), 
			'full'
		);
		$close_quote_url = wp_get_attachment_image_url(
			get_field('close_quote', $frontpage), 
			'full'
		);
?>
<div class="section quote">
	<div class="logo">
		<img src="<?= $logo_url ?>" />
	</div>
	<hr />
	<div class="quote-container">
	<img class="open-quote" src="<?= $open_quote_url ?>" />
	<div class="quote">
		<?= $quote ?>
	</div>
	<img class="close-quote" src="<?= $close_quote_url ?>" />
	</div>
</div>
<?php
	}
?>
