<!-- 
  This stylesheet inserts values set in the WP Admin interface into CSS 
  Primarily used for image urls
-->
<?php 

  $frontpage = get_page_by_title('frontpage');
  $image_id = get_field('splash_background_image', $frontpage);
  $splash_background_image_url = wp_get_attachment_image_url($image_id, 'fullscreen');

  $cta_background_image_url = wp_get_attachment_image_url(
  	get_field('cta_background_image', $frontpage), 
  	'full'
  );

  $default_background_image_url = wp_get_attachment_image_url(
  	get_field('default_background_image', $frontpage), 
  	'full'
  );

  $dotted_line_image_id = 172;
  $dotted_line_image_url = wp_get_attachment_image_src($dotted_line_image_id, 'full')[0];

?>

<style type="text/css" class="wp-dynamic-css">
  .splash{
    background-image: url("<?= $splash_background_image_url ?>");
  }

  .default-background-image{
  	background-image: url("<?= $default_background_image_url ?>");
  }

  .dotted-line{
    background-image: url("<?= $dotted_line_image_url ?>");
    border: 0;
    height: 10px;
    background-size: contain;
  }
</style>