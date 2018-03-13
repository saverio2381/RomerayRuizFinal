<?php
// Registro del menú de WordPress
add_theme_support( 'nav-menus' );

if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
            'main' => 'Menú Principal',
            'aux' => 'Menú Auxiliar'
        )
    );
}
?>