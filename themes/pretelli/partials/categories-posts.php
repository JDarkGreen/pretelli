<?php /* Categorias y articulos */ ?>

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