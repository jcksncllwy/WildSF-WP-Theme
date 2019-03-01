<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

</head>
<body class="press">
	<?php
		get_template_part('navbar');
	?>
	<div class="page-container">
		<div class="page-inner">

	      <div class="header">
	        Press
	      </div>
		  <?php
			  if ( have_posts() ){
				  while ( have_posts() ) : the_post();
					  the_content();
		  ?>
			  <?php if( have_rows('press-item') ): ?>
				<div class="press-items">
				  	<?php while( have_rows('press-item') ): the_row();

						// vars
						$source = get_sub_field('source');
						$link = get_sub_field('link');
					?>

						<div class="press-item">
							<div class="article-link">
								<?php echo $link ?>
							</div>
							<div class="author"><?php echo $source; ?></div>
						</div>

					<?php endwhile; ?>

				</div>

			  <?php endif; ?>


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
