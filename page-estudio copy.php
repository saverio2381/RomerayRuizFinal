<?php get_header(); ?>
<div class="fixed-bar">
	<?php get_template_part( 'menu-pagina-estudio' ) ?>
</div>		

<div class="fila" id="estudio_page">
	<?php //the_post(); ?>
	
	<!-- Secciones de la página Estudio (subpáginas) -->
	
	<?php
		$args = array(
	    // Arguments for your query.
	    'post_type'   => 'page',
	    'post_parent' => get_the_ID(),
	    'orderby'     => 'menu_order',
	    'order'       => 'ASC'
		);
	
		// Custom query.
		$subpaginas_query = new WP_Query( $args );
	 
		// Check that we have query results.
		if ( $subpaginas_query->have_posts() ) {
	 
	    	// Start looping over the query results.
			while ( $subpaginas_query->have_posts() ) {
	
	        	$subpaginas_query->the_post();
				$subpagina = get_post();
				$nombre = $subpagina->post_name;
	        	?>
	        	<div id="<?php echo $nombre?>" class="seccion_estudio">	
					<div class="fila">	
						
						<?php 
							if ($nombre == 'filosofia'){
								?>
								<div class="col tablet-40 ">
									<?php the_content(); ?>
								</div>
								<div class="col tablet-60">
									<img class="margin-top" src="	
									<?php 
										echo get_field('imagen_de_portada');
									?>
									">
								</div>
								<?php
							}
							else if( $nombre == 'equipo' ){
								if (have_rows('socios_fundadores')){
									?><div class="fila socios_fundadores"><?php
									while (have_rows('socios_fundadores')){
										the_row();
										?>
										<div class="col no-padding tablet-40" style="order: <?php echo rand(0,100);?>">
											<div class="fila">	
												<div class="col base-60 foto_socio_fundador">
													<?php 
														$foto_id = get_sub_field('fotografia');
														$foto = wp_get_attachment_image_src( $foto_id, 'imagen_proyecto' );
													?>	
													<img src="<?php echo $foto[0] ?>">
													
												</div>	
												<div class="col base-40 margin-top titulo_socio">
													<span class="nombre"><?php the_sub_field('nombre'); ?></span>
													<span class="titulo"><?php the_sub_field('descripcion'); ?></span>
												</div>	
												<div class="col perfil">
													<?php the_sub_field('perfil'); ?>
												</div>	
												
											</div>
										</div>	
										
										<?php
									}
									?></div><?php
								}
								if(have_rows('miembros_del_equipo')){
									?>
									<div class="fila miembros_de_equipo">
										<?php while(have_rows('miembros_del_equipo')){ 
											the_row();
										?>
										<div class="col base-50 tablet-1-6 componente_equipo">
											<span class="nombre_miembro"><?php the_sub_field('nombre');?></span>
											<span class="descripcion_miembro"><?php the_sub_field('descripcion');?></span>		
										</div>	
										<?php } ?>
									</div>	
									<?php
								}
								
							}
							else{
								?>
								<div class="col ">
									<?php the_content(); ?>
								</div>	
								<?php
							}
						?>
					</div>
				</div>
	        	<?php
	    	}
	 
		}
	 
		// Restore original post data.
		wp_reset_postdata();
	?>
			
</div> <!-- #estudio_page-->
		
<?php get_footer(); ?>