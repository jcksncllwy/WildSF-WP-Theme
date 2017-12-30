<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

</head>
<body class="faq-page">
	<?php
		get_template_part('nav', 'normal');
		$collapsed = true;
		include(locate_template('faq-partial.php'));
	?>


</body>
</html>
