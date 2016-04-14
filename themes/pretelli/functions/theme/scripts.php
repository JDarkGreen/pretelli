<?php  

/* Archivo que solo se encargara de cargas los scripts del tema 
	http://www.ey.com/PE/es/Home
*/

function load_custom_scripts()
{
	//cargar jquery
	if( !is_admin() ){
		wp_deregister_script('jquery');
		wp_register_script('jquery',("https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"), false );
		wp_enqueue_script('jquery');
	}

	//cargar bootstrap v4
	wp_enqueue_script('bootstrap', THEMEROOT . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true);

	//script
	wp_enqueue_script('custom_script', THEMEROOT . '/js/script.js', array('jquery'), false, true);

}

add_action('wp_enqueue_scripts', 'load_custom_scripts');

?>