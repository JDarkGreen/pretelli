<?php  

//ARCHIVO QUE MODIFICA OCAMBIA ALGUNOS ESTILOS EN EL PANEL DE ADMINISTRACION O LOGIN 
//DE WORDPRESS

/**************************************************************/
/*--------------- CARGAR FILE CSS y JS ADMIN PAGES ------------*/
/**************************************************************/

function load_custom_wp_admin_style()
{
	//Estilos css
  wp_enqueue_style( 'nifty-css-component' , THEMEROOT . "/css/admin/nifty-modal/component.css" );
  //wp_enqueue_style( 'nifty-css-default' , THEMEROOT . "/css/admin/nifty-modal/default.css" );

  //MODAL EFFECT

  wp_enqueue_script('classie-js', THEMEROOT . '/js/admin/classie.js', array('jquery'), false , true);
  wp_enqueue_script('nifty-js', THEMEROOT . '/js/admin/modalEffects.js', array('jquery'), '1.0.0' , true);

  //AJAX ADMINISTRATOR
    wp_enqueue_script('nifty-js', THEMEROOT . '/js/admin/modalEffects.js', array('jquery'), '1.0.0' , true);

}

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


/**************************************************************/
/*---------------------   ESTILOS  LOGO ----------------------*/
/**************************************************************/

function my_custom_login_page_css()
{
	wp_enqueue_style( 'login-css', THEMEROOT . "/css/admin/login.css" );
}
add_action('login_head', 'my_custom_login_page_css');

/**************************************************************/
/*----------------------- REDIRECCION LOGO ----------------------------*/
/**************************************************************/

function my_custom_login_url()
{
	return get_bloginfo('url');
}
add_filter('login_headerurl', 'my_custom_login_url' );

/**************************************************************/
/*----  CREAR NUEVOS ITEMS EN EL ADMIN PAGINA ----------------*/
/**************************************************************/

add_action('admin_menu', 'add_dashboard_menu');

function add_dashboard_menu()
{
	add_menu_page('New Posts Modal ', 'Posts Modal (B)', 'manage_options' , 'new-posts-modal', 'new_admin_posts_modal', 'dashicons-tickets-alt' , 89 );
}

// <=============[[[ FUNCTION CALLBACK  ]]] ================>
function new_admin_posts_modal()
{ ?>

	<!-- Estilos -->
	<style>
		table.table-center { text-align: center; }
		/*botones*/
		.btn-modal{ 
			border       : none;
			border-radius: 5px;
			color        : black;
			cursor       : pointer;
			display      : inline-block !important;
			font-size    : 14px !important;
			margin       : 0 5px;
			padding      : 5px 10px;
		}
		.btn-edit { background: yellow !important; }
		.btn-remove { background: white !important; }
		.btn-publish { background: green !important; color: white; }
		.btn-nopublish { background: black !important; color: white; }
	</style>
	
	<!-- Titulo -->
	<h1> Fase Beta Administración de Posts mediante modal </h1>

	<!-- Links -->
	<button class="button-primary button-large md-trigger md-setperspective" data-modal="modal-1">
		<?php _e('Ver Posts' , LANG ); ?>
	</button>
	
	<!-- nifty Modal -->
	<div class="md-modal md-effect-18" id="modal-1">
		<div class="md-content"> <h3>Posts Modal - Fase Beta </h3> 
			<div>
				<p>Aquí se muestran los posts puedes verlos  o eliminarlos </p>
					
				<!-- Mostrar todos los posts -->
				<?php  
					//los argumentos
					$args = array(
						'post_type'     => 'post',
						'posts_per_page'=> 5,
						'order'         => 'ASC',
						'orderby'       => 'menu_order',
					);

					//el query 
					$query = new WP_Query( $args );

					if( $query->have_posts() ) : 
				?>

				<table class="table-center">
					<thead>
						<th>Miniatura</th>
						<th>Título</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						<?php while( $query->have_posts() ) : $query->the_post(); ?>
							<tr>
								<td width="100">
									<?php if( has_post_thumbnail() ) : the_post_thumbnail( array(80) ); else : ?>
										No hay miniatura
									<?php endif; ?>
								</td>
								<!-- El título -->
								<td width="100"><?php the_title(); ?></td>
								<!-- Acciones-->
								<td>
									<!-- Boton editar -->
									<button class="btn-modal btn-edit">Editar</button>

									<!-- Boton Publicado o no -->
									<?php if( get_post_status ( get_the_ID () ) == 'publish' ) : ?>
										<button class="btn-modal btn-publish" data-publish="publish" data-id="<?= get_the_ID () ?>">Publicado</button>
									<?php elseif ( get_post_status ( get_the_ID () ) == 'draft' ) : ?>
										<button class="btn-modal btn-nopublish" data-publish="draft" data-id="<?= get_the_ID () ?>">Borrador</button>
									<?php endif; ?>

									<!-- Boton remover -->
									<button class="btn-modal btn-remove">Remover</button>
								</td>
							</tr>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</tbody>
				</table>
				<!-- Fin de la tabla o de los posts -->

				<!-- Botton cerrar  --> <br/><br/>
				<button class="button-primary button-large md-close">Cierrame!</button>
			</div> <!-- / -->
		</div> <!-- /.md-content -->
	</div> <!-- /.md-modal md-effect-18 -->

	<div class="md-overlay"></div> <!-- /.mdOverlay -->

<?php
}

?>