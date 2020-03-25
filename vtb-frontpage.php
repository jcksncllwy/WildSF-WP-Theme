<?php
	$frontpage = get_page_by_title('frontpage');
	$featured_vtb = get_page_by_title('Virtual Team Building');
	$tour_background_image_url = get_field( 'frontpage_splash_image', $featured_vtb);
	$tour_color = get_field('tour_color', $featured_vtb);
?>
<style type="text/css" class="tour-frontpage-css">
#tour-4094 .tour-image{
	background: linear-gradient(to right, <?= $tour_color ?> 0%,rgba(0,0,0,0) 15%,rgba(0,0,0,0) 100%), url(<?= $tour_background_image_url ?>);
	background-position: center;
	background-size:cover;
	background-repeat:no-repeat;
}
#tour-4094 .tour-info{
	background-color: <?= $tour_color ?> ;
}
@media (max-width: 767px){
	#tour-4094 .tour-image.mobile {
		border-top: 10px solid <?= $tour_color ?>;
	}
	#tour-4094 .tour-image{
		background: url(<?= $tour_background_image_url ?>);
		background-position: center;
		background-size:cover;
		background-repeat:no-repeat;
	}
}
</style>
<div class="row tour nav-target" id="tour-4094">
	<meta property="og:image" content="<?= $tour_background_image_url ?>">
	<a href="<?= get_permalink($featured_vtb) ?>" class="tour-image col-md-7 mobile"></a>
	<div class="tour-info col-md-6 col-lg-5">
		<div class="tour-info-inner">
			<div class="tour-header" id="tour-4094-header">
				<a href="<?= get_permalink($featured_vtb) ?>">
					<h2 class="tour-title mobile-hidden"><?= get_field('frontpage_title',$featured_vtb) ?></h2>
					<h2 class="tour-title mobile-only"><?= get_field('frontpage_mobile_title',$featured_vtb) ?></h2>
					<h3 class="tour-subtitle"><?= get_field('subtitle',$featured_vtb) ?></h3>
				</a>
			</div>
			<div class="tour-summary"><?= get_field('frontpage_summary',$featured_vtb) ?></div>
			<div class="tour-actions">
				<a href="<?= get_permalink($featured_vtb) ?>" class="book-now cta-button" style="color: <?= $tour_color ?>">Book Now</a>
				<a href="<?= get_permalink($featured_vtb) ?>" class="learn-more cta-button">Learn More</a>
			</div>
		</div>
	</div>
	<div class="tour-image col-md-6 col-lg-7"></div>
</div>
