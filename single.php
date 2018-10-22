<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

	<style>
	.page-container {
		padding-top: 48px;
	}
	.page-inner {
		background-color: white;
		padding: 0 30px;
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
					the_title( '<h1>', '</h1>' );
					the_content();
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
