<!DOCTYPE html>
<html>
<head>

	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet">
	<link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
	<?php get_template_part('dynamic-css') ?>

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<!-- /BOOTSTRAP -->

	<meta name="viewport" content="width=device-width">

</head>
<body>
	<?php
		get_template_part('nav', 'normal');

	?>
	<div class="page-container default-background-image">
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