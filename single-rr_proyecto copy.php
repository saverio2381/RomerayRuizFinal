<?php get_header(); ?>
<div class="fixed-bar">
<?php get_template_part( 'menu-pagina-proyectos' ) ?>
</div>		
<div class="fila" id="proyecto_single">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		
		<div class="col no-padding imagen-principal">
			<?php 
				echo get_field('imagen_principal');
			?>
		</div>	
		
		<div id="concepto" class="fila contenido_ppal_proyecto">	
			<div class="col titulo_seccion">
				<h3><?php _e('Concepto','rr')?></h3>	
			</div>
			<div class="col tablet-2-3 memoria_proyecto">
				<?php the_content(); ?>
			</div>	
			<div class="col tablet-1-3 imagen-secundaria">
				<img src="<?php echo get_field('imagen_secundaria'); ?>"/>
			</div>	
		</div>
		
		<!-- Secciones auxiliares del proyecto -->
		<?php 
		$galeria = get_field('galeria_de_imagenes');
		$planos  = get_field('planos');
		$videos  = get_field('videos');
		
		if ($galeria){
			?>
			<div id="galeria" class="fila galeria">
				
				<div class="col titulo_seccion">
					<h3><?php _e('Fotografías','rr')?></h3>	
				</div>	
					<div class="fila">	
					<?php
						foreach ($galeria as $foto){
							?>
							<div class="col movil-50 tablet-25 web-20 galeria__item">
								<img src="<?php echo $foto['sizes']['imagen_proyecto']?>"></img>	
							</div>	
							<?php
						}
					?>
					</div>
			</div>	
			<?php
		}else{
			?>
			<div id="galeria" class="oculto"></div>	
			<?php
		}
		
		if ($planos){
			?>
			<div id="planos" class="fila">
				<div class="col titulo_seccion">
					<h3><?php _e('Planos','rr')?></h3>	
				</div>	
				
			</div>	
			<?php
		}else{
			?>
			<div id="planos" class="oculto"></div>	
			<?php
		}
		
		if ($videos){
			?>
			<div id="videos" class="fila">
				<div class="col titulo_seccion">
					<h3><?php _e('Videos','rr')?></h3>	
				</div>	
				
			</div>	
			<?php
		}else{
			?>
			<div id="videos" class="oculto"></div>	
			<?php
		}
		?>
		
	<?php endwhile; ?>
	<?php endif; ?>

</div> <!-- /fila  #proyecto_single-->
		
<?php get_footer(); ?>