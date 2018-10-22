<!DOCTYPE html>
<html>
<head>
	<style>
		.page-container {
			padding-top: 48px;
		}
		.page-inner {
			background-color: white;
			padding: 0 30px;
		}
		.dotted-line{
			background-image: url("<?= $dotted_line_image_url ?>");
			border: 0;
			height: 10px;
			background-size: contain;
		}
	</style>
	<?= get_header('common') ?>
</head>
<body>
	<?php
		get_template_part('navbar');

	?>
	<div class="page-container">
		<div class="page-inner">
		<?php
			if ( have_posts() ){
				while ( have_posts() ) : the_post();
		?>
			<div class="post-summary">
				<h1><?= the_title(); ?></h1>
				<?= the_excerpt() ?>
				<hr class="dotted-line">
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
