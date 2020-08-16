<?php
  $frontpage = get_page_by_title('frontpage');
  $featured_guideID = get_field('featured_guide', $frontpage);
  $guide_thumbURL = get_the_post_thumbnail_url( $featured_guideID, 'medium_large' );


  $dotted_line_image_id = 172;
    $dotted_line_image_url = wp_get_attachment_image_src($dotted_line_image_id, 'full')[0];
?>
<style type="text/css" class="guide-css">
.dotted-line{
  background-image: url("<?= $dotted_line_image_url ?>");
  border: 0;
  height: 10px;
  background-size: contain;
}
.guide-content {
  max-width: 1200px;
  margin: auto;
}
.guide-image-wrapper, .guide-cta {
  padding: 0 2em;
}
.guide-image-inner {
  position: relative;
  padding-top: 100%;
}
.guide-cta-title {
  font-size: 3em;
  line-height: 1.25;
  font-family: "Roboto Slab", serif;
  color: #3f616c;
}
.guide-cta-subtitle {
  margin-top: 2em;
  font-size: 1em;
  line-height: 1.5;
  font-family: "Roboto Slab", serif;
  color: #3f616c;
}
.guide-image {
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  background: url("<?= $guide_thumbURL ?>") no-repeat center;
  background-size: cover;
}
label {
  display: none;
}
input[type=email] {
  background-color: transparent;
  border: none;
  border-bottom: 1px solid #BF5246;
  font-size: 1em;
  color: #BF5246;
  margin-top: 1em;
  width: 100%;
}
.sib_signup_box_inside_2 {
  width: 75%;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #BF5246;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #BF5246;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #BF5246;
}

@media (max-width: 991px){
  .guide-cta-title {
    font-size: 2em;
  }
  .guide-image-wrapper, .guide-cta {
    padding: 0 1em;
  }
}

@media (max-width: 767px) {
  .guide-image-inner {
    padding-top: 66.66666%;
  }
  .guide-cta-title {
    margin-top: 1em;
  }
  .guide-image-wrapper, .guide-cta {
    padding: 0 2em;
  }
}


</style>

<div class="guide">
	<div class="guide-inner row no-gutters">
    <div class="dot-top col-10 offset-2">
      <hr class="dotted-line">
    </div>
    <div class="guide-content">
      <div class="guide-inner row align-items-center">
        <div class="col-lg-6 col-md-4 guide-image-wrapper">
          <div class="guide-image-inner">
            <div class="guide-image"></div>
          </div>
        </div>
        <div class="col-lg-6 col-md-8 guide-cta">
          <h1 class="guide-cta-title">
            <?php
              $CTAtitle = get_field( "frontpage_cta_title", $featured_guideID );
                  if( $CTAtitle ) {
                  echo $CTAtitle;
              }
            ?>
          </h1>
          <h2 class="guide-cta-subtitle">
            <?php
              $CTAsubtitle = get_field( "frontpage_cta_subtitle", $featured_guideID );
                  if( $CTAsubtitle ) {
                  echo $CTAsubtitle;
              }
            ?>
          </h2>
          <?php echo do_shortcode("[sibwp_form id=2]"); ?>
        </div>
      </div>
    </div>
    <div class="dot-bottom col-10">
      <hr class="dotted-line">
    </div>
	</div>
</div>
