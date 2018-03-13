<?php  
// Custom Post Types para añadir funcionalidades
// Register Custom Post Type
function proyectos_post_type() {

	$labels = array(
		'name'                  => _x( 'Proyectos', 'Post Type General Name', 'rr' ),
		'singular_name'         => _x( 'proyecto', 'Post Type Singular Name', 'rr' ),
		'menu_name'             => __( 'Proyectos', 'rr' ),
		'name_admin_bar'        => __( 'Proyectos', 'rr' ),
		'archives'              => __( 'Archivo de proyectos', 'rr' ),
		'attributes'            => __( 'Propiedades del proyecto', 'rr' ),
		'parent_item_colon'     => __( 'Proyecto padre:', 'rr' ),
		'all_items'             => __( 'Todos los proyectos', 'rr' ),
		'add_new_item'          => __( 'Crear nuevo proyecto', 'rr' ),
		'add_new'               => __( 'Nuevo proyecto', 'rr' ),
		'new_item'              => __( 'Nuevo', 'rr' ),
		'edit_item'             => __( 'Editar', 'rr' ),
		'update_item'           => __( 'Actualizar proyecto', 'rr' ),
		'view_item'             => __( 'Ver proyecto', 'rr' ),
		'view_items'            => __( 'Ver proyectos', 'rr' ),
		'search_items'          => __( 'Buscar proyectos', 'rr' ),
		'not_found'             => __( 'No se encontraron proyectos', 'rr' ),
		'not_found_in_trash'    => __( 'No ha proyectos en la papelera', 'rr' ),
		'featured_image'        => __( 'Imagen destacada', 'rr' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'rr' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'rr' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'rr' ),
		'insert_into_item'      => __( 'Insertar en el proyecto', 'rr' ),
		'uploaded_to_this_item' => __( 'Subido al proyecto', 'rr' ),
		'items_list'            => __( 'Listado de proyectos', 'rr' ),
		'items_list_navigation' => __( 'Navegación lista de proyectos', 'rr' ),
		'filter_items_list'     => __( 'Filtrar lista de proyectos', 'rr' ),
	);

	$rewrite = array(
		'slug'                  => 'proyectos',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);

	
	$args = array(
		'label'                 => __( 'proyecto', 'rr' ),
		'description'           => __( 'Proyectos', 'rr' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt','thumbnail'),
		'taxonomies'            => array( 'tipos_proyectos','annos_proyectos'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
 		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'rr_proyecto', $args );

}


add_action( 'init', 'proyectos_post_type', 0 );


// La función no será utilizada antes del 'init'.
add_action( 'init', 'registrar_cpt_publicaciones' );
/* Here's how to create your customized labels */
function registrar_cpt_publicaciones() {
	$labels = array(
	'name' => _x( 'Publicaciones', 'post type general name' ),
        'singular_name' => _x( 'Publicación', 'post type singular name' ),
        'add_new' => _x( 'Añadir nueva', 'publicación' ),
        'add_new_item' => __( 'Añadir nueva publicación' ),
        'edit_item' => __( 'Editar publicacioón' ),
        'all_items' =>__('Todas las publicaciones'),
        'new_item' => __( 'Nueva publicación' ),
        'view_item' => __( 'Ver publicación' ),
        'search_items' => __( 'Buscar publicaciones' ),
        'not_found' =>  __( 'No se han encontrado publicaciones' ),
        'not_found_in_trash' => __( 'No se han encontrado publicaciones en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
		'taxonomies'  => array( 'annos_publicaciones','tipos_publicaciones'),
        'rewrite' => true,
        'menu_position'         => 20,
		'menu_icon'             => 'dashicons-book',
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
 
    register_post_type( 'publicaciones', $args ); /* Registramos y a funcionar */
}


add_action( 'init', 'registrar_cpt_premios' );
/* Here's how to create your customized labels */
function registrar_cpt_premios() {
	$labels = array(
	'name' => _x( 'Premios', 'post type general name' ),
        'singular_name' => _x( 'Premio', 'post type singular name' ),
        'add_new' => _x( 'Añadir nuevo', 'premio' ),
        'add_new_item' => __( 'Añadir nuevo premio' ),
        'edit_item' => __( 'Editar premio' ),
        'all_items' =>__('Todos los premios'),
        'new_item' => __( 'Nuevo premio' ),
        'view_item' => __( 'Ver premio' ),
        'search_items' => __( 'Buscar premios' ),
        'not_found' =>  __( 'No se han encontrado premios' ),
        'not_found_in_trash' => __( 'No se han encontrado premios en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
		'taxonomies'  => array( 'annos_premios'),
        'rewrite' => true,
        'menu_position'         => 20,
		'menu_icon'             => 'dashicons-awards',
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
 
    register_post_type( 'premios', $args ); /* Registramos y a funcionar */
}
?>