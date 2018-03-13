<?php get_header(); ?>
<div class="fixed-bar">
	<div class="fila">
		<div class="col">
			<div class="page-title">
				<h1>
					<?php
						$blog_page = get_option( 'page_for_posts');
						$blog = get_page( $blog_page);
						echo (__($blog->post_title,'rr'));
					?>
				</h1>
			</div>
		</div>
	</div>
</div>



<div class="fila">
	<div class="col no-padding">
		<div class="fila lista_entradas">
			<?php	
			if (have_posts()){
				while (have_posts()){
					the_post();
					?>
					<div class="fila entrada_blog">
						<div class="col no-padding tablet-50">
							<div class="col">
								<span class="fecha_entrada"><?php echo get_the_date('d/m/Y');?></span>
							</div>
							<div class="col titulo_entrada">
								<a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
							</div>
							<div class="col contenido_entrada">
								<?php the_excerpt();?>
							</div>
							<div class="col">
								<?php  
									echo do_shortcode('[et_social_follow icon_style="slide" icon_shape="rounded" icons_location="top" col_number="auto" outer_color="dark"]');
								?>
							</div>	
							<div class="col">
								<a class="readmore" href="<?php the_permalink();?>"><?php _e('[:es]Leer más[:en]Read more[:de]Weiterlesen[:fr]Lire la suite[:it]Leggi di più','rr'); ?></a>	
							</div>

						</div>
						<div class="col tablet-50">
						<?php
							if ( has_post_thumbnail() ){
								$enlace = get_field('enlace_a_proyecto');
								if ($enlace){
								?>
								<a href="<?php echo get_permalink($enlace);?>">
									<img class="imagen_destacada" src="<?php 	the_post_thumbnail_url('imagen_lista_entradas'); ?>"/>
								</a>
								<?php	
								}else{
									
								
								?>
								<img class="imagen_destacada" src="<?php the_post_thumbnail_url('imagen_lista_entradas'); ?>"/>
								<?php
								}
							}
						?>
						</div>
					</div>
				<?php	
				}
			}else{
				?>
				<div class="fila">
					<div class="col">
						<h4>En breve encontrará en esta sección todas nuestras novedades</h4>
					</div>	
				</div>	
				<?php
			}	
			?>
		</div>
	</div>
	
</div>	
