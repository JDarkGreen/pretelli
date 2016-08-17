
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option('pretelli_custom_settings'); 
?>

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/portada/content-banner.php'));
?>

<!-- /**************************************************************/ -->
<!-- /*++++++++++++++++ SECCION DE SERVICIOS ++++++++++++++++++++++*/ -->
<!-- /**************************************************************/ -->

<section class="pageInicio__section-service">

	<section class="container">
		<div class="row">
			<div class="col-xs-12">

				<!-- Titulo -->
				<h2 class="PageCommon__subtitle text-uppercase"><?php _e('Nuestros Servicios', LANG ); ?></h2>
				<?php  
					/* Query llamar a todos los servicios */
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_type'      => 'servicio',
						'posts_per_page' => -1,
					);

					$servicios = get_posts( $args ); #var_dump($servicios);
				?>
				
				<!-- Contenedor con posición relativa -->
				<section class="relative">

					<!-- Contenedor de Carousel -->
					<div id="owl-carousel-servicios" class="">
						<?php foreach( $servicios as $servicio ) :  ?>

				          	<div class="item-servicio">

					          	<a href="<?= get_permalink( $servicio->ID ); ?>">
						          	<!-- Conseguir imagen -->
						          	<?php 
						          		$img_servicio = get_the_post_thumbnail( $servicio->ID , array('',189) , array('class'=>'img-fluid') ); 
						          		if( !empty($img_servicio) ) echo $img_servicio;
						          	?>
					          	</a> <!-- /link -->

					          	<!-- Titulo del servicio -->
					          	<h2 class="img-servicio__title"><?php _e( $servicio->post_title, LANG ); ?></h2>

				          	</div><!-- /.items servicio -->
						<?php endforeach; ?>
					</div> <!-- /.owl-carousel-servicios -->

					<!-- Flechas del carousel -->
					<a href="#" id="ArrowCarouselServices--prev" class="ArrowCarouselServices ArrowCarouselServices--prev">
						<i class="fa fa-caret-left" aria-hidden="true"></i>
					</a>

					<a href="#" id="ArrowCarouselServices--next" class="ArrowCarouselServices ArrowCarouselServices--next">
						<i class="fa fa-caret-right" aria-hidden="true"></i>
					</a>
					
				</section> <!-- /.section relative -->


			</div> <!-- ./col-xs-12 -->
		</div> <!-- /.row -->
	</section><!-- /.container -->

</section><!-- /.pageInicio__section-service -->

<!-- LineA Separadora -->
<!--span class="line-separator"></span><!-- /line separator -->


<!-- /**************************************************************/ -->
<!-- /*++++++++++++++++ SECCION DE PRESENTACION +++++++++++++++++++*/ -->
<!-- /**************************************************************/ -->
<section class="pageInicio__presentation">
	<div class="container">
		<div class="row pageInicio__presentacion__content container-flex container-flex-center">
			<div class="col-xs-12 col-md-6">
				<!-- Comprobar si existe la imagen -->
				<?php if( isset($options['image_nosotros']) && !empty($options['image_nosotros']) ) :  
					$url_image = $options['image_nosotros'];
				?>
				<figure>
					<img src="<?= $url_image ?>" alt="image-nosotros-pretelli-grupo" class="img-fluid" />
				</figure> <!-- /.figure -->
				<?php endif; ?>
			</div> <!-- /.col-xs-6 -->
			<div class="col-xs-12 col-md-6 text-justify">
				<!-- Título -->
				<h2 class="PageCommon__subtitle PageCommon__subtitle--white text-uppercase">
					<?php _e('presentación', LANG ); ?>
				</h2> <!-- /.PageCommon__subtitle -->
				<!-- Comprobar si hay texto de presentacion -->
				<?php if( isset($options['widget_nosotros']) && !empty($options['widget_nosotros']) ) :  
					$text_nosotros = $options['widget_nosotros'];
					echo apply_filters('the_content', $text_nosotros );
					else: echo "Actualizando Contenido...";
					endif; 
				?>

				<!-- Pagina empresa -->
				<?php $page_empresa = get_page_by_title('empresa'); ?>

				<!-- Botón Ver Más -->
				<a href="<?= $page_empresa->guid; ?>" class="pull-right btn__show-more text-uppercase"><?php _e('ver más' , LANG ); ?> </a>

				<!-- Limpiar floats --> <div class="clearfix"></div>

			</div><!-- /.col-xs-6 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section><!-- /.pageInicio__section-presentation" -->

<!-- /**************************************************************/ -->
<!-- /*++++++++++++++++ SECCION MISCELANEA   ++++++++++++++++++++++*/ -->
<!-- /**************************************************************/ -->

<section class="pageInicio__miscelaneo">
	
	<section class="container">
		<div class="row">

			<!-- Seccion de Articulos -->
			<section class="sectionPage__articles col-xs-12 col-sm-8">

				<!-- Titulo -->
				<h2 class="PageCommon__subtitle text-uppercase"><?php _e('Artículos', LANG ); ?></h2>

				<?php  
					//Obtener todos los posts
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_type'      => 'post',
						'posts_per_page' => 6,
					);

					$ultimos_posts = get_posts( $args ); #var_dump($ultimos_posts);
				?>
				<div id="carousel-articles">
					<ul>
					<?php foreach( $ultimos_posts as $u_post ) : ?>
						<li>
						<article class="sectionPage__articles__item">
							<!-- Imagen -->
							<figure class="">
								<?php 
									$image = get_the_post_thumbnail( $u_post->ID , 'full' , array('class'=>'img-fluid center-block') ); 
									if( !empty($image) ) : echo $image;
									else:
								?>
									<img src="http://lorempixel.com/980/549/sports" alt="lorempixel" class="img-fluid center-block" />
								<?php endif; ?>
							</figure><!-- /figure -->

							<div class="container-text">
								<!-- Texto -->
								<h3 class="sectionPage__articles__item__title">
									<?php _e( $u_post->post_title , LANG ); ?></h3>
								<!-- Extracto 30 palabras -->
								<p class="sectionPage__articles__item__excerpt text-justify">
									<?php _e( wp_trim_words( $u_post->post_content , 30 , '' ) , LANG ); ?>
								</p>
								<!-- Boton ver más -->
								<a class="read-more" href="<?= $u_post->guid ?>">Leer más 
									<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								</a>
								
							</div>

						<!-- Limpiar float --> <div style="height:20px;"></div>

						</article><!-- /.sectionPage__articles__item -->

					<?php endforeach; ?>
						</li>
					</ul>
				</div><!-- /#bxslider-carousel-articles -->
			</section><!-- /.sectionPage__articles -->

			<!-- Seccion widget facebook - Ocultar en version mobile -->
			<section class="sectionHomeFacebook col-xs-12 col-sm-4">
			
				<!-- Titulo -->
				<h2 class="PageCommon__subtitle text-uppercase text-md-left"><?php _e('Facebook', LANG ); ?></h2>

				<?php $link_facebook = $options['red_social_fb']; 
					if( !empty($link_facebook) ) :
				?>

					<div id="fb-root"></div> <!-- /fb root -->

					<!-- Script -->
					<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

					<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-height="375" data-hide-cover="false" data-show-facepile="true">
						<div class="fb-xfbml-parse-ignore">
							<blockquote cite="<?= $link_facebook ?>">
								<a href="<?= $link_facebook ?>"><?php bloginfo('name'); ?></a>
							</blockquote>
						</div> <!-- /.fb-xfbml-parse-ignore -->
					</div> <!-- /.fb-page -->
				<?php endif; ?>
			</section>  <!-- /.sectionHomeFacebook -->
		
		</div> <!-- /.row -->
	</section> <!-- /.container -->
	
</section> <!-- /.pageInicio__miscelaneo -->


<!-- Footer -->
<?php get_footer(); ?>