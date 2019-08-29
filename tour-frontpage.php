<?php
	$tour_background_image_url = wp_get_attachment_image_url(get_field('frontpage_splash_image'), 'large');
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
	#tour-<?= the_ID() ?> .tour-image.mobile{
		border-top: 10px solid <?= $tour_color ?>;
	}
	#tour-<?= the_ID() ?> .tour-image{
		background: url(<?= $tour_background_image_url ?>);
		background-position: center;
		background-size:cover;
		background-repeat:no-repeat;
	}
}
</style>

<div class="row tour nav-target" id="tour-<?= the_ID() ?>">
	<meta property="og:image" content="<?= $tour_background_image_url ?>">

	<a href="<?= get_permalink() ?>" class="tour-image col-md-7 mobile">
	</a>

	<div class="tour-info col-md-6 col-lg-5">
		<div class="tour-info-inner">
			<div class="tour-header" id="tour-<?= the_ID() ?>-header">
				<a href="<?= get_permalink() ?>">
					<div class="tour-title mobile-hidden"><?= get_field('frontpage_title') ?></div>
					<div class="tour-title mobile-only"><?= get_field('frontpage_mobile_title') ?></div>
					<div class="tour-subtitle"><?= get_field('subtitle') ?></div>
				</a>
			</div>

			<div class="tour-summary"><?= get_field('frontpage_summary') ?></div>
			<div class="tour-actions">
				<a href="#calendar-nav-target" class="book-now cta-button" style="color: <?= $tour_color ?>">Book Now</a>
				<a href="<?= get_permalink() ?>" class="learn-more cta-button">Learn More</a>
				<?php if (get_field('spanish_tour_option')) { ?>
					<a href="<?= get_field('spanish_tour_link') ?>" class="es-learn-more cta-button" style="display:block">En Español</a>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="tour-image col-md-6 col-lg-7">
	</div>

</div>
