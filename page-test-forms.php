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
		?>
					<h1><?= the_title(); ?></h1>
					<?= the_content(); ?>
                    <button type="button" name="button" onclick="altSubmit()">alt submit</button>
		<?php
				endwhile;
			}
		?>
		</div>
	</div>

<?php
	get_template_part('footer');
?>

<script>
    function altSubmit() {
        $('.wpcf7-form').submit();
        console.log('cool');
    }
</script>
</body>
</html>
