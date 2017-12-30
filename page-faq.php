<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

</head>
<body class="faq-page">
	<?php
		get_template_part('nav', 'normal');
		$collapsed = true;
		$faq_page = get_page_by_title('FAQ');
		$faq_url = get_permalink( $faq_page );
		$faq_header_image_url = wp_get_attachment_image_url(
			get_field('header_image', $faq_page),
			'full'
		);
		$faq_background_image_url = wp_get_attachment_image_url(
			get_field('background_image', $faq_page),
			'full'
		);
	?>
	<style type="text/css" class="faq-css">
	.faq{
		background:
			linear-gradient(to bottom, rgba(255,255,255,0) -25%,   rgba(255,255,255,1) 100%),
			url(<?= $faq_background_image_url ?>),
			linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 100%);
		background-position: center top, center top, center top;
		background-size: cover, cover, cover;
		background-repeat: no-repeat, no-repeat, no-repeat;
	}
	</style>

	<div class="faq">
		<div class="faq-inner">
			<div class="header">

			</div>


			<div id="faq-accordion" role="tablist" aria-multiselectable="true">
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
				    <div class="faq-item-question" role="tab" id="headingOne">
				        <a data-toggle="collapse" data-parent="#faq-accordion" href="#collapse-<?= $count ?>" aria-expanded="false" aria-controls="collapse-<?= $count ?>">
				          <?= $q ?>
				        </a>
				    </div>

				    <div id="collapse-<?= $count ?>" class="collapse faq-item-answer <?= ($collapsed&&$count>1)?'':'show' ?>" role="tabpanel" aria-labelledby="headingOne">
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
			<div class="faq-read-more mx-auto">
				<a href="<?= $faq_url ?>">More FAQ</a>
			</div>
			<?php
			}
			?>

		</div>
	</div>


</body>
</html>
