<?php
// Comprobar si la página actual tiene hijos
	global $post;
// 	listar_paginas($post->ID);
	$hijos = get_pages( array('child_of' => $post->ID) );
	$num_hijos = count($hijos);
	
	$pagina_padre = get_page($post->post_parent);
	$hijos_padre = get_pages( array('child_of' => $pagina_padre->ID) );
	$num_hijos_padre = count($hijos_padre);
	
	
	if ($num_hijos + $num_hijos_padre == 0){
		// Si no tienen hijos ni hermanos
		?>
		<div class="fila">
			<div class="col">
				<div class="page-title">
					<h1><?php the_title();?></h1>
				</div>
			</div>
		</div>
		<?php
	}else{
		if($num_hijos != 0){
			// si tiene hijos
			?>
			<div class="fila">
				<div class="col">
					<div class="page-title">
						<h1><?php the_title();?></h1>
					</div>
				</div>
			</div>
			<?php
			echo '<div class="fila breadcumbs_container">';
			echo '<div class="col breadcumbs">';

			listar_paginas($post->ID,$post->ID);
			echo '</div>';
			echo '</div>';
		}else{
			// no tiene hijos, miramos si si padre tiene hijos
			if($num_hijos_padre != 0){
				// El padre tiene hijos
				?>
				<div class="fila">
					<div class="col">
						<div class="page-title">
							<h1>
								<?php
								echo __($pagina_padre->post_title,'rr');
								?>
							</h1>
						</div>
					</div>
				</div>
				<?php
				echo '<div class="fila breadcumbs_container">';
				echo '<div class="col breadcumbs">';
				
				echo '<a class="btn_filtro" href="';
				echo $pagina_padre->guid;
				echo '">';
				echo __($pagina_padre->post_title,'rr');
				echo ' </a>';

				listar_paginas($pagina_padre->ID,$post->ID);
				echo '</div>';
				echo '</div>';
			}
		}
	}
?>