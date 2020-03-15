<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

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

	$args = array( 'post_type' => 'tour',
		'meta_query' => array(
			array(
				'key' => 'active_tour',
				'compare' => '=',
				'value' => '1'
			)
		)
 	);
	$loop = new WP_Query( $args );
	$i = 0;
	while ( $loop->have_posts() ) : $loop->the_post();
		include(locate_template('tour-frontpage.php'));
		$press_quote = $press_quotes[$i];
		include(locate_template('section-quote.php'));
		$i = $i+1;
	endwhile;

	get_template_part('calendar', 'frontpage');

	$featured_guide = get_field('featured_guide', $frontpage);
	if( $featured_guide ) {
	  get_template_part('guide', 'frontpage');
	}

	get_template_part('faq','frontpage');

	get_template_part('reviews', 'frontpage');

	get_template_part('social', 'frontpage');

	get_template_part('footer');

	?>


</body>
</html>
