<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

	<title>Alternative and Free SF Walking Tours | Wild SF Tours | Cool tours of San Francisco neighborhoods, ghosts and more</title>
	<meta name="description" content="San Francisco walking tours led by hip, quirky tour guides. Get ready for the most historic, shameless, criminal and unforgettable.">
	<meta name="robots" content="noodp">
	<link rel="canonical" href="https://wildsftours.com/">
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Wild SF Walking Tours: Alternative walking tours of San Francisco">
	<meta property="og:description" content="San Francisco walking tours led by hip, quirky tour guides. Get ready for the most historic, shameless, criminal and unforgettable.">
	<meta property="og:url" content="https://wildsftours.com/">
	<meta property="og:site_name" content="Alternative and Free SF Walking Tours | Wild SF Tours">

</head>
<body>
	<?php
	get_template_part('navbar');
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

	get_template_part('faq','frontpage');

	get_template_part('reviews', 'frontpage');

	get_template_part('social', 'frontpage');

	get_template_part('footer');

	?>


</body>
</html>
