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

</head>
<body>
	<?php
		get_template_part('navbar');

	?>
	<div class="page-container schedule-page">
		<div class="container">
			<?php
				if ( have_posts() ){
					while ( have_posts() ) : the_post();
			?>
						<h1><?= the_title(); ?></h1>
						<?= the_content(); ?>
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
