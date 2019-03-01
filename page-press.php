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
	  <?php if( have_rows('press-item') ): ?>
		<div class="press-items">
		  	<?php while( have_rows('press-item') ): the_row();

				// vars
				$source = get_sub_field('source');
				$link = get_sub_field('link');
			?>

				<div class="press-item">
					<?php if( $link ):
						$link_url = $link['url'];
						$link_title = $link['title'];
						?>
						<a class="article-link" href="<?php echo $link_url; ?>" target="_blank">
							<?php echo $link_title; ?>
						</a>
					<?php endif; ?>
					<div class="author"><?php echo $source; ?></div>
				</div>

			<?php endwhile; ?>

		</div>

	  <?php endif; ?>

      <div class="wp-admin-content">
    		<?php
    			if ( have_posts() ){
    				while ( have_posts() ) : the_post();
    					the_content();
    				endwhile;
    			}
    		?>
      </div>

		</div>
	</div>

  <?php
  	get_template_part('footer');
  ?>

</body>
</html>
