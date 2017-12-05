<?php
	$frontpage = get_page_by_title('frontpage');
	$image_id = get_field('splash_logo', $frontpage->ID);
	$splash_logo_image_url = wp_get_attachment_image_url($image_id, 'full');
  	$splash_background_image_url = wp_get_attachment_image_url(
  		get_field('splash_background_image', $frontpage), 'full');
?>
<style type="text/css" class="splash-frontpage-css">
	.splash{
		background-image: url("<?= $splash_background_image_url ?>");
		background-position: center;
		background-size:cover;
		background-repeat:no-repeat;
	}
</style>
<div class="splash">
	<div class="splash-logo">
		<img src=" <?= $splash_logo_image_url ?> ">
	</div>
</div>

