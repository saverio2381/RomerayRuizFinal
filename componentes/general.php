<?php 

/*
	===================================================================
								HACKS VARIOS
	===================================================================
*/

// Soporte para imagen destacada
add_theme_support( 'post-thumbnails',array('post','rr_proyecto') ); 

// Deshabilito la barra de admin de Wordpress
function quitar_barra_administracion(){
    return false;
}
add_filter( 'show_admin_bar' , 'quitar_barra_administracion');

// Deshabilito las notificaciones de actualizaciones de los plugins
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

?>