<?php /*Single Template Blog */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('pretelli_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$page   = get_page_by_title( 'Artículos' );
	$banner = $page; 
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Container -->
<main class="container">

	<!-- Seccion de Historia de la empresa -->
	<section class="pageWrapper__content">
		<div class="row">

			<!-- Seccion contenido -->
			<div class="col-xs-12 col-md-8">
				<section class="singleBlog__article">
					<!-- Imagen Destacada -->
					<figure><?= get_the_post_thumbnail($post->ID,'full', array('class'=>'img-fluid') ); ?></figure>
					<!-- Titulo --> <h2><?= $post->post_title ?></h2>
					<!-- Contenido --> <?= apply_filters( 'the_content' , $post->post_content ); ?>
				</section> <!-- /.singleBlog__article -->
			</div> <!-- /.col-xs- -->

			<!-- Aside Categorias -->
			<div class="col-xs-4 hidden-xs-down">
				<!-- Incluir template -->
				<?php include(locate_template('partials/categories-posts.php') ); ?>
			</div> <!-- /.col-xs-4 -->

		</div> <!-- /.row -->
	</section> <!-- /.pageNosotros__content -->

	<!-- Linea de Separación --> <div class="line-separator"></div>

	<!-- Incluir Banner Comun a Servicios -->
	<?php include( locate_template('partials/banner-common-service.php') ); ?>

	
</main> <!-- /.container -->

<!-- Get Footer -->
<?php get_footer(); ?>