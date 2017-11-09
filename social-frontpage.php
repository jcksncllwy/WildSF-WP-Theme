<?php
	$frontpage = get_page_by_title('frontpage');
	$social_background_image_url = wp_get_attachment_image_url(
		get_field('footer_background_image', $frontpage), 
		'full'
	);

?>
<style type="text/css" class="footer-frontpage-css">
.social{
	background: url("<?= $social_background_image_url ?>");
	background-repeat: no-repeat;
	background-size: cover;
	background-position: bottom;
	background-attachment: fixed;
}
</style>
<div class="social">
	<div class="social-inner">
		<div class="social-header">
			Stay in the loop
		</div>
		<div class="social-icons">
			<?php	
				while ( have_rows('social_icons', $frontpage) ) : the_row(); 
					$icon = wp_get_attachment_image_url(
						get_sub_field('icon_image'), 
						'full'
					);
					$link = get_sub_field('link');
			?>

			<div class="social-icon">
				<a href="<?= $link ?>">
					<img src="<?= $icon ?>" />
				</a>
			</div>

			<?php
				endwhile;
			?>
		</div>		
	</div>
</div>