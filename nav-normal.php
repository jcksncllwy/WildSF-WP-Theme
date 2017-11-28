<?php
$frontpage_id = get_option( 'page_on_front' );
$frontpage_url = get_permalink( $frontpage_id );
$frontpage = get_page_by_title('frontpage');
$logo_image_url = wp_get_attachment_image_url(
	get_field('navbar_logo', $frontpage->ID), 
	'full');
$private_tours_page = get_page_by_title("Private Tours");
$private_tours_url = get_permalink( $private_tours_page );
$faq_page = get_page_by_title("FAQ");
$faq_url = get_permalink( $faq_page );
$gift_card_page = get_page_by_title("Gift Cards");
$gift_card_url = get_permalink( $gift_card_page );
?>

<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
	<a class="navbar-brand" href="<?= $frontpage_url ?>">
		<img src="<?= $logo_image_url ?>" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Tours
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php
					$args = array( 'post_type' => 'tour' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					?>
					<div data-toggle="collapse" data-target=".navbar-collapse.show" >
						<a class="dropdown-item" href="<?= get_permalink($post) ?>">
							<span class="title"><?= the_title() ?></span>
							<span class="subtitle"><?= get_field('subtitle') ?></span>
						</a>
					</div>
					
					<?php endwhile; ?>
				</div>
			</li>
			<li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
				<a class="nav-link" href="<?= $frontpage_url ?>#calendar-nav-target">Calendar</a>
			</li>
			<li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
				<a class="nav-link" href="<?= $private_tours_url ?>">Private Tours</a>
			</li>
			<li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
				<a class="nav-link" href="<?= $faq_url ?>">FAQ</a>
			</li>
			<li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
				<a href="http://www.peek.com/purchase/gift_card/5461cec23f30e1993000038f" class="nav-link" data-purchase-type="gift-card" data-button-text="Purchase Gift Card" data-partner-gid="5461cec23f30e1993000038f">Gift Cards</a>
			</li>
		</ul>
	</div>
</nav>