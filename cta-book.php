<?php
	$frontpage = get_page_by_title('frontpage');
	$cta_background_image_url = wp_get_attachment_image_url(
		get_field('cta_background_image', $frontpage->ID),
		'full'
	);
	$peek_calendar_popup_link = "https://www.peek.com/s/15a8284c-0990-4986-a5b4-1754b0c0b014/3beY";
	$button_href = is_front_page() ? "#calendar-nav-target" : $peek_calendar_popup_link;
?>
<div class="cta">
	<a href="<?= $button_href ?>" class="peek-book-btn-red peek-book-button-flat peek-book-button-size-md" data-button-text="Book Now">Book Now</a>
</div>
