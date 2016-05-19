<?php /* Banner comun servicios */ 

	$page_servicios = get_page_by_title('servicios');
?>



<section class="pageCommon__banner-service container-flex text-uppercase">
	<h2 class=""><?php _e( "consulta sobre nuestros servicios" , LANG ); ?></h2>
	<a href="<?= $page_servicios->guid; ?>"><?php _e( 'click aquí' , LANG ); ?></a>
</section> <!-- /.pageCommon__banner-service -->