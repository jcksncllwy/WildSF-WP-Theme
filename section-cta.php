<?php
	$frontpage = get_page_by_title('frontpage');
	$cta_group = get_field('call_to_action', $frontpage->ID);
	$big_cta = $cta_group['big_cta'];
	$little_cta = $cta_group['little_cta'];
	$button_text = $cta_group['button_text'];

	$accolades_group = get_field('accolades', $frontpage->ID);
	$TA_badge = wp_get_attachment_image_url(
		$accolades_group['trip_advisor'],
		'full'
	);
	$BOB_badge = wp_get_attachment_image_url(
		$accolades_group['best_of_the_bay'],
		'full'
	);

	$peek_calendar_popup_link = "https://www.peek.com/s/15a8284c-0990-4986-a5b4-1754b0c0b014/3beY";
	$button_href = is_front_page() ? "#calendar-nav-target" : $peek_calendar_popup_link;

?>
<div class="section cta">

	<div class="row">
		<div class="col">
			<a class="book-button" href="<?= $button_href ?>"><?= $button_text ?></a>
		</div>
	</div>
	<div class="row">
		<div class="col col-6 col-sm-3 order-sm-1 order-1">
			<img src="<?= $TA_badge ?>" />
		</div>
		<div class="col col-12 col-sm-6 order-sm-2 order-3">
			<h1><?= $big_cta ?></h1>
			<h2><?= $little_cta ?></h2>
		</div>
		<div class="col col-6 col-sm-3 order-sm-3 order-1">
			<img src="<?= $BOB_badge ?>" />
		</div>
	</div>

</div>
