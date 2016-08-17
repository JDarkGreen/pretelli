<?php /*Template Name: Page Nosotros Template */ ?>

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

	<!-- Seccion de Historia de la empresa -->
	<section class="pageWrapper__content">
		<div class="row">
			<!-- Seccion Historia -->
			<div class="col-xs-12 col-md-6">
				<!-- Titulo --><h2 class="PageCommon__subtitle PageCommon__subtitle--no-border text-uppercase"><?php _e( "nuestra historia" , LANG ); ?></h2> <!-- /.PageCommon__subtitle -->

				<!-- Contenido -->
				<div class="text-justify">
					<?php if( !empty( $post->post_content ) ) : 
						echo apply_filters('the_content' , $post->post_content );
						else: echo "Actualizando Contenido.";
						endif;
					?> 
				</div> <!-- /.text-justify -->

				<!-- Separación  --> 
				<br/><br/>

				<!-- Logo de Empresa -->
				<?php 
					$logo_empresa = get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid center-block') );
					if( !empty($logo_empresa)  ) : ?>
				<figure class="pageEmpresa__logo"><?= $logo_empresa ?></figure> <!-- /.pageEmpresa__logo -->
				<?php endif; ?>

			</div> <!-- /col-xs-6 -->
			<!--  -->
			<div class="col-xs-12 col-md-6">
				<!-- Imagenes Galeria -->
				<section id="carousel-gallery-empresa" class="pageNosotros__gallery pageCommon__gallery">
					<?php  
						//Obtener imagenes de la galería
						$input_ids_img = -1;
						$input_ids_img = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
						$array_images  = explode(',', $input_ids_img );
						
						$args  = array(
						'post_type'      => 'attachment',
						'post__in'       => $array_images,
						'posts_per_page' => -1,
						);
						$attachment = get_posts($args);		
						
						foreach( $attachment as $atta ) :				
					?>
						<div class="item">
							<img src="<?= $atta->guid; ?>" alt="<?= $atta->post_title; ?>" class="img-fluid" />
						</div><!-- /.item -->
					<?php endforeach; ?>
				</section> <!-- ./pageEmpresa__gallery -->
			</div> <!-- /col-xs-6 -->
		</div> <!-- /.row -->
	</section> <!-- /.pageNosotros__content -->

	<!-- Tabs de Misión y Visión -->
	<section id="accordion-nosotros" class="pageNosotros__tabs" role="tablist" aria-multiselectable="true">
		
		<!-- Misión -->
		<?php if( isset( $options['text_mision'] ) && !empty($options['text_mision'] ) ) : ?>
	  	<article class="panel panel-default">

	    	<div class="panel-heading" role="tab" id="headingOne">
	      	<h4 class="panel-title text-uppercase">
	        	<a data-toggle="collapse" data-parent="#accordion-nosotros" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class=""> <?php _e('+ misión' ); ?> </a>
	      	</h4>
	    	</div>

	    	<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> <?= apply_filters('the_content', $options['text_mision'] ); ?>
	    	</div> <!-- /#collapseOne.panel-collapse collapse -->

	  	</article> <!-- /.panel panel-default -->
  	<?php else: echo "<p>Actualizando Contenido Misión</p>"; endif; ?>
		
		<!-- Visión -->
		<?php if( isset( $options['text_vision'] ) && !empty($options['text_vision'] ) ) : ?>
	  	<div class="panel panel-default">
	    	<div class="panel-heading" role="tab" id="headingTwo">
	      	<h4 class="panel-title text-uppercase">
	        	<a class="collapsed" data-toggle="collapse" data-parent="#accordion-nosotros" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> <?php _e('+ visión' ); ?> </a>
	      	</h4>
	    	</div>
	    	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo"> <?= apply_filters('the_content', $options['text_vision'] ); ?> </div>
	  	</div>
		<?php else: echo "<p>Actualizando Contenido Visión</p>"; endif; ?>

	</section> <!-- /.#accordion-nosotros -->

	<!-- Linea de Separación --> <div class="line-separator"></div>

	<!-- Incluir Banner Comun a Servicios -->
	<?php include( locate_template('partials/banner-common-service.php') ); ?>

	
</main> <!-- /.container -->

<!-- Get Footer -->
<?php get_footer(); ?>