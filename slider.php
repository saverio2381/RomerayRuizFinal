<div id="slider">
<!--
	<div class="slide">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estudio.jpg" alt="" />
	</div>
	
	<div class="slide">
		<video src="<?php echo get_stylesheet_directory_uri(); ?>/images/Edificio%20Pasarela%20timepalse%20obra%20(%20Edificio%20finalizado%20).mp4"></video>
	</div>
	
	<div class="slide">
		<video src="<?php echo get_stylesheet_directory_uri(); ?>/images/Parque%20Mar%C3%ADtimo%20Romera%20y%20Ruiz%20Final.mp4"></video>
	</div>
	
	<div class="slide">
		<video src="<?php echo get_stylesheet_directory_uri(); ?>/images/Edificio%20Incube_hd_STREAM.mp4"></video>
	</div>
	
	<div class="slide">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Mesa%20de%20trabajo%201.jpg" alt="" />
	</div>

	<div class="slider-navigation">
		<a class="icon-angle-left" id="prev_slide" href="#"></a>
		<a class="icon-angle-right" id="next_slide" href="#"></a>			
	</div>
-->

	<?php
		echo do_shortcode('[masterslider alias="portada"]');
		
	?>
	
</div>
<div id="slider_movil">
	<?php
		 echo do_shortcode('[masterslider alias="portada-movil"]');		
	?>
	
</div>	
