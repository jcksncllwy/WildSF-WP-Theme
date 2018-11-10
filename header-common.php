<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900|Roboto+Slab:100,300,400,700|Bitter|Crete+Round|Monoton" rel="stylesheet">

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- /BOOTSTRAP -->

<script src="http://afarkas.github.io/webshim/js-webshim/minified/polyfiller.js" />
<script type="text/javascript">
webshims.setOptions('forms-ext', {
    replaceUI: 'auto',
    types: 'number'
});
webshims.polyfill('forms forms-ext');
</script>

<!-- PEEK PRO -->
<!--
Old code needed to get the calendar/schedule to render correctly
-->
<script type="text/javascript">
  (function(config) {
    window._peekConfig = config || {};
    var idPrefix = 'peek-book-button';
    var id = idPrefix+'-js'; if (document.getElementById(id)) return;
    var head = document.getElementsByTagName('head')[0];
    var el = document.createElement('script'); el.id = id;
    var date = new Date; var stamp = date.getMonth()+"-"+date.getDate();
    var basePath = "https://js.peek.com";
    el.src = basePath + "/widget_button.js?ts="+stamp;
    head.appendChild(el); id = idPrefix+'-css'; el = document.createElement('link'); el.id = id;
    el.href = basePath + "/widget_button.css?ts="+stamp;
    el.rel="stylesheet"; el.type="text/css"; head.appendChild(el);
  })({key: '15a8284c-0990-4986-a5b4-1754b0c0b014'});
 </script>
<!--
New code needed to get the gift cards button to render correctly
(and open in modal instead of new page)
 -->
<script>
  (function(idPrefix) {
    id = idPrefix+'-js'; if (document.getElementById(id)) return;
    var head = document.getElementsByTagName('head')[0];
    el = document.createElement('script'); window.peekButton='Book Now'; el.id = id;
    var date = new Date; var stamp = date.getMonth()+"-"+date.getDate();
    el.src = "https://pirassets.s3.amazonaws.com/assets/widget_button.js?id=5461cec23f30e1993000038f&ts="+stamp;
    head.appendChild(el); id = idPrefix+'-css'; el = document.createElement('link'); el.id = id;
    el.href = "https://pirassets.s3.amazonaws.com/assets/widget_button.css?id=5461cec23f30e1993000038f&ts="+stamp;
    el.rel="stylesheet"; el.type="text/css"; head.appendChild(el);
  }('peek-booking-button'));
</script>

<!-- /PEEK PRO -->

<!-- Custom UI Scripts -->
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/ui.js"></script>
<!-- /Custom UI Scripts -->

<!-- Custom CSS -->
<link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
<!-- Custom CSS -->

<meta name="viewport" content="width=device-width">
<meta charset="UTF-8">

<title><?php wp_title(''); ?></title>

<?php wp_head(); ?>
