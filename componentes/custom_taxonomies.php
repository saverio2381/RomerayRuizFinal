<?php  
// Tipos de Proyectos
function proyectos_tipo_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tipos de proyectos', 'Taxonomy General Name', 'rr' ),
		'singular_name'              => _x( 'Tipo de proyecto', 'Taxonomy Singular Name', 'rr' ),
		'menu_name'                  => __( 'Tipos de proyectos', 'rr' ),
		'all_items'                  => __( 'Todos los tipos', 'rr' ),
		'parent_item'                => __( 'Tipo padre', 'rr' ),
		'parent_item_colon'          => __( 'Tipo padre:', 'rr' ),
		'new_item_name'              => __( 'Nuevo tipo de proyecto', 'rr' ),
		'add_new_item'               => __( 'Añadir nuevo', 'rr' ),
		'edit_item'                  => __( 'Editar', 'rr' ),
		'update_item'                => __( 'Actualizar', 'rr' ),
		'view_item'                  => __( 'Ver', 'rr' ),
		'separate_items_with_commas' => __( 'Separar tipos con comas', 'rr' ),
		'add_or_remove_items'        => __( 'Añadir o quitar tipos', 'rr' ),
		'choose_from_most_used'      => __( 'Elegir de los mas usados', 'rr' ),
		'popular_items'              => __( 'Tipos mas populares', 'rr' ),
		'search_items'               => __( 'Buscar tipos de proyectos', 'rr' ),
		'not_found'                  => __( 'No encontrado', 'rr' ),
		'no_terms'                   => __( 'No hay tipos', 'rr' ),
		'items_list'                 => __( 'Lista de tipos de proyectos', 'rr' ),
		'items_list_navigation'      => __( 'Navegación por lista de tipos', 'rr' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tipos_proyectos', array( 'rr_proyecto' ), $args );

}
add_action( 'init', 'proyectos_tipo_taxonomy', 0 );

// Año de los Proyectos
function proyectos_anno_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Años de los proyectos', 'Taxonomy General Name', 'rr' ),
		'singular_name'              => _x( 'Año del proyecto', 'Taxonomy Singular Name', 'rr' ),
		'menu_name'                  => __( 'Año del proyecto', 'rr' ),
		'all_items'                  => __( 'Todos los años', 'rr' ),
		'new_item_name'              => __( 'Nuevo año', 'rr' ),
		'add_new_item'               => __( 'Añadir nuevo', 'rr' ),
		'edit_item'                  => __( 'Editar', 'rr' ),
		'update_item'                => __( 'Actualizar', 'rr' ),
		'view_item'                  => __( 'Ver', 'rr' )
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'annos_proyectos', array( 'rr_proyecto' ), $args );

}
add_action( 'init', 'proyectos_anno_taxonomy', 0 );


function publicaciones_anno_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Años de las publicaciones', 'Taxonomy General Name', 'rr' ),
		'singular_name'              => _x( 'Año de la publicación', 'Taxonomy Singular Name', 'rr' ),
		'menu_name'                  => __( 'Año de la publicación', 'rr' ),
		'all_items'                  => __( 'Todos los años', 'rr' ),
		'new_item_name'              => __( 'Nuevo año', 'rr' ),
		'add_new_item'               => __( 'Añadir nuevo', 'rr' ),
		'edit_item'                  => __( 'Editar', 'rr' ),
		'update_item'                => __( 'Actualizar', 'rr' ),
		'view_item'                  => __( 'Ver', 'rr' )
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'annos_publicaciones', array( 'publicaciones' ), $args );

}
add_action( 'init', 'publicaciones_anno_taxonomy', 0 );

function publicaciones_tipo_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tipos de las publicaciones', 'Taxonomy General Name', 'rr' ),
		'singular_name'              => _x( 'Tipo de la publicación', 'Taxonomy Singular Name', 'rr' ),
		'menu_name'                  => __( 'Tipos de publicaciones', 'rr' ),
		'all_items'                  => __( 'Todos los tipos', 'rr' ),
		'new_item_name'              => __( 'Nuevo tipo de publicación', 'rr' ),
		'add_new_item'               => __( 'Añadir nuevo tipo', 'rr' ),
		'edit_item'                  => __( 'Editar', 'rr' ),
		'update_item'                => __( 'Actualizar', 'rr' ),
		'view_item'                  => __( 'Ver', 'rr' )
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tipos_publicaciones', array( 'publicaciones' ), $args );

}
add_action( 'init', 'publicaciones_tipo_taxonomy', 0 );

function premios_anno_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Años de los premios', 'Taxonomy General Name', 'rr' ),
		'singular_name'              => _x( 'Año del premio', 'Taxonomy Singular Name', 'rr' ),
		'menu_name'                  => __( 'Año del premio', 'rr' ),
		'all_items'                  => __( 'Todos los años', 'rr' ),
		'new_item_name'              => __( 'Nuevo año', 'rr' ),
		'add_new_item'               => __( 'Añadir nuevo', 'rr' ),
		'edit_item'                  => __( 'Editar', 'rr' ),
		'update_item'                => __( 'Actualizar', 'rr' ),
		'view_item'                  => __( 'Ver', 'rr' )
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'annos_premios', array( 'premios' ), $args );

}
add_action( 'init', 'premios_anno_taxonomy', 0 );



?>