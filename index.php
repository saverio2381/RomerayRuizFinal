<?php get_header(); ?>
<?php 
if (!is_front_page() && is_home()){
	// Se trata de la página de entradas
	get_template_part( 'blog' );	
}else{
	if (is_home()){
		// Se trata de la págin frontal
		get_template_part( 'front-page');		
	}
}
?>	

		
<?php get_footer(); ?>