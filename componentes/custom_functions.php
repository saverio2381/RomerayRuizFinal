<?php
// Función para listar páginas pasando un Id de la página padre de forma que podemos manipular dicha lista en lugar de usar wp_list_pages que utiliza su propio walker

function listar_paginas ($padre,$post_id){
	$args = array(
    // Arguments for your query.
    'post_type'   => 'page',
    'post_parent' => $padre,
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
	);

	// Custom query.
	$query = new WP_Query( $args );
 
	// Check that we have query results.
	if ( $query->have_posts() ) {
 
    	// Start looping over the query results.
		while ( $query->have_posts() ) {

        	$query->the_post();
			$mypost = get_post();

        	if($mypost->ID == $post_id){
	        	echo '<a class="btn_filtro active" href="';
        	}else{
	        	echo '<a class="btn_filtro" href="';	
        	}
         	
         	echo the_permalink();
         	echo '">';
         	the_title();
         	echo '</a>';
    	}
 
	}
 
	// Restore original post data.
	wp_reset_postdata();
	
	return true;
}

function listar_subpaginas ($padre,$post_id){
	$args = array(
    // Arguments for your query.
    'post_type'   => 'page',
    'post_parent' => $padre,
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
	);

	// Custom query.
	$query = new WP_Query( $args );
 
	// Check that we have query results.
	if ( $query->have_posts() ) {
 
    	// Start looping over the query results.
		while ( $query->have_posts() ) {

        	$query->the_post();
			$mypost = get_post();

        	if($mypost->ID == $post_id){
	        	echo '<a class="btn_filtro active" href="';
        	}else{
	        	echo '<a class="btn_filtro" href="';	
        	}
         	
         	echo '#';//the_permalink();
         	echo $mypost->post_name;
         	echo '">';
         	the_title();
         	echo '</a>';
    	}
 
	}
 
	// Restore original post data.
	wp_reset_postdata();
	
	return true;
}


function listar_subpaginas_estudio ($padre,$post_id){
	$args = array(
    // Arguments for your query.
    'post_type'   => 'page',
    'post_parent' => $padre,
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
	);

	// Custom query.
	$query = new WP_Query( $args );
 
	// Check that we have query results.
	if ( $query->have_posts() ) {
 
    	// Start looping over the query results.
		while ( $query->have_posts() ) {

        	$query->the_post();
			$mypost = get_post();
			
        	if($mypost->ID == $post_id){
	        	echo '<a class="btn_filtro active" href="';
        	}else{
	        	echo '<a class="btn_filtro" href="';	
        	}
         	
         	echo '#';//the_permalink();
         	echo $mypost->post_name;
         	echo '">';
         	the_title();
         	echo '</a>';
         	
         	if ($mypost->post_name == 'bibliografia'){
	        
	        	$tipos = get_terms( array(
			    'taxonomy' => 'tipos_publicaciones',
			    'hide_empty' => false,
			    'parent'   => 0,
			    'orderby'    => 'date',
			    'order'	     => 'DESC'
				) );
				
	         	if(!empty($tipos)){
		         	$contador = 1;
		         	echo '<div class="sub_filtros">';
		         	foreach	($tipos as $tipo ){
			         	if ($contador == 1){
							echo '<a href="#!" class="btn_filtro sub_btn_filtro active" data-filtro="'. $tipo->slug .'">' . $tipo->name . '</a>';		
						}else{
							echo '<a href="#!" class="btn_filtro sub_btn_filtro" data-filtro="'. $tipo->slug  .'">' . $tipo->name . '</a>';	
						}
						$contador++;
		         	}
		         	echo '</div>';// sub_filtros
	         	}
	         	
         	}
         	
         	
    	}
 
	}
 
	// Restore original post data.
	wp_reset_postdata();
	
	return true;
}

function listar_subpaginas_nolink ($padre,$post_id){
	$args = array(
    // Arguments for your query.
    'post_type'   => 'page',
    'post_parent' => $padre,
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
	);

	// Custom query.
	$query = new WP_Query( $args );
 
	// Check that we have query results.
	if ( $query->have_posts() ) {
 
    	// Start looping over the query results.
		while ( $query->have_posts() ) {

        	$query->the_post();
			$mypost = get_post();

        	if($mypost->ID == $post_id){
	        	echo '<a class="btn_filtro active" href="';
        	}else{
	        	echo '<a class="btn_filtro" href="';	
        	}
         	
         	echo '#';//the_permalink();
         	//echo $mypost->post_name;
         	echo '">';
         	the_title();
         	echo '</a>';
    	}
 
	}
 
	// Restore original post data.
	wp_reset_postdata();
	
	return true;
}


/*
if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
	
		$optionsframework_settings = get_option('optionsframework');
		
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
		
		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}
			
		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}
*/

	
?>