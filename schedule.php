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
				<div class="row">
					<div class="col-10 mr-auto">
						<?= the_content(); ?>
					</div>
				</div>
			</div>
			<div class="schedule">
				<hr class="dotted-line"/>
				<div class="schedule-head">
					Schedule of Events
				</div>
				<hr class="dotted-line"/>
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
