<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

</head>
<body>
	<?php
		get_template_part('nav', 'normal');

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

</body>
</html>
