<?php
	$frontpage = get_page_by_title('frontpage');
	$cta_group = get_field('call_to_action', $frontpage->ID);
	$big_cta = $cta_group['big_cta'];
	$little_cta = $cta_group['little_cta'];
	$button_text = $cta_group['button_text'];
?>
<div class="section cta">
	<hr />
	<h1><?= $big_cta ?></h1>
	<h2><?= $little_cta ?></h2>

	<a class="book-button" href="https://www.peek.com/s/15a8284c-0990-4986-a5b4-1754b0c0b014/8MW"><?= $button_text ?></a>
	<hr />
</div>
