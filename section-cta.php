<?php
	$frontpage = get_page_by_title('frontpage');
	$cta_group = get_field('call_to_action', $frontpage->ID);
	$big_cta = $cta_group['big_cta'];
	$little_cta = $cta_group['little_cta'];
	$button_text = $cta_group['button_text'];

	$accolades_group = get_field('accolades', $frontpage->ID);
	$TA_badge = wp_get_attachment_image_url(
		$accolades_group['trip_advisor'],
		'full'
	);
	$BOB_badge = wp_get_attachment_image_url(
		$accolades_group['best_of_the_bay'],
		'full'
	);

	$peek_calendar_popup_link = "https://www.peek.com/s/15a8284c-0990-4986-a5b4-1754b0c0b014/3beY";
	$button_href = is_front_page() ? "#calendar-nav-target" : $peek_calendar_popup_link;

?>
<style>
	.carousel-control-prev-icon {
	 background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%238c8984' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
	}
	.carousel-control-prev {
		left: -48px;
	}

	.carousel-control-next {
		right: -48px;
	}
	.past-clients-header {
		margin-top: 32px;
	}

	.carousel-control-next-icon {
	  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%238c8984' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
	}
</style>
<div class="section cta">
	<div class="row">
		<div class="col col-6 col-sm-3 order-sm-1 order-1">
			<img src="<?= $TA_badge ?>" />
		</div>
		<div class="col col-12 col-sm-6 order-sm-2 order-3">
			<h1><?= $big_cta ?></h1>
			<h2><?= $little_cta ?></h2>
			<div class="row">
				<h4 class="past-clients-header col-md-12">Our Clients</h4>
				<div class="col-md-12">
					<div id="pastClients" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php if( have_rows('past_clients', $frontpage->ID) ) :
								// check if the quote field has rows of data

								// loop through the rows of data
									while ( have_rows('past_clients', $frontpage->ID) ) : the_row();
									$imageURL = get_sub_field('slide_image');
									$active = get_sub_field('show_first');
								?>
								<div class="carousel-item <?php if ($active) echo "active";?>">
									<img class="d-block w-100" src="<?php echo $imageURL ?>" alt="slide-<?php echo $imageURL ?>">
								</div>

									<?php endwhile;

								else :

									// no rows found

								endif;

							?>
						</div>
						<a class="clients-prev carousel-control-prev" href="#pastClients" role="button" data-slide="prev">
							<span class="clients-prev-icon carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="clients-next carousel-control-next" href="#pastClients" role="button" data-slide="next">
							<span class="clients-next-icon carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col col-6 col-sm-3 order-sm-3 order-1">
			<img src="<?= $BOB_badge ?>" />
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a class="home-book" href="<?= $button_href ?>"><?= $button_text ?></a>
			<a href="tel:+14155801849" class="call-link">415-580-1849</a>
		</div>
	</div>

</div>
