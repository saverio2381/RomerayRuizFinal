<?php
 //  Widgets para los selectores de idioma
 if(function_exists('register_sidebar'))
      register_sidebar(array(
      'name' => 'Selector de Idiomas',
	  'description'   => 'Area para el selector de Idiomas'
 ));
 
 if(function_exists('register_sidebar'))
      register_sidebar(array(
      'name' => 'Selector de Idiomas Móvil',
	  'description'   => 'Area para el selector de Idiomas para Tablets/Smartphones'
 ));
?>