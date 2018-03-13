$=jQuery;

var tipo_filtro='Tipo';
var filtro = 'Todos';



cuadros = $('.lista-proyectos .col');
cuadros.css('transition','all .3s ease');

iniciar();

function iniciar(){

	cuadros.css('transform','scale(0)');
	setTimeout(function(){
		cuadros.hide();
		cuadros.show().css('transform','scale(1)');
	}, 300);
			
	$('.proyectos__filters .btn_filtro').filter(function(index){
		return $(this).data('filtro') == 'all';
	}).addClass('active');	
}


$('.proyectos__filters .btn_filtro').on('click',function(e){

	e.preventDefault();

	filtro = $(this).data('filtro');
	
	if (filtro == 'all'){
		seleccion = cuadros;
	}else{
		seleccion = cuadros.filter(filtro);
	}
	
	cuadros.css('transform','scale(0)');
	setTimeout(function(){
		cuadros.hide();
		seleccion.show().css('transform','scale(1)');
	}, 300);		
	
	$(this).addClass('active').siblings().removeClass('active');
	filtro = $(this).text();
});	


$('#tipo_filtrado_lista_proyectos .btn_filtro').on('click',function(e){
	e.preventDefault();
	
	$('.filtro_proyectos').toggleClass('oculto');
	
	$('.proyectos__filters .btn_filtro').removeClass('active');
	iniciar();
	
	$(this).siblings().removeClass('active');
	$(this).addClass('active');
	tipo_filtro = $(this).text();
	filtro='Todos';

})

$('.proyecto__img > a').on('click',function(){
	$(this).attr('href',$(this).attr('href') + '?tipo_filtro=' +tipo_filtro + '&filtro=' + filtro);
})	

$('.proyecto__legend > a').on('click',function(){
	$(this).attr('href',$(this).attr('href') + '?tipo_filtro=' +tipo_filtro + '&filtro=' + filtro);
})	


function prueba(tipo,dato){
	$('#tipo_filtrado_lista_proyectos .btn_filtro:contains("'+tipo+'"):not(".active")').click();
	$('.proyectos__filters .btn_filtro:contains("'+dato+'")').click();
		
}

function filtro_bibliografia(){
	
	inicia_filtro();
	
	function inicia_filtro(){
		filtro_activo = $('.sub_btn_filtro.active').data('filtro');
		filtro_activo = '.' + filtro_activo;
	     
	    subfiltro_activo = $('.btn_subfiltro_publicaciones.active').data('filtro');
	    subfiltro_activo = '.' + subfiltro_activo;
	    	
		pub = $('.publicacion');
		
		pub.css('transform','scale(0)');
		sel = pub.filter(filtro_activo);
		subsel = pub.filter(subfiltro_activo);
		
		/* Esto es para mostrar u ocultar los subfiltros de publicaciones */
		if (filtro_activo == '.publicaciones'){
			$('#filtro_actual_bibliografia').css('opacity', 1);
			$('.subfiltros_bibliografia').css('opacity',1);	
		}else{
			$('#filtro_actual_bibliografia').css('opacity',0);
			$('.subfiltros_bibliografia').css('opacity',0);	
		}
		/**/
		
		setTimeout(function(){
			pub.hide();
			if (filtro_activo == '.publicaciones'){
				subsel.show().css('transform','scale(1)');
			}else{
				sel.show().css('transform','scale(1)');	
			}
			
			
		}, 300)	
	}
	
	$('.sub_btn_filtro').on('click',function(e){
		e.preventDefault();
		if ($(this).hasClass('active') != true){
			// no estaba activo
			$(this).addClass('active').siblings().removeClass('active');
			inicia_filtro();
		}
	})
	
	// Subfiltros publicaciones.
	
	$('.btn_subfiltro_publicaciones').on('click',function(e){
		e.preventDefault();
	    if ($(this).hasClass('active') != true){
			// no estaba activo
			$(this).addClass('active').siblings().removeClass('active');
			inicia_filtro();
		}
	    
	})
	
	
}














