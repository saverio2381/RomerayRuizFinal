<div class="fila">
	<div class="col">
		<div class="page-title">
			<h1><a href="<?php the_permalink( )?>"><?php the_title();?></a></h1>
		</div>
	</div>
</div>

<?php
	echo '<div class="fila breadcumbs_container">';
	echo '<div class="col breadcumbs">';
	$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'ASC') );
    $page_id='';
	foreach ($mypages as $page){
		if ($page_id == ''){
			$page_id = $page->ID;
		}
	}
	
	listar_subpaginas_estudio($post->ID,$page_id);
	
/*
	// Recupero la lista de tipos de publicaciones para formar un sub menú
	$args = array(
		'taxonomy'               => array( 'tipos_publicaciones' ),
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'fields'                 => 'all',
		'hide_empty'             => false
	);
	
	// The Term Query
	$term_query = new WP_Term_Query( $args );
	
	if ( ! empty( $term_query->terms ) ) {
		$contador = 1;
		echo '<div class="sub_filtros">';	
		foreach ( $term_query ->terms as $term ) {
			// Filtramos para que solo muestre las categorias padre y no los subtipos de publicaciones.
			if ($term->parent == 0){
				if ($contador == 1){
					echo '<a href="#!" class="btn_filtro sub_btn_filtro active" data-filtro="'. $term->slug .'">' . $term->name . '</a>';		
				}else{
					echo '<a href="#!" class="btn_filtro sub_btn_filtro" data-filtro="'. $term->slug  .'">' . $term->name . '</a>';	
				}
				$contador++;	
			}
		}
		echo '</div>';// sub_filtros
	}
	// final de la lista de tipos de publicaciones
*/
	
	echo '</div>'; //breadcumbs
	echo '</div>'; //breadcumbs_container
?>
