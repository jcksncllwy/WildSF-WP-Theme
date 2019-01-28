<style type="text/css" class="wp-dynamic-css">
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

<div class="col-md-6 tour-thumb">
	<a class="text-center" href="<?= get_permalink() ?>">
		<div class="private-tour-post">
			<img src="<?= wp_get_attachment_image_url(get_field('frontpage_splash_image'), 'large') ?>" alt="<?= get_field('frontpage_title') ?>">
			<div class="private-tour-overlay">
				<div class="align-middle overlay-inner">
					<h4><?= get_field('frontpage_title') ?></h4>
					<div class="tour-subtitle">
						<?= get_field('subtitle') ?>
					</div>
					<a class="btn post-preview-button" href="<?= get_permalink() ?>">More</a>
				</div>
			</div>
		</div>
	</a>
</div>
