<?php get_header(); ?>
<div class="fixed-bar">	
	<div class="fila">
		<div class="col">
			<div class="page-title">
				<h1><a href="<?php the_permalink( )?>"><?php the_title();?></a></h1>
			</div>
		</div>
	</div>
	
	<?php
		echo '<div class="fila breadcumbs_container">';
		echo '<div class="col breadcumbs">';
		$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'ASC') );
	    $page_id='';
		foreach ($mypages as $page){
			if ($page_id == ''){
				$page_id = $page->ID;
			}
		}
		echo '<span class="btn_filtro active" href="">';
			_e($mypages[0]->post_title,'rr');
		echo '</span>';

		echo '<a class="btn_filtro" href="';
		echo $mypages[1]->post_name;
		echo '">';
			_e($mypages[1]->post_title,'rr');
		echo '</a>';
		
		echo '</div>';
		echo '</div>';
	?>
</div>

<div class="fila" id="contacto_page">	
	<div  class="seccion_contacto">	
		<div class="fila">	
			<?php
				$datos_contacto = get_field('datos_de_contacto');
				if (have_rows('localizacion')){
					while(have_rows('localizacion')){
						the_row();
						?>
						<div class="col tablet-30 ">
							<?php the_sub_field('texto_localizacion');?>
							<a href="<?php echo get_sub_field('enlace_mapa').'" target="_new"';?>">
							<img class="margin-top" src="	
							<?php 
								$foto_id = get_sub_field('mapa_personalizado');
								$foto = wp_get_attachment_image_src( $foto_id, 'large' );
								echo $foto[0];
							?>
							"></a>
							<?php echo $datos_contacto; ?>
						</div>
						<div class="col tablet-70">
							<?php if (get_field('imagen_principal')){?>
							<img class="margin-top" src="	
							<?php 
								echo get_field('imagen_principal');
							?>
							">
							<?php } ?>
						</div>
						<?php
					}
				}
			?>
		</div>
	</div>
	
</div> <!-- /contacto_page -->
<?php get_footer(); ?>