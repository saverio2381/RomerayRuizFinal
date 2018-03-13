<?php
//Shortcode para fomulario de inicio de sesión
function rr_formulario_login_shortcode() {
	if ( is_user_logged_in() )
		return '';

	echo '<div class="fila"><div class="col no-padding tablet-1-3">';
	echo '<h3>Formulario de Acceso</h3>';
	return wp_login_form( array( 'echo' => false ) );
	echo '</div></div>';
}

function rr_add_shortcodes() {
	add_shortcode( 'rr_formulario_login', 'rr_formulario_login_shortcode' );
}

add_action( 'init', 'rr_add_shortcodes' );
?>