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
			<div class="col-xs-8">
				<section class="singleBlog__article">
					<!-- Imagen Destacada -->
					<figure><?= get_the_post_thumbnail($post->ID,'full', array('class'=>'img-fluid') ); ?></figure>
					<!-- Titulo --> <h2><?= $post->post_title ?></h2>
					<!-- Contenido --> <?= apply_filters( 'the_content' , $post->post_content ); ?>
				</section> <!-- /.singleBlog__article -->
			</div> <!-- /.col-xs- -->

			<!-- Aside Categorias -->
			<div class="col-xs-4">
				<aside class="singleBlog__categories">
					<!-- Titulo --> <h2 class="text-capitalize"><?php _e( 'Categorías', LANG ); ?></h2>

					<!-- Menu de categorias -->
					<?php $categories = get_categories(); #var_dump($categories);
					if( !empty($categories) ) : ?>
					<ul class="menu-categories">		
						<?php foreach( $categories as $cat ) : ?>
						<li>
							<!-- Comparar si es una categoria y si lo es recibir como parametro -->
							<!-- Su slug -->
								<?php if( isset($category_slug) && !empty($category_slug) ){
									$category_name = $category_slug;
								}else{ $category_name = ""; }
						?>
							<a class="text-capitalize <?= $category_name == $cat->slug ? 'active' : '' ?>" href="<?= get_category_link( $cat->term_id ) ?>">
							<?php _e( $cat->name , LANG ); ?> </a>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php else: ?>
						<p> <?php _e( 'No hay categorias disponibles' , LANG ); ?></p>
					<?php endif; ?>
				</aside> <!-- /.singleBlog__categories -->
			</div> <!-- /.col-xs-4 -->

		</div> <!-- /.row -->
	</section> <!-- /.pageNosotros__content -->

	<!-- Linea de Separación --> <div class="line-separator"></div>

	<!-- Incluir Banner Comun a Servicios -->
	<?php include( locate_template('partials/banner-common-service.php') ); ?>

	
</main> <!-- /.container -->

<!-- Get Footer -->
<?php get_footer(); ?>