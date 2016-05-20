
var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	j(document).on('ready',function(){

		/*|----------------------------------------------------------------------|*/
		/*|------------------- SLIDEBAR - VERSION MOBILE ------------------------|*/
		/*|----------------------------------------------------------------------|*/

		var mySlidebars = new j.slidebars({
			disableOver       : 568, // integer or false
			hideControlClasses: true, // true or false
			scrollLock        : false, // true or false
			siteClose         : true, // true or false
		});

		//Eventos

		//Abrir contenedor izquierda
		j("#toggle-left-nav").on('click',function(){
			mySlidebars.slidebars.toggle('left');
		});

		//Abrir contenedor derecha
		j("#toggle-right-nav").on('click',function(){
			mySlidebars.slidebars.toggle('right');
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_home = j("#carousel-home").carousel({
			interval : 5000,
		});

		//eventos
		carousel_home.on('slid.bs.carousel', function ( e ) {
			var current_item = j(this).find('.active');

  			//animacion de las contenidos
  			var title = current_item.find('h3');
  			title.animate({ 'opacity' : '1' }, 1000 );

  			var text = current_item.find('p');
  			text.animate({ 'margin-left' : '0' } , 1500 );

		});

		carousel_home.on('slide.bs.carousel', function ( e ) {
			var current_item = j(this).find('.active');

			//animacion de las contenidos
  			var title = current_item.find('h3');
  			title.css('opacity',0 );
 
  			var text = current_item.find('p');
  			text.css({ 'margin-left' : '-130%' });
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL SERVICIOS - PORTADA   ------|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_servicios = j("#owl-carousel-servicios").owlCarousel({
			items          : 4,
			lazyLoad       : false,
			loop           : true,
			margin         : 12,
			nav            : false,
			autoplay       : true,
			responsiveClass: true,
			mouseDrag      : false,
			autoplayTimeout: 2500,
			fluidSpeed     : 2000,
			smartSpeed     : 2000,
			responsive:{
		        320:{
		            items:1
		        },
		      	1024:{
		            items:4
		        },
	    	}
		});

		//Eventos flechas del Carouse
		j(".ArrowCarouselServices").on('click',function(e){ e.preventDefault(); });
		//Flechas
		j("#ArrowCarouselServices--prev").on('click',function(){
			carousel_servicios.trigger('prev.owl.carousel', [700] );
		});
		j("#ArrowCarouselServices--next").on('click',function(){
			carousel_servicios.trigger('next.owl.carousel', [700] );
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL ARTICULOS - SECCIONES GENERALES  ------|*/
		/*|----------------------------------------------------------------------|*/
		j("#carousel-articles").jCarouselLite({
			vertical: true,
			auto    : 1500,
			speed   : 1500,
			visible : 3,	
  		});


		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL GALERIAS DE PÁGINA - SECCIONES GENERALES   ------|*/
		/*|----------------------------------------------------------------------|*/

		var carousel_gallery = j(".pageCommon__gallery");

		if( carousel_gallery.length ){
			carousel_gallery.owlCarousel({
				items          : 1,
				lazyLoad       : false,
				loop           : true,
				nav            : false,
				autoplay       : true,
				responsiveClass: true,
				mouseDrag      : false,
				autoplayTimeout: 2500,
				smartSpeed     : 1500,
				dots           : true,
			});
		}

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDADOR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/

		if( j('#form-contacto').length ){

			j('#form-contacto').parsley();

			j(document).on('submit', j('#form-contacto') , function(e){
				e.preventDefault();
				//Subir el formulario mediante ajax
				j.post( url + '/email/enviar.php', 
				{ 
					nombre : j("#input_name").val(),
					email  : j("#input_email").val(),
					tel    : j("#input_tel").val(),
					asunto : j("#input_subject").val(),
					message: j("#input_consulta").val(),
				},function(data){
					alert( data );

					j("#input_name").val("");
					j("#input_email").val("");
					j("#input_tel").val("");
					j("#input_subject").val("");
					j("#input_consulta").val("");
				});			
			});
		}

	});
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);