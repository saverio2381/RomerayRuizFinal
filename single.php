<?php get_header(); ?>
<div class="fixed-bar">
	<div class="fila">
		<div class="col">
			<div class="page-title">
				<h1>
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
					<?php
						$blog_page = get_option( 'page_for_posts');
						$blog = get_page( $blog_page);
						echo (__($blog->post_title,'rr'));
					?>
					</a>
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
					<div class="fila entrada_blog entrada_blog_single">
						<div class="col no-padding tablet-50">
							<div class="col">
								<span class="fecha_entrada"><?php echo get_the_date('d/m/Y');?></span>
							</div>
							<div class="col titulo_entrada">
								<h2><?php the_title();?></h2>
							</div>
							<div class="col contenido_entrada">
								<?php the_content();?>
							</div>
							<div class="col">
								<?php  
									echo do_shortcode('[et_social_follow icon_style="slide" icon_shape="rounded" icons_location="top" col_number="auto" outer_color="dark"]');
								?>
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
						<p><?php _e('Lo sentimos, no se encontró el contenido solicitado.'); ?></p>
					</div>	
				</div>	
				<?php
			}	
			?>
		</div>
	</div>
	
</div>	

<?php get_footer(); ?>