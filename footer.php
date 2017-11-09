<?php
	$frontpage = get_page_by_title('frontpage');
?>
<div class="footer">
<?php	
	while ( have_rows('footer_items', $frontpage) ) : the_row(); 
		$text = get_sub_field('text');
		$link = get_sub_field('link');
?>

<div class="footer-item">
	<a href="<?= $link ?>">
		<?= $text ?>
	</a>
</div>

<?php
	endwhile;
?>
</div>	