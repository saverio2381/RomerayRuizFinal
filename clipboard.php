<div id="concepto" class="seccion_proyecto">	
		<div class="fila">	
			
			<div class="col tablet-2-3 memoria_proyecto">
				<div class="col anti-margin-top no-padding titulo_seccion">
				<h3><?php _e(get_field('titulo_memoria'),'rr')?></h3>	
				</div>
				<?php echo get_field('memoria'); ?>
			</div>	
			<div class="col tablet-1-3 imagen-secundaria">
				<img src="<?php echo get_field('imagen_secundaria'); ?>"/>
			</div>	
		</div>
	</div>
	
	
<?php
					foreach ($galeria as $foto){
						?>
							<a class="gallery_item" href="<?php echo $foto['url'] ?>">	
							<img src="<?php echo $foto['sizes']['medium']?>"></img>	
							</a>
						<?php
					}
				?>	
				
				
$page_slug ='proyectos';
$page_data = get_page_by_path($page_slug);
$page_id = $page_data->ID;
echo __($page_data->post_title,'rr');


$(window).on('scroll',function(){
			scroll_w = $(this).scrollTop();
			
			secciones.each(function(index){
				
				if (scroll_w >= $(this).offset().top*0.75){
					$('.breadcumbs > .btn_filtro[href="#' + $(this).attr('id') + '"]').addClass('active').siblings().removeClass('active');
				}
			})
			
		})
		
		$(window).on('resize',function(){
			alto_pagina = $(this).outerHeight();
		})
		
		$('.breadcumbs > .btn_filtro').on('click',function(e){
			e.preventDefault();
			
			
			
			/*
			$('html, body').animate({
				scrollTop : $( container + ' ' + $(this).data('target')).offset().top - altura_fija
			},1000);
			*/
		})
		
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nested</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jquery.nested.js"></script>
<script src="makeboxes.js"></script>
</head>
<body>


<div id="container">
  <div class="box size21">
	  <img src="img/1_6.jpeg" alt="" />
  </div>
  <div class="box size22">
	  <img src="img/2_.jpeg" alt="" />
  </div>
  <div class="box size11">3</div>
  <div class="box size11">4</div>
  <div class="box size11">5</div>
  <div class="box size11">
	  <img src="img/4_5.jpeg" alt="" />
  </div>
  <div class="box size21">
	  <img src="img/3_4.jpeg" alt="" />
  </div>
  <div class="box size11">8</div>
  <div class="box size22">
	  <img src="img/5_4.jpeg" alt="" />
  </div>
  <div class="box size11">10</div>
  <div class="box size11">11</div>
  <div class="box size11">
	  <img src="img/7_1.jpeg" alt="" />
  </div>
  <div class="box size11">13</div>
  <div class="box size21">
	  <img src="img/2_4.jpeg" alt="" />
  </div>
</div>


<script type="text/javascript" >
  
  $(function() { 
   
    $('#container').nested({
	    minWidth: 160,
	    gutter : 40
    }); 

  });
  
  
</script>
  
</body>
</html>  

// Antiguo bibliografía 04/04/2017

if ( $query->have_posts() ) :
		?>
		<div class="fila">
		<?php
			
		while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php
			$terms = wp_get_post_terms( get_the_ID(), 'tipos_publicaciones');
			$tipos="";
			foreach ($terms as $term){
				$tipos = $tipos .' '.$term->slug;
			}
			?>
			<div class="col base-50 movil-1-3 tablet-1-6 web-1-8 publicacion <?php echo $tipos ?>">
				
				<a href="<?php echo get_field('enlace_de_la_imagen').'" target="_new"';?>">	
					<?php echo wp_get_attachment_image( get_field('caratula'), 'small',false,'class=publicacion__img' ); ?>
				</a>
				
				<div class="publicacion-info">
					
					<span class="publicacion-info__nombre">
						<a href="#!" class="btn_publicacion_name">
							<?php the_title(); ?>
						</a>	
					</span>	
					
					<span class="publicacion-info__anno">
					<?php
						$term = get_term(get_field('anno'),'annos_publicaciones');
						echo $term -> name;
					?>
					</span>	
					
				</div>	
			</div>		
			
			
			<?php
		endwhile; 
		
		wp_reset_postdata();
		?>
		</div> <!-- /Fila -->
		
		<?php
		// show pagination here -->
		
	else :
		// show 404 error here
		?>
		<div class="fila">
			<div class="col">
				<h4>No se encontraron publicaciones que mostrar</h4>
			</div>	
		</div>	
		<?php
	endif; ?>  
/*
	Aqui termina el antiguo bibliografía
*/




/*
@charset "UTF-8";

@media screen and ( min-width: 1640px) {
	.box { width: 1600px;}

	.contItems { width: 1400px;}
	.contItemsP { width: 1380px;}
	.item { width: 220px;}
	.item span { height: 125px;}

	.colTresCuadro { width: 760px;}

	/* News */
	.news .colDosCuadro { width: 360px; margin: 0 20px 40px 200px;}
	.newsP .colCuadro { width: 360px;}
	.newsP .colCuadro.Img { width: 160px;}
	.btns { width: 760px;}

	/* Interstitial */
	.news.interstitial .colTresCuadro { width: 720px; margin: 0 0 0 0;}
	
	/* Info */
	.info .colDosCuadro { margin: 0 20px 40px 220px;}
	.boxContact { width: 300px;}
	.boxMap { margin: 0 40px 0 320px; width: 740px;}
	.boxMap a.location, .boxMap a.print  { left: 780px;}
	.publication { width: 450px; height: 240px;}
	.publication .Txt { width: 240px;}	
}

@media screen and ( max-width: 1640px) {
	.box { width: 1400px;}

	.contItems { width: 1200px;}
	.contItemsP { width: 1180px;}
	.item { width: 226px;}
	.item span { height: 129px;}

	.colTresCuadro { width: 760px;}

	/* News */
	.news .colDosCuadro { width: 360px; margin: 0 20px 40px 0;}
	.newsP .colCuadro { width: 160px;}
	.newsP .colCuadro.Img { width: 160px;}
	.btns { width: 760px;}

	/* Interstitial */
	.news.interstitial .colTresCuadro { width: 720px; margin: 0 0 0 0;}

	/* Info */
	.boxMap { margin: 0 40px 0 220px; width: 640px;}
	.boxContact { width: 300px;}
	.info .contItemsP { width: 980px; margin: 0 15px 0 205px;}	
}

@media screen and ( max-width: 1440px) {
	.box { width: 1200px;}

	.contItems { width: 1000px;}
	.contItemsP { width: 980px;}
	.item { width: 235px;}
	.item span { height: 135px;}

	.colTresCuadro { width: 560px;}

	/* News */
	.news .colDosCuadro { width: 360px;}
	.newsP .colCuadro { width: 160px;}
	.newsP .colCuadro.Img { width: 160px;}
	.btns { width: 560px;}

	/* Interstitial */
	.news.interstitial .colTresCuadro { width: 520px; margin: 0 0 0 0;}

	/* Info */
	.boxMap { margin: 0 40px 0 20px;}	
	.info .contItemsP { width: 980px; margin: 0 5px 0 15px;}
}

@media screen and ( max-width: 1240px) {
	.box { width: 1000px;}

	.contItems { width: 800px;}
	.contItemsP { width: 780px;}
	.item { width: 250px;}
	.item span { height: 145px;}

	.colTresCuadro { width: 460px;}

	/* News */
	.news .colDosCuadro { width: 260px;}
	.newsP .colCuadro { width: 110px;}
	.newsP .colCuadro.Img { width: 110px;}
	.newsP .colCuadro.Img img { width: 100%;}
	.btns { width: 460px;}

	/* Interstitial */
	.news.interstitial .colTresCuadro { width: 400px; margin: 0 0 0 0;}

	/* Info */
	.info .colDosCuadro { width: 260px;}
	.boxContact { width: 300px;}
	.boxMap { width: 440px;}
	.boxMap a.location, .boxMap a.print  { left: 480px;}
	.info .contItemsP { width: 780px; margin: 0 5px 0 15px;}
	.publication { width: 380px;}
	.publication .Img { width: 160px; margin-right: 30px;}
	.publication .Txt { width: 180px;}	
}

@media screen and ( max-width: 1040px) {
	.box { width: 800px;}

	.item { width: 244px; margin: 0 9px 0px 5px; }
	.item span { height: 141px;}	

	.sideBar { width: auto; float: none; margin: 0 0 0 20px; position: absolute; top: -80px; left: 0; font-size: 12px; font-family:'HarmoniaSans W01 SemiBd', sans-serif;}
	.sideBar strong { font-family:'HarmoniaSans W01 SemiBd', sans-serif;}
	.sideBar ul { list-style: none; margin: 0;}
	.sideBar ul li { display: inline; margin-right: 5px; position: relative;}
	.sideBar ul li ul { position: absolute; top: 20px; left: -10px; background: #fff; padding: 10px; -moz-opacity: 0.95; opacity: 0.95; filter: alpha(opacity=95); z-index: 9;}
	.sideBar ul li ul li { display: block;}
	.sideBar ul li ul li a { white-space:nowrap;}

	/* News */
	.newsletter { position: absolute; top: -40px; left: 0; width: 300px;}
	.newsletter p { display: none;}
	.newsletter input { margin-right: 5px;}
	.newsletter input[type="submit"], .newsletter input[type="buttom"] { color: #b7b7b7; background: #fafafa; font-size: 10px;}
	input[type="text"], input[type="email"], input[type="password"] { padding: 0; border-top: none; border-left: none; border-right: none;}
	input[type="submit"], input[type="buttom"] { height: 20px; border: none; padding: 0 10px; line-height: 21px; background: #eeeff1; font-size: 11px; text-transform: uppercase;}
	input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus { border-bottom: 1px solid #3d3c3c; border-top: none; border-left: none; border-right: none;}
	.newsP .colCuadro { text-align: left;}

	input { -webkit-appearance: none; border-radius: 0;}

	.publication { height: 280px;}
}

@media screen and (max-width: 840px) {
	.box { width: 600px;}

	.boxConceptos { height: 140px;}
	.boxConceptos ul { margin: 100px 0 0 20px;}

	.content { margin: 140px 0 0 0;}

	.contItems { width: 600px;}
	.contItemsP { width: 580px;}
	.item { width: 180px; margin: 0 5px 0px 5px;}
	.item span { height: 99px;}	

	.colTresCuadro { width: 380px; margin: 0 0 40px 0;}

	.boxMemory { left: -600px; width: 600px;}
	.boxMemory .btnCerrarMemory { left: 550px;}

	/* News */
	.news .colTresCuadro { margin: 0 0 40px 0;}
	.news .colDosCuadro { width: 160px;}
	.newsP .colCuadro { width: 70px; margin: 0 20px 20px 0;}
	.newsP .colCuadro.Img { width: 70px; margin: 0 20px 20px 0;}
	.btns { width: 380px; margin-bottom: 10px;}

	/* Interstitial */
	.news.interstitial .colTresCuadro { width: 300px; margin: 0 0 0 0;}

	/* Info */
	.info .colDosCuadro { width: 160px;}
	.boxContact { float: left; width: 560px; margin: 0 20px 20px 20px;}
	.boxMap { float: right; margin: 0 20px 20px 20px; position: relative; width: 560px;}
	.boxMap img { margin: 0 0 20px 0;}
	.boxMap a.location, .boxMap a.print  { display: block; margin: 0; font-family: 'HarmoniaSans W01', sans-serif; width: 150px; position: static; left: auto;}
	.boxMap a.location { bottom: auto;}
	.boxMap a.print { bottom: auto;}
	
	.info .contItemsP { width: 580px;}
	.publication { width: 560px; height: auto; margin-bottom: 40px; height: 240px;}
	.publication .Img { width: 160px; margin-right: 40px;}
	.publication .Txt { width: 360px;}
}

@media screen and (max-width: 600px) {

	body { line-height: 14px; font-size: 10px;}
	.header { position: absolute;}
	.boxHeader { right: 10px; height: 40px; width: 460px; background: #eeeff1 url(../img/btnMenu.gif) no-repeat 10px 15px;}
	#logo { position: absolute; left: auto; right: 12px; top: 12px; font-family: Arial, sans-serif; font-size: 17px; font-weight: bold;}
	
	.boxMenu { top: 40px; width: 460px; height: auto; text-transform: uppercase; font-family: 'HarmoniaSans W01', sans-serif;}
	.boxMenu ul.menu { list-style: none; position: static; left: auto; top: auto; padding: 10px 10px 30px 10px; font-size: 12px; line-height: 20px;}
	.masIdiomas { width: 460px;}

	.box { width: 480px;}

	.boxConceptos { position: absolute; left: 0; top: 55px; width: 100%; height: auto;}
	.boxConceptos ul { font-size: 8px; margin: 0 0 0 11px;}
	.boxConceptos li { margin-right: 3px;}
	.boxConceptos li.reticula { margin-right: 5px;}

	.btnPauseHome, .btnPlayHome { left: auto; right: 5px; top: -5px; background: #fefefe url(../img/btnPauseHome.png) no-repeat center center;}

	.content { margin: 90px 0 0 0;}

	.colCuadro { width: 100px; height: 100px; float: left; margin: 0 10px 20px 10px; position: relative;}
	.colCuadro img { float: left; width: 100px;}

	.colDosCuadro { width: 220px; float: left; margin: 0 10px 20px 10px;}
	.colCuadroV { width: 100px; height: 220px; float: left; margin: 0 10px 20px 10px;}
	.colDosCuadroV { width: 220px; float: left; margin: 0 10px 20px 10px;}
	.colDosCuadro img, .colCuadroV img, .colDosCuadroV img { width: 100%;}
	.caja { font-size: 10px; line-height: 12px; overflow: hidden; color: #000;}
	.caja strong { position: absolute; width: 100%; height: 100px; bottom: -100px;}

	.colCuadro11 { width: 100px; height: 100px; margin: 0 10px 20px 10px; }
	.colCuadro12 { width: 100px; height: 220px; margin: 0 10px 20px 10px; }
	.colCuadro21 { width: 220px; height: 100px; margin: 0 10px 20px 10px; }
	.colCuadro22 { width: 220px; height: 220px; margin: 0 10px 20px 10px; }
	.colCuadro11 img, .colCuadro12 img, .colCuadro21 img , .colCuadro22 img { width: 100%;}

	.contItems { width: 480px;}
	.contItemsP { width: 475px; margin: 0 0 0 5px;}
	.item { width: 146px; margin: 0 6px 0px 5px; font-size: 10px; line-height: 12px;}
	.item span { height: 76px;}	

	.btnVerInfo { position: fixed; top: 50px; left: 0;}
	.boxMemory { left: -480px; width: 480px;}
	.boxMemory .btnCerrarMemory { left: 430px;}
	.boxCredits { top: 50px; left: -320px; width: 320px;}
	.boxCredits .btnCerrarCredits { top: 60px;}
	.boxDatos { top: 50px;}

	.sideBar { margin: 0 0 0 10px; position: absolute; top: -40px; left: 1px; font-size: 9px;}
	.sideBar ul ul { font-size: 12px;}
	
	.colTresCuadro { width: 340px; margin: 0 10px 20px 10px;}

	.completeList { margin: 40px 10px;}

	/* News */
	.news { margin: 20px 10px 10px 10px;}
	.newsP { margin: 20px 10px 10px 10px;}
	.news .colTresCuadro { width: 340px; margin: 0 0 0px 0;}
	.news .colDosCuadro { width: 100px; margin: 0 20px 0px 0;}
	.newsP .colCuadro { float: none; margin: 0 0 10px 120px;}
	.newsP .colCuadro.Img { float: left; width: 100px; margin: 0 20px 20px 0;}
	.news .Txt { margin-bottom: 50px;}
	.btns .rrss { float: left; margin: 0 0 10px 0;}
	.btns { width: 340px; margin: 0;}
	.btnsGo a { font-size: 10px;}

	/* Interstitial */
	.news.interstitial .colTresCuadro { width: 340px; margin: 0 0 0 0;}

	/* Info */
	.info .colDosCuadro { width: 100px; margin: 0 10px 0 10px;}
	.boxContact { width: 460px; margin: 0 10px 20px 10px;}
	.boxMap { float: right; margin: 0 10px 20px 10px; position: relative; width: 460px;}
	.boxMap a.location, .boxMap a.print   { font-family:'HarmoniaSans W01'; width: auto; margin-bottom: 10px;}
	.info .contItemsP { width: 475px; margin: 0 0 0 5px;}
	.awards h2 { margin: 0 10px 1.5em 10px; font-size: 1.2em;}
	.publication { width: 460px; height: auto; margin-bottom: 30px;}
	.publication .Img { width: 100px; margin-right: 20px;}
	.publication .Txt { width: 340px;}
}

@media screen and (max-width: 479px) {

	.boxHeader { width: 300px;}
	.boxMenu { width: 300px;}
	.masIdiomas { width: 300px;}

	.btnPauseHome, .btnPlayHome { left: 5px; top: 20px; right: auto; background: #fefefe url(../img/btnPauseHome.png) no-repeat center center;}

	.box { width: 320px;}

	.colCuadro { width: 86px; height: 86px; float: left; margin: 0 10px 20px 10px; position: relative;}
	.colCuadro img { float: left; width: 86px;}

	.colDosCuadro { width: 192px; float: left; margin: 0 10px 20px 10px;}
	.colCuadroV { width: 86px; height: 192px; float: left; margin: 0 10px 20px 10px;}
	.colDosCuadroV { width: 192px; float: left; margin: 0 10px 20px 10px;}
	.colDosCuadro img, .colCuadroV img, .colDosCuadroV img { width: 100%;}
	.caja strong { height: 86px; bottom: -86px;}
	.caja span { padding: 7px 7px 0 7px;}

	.colCuadro11 { width: 86px; height: 86px; margin: 0 10px 20px 10px; }
	.colCuadro12 { width: 86px; height: 192px; margin: 0 10px 20px 10px; }
	.colCuadro21 { width: 192px; height: 86px; margin: 0 10px 20px 10px; }
	.colCuadro22 { width: 192px; height: 192px; margin: 0 10px 20px 10px; }
	.colCuadro11 img, .colCuadro12 img, .colCuadro21 img , .colCuadro22 img { width: 100%;}

	.contItems { width: 320px;}
	.contItemsP { width: 315px; margin: 0 0 0 5px;}
	
	.item { width: 145px; margin: 0 5px 0px 5px; font-size: 10px; line-height: 12px;}
	.item span { height: 76px;}	
	
	.boxMemory { left: -320px; width: 320px;}
	.boxMemory .btnCerrarMemory { left: 270px;}

	.colTresCuadro { width: 300px; margin: 0 10px 20px 10px;}

	/* News */
	.news .colTresCuadro { width: 300px; margin: 0 0 0 0;} 
	.news .colDosCuadro { width: 300px; margin: 0 0 20px 0;}
	.newsP .colCuadro { float: none; margin: 0 0 10px 106px;}
	.newsP .colCuadro.Img { float: left; width: 86px; margin: 0 20px 20px 0;}
	.newsP .colTresCuadro { width: 194px; margin: 0 0 0 0;} 
	.btns { width: 300px;}

	/* Interstitial */
	.news.interstitial .colTresCuadro { width: 300px; margin: 0 0 20px 0;}

	/* Info */
	.info .colDosCuadro { width: 300px; margin-bottom: 20px;}
	.boxContact { width: 300px;}
	.boxMap { width: 300px;}
	.info .contItemsP { width: 295px; margin: 0 0 0 5px;}
	.publication { width: 300px;}
	.publication .Img { width: 100px; margin-right: 20px;}
	.publication .Txt { width: 180px;}
}



*/