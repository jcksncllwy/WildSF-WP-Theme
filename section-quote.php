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
	<img class="open-quote quote-img" src="<?= $open_quote_url ?>" />
	
	<div class="quote-container">
		<div class="quote">
			<img class="close-quote quote-img mobile" src="<?= $close_quote_url ?>" />
			<?= $quote ?>
		</div>
		<div class="logo">
			<img src="<?= $logo_url ?>" />
		</div>
	</div>
	
	<img class="close-quote quote-img" src="<?= $close_quote_url ?>" />
</div>
<?php
	}
?>
