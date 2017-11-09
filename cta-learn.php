<?php
	$frontpage = get_page_by_title('frontpage');
	$cta_background_image_url = wp_get_attachment_image_url(
		get_field('cta_background_image', $frontpage->ID), 
		'full'
	);
?>
<div class="cta">
	<a href="<?= get_permalink() ?>" class="cta-link">
		<div class="cta-text">Learn More</div>
		<img src="<?= $cta_background_image_url ?>" />
	</a>
</div>