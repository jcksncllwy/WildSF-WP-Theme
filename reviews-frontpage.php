<?php
	$frontpage = get_page_by_title('frontpage');
	$reviews = get_field('reviews', $frontpage);
	$yelp_logo = wp_get_attachment_image_url(
		$reviews['yelp_logo'], 
		'full'
	);
	$yelp_stars = wp_get_attachment_image_url(
		$reviews['yelp_stars'], 
		'full'
	);
	$ta_logo = wp_get_attachment_image_url(
		$reviews['tripadvisor_logo'], 
		'full'
	);
	$ta_stars = wp_get_attachment_image_url(
		$reviews['tripadvisor_stars'], 
		'full'
	);

	$social_links = get_field('social_links', $frontpage);
	$yelp_link = $social_links['yelp'];
	$ta_link = $social_links['tripadvisor'];
?>
<div class="reviews">
	<div class="reviews-inner row no-gutters justify-content-between">
		<div class="yelp-container col">
			<div class="logo-rating-container">
				<img class="logo" src="<?= $yelp_logo ?>" />
				<img class="rating" src="<?= $yelp_stars ?>" />
			</div>
			<div class="review-container">
				<div class="review">
					"I had such a nice day with wild SF. If you ever want to find out something about the real San Francisco go there!"
				</div>
				<a class="read-more-button" href="<?= $yelp_link ?>">Read More</a>
			</div>
		</div>
		<div class="ta-container col">

			<div class="logo-rating-container">
				<img class="logo" src="<?= $ta_logo ?>" />
				<img class="rating" src="<?= $ta_stars ?>" />
			</div>

			<div class="review-container">
				<div class="review">
					"Wes is hilarious and I had an absolute blast learning about San Francisco and listening to his unique songs on his ukelele."
				</div>
				<a class="read-more-button" href="<?= $ta_link ?>">Read More</a>
			</div>
			
		</div>
	</div>
</div>