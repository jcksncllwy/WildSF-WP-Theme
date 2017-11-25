<!DOCTYPE html>
<html>
<head>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900|Roboto+Slab:100,300,400,700|Bitter|Crete+Round" rel="stylesheet">
	<?php get_template_part('dynamic-css') ?>
	<link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">

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
<body>
	<?php 
	get_template_part('nav', 'frontpage');
	get_template_part('splash');
	get_template_part('section','cta');

	$frontpage = get_page_by_title('frontpage');
	while( have_rows('press_quotes', $frontpage)): the_row();
		$logo = wp_get_attachment_image_url(
			get_sub_field('logo'), 
			'full'
		);
		$quote = get_sub_field('quote');
		$press_quotes[] = ['logo'=>$logo, 'quote'=>$quote];
	endwhile;

	$args = array( 'post_type' => 'tour' );
	$loop = new WP_Query( $args );
	$i = 0;
	while ( $loop->have_posts() ) : $loop->the_post(); 
		include(locate_template('tour-frontpage.php'));
		$press_quote = $press_quotes[$i];
		include(locate_template('section-quote.php'));
		$i = $i+1;
	endwhile;

	get_template_part('calendar', 'frontpage');

	$faq_limit = 3;
	$collapsed = false;
	include(locate_template('faq-partial.php'));

	get_template_part('reviews', 'frontpage');

	get_template_part('social', 'frontpage');

	get_template_part('footer');
	
	?>
	

</body>
</html>