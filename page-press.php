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
	  <?php if( have_rows('repeater_field_name') ): ?>
		<div class="press-items">
		  	<?php while( have_rows('repeater_field_name') ): the_row();

				// vars
				$source = get_sub_field('source');
				$link = get_sub_field('link');
				$link_url = $link['url'];
				$link_title = $link['title'];

			?>

				<div class="press-item">
					<?php if( $link ): ?>
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
