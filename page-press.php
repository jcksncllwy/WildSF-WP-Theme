<!DOCTYPE html>
<html>
<head>

	<?= get_header('common') ?>

</head>
<body class="press">
	<?php
		get_template_part('navbar');
	?>
	<div class="page-container">
		<div class="page-inner">

      <div class="header">
        Press
      </div>

      <div class="press-items">
        <div class="press-item">
          <a class="article-link" href="http://www.theaustralian.com.au/life/travel/hippie-history-with-a-hipster-twist-in-haightashbury-san-francisco/news-story/cd29ed87f164d3b056b493e09c48b5e8" target="_blank">
            Hippie History with a Hipster Twist in Haight-Ashbury, San Francisco
          </a>
          <div class="author">The Australian</div>
        </div>
        <div class="press-item">
          <a class="article-link" href="http://www.viamagazine.com/destinations/san-franciscos-best-walking-tours" target="_blank">
            San Francisco's Best Walking Tours
          </a>
          <div class="author">Via Magazine</div>
        </div>
        <div class="press-item">
          <a class="article-link" href="https://www.yahoo.com/travel/americas-quirkiest-cities-113456379417.html" target="_blank">
            They're Weird and Proud: America’s Quirkiest Cities
          </a>
          <div class="author">Yahoo Travel</div>
        </div>
        <div class="press-item">
          <a class="article-link" href="http://www.travelandleisure.com/articles/best-walking-tours-worldwide" target="_blank">
            43 Walking Tours We Love Around the World
          </a>
          <div class="author">Travel + Leisure</div>
        </div>
        <div class="press-item">
          <a class="article-link" href="http://www.independent.co.uk/travel/americas/san-francisco-to-los-angeles-sarfraz-manzoor-road-tests-a-friendship-on-a-drive-down-californias-a6855676.html" target="_blank">
            San Francisco to Los Angeles
          </a>
          <div class="author">The Independent</div>
        </div>
        <div class="press-item">
          <a class="article-link" href="http://hoodline.com/2016/01/meet-wild-sf-the-upper-haight-s-musical-tour-guides" target="_blank">
            Meet Wild SF, The Upper Haight’s Musical Tour Guides
          </a>
          <div class="author">Hoodline</div>
        </div>
        <div class="press-item">
          <a class="article-link" href="http://theculturetrip.com/north-america/usa/california/articles/sf-history-tours-that-wont-bore-you/ " target="_blank">
            SF History Tours That Won't Bore You
          </a>
          <div class="author">The Culture Trip</div>
        </div>
        <div class="press-item">
          <a class="article-link" href="http://www.traveller.com.au/san-francisco-quick-guide-gjffnf" target="_blank">
            San Francisco City Guide: Three-minute guide to the US city of pop culture
          </a>
          <div class="author">Traveller</div>
        </div>
        <div class="press-item">
          <a class="article-link" href="http://www.editionsnomades.com/livres/details/71/san-francisco-lessentiel/" target="_blank">
            Travel Guide Book
          </a>
          <div class="author">San Francisco L'Essentiel</div>
        </div>
      </div>

      <div class="wp-admin-content">
    		<?php
    			if ( have_posts() ){
    				while ( have_posts() ) : the_post();
    					the_content();
    				endwhile;
    			}
    		?>
      </div>

		</div>
	</div>

  <?php
  	get_template_part('footer');
  ?>

</body>
</html>
