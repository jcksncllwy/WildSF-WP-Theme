<!DOCTYPE html>
<html>
<head>

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
