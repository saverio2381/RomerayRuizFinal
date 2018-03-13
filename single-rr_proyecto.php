<?php get_header(); ?>

<div class="fixed-bar">
	<?php get_template_part( 'menu-pagina-proyectos' ) ?>
</div>		
<div class="fila" id="proyecto_single">
	<?php the_post(); ?>
	
	<div id="concepto" class="seccion_proyecto">
		<!-- Imagen principal -->
		<?php 
			$imagen_principal = wp_get_attachment_image_url( get_field('imagen_principal'), 'full_hd',false);
		?>
<!-- 		<div class="col no-padding imagen-principal" style="background: url(<?php echo $imagen_principal ?>);"> -->
		<div class="col no-padding imagen-principal">
			<img src=<?php echo($imagen_principal)?>></img>	
		</div>		
	</div>
	
	<!-- Memoria e imagen secundaria -->
	<div id="concepto" class="seccion_proyecto img_secundaria" style="min-height: auto !important;">	
		<div class="fila" style="margin: 30px 0 7px 0;">	
			
			<div class="col tablet-2-3 memoria_proyecto">
				<div class="col anti-margin-top no-padding titulo_seccion">
				<h3><?php _e(get_field('titulo_memoria'),'rr')?></h3>	
				</div>
				<div class="memoria_container">
				<?php echo get_field('memoria'); ?>
				</div>
			</div>	
			<div class="col tablet-1-3 imagen-secundaria">
				<img src="<?php echo wp_get_attachment_image_url( get_field('imagen_secundaria'), 'full_hd_vertical',false); ?>"/>
			</div>	
		</div>
	</div>
	
	<!-- Secciones auxiliares -->
	<?php
	$galeria = get_field('galeria_de_imagenes');
	$planos  = get_field('planos');
	$videos  = get_field('videos');
	?>
	
	<!-- Galeria de imágenes -->
	
	<?php
 	if ($galeria){
		?>
		<div id="galeria" class="seccion_proyecto">
			<div class="fila">	
				<div class="col titulo_seccion">
					<h3><?php the_field('rotulogaleria',7) ?></h3>	
				</div>	
				<div class="col galeria_container">
					
					<?php
						if (have_rows('galeria_de_imagenes')){
							echo ('<div id="nested_gallery_old" class="box">');
							echo ('<div class="contCajas">');
								while (have_rows('galeria_de_imagenes')){
									the_row();
									
									$ancho  = get_sub_field('ancho');
									$alto   = get_sub_field('alto'); 
									$es_sep = get_sub_field('es_separador');
									$clase = 'size' . $ancho . $alto;
									
									if (empty($es_sep)){
										?>
											<div 
												class="caja <?php echo $clase?>">
												<img 
												data-imagen="<?php echo get_sub_field('imagen_galeria');?>"
												src="<?php echo wp_get_attachment_image_url( get_sub_field('imagen'), 'small',false); ?>"/>
											
											</div>	
										<?php
									}else{
										?>
										<div class="caja <?php echo $clase?>"></div>	
										<?php
									}
									
								}
							echo ('</div');
							echo ('</div>');
						}

					?>
					
				</div>
			</div>
			
		</div>	
		<?php
	}else{
		?>
		<div id="galeria" class="oculto"></div>	
		<?php
	}?>	
	
	<!-- Planos -->
	
	<?php
	if ($planos){
		?>
		<div id="planos" class="seccion_proyecto">
			<div class="fila">	
				<div class="col titulo_seccion">
					<h3><?php the_field('rotuloplanos',7) ?></h3>	
				</div>	
				<div class="fila">	
				<?php
					foreach ($planos as $plano){
						?>
						<div class="col movil-50 tablet-25 web-20 galeria__item">
							<?php
								echo do_shortcode('[gview file="'. $plano['url'] .'"]')
								
							?>
						</div>	
						<?php
					}
				?>
				</div>
			</div>
		</div>	
		<?php
	}else{
		?>
		<div id="planos" class="oculto"></div>	
		<?php
	}?>	
	
	<!-- Videos -->
	
	<?php
	if ($videos){
		?>
		<div id="videos" class="seccion_proyecto">
			<div class="fila">	
				<div class="col titulo_seccion">
					<h3><?php the_field('rotulovideos',7) ?></h3>	
				</div>	
				<div class="fila">	
				<?php
					$n_videos =  count($videos);
					
					if ($n_videos == 1){
						?>
						<div class="col tablet-100 galeria__item">
							<div class="video_externo">	
							<?php echo $videos[0]['ruta_del_video'] ?>
							</div>
						</div>	
						<?php
					}else{
						foreach ($videos as $video){
							?>
							<div class="col movil-100 tablet-50 galeria__item">
								<div class="video_externo">	
								<?php echo $video['ruta_del_video'] ?>
								</div>
							</div>	
							<?php
						}
					}
				?>
				</div>
			</div>
		</div>	
		<?php
	}else{
		?>
		<div id="videos" class="oculto"></div>	
		<?php
	}?>	
	
			
</div> <!-- #proyecto_single-->

<div id="mascara_lightbox">
	<!--<div id="btn_abrircerrar_galeria"></div>	-->
	<div id="btn_cerrar_lightbox"></div>
	<div id="foto_lightbox">
		<img src=""></img>	
		<div class="prev_foto"></div>
		<div class="next_foto"></div>
	</div>	
	<div id="galeria_lightbox">
		<div id="galeria_toggle"></div>
	</div>		
</div>		

<?php get_footer(); ?>
<script type="text/javascript">
	scrollspy_proyecto_single();
</script>	

<script type="text/javascript">

	$(window).load(function () {
            
        if ($(window).width() > 479 && $(window).width() < 600) { $('.contCajas').masonry({ transitionDuration: '0.1s', itemSelector: '.caja', columnWidth: 100, gutter: 20 }); }
        if ($(window).width() <= 479) { $('.contCajas').masonry({ transitionDuration: '0.1s', itemSelector: '.caja', columnWidth: 86, gutter: 20 }); }
        if ($(window).width() > 600) { $('.contCajas').masonry({ transitionDuration: '0.1s', itemSelector: '.caja', columnWidth: 160, gutter: 40 }); }
        
    });
    
    $(window).resize(function () {
        if ($(window).width() > 479 && $(window).width() < 600) { $('.contCajas').masonry({ transitionDuration: '0.1s', itemSelector: '.caja', columnWidth: 100, gutter: 20 }); }
        if ($(window).width() <= 479) { $('.contCajas').masonry({ transitionDuration: '0.1s', itemSelector: '.caja', columnWidth: 86, gutter: 20 }); }
        if ($(window).width() > 600) { $('.contCajas').masonry({ transitionDuration: '0.1s', itemSelector: '.caja', columnWidth: 160, gutter: 40 }); }
    });
	
				
</script>


<script type="text/javascript">
	lightbox_gallery('#nested_gallery_old');
</script>	
