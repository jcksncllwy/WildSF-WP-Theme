<!DOCTYPE html>
<html>
<head>
	<?= get_header('common') ?>

	<style type="text/css" class="wp-dynamic-css">
	  .dotted-line{
	    background-image: url("<?= $dotted_line_image_url ?>");
	    border: 0;
	    height: 10px;
	    background-size: contain;
	  }
	  .private-tour-post > .private-tour-overlay {
	  	top: 0;
	  	text-align: center;
	  }

	  .private-tour-overlay {
	  	position: absolute;
	  	top: 0; right: 0; bottom: 0; left: 0;
	  	background: rgba(0,0,0,0.5);
	  	color: #fbf6eb;
	  	overflow: hidden;
	  	text-align: center;
	  	width: 100%;
	  	top: 100%;
	  }
	  .private-tour-overlay .overlay-inner {
	  	position: absolute;
	  	top: 50%;
	  	left: 50%;
	  	transform: translate(-50%, -50%);
	  	width: 80%;
	  	text-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
	  }
	  .private-tour-post {
	  	position: relative;
	  	float: left;
	  	overflow: hidden;
	  	margin-bottom: 30px;
	  	cursor: pointer;
	  	width: 100%;
	  	height: 0px;
	  	padding-bottom: 66.6666%;
	  }
	  .private-tour-post img {
	  	min-width: 100%;
	  	min-height: 100%;
	  }
	  .post-preview-button {
	  	background-color: transparent;
	  	display: inline-block;
	  	padding: 2px 20px 1px;
	  	border: 3px solid #fbf6eb;
	  	border-radius: 6px;
	  	font-family: "Roboto", sans-serif;
	  	text-transform: uppercase;
	  	font-size: 1em;
	  	font-weight: 700;
	  	cursor: pointer;
	  	color: #fbf6eb;
	  }
	  .post-preview-button {
	  	margin-top: 15px;
	  	text-shadow: none;
	  }
	  .post-preview-button:hover {
	  	background-color: #fbf6eb;
	  	color: rgba(0,0,0,0.5);
	  	text-decoration: none;
	  }

	  h1,h2,h3,h4,h5 {
	  	font-family: "Roboto Slab", serif;
	  	font-weight: bold;
	  	margin-bottom: 1.5rem;
	  }
	  h1,h2,h3,h5 {
	  	color: #3F616C;
	  }
	  h4, h5 {
	  	margin-bottom: .5rem;
	  }
	  .tour-thumb>a, .tour-thumb>a:hover {
	  	color: #fbf6eb;
	  	text-decoration: none;
	  }
	</style>

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
