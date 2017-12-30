<!--
  This stylesheet inserts values set in the WP Admin interface into CSS
  Primarily used for image urls
-->
<?php

  $frontpage = get_page_by_title('frontpage');

  $dotted_line_image_id = 172;
  $dotted_line_image_url = wp_get_attachment_image_src($dotted_line_image_id, 'full')[0];

?>

<style type="text/css" class="wp-dynamic-css">
  .dotted-line{
    background-image: url("<?= $dotted_line_image_url ?>");
    border: 0;
    height: 10px;
    background-size: contain;
  }
</style>
