<?php 
	$tour_background_image_url = wp_get_attachment_image_url(get_field('frontpage_splash_image'), 'full');
	$tour_color = get_field('tour_color');
	$left_or_right = get_field('left_or_right');
?>
<style type="text/css" class="tour-frontpage-css">
#tour-<?= the_ID() ?> .tour-image{
	background: linear-gradient(to right, <?= $tour_color ?> 0%,rgba(0,0,0,0) 15%,rgba(0,0,0,0) 100%), url(<?= $tour_background_image_url ?>);
	background-position: center;
	background-size:cover;
	background-repeat:no-repeat;
}
#tour-<?= the_ID() ?> .tour-info{
	background-color: <?= $tour_color ?> ;
}
@media (max-width: 767px){
	#tour-<?= the_ID() ?> .tour-image{
		background: url(<?= $tour_background_image_url ?>);
		background-position: center;
		background-size:cover;
		background-repeat:no-repeat;
	}
}
</style>

<div class="row tour nav-target" id="tour-<?= the_ID() ?>">

	<div class="tour-image col-md-7 mobile">
	</div>

	<div class="tour-info col-md-5">
		<div class="tour-info-inner">
			<div class="tour-header" id="tour-<?= the_ID() ?>-header">
				<div class="tour-title"><?= get_field('frontpage_title') ?></div>
				<div class="tour-subtitle"><?= get_field('subtitle') ?></div>
			</div>
			
			<div class="tour-summary"><?= get_field('frontpage_summary') ?></div>

			<a class="learn-more-button">Learn More</a>
		</div>
	</div>
	
	<div class="tour-image col-md-7">
	</div>
	
</div>











