$ = jQuery;

$('.menu_toggle_container').on('click',function(e){
	e.preventDefault();
	menu = 	$('#main-menu-mobile');
	menu.toggleClass('abierto');
	$(this).find('div').toggleClass('abierto');
	
	if (menu.hasClass('abierto')){
		menu.css('left','0');
		menu.animate({
			opacity: 1
		},500)
	}else{
		menu.animate({
			opacity: 0
		},500,function(){
			menu.css('left','-100%');	
		})
		
	}

});

$('.menu-item-has-children').on('click',function(e){
	e.preventDefault();
	$(this).find('ul').slideToggle();
	$(this).find('a').toggleClass('abierto');
})

/*
	Control de contenido según el scroll de la página
*/
function scrollspy_proyecto_single(){
	// cacheamos en variables los selectores de las secciones de un proyecto
	concepto = $('#proyecto_single #concepto');	
	galeria  = $('#proyecto_single #galeria');	
	planos   = $('#proyecto_single #planos');					
	videos   = $('#proyecto_single #videos');			
	
	concepto_pos = 0;
	galeria_pos  = galeria.offset();
	planos_pos   = planos.offset();
	videos_pos   = videos.offset();
	//
	altura_fija = $('#page-header').outerHeight() + $('.fixed-bar').outerHeight();
	
	//
	concepto_top = 0;
	galeria_top  = Math.round(galeria_pos.top-altura_fija);
	planos_top   = Math.round(planos_pos.top-altura_fija);
	videos_top   = Math.round(videos_pos.top-altura_fija);
	
	
	//
    factor = 0.75;
	
	$(document).on('resize',function(){
		altura_fija = $('#page-header').outerHeight() + $('.fixed-bar').outerHeight();
	})
	
	$(window).on('scroll',function(){
		
		scroll = $(this).scrollTop();
		
		if (scroll >= videos_top*factor && videos.hasClass('oculto') != true ){
			//console.log('Videos');
			marcar('videos');
		}
		else if (scroll >= planos_top*factor && planos.hasClass('oculto') != true ){
			//console.log('Planos');
			marcar('planos');
		}
		else if (scroll >= galeria_top*factor && galeria.hasClass('oculto') != true ){
			//console.log('Galeria');
			marcar('galeria');
		}
		else if (scroll < galeria_top*factor ){
			//console.log('Concepto');
			marcar('concepto');
		}
		
		
		
	});
	
	ultimo_marcado = 'concepto';
	
	function marcar(elemento){
		if (ultimo_marcado !== elemento){
			$('#filtro-contenido-proyecto .btn_filtro').filter('[data-target="' + elemento +'"]').addClass('active').siblings().removeClass('active');
			ultimo_marcado = elemento;	
		}
		
	}
	
	$('#filtro-contenido-proyecto .btn_filtro').on('click',function(e){
		e.preventDefault();
		altura_fija = $('#page-header').outerHeight() + $('.fixed-bar').outerHeight();
		$('html, body').animate({
			scrollTop : $('#proyecto_single #'+$(this).data('target')).offset().top - altura_fija
		},1000);
	});
}

/*
	funciones para el filrtrado en la página ESTUDIO
*/

/*
	Auxiliar para recolocación de los videos incrustados en la memoria dle proyecto
*/
function colocar_video_memoria(){
	if ($('.memoria_container iframe').length != 0){
		factor = 1080/1920;
		alto_contenedor = $('.memoria_container').outerHeight();
		contenedor_offset = $('.memoria_container').offset();
		contenedor_top = Math.round(contenedor_offset.top);
		ultimop = $('.memoria_container p:last-child');
		ultimop_offset = ultimop.offset();
		ultimop_top = Math.round(ultimop_offset.top);
		ultimop_inner_top = ultimop_top - contenedor_top;
		
		espacio_libre = alto_contenedor - (ultimop_inner_top + ultimop.outerHeight());
		
		ancho_container = $('.memoria_container').outerWidth();
		ancho_video = Math.round(espacio_libre / factor);
		resto = ancho_container - ancho_video;
		left_video = resto/2;
		
		$('.memoria_container iframe').css('height',espacio_libre - 11);
		$('.memoria_container iframe').css('width',Math.round(espacio_libre / factor));			
		//$('.memoria_container iframe').css('left',left_video);
		
		if (ancho_video < 500){
			$('.memoria_container iframe').css('display','none');
		}else{
			$('.memoria_container iframe').css('display','block');
		}
	}
	
}

colocar_video_memoria();
$(window).on('resize',colocar_video_memoria);

function scrollspy_estudio(container,sections){
	
	secciones = $(sections);
	techo_pagina = $(container).offset().top;

    $(window).on('scroll',function(){
	    secciones.each(function(){
		    if ( $(window).scrollTop() >= ( $(this).offset().top - (techo_pagina + 5) ) ){
			    $('.breadcumbs > .btn_filtro[href="#' + $(this).attr('id') + '"]').addClass('active').siblings().removeClass('active');
		    }
	    })
    })
        
	$('.breadcumbs > .btn_filtro').on('click',function(e){
		e.preventDefault();
		indice = $(this).index();

		if (indice == $('.breadcumbs > .btn_filtro').length){
			indice --;
			$('#titulo_bibliografia').removeClass('fijo');
		}

		$('body,html').animate({
			scrollTop: $(secciones[indice]).offset().top - techo_pagina
		},1000);
	})
}

// Fijar el titulo de bibliografia cuando llega a la barra fija
	
altura_fija = $('#page-header').outerHeight() + $('.fixed-bar').outerHeight();	

titulo = $('#titulo_bibliografia');
objeto = $('#bibliografia');


$(window).on('scroll',function(){
    vtop = Math.round(objeto.offset().top);
	vtop -= titulo.outerHeight();
	vtop -= titulo.outerHeight();	
	
	if( $(this).scrollTop() > vtop){
		if (titulo.hasClass('fijo') != true){
			titulo.addClass('fijo');
			$('.seccion_bibliografia').css('margin-top',titulo.outerHeight());	
		}
	}else{			
		if (titulo.hasClass('fijo') == true ){
			titulo.removeClass('fijo');	
			$('.seccion_bibliografia').css('margin-top','0');	
		}
		
	}
})


$('.filtro_proyectos_single #btn_filtro_movil').on('click',function(e){
	e.preventDefault;
	botones = $('.filtro_proyectos_single a:not(:nth-child(2))');
	//botones = $('.filtro_proyectos_single a:not(.icon-filter)');
	if ($('.mascara').hasClass('abierta')){
		cerrar_contenedor_flotante();
	}else{
		$('.mascara').fadeIn();
		$('.contenedor_flotante').fadeIn();	
		$('.mascara').addClass('abierta');
		botones.clone().appendTo('.contenedor_flotante');
		$('.contenedor_flotante .cerrar').fadeIn();	
	}
	
})

$('.contenedor_flotante .btn_filtro').on('click',function(){
	cerrar_contenedor_flotante();
})

$('.mascara').on('click',cerrar_contenedor_flotante);
$('.contenedor_flotante').on('click',cerrar_contenedor_flotante);
$('.contenedor_flotante .cerrar').on('click',cerrar_contenedor_flotante);

function cerrar_contenedor_flotante(){
	$('.contenedor_flotante .cerrar').fadeOut();
	$('.mascara').fadeOut();
	$('.contenedor_flotante').fadeOut();
	$('.contenedor_flotante .btn_filtro').remove();	
	$('.mascara').removeClass('abierta');
}

$('.btn_publicacion_name').on('click',function(){
	padre = $(this).parent().parent();
	padre.addClass('activa').sibling().removeClass('activa');
})






