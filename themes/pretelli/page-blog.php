<?php /*Template Name: Page Blog Template */ ?>

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

	<!-- Seccion Comun contenedora  -->
	<section class="pageWrapper__content">
		<section class="pageBlog__content container-flex">
			<!-- Obtener todos los articulos -->
			<?php  
				$args = array(
					'order'          => 'DESC',
					'orderby'        => 'date',
					'post_status'    => 'publish',
					'post_type'      => 'post',
					'posts_per_page' => -1,
				);
				$articulos = get_posts( $args );
				foreach( $articulos as $articulo ) :
			?>
				<article class="pageBlog__article">
					<!-- Imagen -->
					<figure>
						<a href="<?= $articulo->guid ?>">
						<?php $feat_img = get_the_post_thumbnail( $articulo->ID,'full',array('class'=>'img-fluid'));  
							if( !empty($feat_img) ) : echo $feat_img; else :
						?>
							<img src="http://lorempixel.com/980/549" alt="image-<?= $articulo->post_title ?>" class="img-fluid" />
						<?php endif; ?>
						</a>
					</figure>
					<!-- Titulo --> <h2><?= $articulo->post_title ?></h2>
					<!-- Extracto --> <?= apply_filters( 'the_content' , wp_trim_words( $articulo->post_content , '30' , '' ) ); ?>
					<!-- Link a articulo -->
					<a class="read-more" href="<?= $articulo->guid ?>">Leer más 
						<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</a>

				</article> <!-- /.pageBlog__article -->
			<?php endforeach; ?>
		</section> <!-- /.pageBlog__content -->
	</section> <!-- /.pageNosotros__content -->

	<!-- Linea de Separación --> <div class="line-separator"></div>

	<!-- Incluir Banner Comun a Servicios -->
	<?php include( locate_template('partials/banner-common-service.php') ); ?>

	
</main> <!-- /.container -->

<!-- Get Footer -->
<?php get_footer(); ?>