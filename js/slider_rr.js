$=jQuery;
$(document).ready(function(){

	// Variables auxiliares (No modificar)
	indice = 0;
	indice_ant = indice;
	contador = 0;
	temporizador = 0;
	// Variables de configuración
	bp_tablet     = 767;
	tiempo_efecto = 2000;
	tiempo_slider = 5000;
	
	// Marcado de los slides según el tipo de contenido
	$('#slider > .slide').each(function(index){
		
		if($(this).find('video').length != 0){
			// es video
			$(this).attr('class',$(this).attr('class') + ' video');
		}else{
			// es una imagen
			$(this).attr('class',$(this).attr('class') + ' imagen');
		}
		
		contador ++;
		
	});
	
	indice = Math.floor(Math.random() * contador-1) + 1;
	
	// Inicialización del Slider
	$('#slider > .slide').fadeOut().eq(indice).fadeIn(tiempo_efecto);
	accion_slider();
	
	function mover_slider(direccion){
		
		indice_ant = indice;
		clearTimeout(temporizador);
		
		if (direccion == 'next'){
			if (indice == contador-1){
				indice=0;
			}else{
				indice ++;	
			}	
		}else{
			if (indice == 0){
				indice = contador-1;
			}else{
				indice --;			
			}	
		}
		
		$('#slider > .slide').eq(indice_ant).fadeOut(tiempo_efecto/2);
		$('#slider > .slide').eq(indice).fadeIn(tiempo_efecto);
		
		accion_slider();
	}
	
	function accion_slider(){
		
		slide = $('#slider > .slide').eq(indice);
		
		$('#slider video').each(function(index){
			$(this).get(0).pause();
			$(this).get(0).currentTime = 0;
		});
		
		if (slide.hasClass('video')){
			vid = slide.find('video').get(0);

			if($(window).width() > bp_tablet){
				vid.play();				
			}else{
				mover_slider('next');
			}

			vid.muted = true;
			
			vid.ontimeupdate = function(){
				if(Math.round(vid.currentTime) == Math.round(vid.duration)){
					mover_slider('next');
				}
			};
			
		}else{
			temporizador = setTimeout(function(){
				mover_slider('next');
			}, tiempo_slider);
		}
	}
	
	// Eventos
	
	$('#next_slide').on('click',function(e){
		e.preventDefault();
		mover_slider('next');
	});
	
	$('#prev_slide').on('click',function(e){
		e.preventDefault();
		mover_slider('prev');
	});
	
/*
	$('#slider > .slide').on('click',function(){
		mover_slider('next');
	});
*/
	//

	var myimage = document.getElementById("slider");
	if (myimage.addEventListener) {
		// IE9, Chrome, Safari, Opera
		myimage.addEventListener("mousewheel", MouseWheelHandler, false);
		// Firefox
		myimage.addEventListener("DOMMouseScroll", MouseWheelHandler, false);
	}
	// IE 6/7/8
	else {myimage.attachEvent("onmousewheel", MouseWheelHandler)};
	//--
	
	function MouseWheelHandler(e) {
		e.stopPropagation();
		var e = window.event || e; // old IE support
		var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
		// cross-browser wheel delta
		var movimiento = Math.abs(e.detail);
		if (movimiento >= 3){
			if (delta > 0){
				mover_slider('next');
			}else{
				mover_slider('prev');
			}	
		}
		return false;
	}

	//

})