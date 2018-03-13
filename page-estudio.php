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
				$titulo = $subpagina->post_title;
				if ($nombre == 'filosofia'){
					?>
					<div id="<?php echo $nombre?>" class="seccion_estudio">	
						<div class="fila">
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
						</div>
					</div>
					<?php
				}
				else if( $nombre == 'equipo' ){
					if (have_rows('socios_fundadores')){?>
						<div id="<?php echo $nombre?>" class="seccion_estudio">						
							<div class="seccion_estudio">	
								<div class="fila socios_fundadores">
									<div class="col titulo_seccion">
										<h3><?php the_field('rotulofundadores',5) ?></h3>	
									</div>
									<?php
									while (have_rows('socios_fundadores')){
										the_row();?>
										<div class="col no-padding tablet-45" style="order: <?php echo rand(0,100);?>">
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
									}?>
								</div>
							</div><?php
						}
						if(have_rows('miembros_del_equipo')){
							?>
							<div class="seccion_estudio">	
								
								<div class="fila miembros_de_equipo">
									<div class="col titulo_seccion">
										<h3><?php the_field('rotuloequipo',5) ?></h3>	
									</div>
									<div class="fila space_between">
									<div class="col tablet-25 lista_miembros">	
									<?php while(have_rows('miembros_del_equipo')){ 
										the_row();
									?>
										<span class="nombre_miembro">
											<?php the_sub_field('nombre');?>
											<span class="descripcion_miembro">
												<?php the_sub_field('descripcion');?>
											</span>
										</span>
									<?php } ?>
									
									<!-- Metemos aqui tb los colaboradores-->
									<?php if (have_rows('colaboradores')){ ?>
									<div id="seccion_colaboradores">	
										<div class="col titulo_seccion margin-top">
											<h3><?php the_field('rotulocolaboradores',5) ?></h3>	
										</div>	
										<div class="fila">	
											<div class="col lista_colaboradores">	
												<?php
												while (have_rows('colaboradores')){
													the_row();?>
													<span class="nombre_miembro">
														<?php the_sub_field('nombre');?>
														<span class="descripcion_miembro">
															<?php the_sub_field('profesion');?>
														</span>
													</span>			
												<?php
												}?>
											</div>
										</div>
									</div>
									<?php } ?>
									<!-- final de los colaboradores-->	
									
									</div>
																	
									<div class="col tablet-65" id="mosaico_equipo">
										<!-- Aqui va la galeria Nested igual que en proyecto single-->
										<div class="col galeria_container">
											<?php
												if (have_rows('galeria_de_imagenes')){
													echo ('<div id="nested_gallery">');
													while (have_rows('galeria_de_imagenes')){
														the_row();
														
														$ancho  = get_sub_field('ancho');
														$alto   = get_sub_field('alto'); 
														$es_sep = get_sub_field('es_separador');
														$clase = 'size' . $ancho . $alto;
														
														if (empty($es_sep)){
															?>
																<div 
																	class="box nocursor <?php echo $clase?>">
																	<img 
																	data-imagen="<?php echo get_sub_field('imagen_galeria');?>"
																	src="<?php echo wp_get_attachment_image_url( get_sub_field('imagen'), 'small',false); ?>"/>
																
																</div>	
															<?php
														}else{
															?>
															<div class="box <?php echo $clase?>"></div>	
															<?php
														}
														
													}
													echo ('</div>');
												}

											?>
											
										</div>
										<!-- Final de la galeria Nested al estilo de proyecto single-->
									</div>
<!--
									<?php if (have_rows('colaboradores')){ ?>
										<div class="col titulo_seccion margin-top">
											<h3><?php _e('Colaboradores','rr')?></h3>	
										</div>	
										<div class="fila">	
											<div class="col lista_colaboradores">	
												<?php
												while (have_rows('colaboradores')){
													the_row();?>
													<span>
														<?php the_sub_field('nombre');?>
													</span>				
												<?php
												}?>
											</div>
										</div>
									<?php } ?>
-->
									</div><!-- Fila -->
								</div>	
							</div>
						</div>
						<?php
						}
				}
				else if ($nombre=='premios'){
					?>
					<div id="<?php echo $nombre?>" class="seccion_estudio">	
						<div class="fila">
							<div class="col titulo_seccion">
								<h3><?php _e($titulo,'rr')?></h3>	
							</div>
							<?php
								$query = new WP_Query( array( 
								'post_type' => 'premios',
								'meta_key'  =>'anno_del_premio',
								'orderby'  =>'meta_value_num',
								'order'    => 'DESC',
								'posts_per_page'      => -1
								) );
							?>
							<div class="fila">
							<?php
								if ( $query->have_posts() ) :
									while ( $query->have_posts() ) : $query->the_post(); 
									$term = get_term(get_field('anno_del_premio'),'annos_premios');
									?>	
									
									<div class="col movil-50 tablet-1-3 web-25 premio" style="order: <?php echo $term->name?>">
										<div class="col base-40 imagen_del_premio">
											<?php
												$destino = get_field('enlace_de_la_imagen');
												$target_imagen = '#!';
												if ($destino){
													/*
														Compruebo si apunta a una pagina de mi sitio o a una página externa caso en el cual se debe abrir en una nueva
														pestaña/ventana
													*/
													if(strpos($destino,get_bloginfo(wpurl)) === false){
														// Apunta hacia fuera
														$target_imagen = '_new';
													}else{
														$target_imagen = '_self';
													}

												}
											?>
											<a href="<?php echo get_field('enlace_de_la_imagen') ?>" target="<?php echo $target_imagen ?>">
											<?php  echo wp_get_attachment_image(get_field('imagen'),'small',false,'class=premio__img'); ?>
											</a>	
										</div>	
										<div class="col base-60 datos_premio">
											<span class="nombre_premio"><?php echo the_title(); ?></span>
											
											<span class="anno_premio"> 
												<?php 
													//$term = get_term(get_field('anno_del_premio'),'annos_premios');
													echo $term -> name;
													//the_field('anno_del_premio');
													//var_dump($term);
												?> 
											</span>
												
<!-- 											<a href="<?php echo get_field('enlace_de_la_imagen') ?>" target="<?php echo $target_imagen ?>"> -->
<!-- 												<span class="objeto_premio"> <?php the_field('obra_ganadora') ?> </span>	 -->
<!-- 											</a> -->
										</div>											
									</div>	
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
							
						</div>
					</div>						
					<?php
				}
				else if ($nombre=='sostenibilidad'){
					?>
					<div id="<?php echo $nombre?>" class="seccion_estudio">	
						<div class="fila">
							<div class="col titulo_seccion" id="titulo_sostenibilidad">
								<h2><?php _e($titulo,'rr')?></h2>	
							</div>
						</div>
						
						<?php get_template_part( 'sostenibilidad' ) ?>
						
					</div>						
					<?php
				}
				else if ($nombre=='bibliografia'){
					?>
					<div id="<?php echo $nombre?>" class="seccion_estudio">	
						<div class="fila">
							<div class="col titulo_seccion" id="titulo_bibliografia">
								<h2><?php _e($titulo,'rr')?></h2>
								<?php
									$padre = get_term_by('id', 26, 'tipos_publicaciones');
									$nombre_padre = $padre->name;
								?>
								<span class="filtro_actual_bibliografia" id="filtro_actual_bibliografia"><?php _e($nombre_padre,'rr')?></span>

								<div class="subfiltros_bibliografia">
									<?php
										$args = array(
											'taxonomy'               => array( 'tipos_publicaciones' ),
											'order'                  => 'ASC',
											'orderby'                => 'id',
											'fields'                 => 'all',
											'hide_empty'             => false
										);
										$term_query = new WP_Term_Query( $args );
										$contador = 1;
										foreach ( $term_query ->terms as $term ) {
											if ($term->parent == 26){
												if ($contador == 1){
													echo '<a href="#!" class="btn_subfiltro_publicaciones active" data-filtro="'. $term->slug .'">' . $term->name . '</a>';	
													$contador++;
												}else{
													echo '<a href="#!" class="btn_subfiltro_publicaciones" data-filtro="'. $term->slug .'">' . $term->name . '</a>';		
												}
											}
										}	
									?>
								</div>	<!-- /subfiltros_bibliografia -->
							</div> <!-- /titulo_bibliografia -->
						</div>
						
						<?php get_template_part( 'bibliografia' ) ?>
							
						
					</div>						
					<?php
				}
				else{
					?>
					<div class="col ">
						<?php the_content(); ?>
					</div>	
					<?php
				}
	    	}
	 
		} // If subpaginas have_post
	 
		// Restore original post data.
		wp_reset_postdata();
	?>
			
</div> <!-- #estudio_page-->
		
<?php get_footer(); ?>
<script type="text/javascript">
	scrollspy_estudio('#estudio_page','#estudio_page > .seccion_estudio');
	filtro_bibliografia();
</script>

<!--[if lt IE 9]> <script src="dist/html5shiv.js"></script> <![endif]-->      
<script type="text/javascript">
	$(window).load(function () {

		
		if ($(window).width() > 479 && $(window).width() < 600) { $('#nested_gallery').nested({ transitionDuration: '0.1s', itemSelector: '.box', minWidth: 100, gutter: 20 }); }
		if ($(window).width() <= 479) { $('#nested_gallery').nested({ transitionDuration: '0.1s', itemSelector: '.box', minWidth: 86, gutter: 20 }); }
		if ($(window).width() > 600) { $('#nested_gallery').nested({ transitionDuration: '0.1s', itemSelector: '.box', minWidth: 160, gutter: 40 }); }
		
	});
	$(window).resize(function () {
		if ($(window).width() > 479 && $(window).width() < 600) { $('#nested_gallery').nested({ transitionDuration: '0.1s', itemSelector: '.box', minWidth: 100, gutter: 20 }); }
		if ($(window).width() <= 479) { $('#nested_gallery').nested({ transitionDuration: '0.1s', itemSelector: '.box', minWidth: 86, gutter: 20 }); }
		if ($(window).width() > 600) { $('#nested_gallery').nested({ transitionDuration: '0.1s', itemSelector: '.box', minWidth: 160, gutter: 40 }); }
	});
	
				
</script>