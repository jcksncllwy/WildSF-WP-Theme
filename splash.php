<?php
	$frontpage = get_page_by_title('frontpage');
	$image_id = get_field('splash_logo', $frontpage->ID);
	$splash_logo_image_url = wp_get_attachment_image_url($image_id, 'full');
?>
<div class="splash">
	<div class="splash-logo">
		<img src=" <?= $splash_logo_image_url ?> ">
	</div>
</div>