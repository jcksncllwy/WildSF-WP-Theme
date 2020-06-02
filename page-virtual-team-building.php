<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

	<?php

		$dotted_line_image_id = 172;
		$dotted_line_image_url = wp_get_attachment_image_src($dotted_line_image_id, 'full')[0];

	?>

	<style type="text/css" class="wp-dynamic-css">
	  .list-image-inline > img,
	  .tour-type {
		  height: auto;
		  width: 100%;
	  }
	  .dotted-line{
	    background-image: url("<?= $dotted_line_image_url ?>");
	    border: 0;
	    height: 10px;
	    background-size: contain;
	  }
	  .request-form {
		background-color: #ee6552;
		color: #fbf6eb;
	  }
	  .header.form {
		margin: 40px 0 27px;
		font-family: "Monoton";
		font-size: 4em;
		text-transform: uppercase;
		text-align: center;
	  }
	  .tour-request {
		  margin-top: 62px;
		  margin-bottom: 100px;
	  }
	  .wpcf7 {
		  margin-bottom: 1.5em;
	  }
	  .wpcf7 > label {
		  display: none;
	  }
	  .wpcf7-form {
		  text-align: center;
	  }
	  .form-control,
	  .sib-email-area {
		  border: none;
		  border-radius: 0;
		  border-bottom: 1px solid #fbf6eb;
		  color: #fbf6eb;
		  background: transparent;
		  margin-bottom: .75em;
	  }
	  select {
		-webkit-appearance: none;
		-webkit-border-radius: 0px;
	  }
		.form-control::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		color: #fbf6eb;
		}
		.form-control::-moz-placeholder { /* Firefox 19+ */
		color: #fbf6eb;
		}
		.form-control:-ms-input-placeholder { /* IE 10+ */
		color: #fbf6eb;
		}
		.form-control:-moz-placeholder { /* Firefox 18- */
		color: #fbf6eb;
		}

		.sib-email-area::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		color: #fbf6eb;
		}
		.sib-email-area::-moz-placeholder { /* Firefox 19+ */
		color: #fbf6eb;
		}
		.sib-email-area:-ms-input-placeholder { /* IE 10+ */
		color: #fbf6eb;
		}
		.sib-email-area:-moz-placeholder { /* Firefox 18- */
		color: #fbf6eb;
		}

		.form-control:focus,
		.sib-email-area:focus {
		    color: #fbf6eb;
		    outline: 0;
  			border-bottom: 2px solid #fbf6eb;
			box-shadow: none;
			background-color: rgba(255,255,255,.15);
		}
		.wpcf7-submit,
		.email-request-button,
		.post-preview-button {
			background-color: transparent;
			display: inline-block;
			padding: 2px 20px 1px;
			border: 3px solid #fbf6eb;
			border-radius: 6px;
			font-family: "Roboto", sans-serif;
			text-transform: uppercase;
			font-size: 1em;
			font-weight: 700;
			cursor: pointer;
			color: #fbf6eb;
		}
		.wpcf7-response-output {
			margin: 80px 0 0 !important;
		}
		.post-preview-button {
			margin-top: 15px;
			text-shadow: none;
		}
		.wpcf7-submit {
			margin-top: 30px;
			float: right;
		}
		div.wpcf7-mail-sent-ok {
			border: 2px solid #fbf6eb;
		}
		.wpcf7-submit:hover {
			background-color: #fbf6eb;
			color: #bf5246;
			text-decoration: none;
		}
		.email-request-button:hover {
			background-color: #fbf6eb;
			color: #4F4E4C;
			text-decoration: none;
		}
		.cta-email {
			background-color: #4F4E4C;
			color: #fbf6eb;
			padding: 100px 15px;
		}
		.private-book-button {
			background-color: transparent;
			margin-top: 27px;
			display: inline-block;
			padding: 10px 20px;
			border: 5px solid #bf5246;
			border-radius: 5px;
			font-family: "Roboto", sans-serif;
			text-transform: uppercase;
			font-size: 0.8em;
			font-weight: 700;
			cursor: pointer;
			color: #bf5246;
			font-size: 1.2em;
		}
		.private-book-button:hover {
			background-color: #bf5246;
			color: #fbf6eb;
			text-decoration: none;
		}
		.private-tour-group > .group-cta {
			margin-top: 20px;
			margin-bottom: 20px;
		}
		@media screen and (max-width: 575.98px) {
			.private-tour-group {
				text-align: center;
			}
		}
		.private-tour-post > .private-tour-overlay {
			top: 0;
			text-align: center;
		}

		.private-tour-overlay {
			position: absolute;
			top: 0; right: 0; bottom: 0; left: 0;
			background: rgba(0,0,0,0.1);
			color: #fbf6eb;
			overflow: hidden;
			text-align: center;
			width: 100%;
			top: 100%;
		}
		.private-tour-overlay .overlay-inner {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 80%;
			text-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
		}
		.private-tour-post {
			position: relative;
			float: left;
			overflow: hidden;
			margin-bottom: 30px;
			cursor: pointer;
		}
		.private-tour-post img {
			max-width: 100%;
		}
		.post-preview-button:hover {
			background-color: #fbf6eb;
			color: rgba(0,0,0,0.5);
			text-decoration: none;
		}
		h1,h2,h3,h4,h5 {
			font-family: "Roboto Slab", serif;
			font-weight: bold;
		    margin-bottom: 1.5rem;
		}
		h1,h2,h3,h5 {
			color: #3F616C;
		}
		h4, h5 {
			margin-bottom: .5rem;
		}
		.close {
			font-size: 1rem;
			color: white;
			font-weight: 100;
			opacity: 1;
			text-shadow: unset;
		}
		.modal-lg {
			max-width: 1170px;
		}
		.modal-dialog {
			height: 90%;
		}
		.modal-content {
		    height: 100%;
		}
		.modal-body {
			height: calc(100% - 15px);
			overflow-y: scroll;
		}
		.tour-modal-content {
			border-radius: 0px;
		    background: transparent;
		    border: none;
		}
		.tour-modal-body {
		    background: #fbf6eb;
		}
		.tour-image-holder {
			height: 200px;
		}
		.tour-main {
			margin: 45px 0;
		}
		.tour-panel-right {
			background: #F5EFE3;
			height: 100%;
			padding: 35px 30px 30px !important;
		}
		.highlights, .perfect_for {
			margin-bottom: 1rem;
		}
		.past-clients-header, .specialty-experiences, .neighborhood-tours {
			font-family: "roboto slab";
			font-size: 20px;
			color: #3F616C;
		}
		.past-clients-header {
			text-transform: uppercase;
		}
		.specialty-experiences, .neighborhood-tours {
			text-align: center;
			margin-bottom: 30px;
		}
		.clients-next {
		    right: -20px !important;
		}
		.clients-prev {
			left: -20px !important;
		}
		.carousel-control-next-icon {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='#f4e7c9' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
		}
		.carousel-control-prev-icon {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='#f4e7c9' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
		}
		.tour-carousel-next-icon {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='#bf5246' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
		}
		.tour-carousel-prev-icon {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='#bf5246' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
		}
		.carousel-control-next, .carousel-control-prev {
			width: auto;
		    text-align: center;
		    opacity: 1;
		}
		#tourCarousel {
			position: static;
		}
	</style>

</head>
<body>
	<?php
		get_template_part('navbar');

	?>
	<div class="virtual-team-building-container">
		<div class="virtual-team-building-inner">
		<?php
			if ( have_posts() ){
				while ( have_posts() ) : the_post();
		?>
				<div class="container-fluid">
					<div class="row align-items-center">
						<?php $image = get_field('hero_image');
							if( !empty($image) ): ?>
							<div
								class="order-sm-2 col-sm-6 offset-sm-1"
								style="background-size: cover; background-image: url('<?php echo $image; ?>'); background-repeat: no-repeat;background-position: center; height: 95vh;">
							</div>
						<?php endif; ?>
						<div class="order-sm-1 col-sm-4 offset-sm-1" style="margin-top:4em;">
							<div>
								<h1><?= the_title(); ?></h1>
								<p><?= the_field('hero_text'); ?></p>
								<a class="private-book-button" href="#vtb-form"><?= the_field('cta_button_text'); ?></a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="mx-auto col-9">
							<p><?= the_field('intro_section'); ?></p>
						</div>
					</div>
					<div class="row" style="margin-top: 50px;">
						<div class="mx-auto col-8">
							<div class="past-clients-header col-md-12 text-center">Past Clients</div>
							<div id="pastClients" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<?php if( have_rows('past_clients') ):
										// check if the quote field has rows of data

										// loop through the rows of data
											while ( have_rows('past_clients') ) : the_row();
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
					<div class="row">
						<div class="col-8">
							<hr class="dotted-line">
						</div>
					</div>
					<div id="quote-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php if( have_rows('tour_quotes') ):
								// check if the quote field has rows of data

							 	// loop through the rows of data
							    while ( have_rows('tour_quotes') ) : the_row();
									$name = get_sub_field('name');
									$source = get_sub_field('source');
									$link = get_sub_field('link');
									$quote = get_sub_field('quote');
									$active = get_sub_field('show_first');
									$open_quote_url = wp_get_attachment_image_url(
										get_field('open_quote'),
										'full'
									);
									$close_quote_url = wp_get_attachment_image_url(
										get_field('close_quote'),
										'full'
									);
									$space = " ";
								?>
								<div class="carousel-item <?php if ($active) echo "active";?>">
									<div class="section quote">
										<img class="open-quote quote-img" src="<?= $open_quote_url ?>" />

										<div class="quote-container">
											<div class="quote">
												<img class="close-quote quote-img mobile" src="<?= $close_quote_url ?>" />
												<?= $quote ?>
											</div>
											<div class="logo">
												<?= $source?>
											</div>
										</div>

										<img class="close-quote quote-img" src="<?= $close_quote_url ?>" />
									</div>
								</div>

			    				<?php endwhile;

								else :

			    				// no rows found

								endif;

							?>
						</div>
						<a class="carousel-control-prev" href="#quote-carousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#quote-carousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="row">
						<div class="col-10">
							<hr class="dotted-line">
						</div>
					</div>
					<div class="row">
						<div class="col-6 offset-6">
							<hr class="dotted-line">
						</div>
					</div>
					<div class="page-sections">
						<?php if( have_rows('sections') ):
							// check if the quote field has rows of data

							// loop through the rows of data
								while ( have_rows('sections') ) : the_row();
								$section_title = get_sub_field('title');
								$content = get_sub_field('section_content');
								$imageURL = get_sub_field('section_image');
							?>
								<div class="page-section row align-items-center">
									<?php if ( get_row_index() % 2 == 0 ) : ?>
										<div class="section-image order-sm-2 col-sm-7 col-md-6 col-lg-5 offset-lg-1">
											<img class="tour-type"src="<?php echo $imageURL ?>" />
										</div>
										<div class="group-cta order-sm-1 col-sm-5 offset-md-1">
											<h2><?php echo $section_title ?></h2>
											<div><?= $content ?></div>
											<a class="private-book-button" href="#vtb-form"><?= the_field('cta_button_text'); ?></a>
										</div>
									<?php else : ?>
										<div class="section-image col-sm-7 col-md-6 col-lg-5">
												<img class="tour-type"src="<?php echo $imageURL ?>" />
										</div>
										<div class="section-cta col-sm-5 offset-md-1">
											<h2><?php echo $section_title ?></h2>
											<div><?= $content ?></div>
											<a class="private-book-button" href="#vtb-form"><?= the_field('cta_button_text'); ?></a>
										</div>
									<?php endif; ?>
								</div>
							<?php endwhile;

							else :

								// no rows found

							endif;

						?>
					</div>
					<div class="row">
						<div class="col-10 offset-2">
							<hr class="dotted-line">
						</div>
					</div>
					<div id="vtb-form" class="request-form row justify-content-md-center">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-8">
									<div class="header form"><?= the_field('cta_button_text'); ?></div>
									<p class="lead" style="text-align: center">Tell us who you are, and we’ll plan your perfect experience!</p>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-sm-8" style="margin-bottom: 40px;">
									<?= the_field('tour_request_form'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row no-gutters">
						<div class="col-10">
							<hr class="dotted-line">
						</div>
					</div>
					<div class="row cta-email justify-content-center">
						<div class="col-sm-8 text-center">
							<?php

							// vars
							$cta = get_field('end_of_page_cta');

							if( $cta ): ?>
								<h3 style="color: #fbf6eb;"><?php echo $cta['main_text']; ?></h3>
								<div class="lead" style="padding-bottom: 38px;">
									<?php echo $cta['body']; ?>
								</div>
								<div>
									<?php echo $cta['contact_form_shortcode']; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
		<?php
				endwhile;
			}
		?>
		</div>
	</div>
	<!-- Prevent Multi Submit on WPCF7 forms -->
	<script type="text/javascript">
	var disableSubmit = false;
	jQuery('input.wpcf7-submit[type="submit"]').click(function() {
	    jQuery(':input[type="submit"]').attr('value',"Sending...")
	    if (disableSubmit == true) {
	        return false;
	    }
	    disableSubmit = true;
	    return true;
	})

	var wpcf7Elm = document.querySelector( '.wpcf7' );
	wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
	    jQuery(':input[type="submit"]').attr('value',"send")
	    disableSubmit = false;
	}, false );
	</script>

	<script>
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/thank-you-from-wild-sf';
	}, false );
	</script>


	<script>
	//fill tour ID from contact name//
	$('#contact-name').blur(function(){
		var rdm = Math.floor(Math.random() * 100000) + 1;
		var last = $('#contact-name').val().match(/\w+$/)[0];
		$('#tour-id').val(last+rdm);
	});
	</script>

	<?php
		get_template_part('footer');
	?>
</body>
</html>
