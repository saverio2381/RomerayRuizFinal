<?php get_header(); ?>

<section id="proyectos">
	<div class="fila">
		<div class="col">
			<div class="page-title">
				<h1><?php 
					$page_slug ='proyectos';
					$page_data = get_page_by_path($page_slug);
					$page_id = $page_data->ID;
					echo __($page_data->post_title,'rr');
					?></h1>
			</div>
		</div>
	</div>
	
	<div class="fila breadcumbs_container">
		
		<div class="col tablet-90 breadcumbs filtro_proyectos">
			<div class="proyectos__filters tipos">
				<a href="#" class="btn_filtro" data-filtro="all">Todos</a>
				<?php  
				// WP_Term_Query arguments
				$args = array(
					'taxonomy'               => array( 'tipos_proyectos' ),
					'order'                  => 'ASC',
					'orderby'                => 'none',
					'fields'                 => 'all',
					'hide_empty'             => true
				);
				
				// The Term Query
				$term_query = new WP_Term_Query( $args );
				if ( ! empty( $term_query->terms ) ) {
				    foreach ( $term_query ->terms as $term ) {
				        ?>
				        <a href="#" class="btn_filtro" data-filtro=".<?php echo($term->slug)?>"><?php echo($term->name)?></a>
				        <?php
				    }
				}
				?>
			</div>
		</div>	<!-- /col -->
		
		
		<div class="col tablet-90 breadcumbs filtro_proyectos oculto">
			<div class="proyectos__filters tipos">
				<a href="#" class="btn_filtro" data-filtro="all">Todos</a>
				<?php 
					$max_anno=""; 
				// WP_Term_Query arguments
				$args = array(
					'taxonomy'               => array( 'annos_proyectos' ),
					'order'                  => 'DESC',
					'orderby'                => 'name',
					'fields'                 => 'all',
					'hide_empty'             => true
				);
				
				// The Term Query
				$term_query = new WP_Term_Query( $args );
				if ( ! empty( $term_query->terms ) ) {
				    foreach ( $term_query ->terms as $term ) {
				        if (empty ($max_anno)){
					        $max_anno = $term->slug;
				        }
				        ?>
				        <a href="#" class="btn_filtro" data-filtro=".<?php echo('anno_'.$term->slug)?>"><?php echo($term->name)?></a>
				        <?php
				    }
				}
				?>
			</div>
		</div>	<!-- /col -->
		
		<div class="col  base-100 tablet-10 col-derecha" id="tipo_filtrado_lista_proyectos">
			<a href="#" class="btn_filtro active" data-filtro="filtro_proyectos_tipo"><?php _e('[:es]Tipo[:en]Type[:fr]Type[:de]Kunst','rr')?></a>	
			<a href="#" class="btn_filtro" data-filtro="filtro_proyectos_anno"><?php _e('[:es]Fecha[:en]Date[:fr]Date[:de]Datum','rr')?></a>				
		</div>
		
	</div>
	
	<div class="fila lista-proyectos">
		<?php
		$query = new WP_Query( array( 
			'post_type' => 'rr_proyecto',
			//'orderby'   => 'annos_proyectos',
			//'order'     => 'ASC',
			'meta_key'  =>'año_del_proyecto',
			'orderby'  =>'meta_value_name',
			'order'    => 'DESC',
			'posts_per_page'      => -1
			) );
 
		if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
			
			<!-- taxonomia tipos_proyectos -->
			<?php $terms = wp_get_post_terms( get_the_ID(), 'tipos_proyectos');
				$tipos="";
				$nombre_tipos ="";
				foreach ($terms as $term){
					$tipos = $tipos .' '.$term->slug;
					$nombre_tipos = $nombre_tipos . '<span> ' . $term->name . '</span>';
				}
			?>
			
			<!-- taxonomia annos_proyectos -->
			<?php $terms = wp_get_post_terms( get_the_ID(), 'annos_proyectos');
				$annos="";
				$anno_proyecto="";
				$nombre_annos ="";
				foreach ($terms as $term){
					$annos = $annos .' anno_'.$term->slug;
					$anno_proyecto = $term->slug;
					$nombre_annos = $nombre_annos . '<span> ' . $term->name . '</span>';
				}
			?>
			
			<div id="cuadro_lista_proyectos" class="col movil-50 tablet-1-3 hd-25 <?php echo $tipos.' '.$annos;?>" style="order:<?php echo $max_anno - $anno_proyecto;?>;">
				<div class="proyecto">
					<div class="proyecto__img">
 						<a class="enlace_a_proyecto" href="<?php the_permalink()?>">
	 						<?php 
		 						echo wp_get_attachment_image( get_field('imagen_principal'), 'imagen_proyecto',false,'class=proyecto__img' );
		 					?>
	 					</a> 
					</div>
					
					<div class="proyecto__legend">
						<a class="enlace_a_proyecto" href="<?php the_permalink();?>">
							<h3 class="proyecto__tittle">
								<?php the_title(); ?>
							</h3>	
						</a>
					</div>		
				</div>	
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
			<!-- show pagination here -->
		<?php else : ?>
			<!-- show 404 error here -->
			<h4>No se encontraron proyectos que mostrar</h4>
		<?php endif; ?>
				
	</div>
</section>

		
<?php get_footer(); ?>
<!-- 
	========================== Manejo de filtrados interactivos =================================
-->

<?php 
	if (isset($_GET['tipo_filtro'],$_GET['filtro'])){
		$filtrado_por = $_GET['tipo_filtro'];	
		$filtro_por   = $_GET['filtro'];
		?>
		<script type="text/javascript">
			prueba("<?php echo $filtrado_por?>","<?php echo $filtro_por?>");
		</script>
		<?php
	}
?>









