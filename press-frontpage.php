<?php 
	$frontpage = get_page_by_title('frontpage');
?>

<div class="press default-background-image">	

	<div class="press-inner">

		<div class="press-items">
			<?php	
				while ( have_rows('press_quotes',$frontpage) ) : the_row(); 
					$logo = wp_get_attachment_image_url(
						get_sub_field('logo'), 
						'full'
					);
					$quote = get_sub_field('quote');
			?>

			<div class="press-item">
				<div class="logo">
					<img src="<?= $logo ?>" />
				</div>
				<hr />
				<div class="quote">
					“<?= $quote ?>”
				</div>
			</div>

			<?php
				endwhile;
			?>
		</div>
	</div>
</div>