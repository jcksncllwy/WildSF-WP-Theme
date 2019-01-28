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
			<div class="container">
				<?php
					if ( have_posts() ){
						while ( have_posts() ) : the_post();
				?>
							<div class="row">
								<div class="col">
				<?php
									the_title( '<h1>', '</h1>' );
				?>
								</div>
							</div>
							<div class="row">
								<div class="col">
				<?php
							the_content();
						endwhile;
					}
				?>
				</div>
				</div>
				<div class="row" style="margin-top: 1em;">
					<?php
						$args = array( 'post_type' => 'tour');
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							include(locate_template('tour-grid.php'));
						endwhile;
					?>
				</div>
			</div>
		</div>
	</div>

	<?php
	get_template_part('footer');
	?>

</body>
</html>
