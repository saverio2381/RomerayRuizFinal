<?php 
// Aumentamos el tamaño máximo de ficheros a subir por el gestor de medios
@ini_set('upload_max_size','128M');
@ini_set('post_max_size','128M');
@ini_set('max_execution_time','300');

include 'componentes/custom_scripts_n_styles.php';

include 'componentes/custom_menu.php';
include 'componentes/custom_widgets.php';


include 'componentes/general.php';

include 'componentes/custom_functions.php';

include 'componentes/custom_post_types.php';
include 'componentes/custom_taxonomies.php';
include 'componentes/custom_image_sizes.php';

include 'componentes/custom_shortcodes.php';


?>