<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

	<?php
		global $post;
		$this_tour_id = $post->ID;
		$splash_video_url = get_field('splash_video', $this_tour_id);

		$scroll_helper_image_id = 150;
		$scroll_helper_image_url = wp_get_attachment_image_src($scroll_helper_image_id, 'full')[0];

		$dotted_line_image_id = 172;
	  $dotted_line_image_url = wp_get_attachment_image_src($dotted_line_image_id, 'full')[0];

	?>
	<style type="text/css" class="wp-dynamic-css">
	  .dotted-line{
	    background-image: url("<?= $dotted_line_image_url ?>");
	    border: 0;
	    height: 10px;
	    background-size: contain;
	  }
	</style>


</head>
<body class="about-us">
	<?php
		get_template_part('navbar');
	?>
	<div class="page-container">
		<div class="page-inner">

			<div class="wp-admin-content">
				<?php
					if ( have_posts() ){
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
					}
				?>
			</div>



			<div class="guides-container">
				<div class="guides-inner">
					<div class="guides-header">Your Guides</div>
					<div class="guides-list">
						<?php
						$args = array( 'post_type' => 'tourguide' );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						?>
							<div class="guide-container">
								<div class="guide-headshot-container">
									<img src="<?= get_field('headshot_image') ?>" />
								</div>
								<div class="guide-name">
									<?= the_title() ?>
								</div>
								<div class="guide-description">
									<?= get_field('description') ?>
								</div>
							</div>
						<?php
						endwhile;
						?>
					</div>
				</div>
			</div>


		</div>
	</div>

</body>
</html>
