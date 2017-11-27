<?php
$private_tours_page = get_page_by_title("Private Tours");
$private_tours_url = get_permalink( $private_tours_page );
$frontpage = get_page_by_title('frontpage');
$image_id = get_field('splash_logo', $frontpage->ID);
$splash_logo_image_url = wp_get_attachment_image_url($image_id, 'full');
?>

<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
	<a class="navbar-brand" href="#">
		<img src="<?= $splash_logo_image_url ?>" height="30" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
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
						<a class="dropdown-item" href="#tour-<?= the_ID() ?>">
							<span class="title"><?= the_title() ?></span>
							<span class="subtitle"><?= get_field('subtitle') ?></span>
						</a>
					</div>
					
					<?php endwhile; ?>
				</div>
			</li>
			<li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
				<a class="nav-link" href="#calendar-nav-target">Calendar</a>
			</li>
			<li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
				<a class="nav-link" href="<?= $private_tours_url ?>">Private Tours</a>
			</li>
			<li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
				<a class="nav-link" href="#faq-nav-target">FAQ</a>
			</li>
			<li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
				<a href="http://www.peek.com/purchase/gift_card/5461cec23f30e1993000038f" class="nav-link" data-purchase-type="gift-card" data-button-text="Purchase Gift Card" data-partner-gid="5461cec23f30e1993000038f">Gift Cards</a>
			</li>
		</ul>
		<span class="navbar-text contact-info">
	      <a href="mailto:info@wildsftours.com" class="email-address">info@wildsftours.com</a> <a href="tel:+14155801849" class="phone-number">415-580-1849</a>
	    </span>
	</div>
</nav>