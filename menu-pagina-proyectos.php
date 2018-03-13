<div class="fila">
	<div class="col">
		<div class="page-title">
			<h1><?php the_title();?></h1>
		</div>
	</div>
</div>
<div class="mascara">
	<div class="contenedor_flotante">
		<a class="cerrar">X</a>	
	</div>	
</div>	
<div class="fila breadcumbs_container">
	<div class="col base-70 filtro_proyectos_single">
		<?php 
			the_post(); 
			$filtrado_por = $_GET['tipo_filtro'];
			$filtro_por   = $_GET['filtro'];
			
			$page_slug ='proyectos';
			$page_data = get_page_by_path($page_slug);
			$page_id = $page_data->ID;
			//echo __($page_data->post_title,'rr');
			//var_dump($page_data);;
			$ruta_proyectos = $page_data->guid;
			//echo $ruta_proyectos;
			?>
			<?php if ($filtro_por == 'Todos'){ ?>
			<a href="<?php echo $ruta_proyectos.'&tipo_filtro='.$filtrado_por.'&filtro=Todos' ?>" class="btn_filtro active">Todos</a>
			<?php }else{ ?>
			<a href="<?php echo $ruta_proyectos.'&tipo_filtro='.$filtrado_por.'&filtro=Todos' ?>" class="btn_filtro">Todos</a>
			<?php } ?>
			<a id="btn_filtro_movil" href="#!" class="icon-filter"></a>	
			
			<?php
			if ($filtrado_por == 'Tipo'){
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
				        if (strnatcasecmp ( $term->name,$filtro_por ) == 0){
					     ?>
				        <a href="<?php echo $ruta_proyectos.'&tipo_filtro='.$filtrado_por.'&filtro='.$term->name ?>" class="btn_filtro active"><?php echo($term->name)?></a>
				        <?php   
				        }else{
					     ?>
				        <a href="<?php echo $ruta_proyectos.'&tipo_filtro='.$filtrado_por.'&filtro='.$term->name ?>" class="btn_filtro"><?php echo($term->name)?></a>
				        <?php   
				        }
				    }
				}

			}else{
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
				        if (strnatcasecmp ( $term->name,$filtro_por ) == 0){
					     ?>
				        <a href="<?php echo $ruta_proyectos.'&tipo_filtro='.$filtrado_por.'&filtro='.$term->name ?>" class="btn_filtro active"><?php echo($term->name)?></a>
				        <?php   
				        }else{
					     ?>
				        <a href="<?php echo $ruta_proyectos.'&tipo_filtro='.$filtrado_por.'&filtro='.$term->name ?>" class="btn_filtro"><?php echo($term->name)?></a>
				        <?php   
				        }
				    }
				};
			}
		?>
		<?php rewind_posts(); ?>
	</div>	
	<div id="filtro-contenido-proyecto" class="col base-30 col-derecha botones-derecha">
		
		<a href="#concepto" class="btn_filtro active" data-target="concepto"><?php the_field('rotuloconcepto',7) ?></a>	

		<?php the_post();	
			//Como estamos usando esta plantilla desde un sigle no hace falta comprobr si hay posts
			$galeria = get_field('galeria_de_imagenes');
			$planos  = get_field('planos');
			$videos  = get_field('videos');
			
			if ($galeria){
				?>
				<a href="#galeria" class="btn_filtro" data-target="galeria"><?php the_field('rotulogaleria',7) ?></a>
				<?php
			}
			if ($planos){
				?>
				<a href="#planos" class="btn_filtro" data-target="planos"><?php the_field('rotuloplanos',7) ?></a>
				<?php
			}
			if ($videos){
				?>
				<a href="#videos" class="btn_filtro" data-target="videos"><?php the_field('rotulovideos',7) ?></a>
				<?php
			}
			rewind_posts();
		?>
		
	</div>
</div>