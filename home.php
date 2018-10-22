<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

	<?php

		$dotted_line_image_id = 172;
		$dotted_line_image_url = wp_get_attachment_image_src($dotted_line_image_id, 'full')[0];

	?>

	<style>
		.page-container {
			padding-top: 48px !important;
		}
		.page-inner {
			background-color: white;
			padding: 0 30px;
		}
		.post-summary {
			padding: 3rem 0;
		}
		.dotted-line{
			background-image: url("<?= $dotted_line_image_url ?>");
			border: 0;
			height: 10px;
			background-size: contain;
		}
		a, a:hover {
			color: #bf5246;
		}
	</style>
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
				<h1><a href="<?php echo get_permalink(); ?>"><?= the_title(); ?></a></h1>
				<?= the_excerpt() ?>
				<a href="<?php echo get_permalink(); ?>"> Read More...</a>
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
