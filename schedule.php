<!DOCTYPE html>
<?php
/*
Template Name: Schedule
Template Post Type: page
*/
?>
<html>
<head>

	<?= get_header('common') ?>
	<?php
		$dotted_line_image_id = 172;
	  	$dotted_line_image_url = wp_get_attachment_image_src($dotted_line_image_id, 'full')[0];
	?>
	<style type="text/css" class="wp-dynamic-css">
	  .dotted-line{
	    background-image: url("<?= $dotted_line_image_url ?>");
	    border: 0;
	    height: 10px;
	    background-size: contain;
	  }
	</style>
</head>

<body>
	<?php
		get_template_part('navbar');

	?>
	<div class="page-container schedule-page">
		<div class="container">
			<div class="top-content">
				<div class="row">
					<?php
						if ( have_posts() ){
							while ( have_posts() ) : the_post();
					?>
					<div class="col-12">
						<h1><?= the_title(); ?></h1>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-10 col-lg-6">
						<?= the_content(); ?>
					</div>
				</div>
			</div>
			<div class="schedule">
				<div class="row justify-content-center">
					<div class="col-md-10 col-lg-7">
						<hr class="dotted-line"/>
						<h3 class="schedule-subtitle">Schedule of Events</h3>
						<hr class="dotted-line"/>
					</div>
				</div>
				<div class="row justify-content-center">
						<?php
						// Check rows exists.
						if( have_rows('session') ):
						?>
						<div class="col col-lg-8 sessions">
							<?php
						  // Loop through rows.
						  while( have_rows('session') ) : the_row();

						      // Load sub field values.
						      $time = get_sub_field('time');
									$name = get_sub_field('name');
									$description = get_sub_field('description');
							?>
							<div class="row session-row">
								<div class="col-sm-2">
									<?= $time ?>
								</div>
								<div class="col-sm-10">
									<h4><?= $name ?></h4>
									<p><?= $description ?></p>
									<?php
									// Add main session link if there is one
										if( !empty(get_sub_field('link')) ):
										$link = get_sub_field('link');
									?>
										<a href="<?= $link ?>" class="btn btn-sm btn-sess float-right" target="_blank">join</a>
									<?php endif;

									// Loop over session options if any
					        if( have_rows('options') ):
					            while( have_rows('options') ) : the_row();
					                // Get sub value.
					                $option_name = get_sub_field('option_name');
													$option_description = get_sub_field('option_description');
													$option_link = get_sub_field('option_link');
													?>
										  <div class="row session-option">
												<div class="col">
													<b><?= $option_name ?> - </b><?= $option_description ?>
													<a href="<?= $option_link ?>" class="btn btn-sm btn-sess float-right" target="_blank">join</a>
												</div>
											</div>
											<?php
											// done with session options
					            endwhile;
					        endif;
						      ?>
								</div>
							</div>
							<?php
						  // End session rows.
						  endwhile;
							?>
						</div>


						<?php
						// No value.
						else :
						  // Do something...
						endif;

						?>
				</div>
			</div>

			<?php
					endwhile;
				}
			?>
		</div>
	</div>

<?php
	get_template_part('footer');
?>

</body>
</html>
