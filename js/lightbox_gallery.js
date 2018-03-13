$=jQuery;

function lightbox_gallery(contenedor){
	imagenes = $(contenedor + ' img');
	
	imagenes.on('click',function(e){

		$('#mascara_lightbox').fadeIn();

		$('#foto_lightbox img').attr('src',$(this).data('imagen'));

		indice = $(this).parent().index()+1;

		imagenes.each(function(img){
			
			$('#galeria_lightbox').append('<img class="imagen_lightbox" src="'+ 
			$(this).data('imagen')
			+'"></img>');	
		});
		
		ancho_imagen = $('#galeria_lightbox').width()/imagenes.length;
		$('#galeria_lightbox').css('height',ancho_imagen + 'px');
		
		$('#galeria_lightbox .imagen_lightbox').css({
			'width' : ancho_imagen + 'px',
			'height': ancho_imagen + 'px'
		});

		$('#galeria_lightbox .imagen_lightbox').on('click',function(){
			
			foto_nueva = $(this).attr('src');
			indice = $(this).index();

			$('#foto_lightbox img').animate({
				'opacity':'0'
			},500,function(){
				$('#foto_lightbox img').attr('src',foto_nueva);
				$('#foto_lightbox img').css('opacity','1');
			})

		})

		$('#foto_lightbox .next_foto').on('click',function(){

			if (indice >= imagenes.length){
				indice=1;
			}else{
				indice++;
			}

			foto_nueva = $('#galeria_lightbox .imagen_lightbox').eq(indice-1).attr('src');
			
			$('#foto_lightbox img').animate({
				'opacity':'0'
			},500,function(){
				$('#foto_lightbox img').attr('src',foto_nueva);
				$('#foto_lightbox img').css('opacity','1');
			});
		})

		$('#foto_lightbox .prev_foto').on('click',function(){

			if (indice <= 1){
				indice=imagenes.length;
			}else{
				indice--;
			}

			foto_nueva = $('#galeria_lightbox .imagen_lightbox').eq(indice-1).attr('src');
			
			$('#foto_lightbox img').animate({
				'opacity':'0'
			},500,function(){
				$('#foto_lightbox img').attr('src',foto_nueva);
				$('#foto_lightbox img').css('opacity','1');
			});
		})
		
	});
	
	$('#btn_cerrar_lightbox').on('click',function(){
		$('#mascara_lightbox').fadeOut();
		$('#galeria_lightbox img').remove();
	}) 
	
	$('#galeria_toggle').on('click',function(){
		$(this).toggleClass('abierta');
		$('#galeria_lightbox').toggleClass('abierta');
	})

	

}

