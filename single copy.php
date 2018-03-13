<?php get_header(); ?>

<?php get_template_part( 'menu-pagina' ) ?>	
	
<div class="fila">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="col">
		<?php  
		if ( has_post_thumbnail() ){
			?>
			<img class="proyecto__img imagen_destacada_single" src="<?php the_post_thumbnail_url('imagen_lista_entradas'); ?>"/>
			<?php
		}
		?>
	</div>
	<div class="col">
		<?php the_content(); ?>
	</div>


<?php endwhile; else: ?>
<p><?php _e('Lo sentimos, no se encontró el contenido solicitado.'); ?></p>
<?php endif; ?>
</div>
		
<?php get_footer(); ?>