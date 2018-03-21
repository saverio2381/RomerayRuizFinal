<?php get_header(); ?>

<div class="fixed-bar">

	<div class="fila">
		<div class="col">
			<div class="page-title">
				<h1>
					<?php
						echo (__(the_title(),'rr'));
					?>
				</h1>
			</div>
		</div>
	</div>
	
	<div class="fila breadcumbs_container">
		<div class="col breadcumbs">
			<?php
				if(is_user_logged_in()){
					$user = get_current_user_id();
					$user_info = get_userdata( $user);
					
					echo '<span class="btn_filtro active">';
					echo $user_info->first_name . ' ' . $user_info->last_name;
					echo '</span>';
					echo '<a class="btn_filtro" href="' . wp_logout_url( home_url() ) . '">' . 'Cerrar sesión</a>';
					
				}
			?>
		</div>
	</div>
	
	<div class="fila">
		<div class="col">
			<?php
				$mostrar = 1;
				if (is_user_logged_in()){
					if(user_can($user,'area-clientes')){
						$mostrar = 1;
					}else{
						echo $user_info->first_name . ', No tiene acceso a esta sección.';
					}
				}else{
					// Se necesita iniciar sesión para acceder a este contenido
					echo 'Para acceder a esta sección hay que <a class="btn_filtro active" href="' . wp_login_url( get_permalink() ) . '">Iniciar Sesión</a>';
				}
			?>
		</div>
	</div>
	
	<?php
		if ($mostrar == 1){
			echo do_shortcode( '[mostrar_documentos]');
		}
	?>
	
	
</div>
		
<?php get_footer(); ?>