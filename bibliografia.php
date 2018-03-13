<div class="seccion_bibliografia publicaciones_section">
	<?php
		$query = new WP_Query( array( 
		'post_type' => 'publicaciones',
		'meta_key'  =>'anno',
		'orderby'  =>'meta_value_name',
		'order'    => 'DESC',
		'posts_per_page'      => -1
		) );

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post(); ?>	
		<?php
			$terms = wp_get_post_terms( get_the_ID(), 'tipos_publicaciones');
 			$tipos="";
 			
 			$padre_id = $terms[0]->parent;
 			
 			if ($padre_id != 0){
	 			$padre = get_term_by('id', $padre_id, 'tipos_publicaciones');
 			    $padre_nombre = $padre->slug;	
 			    $tipos = $padre_nombre;
 			}
			
			foreach ($terms as $term){
				$tipos = $tipos .' '.$term->slug;
			}

			$term = get_term(get_field('anno'),'annos_publicaciones');
		?>
		<div class="col tablet-50  web-1-3 hd-25 publicacion <?php echo $tipos ?>" style="order: <?php echo 3000 - $term->name?>">
			<div class="col base-40 imagen_publicacion">		
				<?php
					if(get_field('enlace_de_la_imagen')){
						?>
						<a href="<?php echo get_field('enlace_de_la_imagen').'" target="_new"';?>">	
							<?php echo wp_get_attachment_image( get_field('caratula'), 'small',false,'class=publicacion__img' ); ?>
						</a>
						<?php
					}else{
						echo wp_get_attachment_image( get_field('caratula'), 'small',false,'class=publicacion__img' );
					}
				?>
				

			</div> <!-- div.imagen_publicacion -->
			
			<div class="col base-60 datos_publicacion">
				<p class="etiqueta_publicacion"><?php the_field('etiqueta')?></p>
				<p class="titulo"><?php the_title(); ?></p>
				<span class="publicacion-info__anno">
				<?php
					
					echo $term -> name;
				?>
				</span>

				<?php
					if (get_field('proyecto_asociado')){
						$proyecto = get_post(get_field('proyecto_asociado')[0]);
						?>
						<a href="<?php echo $proyecto->guid ?>" class="enlace_proyecto">
							<?php _e($proyecto->post_title,'rr') ?>
						</a>
						<?php
					}
					
				?>
			</div> <!-- div.datos_publicacion -->

		</div> <!-- /div.publicacion -->
	
		<?php 
		endwhile; wp_reset_postdata();
		else :
		?>
		<div class="fila">
			<div class="col">
				<h4>No se encontraron publicaciones que mostrar</h4>
			</div>	
		</div>
	<?php endif; ?>
	
			
</div>
	