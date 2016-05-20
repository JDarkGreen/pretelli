<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
	<?php $options = get_option('pretelli_custom_settings'); global $post; ?>

	<!-- Header -->
	<header class="mainHeader sb-slide">
		<!-- Container -->
		<div class="container">
			
			<!-- Solo en version Desktop -->
			<div class="row hidden-xs-down">
				<!-- Logo -->
				<div class="col-xs-4">
					<!-- Logo -->
					<h1 class="logo">
						<a href="<?= site_url() ?>"><img src="<?= IMAGES ?>/logo_pretelli.png" alt="logo-pretelli" class="img-fluid" /></a>
					</h1><!-- /.logo -->
				</div><!-- /col-xs-4 -->
				<!-- Menu  -->
				<div class="col-xs-8">
					<div class="col-xs-12">
						<!-- Redes sociales -->
						<ul class="social-links text-xs-right">
							<li><?php _e('Síguenos: ' , LANG ); ?></li>
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
					</div><!-- /.col-xs-12 -->
					<div class="col-xs-12">
						<!-- Navegacion principal -->
						<nav class="mainNavigation">
							<?php 
								wp_nav_menu(
									array(
										'menu_class'     => 'mainMenu list-inline text-center',
										'theme_location' => 'main-menu'
								));
							?>
						</nav><!-- /.mainNavigation -->
					</div><!-- /.col-xs-12 -->
				</div><!-- /.col-xs-8 -->
			</div><!-- /.row -->

			<!-- Solo en version mobile -->
			<section class="hidden-sm-up">
				<div class="mainHeader__mobile ">

						<!-- Icono abrir menu lateral -->
						<div class="icon-header">
							<i id="toggle-left-nav" class="fa fa-bars" aria-hidden="true"></i>
						</div><!-- /.icon-header -->

						<!-- Logo -->
						<h1 class="logo">
							<a href="<?= site_url() ?>">
								<?php if( !empty($options['logo']) ) : ?>
									<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
								<?php else: ?>
									<img src="<?= IMAGES ?>/logo_pretelli.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
								<?php endif; ?>
							</a>
						</h1> <!-- /.lgoo -->	

						<!-- Icono abrir menu lateral derecha -->
						<div class="icon-header">
							<i id="toggle-right-nav" class="fa fa-bars" aria-hidden="true"></i>
						</div><!-- /.icon-header -->	

				</div> <!-- /.mainHeader__mobile -->
			</section> <!-- /.visible-xs-block -->

		</div><!-- /.container -->
	</header><!-- /.mainHeader -->
	
	<!-- Contenedor Izquierda versión mobile -->
	<aside class="sidebar__content sb-slidebar sb-left sb-style-push">
		<!-- Logo -->
		<h1 class="logo">
			<a href="<?= site_url() ?>"><img src="<?= IMAGES ?>/logo_pretelli.png" alt="logo-pretelli" class="img-fluid" /></a>
		</h1><!-- /.logo -->

		<!-- Navegacion principal -->
		<nav class="mainNavigation">
			<?php 
				wp_nav_menu(
					array(
						'menu_class'     => 'mainMenu list-inline text-center',
						'theme_location' => 'main-menu'
				));
			?>
		</nav><!-- /.mainNavigation -->

  </aside> <!-- /.sb-slidebar sb-left -->	

  <!-- Contenedor Izquierda versión mobile -->
	<div class="sidebar__content sb-slidebar sb-right sb-style-push">
		<!-- Incluir template de categorias -->
		<?php include(locate_template('partials/categories-posts.php') ); ?>
  </div> <!-- /.sb-slidebar sb-right -->

	<!-- Slidebar  Contenedor -->
	<div id="sb-site">
