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

	<!-- PEEK PRO -->
	<script type="text/javascript">
	  (function(config) {
	    window._peekConfig = config || {};
	    var idPrefix = 'peek-book-button';
	    var id = idPrefix+'-js'; if (document.getElementById(id)) return;
	    var head = document.getElementsByTagName('head')[0];
	    var el = document.createElement('script'); el.id = id;
	    var date = new Date; var stamp = date.getMonth()+"-"+date.getDate();
	    var basePath = "https://js.peek.com";
	    el.src = basePath + "/widget_button.js?ts="+stamp;
	    head.appendChild(el); id = idPrefix+'-css'; el = document.createElement('link'); el.id = id;
	    el.href = basePath + "/widget_button.css?ts="+stamp;
	    el.rel="stylesheet"; el.type="text/css"; head.appendChild(el);
	  })({key: '15a8284c-0990-4986-a5b4-1754b0c0b014'});
	</script>
	<!-- /PEEK PRO -->

	<meta name="viewport" content="width=device-width">

</head>
<?php
	global $post;
	$this_tour_id = $post->ID;
	$splash_video_url = get_field('splash_video', $this_tour_id);

	$scroll_helper_image_id = 150;
	$scroll_helper_image_url = wp_get_attachment_image_src($scroll_helper_image_id, 'full')[0]; 

	$frontpage = get_page_by_title('frontpage');
	$cta_background_image_url = wp_get_attachment_image_url(
		get_field('cta_background_image', $frontpage->ID), 
		'full'
	);

?>
<body>
	<?php
		get_template_part('nav', 'normal');
	?>
	<div class="single-tour default-background-image">
		<div class="single-tour-inner">
			
			<div class="splash-container">
				<?php
				if(!empty($splash_video_url)){
				?>
				<video class="splash-video" autoplay loop muted>
                    <source src="<?= $splash_video_url ?>" type="video/mp4">
                </video>
                <?php
	        	}
	        	?>
                <div class="splash-title-container">
                	<div class="title">
                		<?= get_the_title($this_tour_id) ?>
                	</div>
                	<div class="subtitle">
                		<?= get_field('subtitle', $this_tour_id) ?>
                	</div>
                </div>
                <div class="scroll-helper-container">
                	<div class="scroll-helper">
                		<img src="<?= $scroll_helper_image_url ?>" />
                	</div>
                </div>
			</div>
			<hr class="dotted-line" />
			<div class="wysiwyg-container">
				<div class="wysiwyg-inner">
					<?= get_field('description', $this_tour_id) ?>
					<?= get_field('timing', $this_tour_id) ?>
					<?= get_field('pricing', $this_tour_id) ?>
					<?= get_template_part('cta', 'book'); ?>
				</div>
			</div>
			<?php 
			$explainer_video = get_field('explainer_video', $this_tour_id);
			if(!empty($explainer_video)){
			?>
			<hr class="dotted-line" />
			<div class="explainer-video-container">
				<iframe src="<?= get_field('explainer_video', $this_tour_id) ?>" frameborder="0" allowfullscreen=""></iframe>
			</div>
			<?php 
			}
			?>
			<hr class="dotted-line" />
			<div class="wysiwyg-container">
				<div class="wysiwyg-inner">
				<div class="wysiwyg-header">Highlights</div>
				<div class="row">
					<?php 
					$highlights = get_field('highlights', $this_tour_id);
					$extra_highlights = get_field('extra_highlights', $this_tour_id);
					if(!empty($extra_highlights)){
					?>
						<div class="col-md-6">
							<?= $highlights ?>
						</div>
						<div class="col-md-6">
							<?= $extra_highlights ?>
						</div>
					<?php
					} else {
					?>
						<div class="col-md-12">
							<?= $highlights ?>
						</div>
					<?php 
					}
					?>
				</div>
				
				</div>
			</div>
			<hr class="dotted-line" />
			<div class="calendar-container">
				<div class="calendar-inner">
					<div class="calendar-header nav-target" id="calendar-nav-target">Book A Tour</div>
					<div class="peek-container">
	                <a href="https://book.peek.com/s/15a8284c-0990-4986-a5b4-1754b0c0b014/3beY" data-embed="true">San Francisco Walking Tours</a>
	            	</div>
            	</div>
            </div>
            <hr class="dotted-line" />
            <div class="guides-container">
            	<div class="guides-inner">
            		<div class="guides-header">Your Guides</div>
            		<div class="guides-list">

            				<?php
							while( have_rows('guides',$this_tour_id) ): the_row();
								$guide = get_sub_field('guide')
							?>
								<div class="guide-container">
		            				<div class="guide-headshot-container">
		            					<img src="<?= get_field('headshot_image', $guide->ID) ?>" />
		            				</div>
		            				<div class="guide-name">
		            					<?= $guide->post_title ?>
		            				</div>
		            				<div class="guide-description">
		            					<?= get_field('description', $guide->ID) ?>
		            				</div>
	            				</div>
							<?php
							endwhile;
							?>
            		</div>
            	</div>
            </div>
			<hr class="dotted-line" />
			<div class="other-tours-container">
				<div class="other-tours-inner">
					<div class="other-tours-header">Checkout our other awesome tours!</div>
					<?php
					while( have_rows('other_tours',$this_tour_id) ): the_row();
						$tour = get_sub_field('tour')
					?>
						<a href="<?= get_permalink($tour->ID) ?>">
						<div class="tour-container">
            				<img class="tour-splash" src="<?= wp_get_attachment_image_url(get_field('frontpage_splash_image',$tour->ID),'full') ?>" />
            				<div class="tour-info">
            					
            					<div class="tour-header">
									<div class="tour-title"><?= $tour->post_title ?></div>
									<div class="tour-subtitle"><?= get_field('subtitle',$tour->ID) ?></div>
								</div>
								
								<div class="tour-summary"><?= get_field('frontpage_summary',$tour->ID) ?></div>
								
								<?php
								while( have_rows('frontpage_highlights',$tour->ID) ): the_row();
								$highlight_text = get_sub_field('highlight');
								?>
									<div class='tour-sight'>
										<span>★</span>
										<?= $highlight_text ?>
									</div>
								<?php
								endwhile;
								$post = $tour;
								get_template_part('cta','learn');
								?>
            				</div>
        				</div>
        				</a>
					<?php
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