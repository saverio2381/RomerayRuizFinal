<div class="fila">
	<div class="col">
		<h3>
		<?php
			$destino = get_field('subtitulo');
			_e($destino,'rr');
		?>	
		</h3>
	</div>
	
	<div class="fila">
		<?php
		if( have_rows('puntos') ):
			// loop through the rows of data
			while ( have_rows('puntos') ) : the_row();
		?>
		<div class="col-np punto_sostenibilidad movil-100 tablet-50 web-1-3">
			<div class="col icono_sos base-1-6 tablet-1-5">
				<img src="<?php echo wp_get_attachment_image_url( get_sub_field('icono'), 'small',false); ?>" >	
			</div>
			<div class="col descrip_sos base-5-6 tablet-4-5">
				<?php
					_e(get_sub_field('descripcion'),'rr');
				?>
			</div>
			
		</div>
		<?php endwhile;
			endif;
		?>
	</div>	
</div>	