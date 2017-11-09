<?php 
	$tour_background_image_url = wp_get_attachment_image_url(get_field('frontpage_splash_image'), 'full');
	$tour_background_color = get_field('background_color');
	$tour_info_display_class = get_field('frontpage_info_class');
?>
<style type="text/css" class="tour-frontpage-css">
#tour-<?= the_ID() ?>{
	background:
		linear-gradient(to right, rgba(0,0,0,1) 25%,rgba(0,0,0,0) 50%,rgba(0,0,0,1) 75%),
		url(<?= $tour_background_image_url ?>),
		linear-gradient(to right, rgba(0,0,0,1) 0%,rgba(0,0,0,1) 100%);
	background-position: center, center, center;
	background-size:cover, contain, cover;
	background-repeat:no-repeat, no-repeat, no-repeat;
	
}
@media (max-width: 767px){
	#tour-<?= the_ID() ?>{
		background: linear-gradient(to bottom, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 50%,rgba(0,0,0,1) 100%), url(<?= $tour_background_image_url ?>);
		background-position: center, center, center;
		background-size:cover, cover, cover;
		background-repeat:no-repeat, no-repeat, no-repeat;
	}
}
</style>

<div class="tour <?= $tour_info_display_class ?>" id="tour-<?= the_ID() ?>">
	<div class="tour-info <?= $tour_info_display_class ?>">
		<div class="tour-header nav-target" id="tour-<?= the_ID() ?>-header">
			<div class="tour-title"><?= the_title(); ?></div>
			<div class="tour-subtitle"><?= get_field('subtitle') ?></div>
		</div>
		
		<div class="tour-summary"><?= get_field('frontpage_summary') ?></div>
		
		<?php
		while( have_rows('frontpage_highlights') ): the_row();
		$highlight_text = get_sub_field('highlight');
		?>
			<div class='tour-sight'>
				<span>★</span>
				<?= $highlight_text ?>
			</div>
		<?php
		endwhile;
		?>
		
	</div>
	
</div>