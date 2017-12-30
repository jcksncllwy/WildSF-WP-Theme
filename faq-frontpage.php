<?php
	$faq_page = get_page_by_title('FAQ');
	$frontpage = get_page_by_title('frontpage');
	$faq_url = get_permalink( $faq_page );
	$faq_limit = 3;

	$faq_background_image_url = wp_get_attachment_image_url(
		get_field('faq_background_image', $frontpage),
		'full'
	);
?>
<style type="text/css" class="faq-css">
.faq .bg-image{
	background: url(<?= $faq_background_image_url ?>);
	background-position: bottom;
	background-size: cover;
	background-repeat: no-repeat;
}
</style>
<div class="faq">
	<div class="faq-inner row no-gutters">
		<div class="col-md-7 faq-content">
			<h1 class="header nav-target" id="faq-nav-target">
				<span class="drop-cap">F</span><span class="drop-cap">A</span><span class="drop-cap">Q</span>
			</h1>

			<div class="faq-items">
				<?php
				$count = 0;
				while ( have_rows('qa',$faq_page) ) : the_row();
					$q = get_sub_field('question');
					$a = get_sub_field('answer');
					$count = $count+1;
					if(!empty($faq_limit) && $count>$faq_limit){
						break;
					}
				?>
				  <div class="faq-item">
				    <div class="faq-item-question">
				        <?= $q ?>
				    </div>

				    <div class="faq-item-answer">
				        <?= $a ?>
				    </div>
				  </div>
				<?php
				endwhile;
				?>
			</div>

			<?php
			if(!empty($faq_limit)){
			?>
			<a class="read-more-button" href="<?= $faq_url ?>">Read More</a>
			<?php
			}
			?>
		</div>
		<div class="col-md bg-image">

		</div>
	</div>
</div>
