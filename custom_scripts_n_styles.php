<?php
	
	
/* Manera adecuada de añadir Scripts y Estilos */
function rr_styles() {
	wp_enqueue_style( 'rr_style', get_stylesheet_uri() ); // añade style.css
	
}
add_action( 'wp_enqueue_scripts', 'rr_styles' );


function wpb_adding_scripts() {
	wp_enqueue_script('rr_main', get_template_directory_uri() . '/js/min/main-min.js', array('jquery'),'1.0.0', true);	
	wp_enqueue_script('rr_filtro', get_template_directory_uri() . '/js/min/filtrados-min.js', array('jquery'),'1.0.0', true);		
	
/*
	wp_enqueue_script('rr_nested', get_template_directory_uri() . '/js/jquery.nested.js', array('jquery'),'1.0.0', true);	
	wp_enqueue_script('rr_makeboxes', get_template_directory_uri() . '/js/makeboxes.js', array('jquery'),'1.0.0', true);	
*/

}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );

?>