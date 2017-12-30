<?php
	$frontpage = get_page_by_title('frontpage');
	$cta_background_image_url = wp_get_attachment_image_url(
		get_field('cta_background_image', $frontpage->ID),
		'full'
	);
?>
<div class="cta">
	<a href="https://www.peek.com/s/15a8284c-0990-4986-a5b4-1754b0c0b014/8MW" class="peek-book-btn-red peek-book-button-flat peek-book-button-size-md" data-button-text="Book Now">Book Now</a>
</div>
