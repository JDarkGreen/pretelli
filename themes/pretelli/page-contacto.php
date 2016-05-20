<?php /*Template Name: Page Contacto Template */ ?>

<!-- Global Post -->
<?php 
global $post; 
$options = get_option('pretelli_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
$banner = $post;
include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Container -->
<main class="container">

	<!-- Seccion de Informacion -->
	<section class="pageWrapper__content">

		<div class="row">

			<!-- Seccion Datos Generales-->
			<div class="col-xs-12 col-md-6">
				<!-- Titulo --><h2 class="PageCommon__subtitle PageCommon__subtitle--no-border text-uppercase"><?php _e( "datos generales" , LANG ); ?></h2> <!-- /.PageCommon__subtitle -->

				<!-- Lista de Datos -->
				<ul class="pageContact__datos text-xs-center text-md-left">

					<!-- Telefono -->
					<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) :?>
						<li> <i class="fa fa-phone" aria-hidden="true"></i> <?= $options['contact_tel'] ?></li>
					<?php endif; ?>

					<!-- Email -->
					<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) :?>
						<li> <i class="fa fa-envelope" aria-hidden="true"></i> <?= $options['contact_email'] ?></li>
					<?php endif; ?>

					<!-- Direccion -->
					<?php if( isset($options['contact_address']) && !empty($options['contact_address']) ) :?>
						<li> <i class="fa fa-map-marker" aria-hidden="true"></i> <?= $options['contact_address'] ?></li>
					<?php endif; ?>
					
				</ul> <!-- /.pageContact__datos -->


			</div> <!-- /col-xs-6 -->

			<!-- Seccion redes sociales  -->
			<div class="col-xs-12 col-md-6">
				<!-- Titulo --><h2 class="PageCommon__subtitle PageCommon__subtitle--no-border text-uppercase"><?php _e( "redes sociales" , LANG ); ?></h2> <!-- /.PageCommon__subtitle -->

				<ul class="social-links text-xs-center text-md-left">
					<!-- facebook -->
					<?php $fb = $options['red_social_fb']; if( !empty($fb) ) : ?>
						<li><a href="<?= $fb ?>" target="_blank"><img src="<?= IMAGES ?>/redes-sociales/redes_facebook_chico_superior.png" alt="" class="img-fluid" /></a></li>
					<?php endif; ?>
					<!-- twitter -->
					<?php $twitter = $options['red_social_twitter']; if( !empty($twitter) ) : ?>
						<li><a href="<?= $twitter ?>" target="_blank"><img src="<?= IMAGES ?>/redes-sociales/redes_twiter_chico_superior.png" alt="" class="img-fluid" /></a></li>
					<?php endif; ?>
					<!-- google -->
					<?php $gmail = $options['red_social_gmail']; if( !empty($gmail) ) : ?>
						<li><a href="<?= $gmail ?>" target="_blank"><img src="<?= IMAGES ?>/redes-sociales/redes_google_chico_superior.png" alt="" class="img-fluid" /></a></li>
					<?php endif; ?>
					<!-- youtube -->
					<?php $ytube = $options['red_social_ytube']; if( !empty($ytube) ) : ?>
						<li><a href="<?= $ytube ?>" target="_blank"><img src="<?= IMAGES ?>/redes-sociales/redes_youtube_chico_superior.png" alt="" class="img-fluid" /></a></li>
					<?php endif; ?>
				</ul><!-- /social-links -->

			</div> <!-- /col-xs-6 -->
		</div> <!-- /.row -->		

		<div class="row">

			<!-- Seccion Formulario-->
			<div class="col-xs-12 col-md-6">
				<!-- Titulo --><h2 class="PageCommon__subtitle PageCommon__subtitle--no-border text-uppercase"><?php _e( "nuestro formulario" , LANG ); ?></h2> <!-- /.PageCommon__subtitle -->

				<!-- Formulario -->
				<form id="form-contacto" class="pageContacto__form">

					<!-- Nombre -->
					<div class="pageContacto__form__group">
						<label for="input_name" class="sr-only"></label>
						<input type="text" id="input_name" name="input_name" placeholder="<?php _e( 'Nombre (obligatorio)', LANG ); ?>" required />
					</div> <!-- /.pageContacto__form__group -->

					<!-- Email -->
					<div class="pageContacto__form__group">
						<label for="input_email" class="sr-only"></label>
						<input type="email" id="input_email" name="input_email" placeholder="<?php _e( 'Email (obligatorio)', LANG ); ?>" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido"/>
					</div> <!-- /.pageContacto__form__group -->

					<!-- Nombre -->
					<div class="pageContacto__form__group">
						<label for="input_tel" class="sr-only"></label>
						<input type="text" id="input_tel" name="input_tel" placeholder="<?php _e( 'Teléfono (obligatorio)', LANG ); ?>" required />
					</div> <!-- /.pageContacto__form__group -->					

					<!-- Asunto -->
					<div class="pageContacto__form__group">
						<label for="input_subject" class="sr-only"></label>
						<input type="text" id="input_subject" name="input_subject" placeholder="<?php _e( 'Asunto', LANG ); ?>" required />
					</div> <!-- /.pageContacto__form__group -->

					<!-- Texto -->
					<div class="pageContacto__form__group">
						<label for="input_consulta" class="sr-only"></label>
						<textarea name="input_consulta" id="input_consulta" placeholder="<?php _e( 'Su Mensaje', LANG ); ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
					</div> <!-- /.pageContacto__form__group -->

					<button id="send-form" type="submit" class="btn__show-more btn__show-more--violet text-uppercase">
						<?php _e( 'enviar' , LANG ); ?>
					</button> <!-- /.btn__show-more -->

				</form> <!-- /.pageContacto__form -->

			</div> <!-- /col-xs-6 -->

			<!-- Seccion MAPA  -->
			<div class="col-xs-12 col-md-6">
				<!-- Titulo --><h2 class="PageCommon__subtitle PageCommon__subtitle--no-border text-uppercase"><?php _e( "mapa" , LANG ); ?></h2> <!-- /.PageCommon__subtitle -->

				<!-- Mapa -->
				<?php if( !empty($options['contact_mapa']) ) : ?>
					<section class="pageContacto__mapa">
						<div id="canvas-map"></div>
					</section> <!-- /.pageContacto__mapa -->
				<?php else: ?>
					<p><?php _e( 'Información no disponible actualmente' , LANG ); ?></p>
				<?php endif; ?>	

			</div> <!-- /col-xs-6 -->
		</div> <!-- /.row -->

	</section> <!-- /.pageNosotros__content -->

</main> <!-- /.container -->

<!-- Script Google Mapa -->
<?php if( !empty($options['contact_mapa']) ) : $mapa = explode(',', $options['contact_mapa'] ); ?>
	<script type="text/javascript">	

		<?php  
			$lat = $mapa[0];
			$lng = $mapa[1];
		?>

	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : 16
	      });

	      //infowindow
	      var infowindow    = new google.maps.InfoWindow({
	        content: '<?= "GRUPO PRETELLI" ?>'
	      });

	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";

	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : icono
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }

	    google.maps.event.addDomListener(window, "load", initialize);

	</script>
<?php endif; ?>

<!-- Get Footer -->
<?php get_footer(); ?>