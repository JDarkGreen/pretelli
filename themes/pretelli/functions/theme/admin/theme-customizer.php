<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Pretelli Opciones', 'Pretelli Opciones', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register', 'pretelli_customize_register');

function pretelli_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('pretelli_logo', array(
		'title' => __('Logo', LANG ),
		'description' => __('Permite subir tu logo personalizado.', LANG ),
		'priority' => 35
	));
	
	$wp_customize->add_setting('pretelli_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Carga tu Logo', LANG ),
		'section' => 'pretelli_logo',
		'settings' => 'pretelli_custom_settings[logo]'
	)));

	####>>>>>>>>>>>> REDES SOCIALES >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('pretelli_redes_sociales', array(
		'title' => __('Redes Sociales', LANG ),
		'description' => __('Sección Redes Sociales', LANG ),
		'priority' => 41
	));	
	//facebook
	$wp_customize->add_setting('pretelli_custom_settings[red_social_fb]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('pretelli_custom_settings[red_social_fb]', array(
		'label'    => __('Coloca el link de facebook de la empresa', LANG ),
		'section'  => 'pretelli_redes_sociales',
		'settings' => 'pretelli_custom_settings[red_social_fb]',
		'type'     => 'text'
	));
	//twitter
	$wp_customize->add_setting('pretelli_custom_settings[red_social_twitter]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('pretelli_custom_settings[red_social_twitter]', array(
		'label'    => __('Coloca el link de twitter de la empresa', LANG ),
		'section'  => 'pretelli_redes_sociales',
		'settings' => 'pretelli_custom_settings[red_social_twitter]',
		'type'     => 'text'
	));
	//gmail
	$wp_customize->add_setting('pretelli_custom_settings[red_social_gmail]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('pretelli_custom_settings[red_social_gmail]', array(
		'label'    => __('Coloca el link de gmail de la empresa', LANG ),
		'section'  => 'pretelli_redes_sociales',
		'settings' => 'pretelli_custom_settings[red_social_gmail]',
		'type'     => 'text'
	));
	//youtube
	$wp_customize->add_setting('pretelli_custom_settings[red_social_ytube]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('pretelli_custom_settings[red_social_ytube]', array(
		'label'    => __('Coloca el link de youtube de la empresa', LANG ),
		'section'  => 'pretelli_redes_sociales',
		'settings' => 'pretelli_custom_settings[red_social_ytube]',
		'type'     => 'text'
	));

	
	// Contact Email
	$wp_customize->add_section('pretelli_contact_email', array(
		'title' => __('Correo Contacto de Formulario', LANG ),
		'description' => __('Escribe el Correo Contacto de Formulario', LANG ),
		'priority' => 37
	));
	
	$wp_customize->add_setting('pretelli_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('pretelli_custom_settings[contact_email]', array(
		'label'    => __('Dirección Contacto de Formulario', LANG ),
		'section'  => 'pretelli_contact_email',
		'settings' => 'pretelli_custom_settings[contact_email]',
		'type'     => 'text'
	));

	//Customizar celular
	$wp_customize->add_section('pretelli_contact_cel', array(
		'title' => __('Celular de Contacto', LANG ),
		'description' => __('Celular de Contacto', LANG ),
		'priority' => 39
	));
	
	$wp_customize->add_setting('pretelli_custom_settings[contact_cel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('pretelli_custom_settings[contact_cel]', array(
		'label'    => __('Escribe el o los números de celular del contacto separados por comas', LANG ),
		'section'  => 'pretelli_contact_cel',
		'settings' => 'pretelli_custom_settings[contact_cel]',
		'type'     => 'text'
	));

	//Customizar telefono
	$wp_customize->add_section('pretelli_contact_tel', array(
		'title' => __('Telefono de Contacto', LANG ),
		'description' => __('Telefono de Contacto', LANG ),
		'priority' => 39
	));
	
	$wp_customize->add_setting('pretelli_custom_settings[contact_tel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('pretelli_custom_settings[contact_tel]', array(
		'label'    => __('Escribe el numero de teléfono', LANG ),
		'section'  => 'pretelli_contact_tel',
		'settings' => 'pretelli_custom_settings[contact_tel]',
		'type'     => 'text'
	));

	//Customizar Direccion
	$wp_customize->add_section('pretelli_contact_address', array(
		'title' => __('Direccion de Contacto', LANG ),
		'description' => __('Direccion de Contacto', LANG ),
		'priority' => 40
	));
	
	$wp_customize->add_setting('pretelli_custom_settings[contact_address]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('pretelli_custom_settings[contact_address]', array(
		'label'    => __('Escribe la Direccion del contacto ', LANG ),
		'section'  => 'pretelli_contact_address',
		'settings' => 'pretelli_custom_settings[contact_address]',
		'type'     => 'text'
	));

	//Customizar MAPA
	$wp_customize->add_section('pretelli_contact_mapa', array(
		'title' => __('Mapa de Contacto', LANG ),
		'description' => __('Mapa de Contacto', LANG ),
		'priority' => 41
	));
	
	$wp_customize->add_setting('pretelli_custom_settings[contact_mapa]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('pretelli_custom_settings[contact_mapa]', array(
		'label'    => __('Escribe latitud y longitud de mapa sepador por coma', LANG ),
		'section'  => 'pretelli_contact_mapa',
		'settings' => 'pretelli_custom_settings[contact_mapa]',
		'type'     => 'text'
	));

	//Customizar WIDGET NOSOTROS
	$wp_customize->add_section('pretelli_widget_nosotros', array(
		'title' => __('Sección WIDGET NOSOTROS', LANG ),
		'description' => __('Sección WIDGET NOSOTROS', LANG ),
		'priority' => 40
	));
	
	//textarea
	$wp_customize->add_setting('pretelli_custom_settings[widget_nosotros]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('pretelli_custom_settings[widget_nosotros]', array(
		'label'    => __('Escribe contenido que ira en widget nosotros PORTADA', LANG ),
		'section'  => 'pretelli_widget_nosotros',
		'settings' => 'pretelli_custom_settings[widget_nosotros]',
		'type'     => 'textarea'
	));
	//imagen
	$wp_customize->add_setting('pretelli_custom_settings[image_nosotros]',array(
		'default' => '',
		'type'    => 'option'
	));

	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'widget_nosotros',array(
		'label'    => __('Imagen Nosotros', LANG ),
		'section'  => 'pretelli_widget_nosotros',
		'settings' => 'pretelli_custom_settings[image_nosotros]',
	)));

	####>>>>>>>>>>>> MISION Y VISIÓN >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('pretelli_mision_vision', array(
		'title' => __('Misión y Visión Empresa', LANG),
		'description' => __('Sección Misión y Visión Empresa', LANG),
		'priority' => 41
	));	
	/* MISION */
	$wp_customize->add_setting('pretelli_custom_settings[text_mision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('pretelli_custom_settings[text_mision]', array(
		'label'    => __('Escribe el texto MISIÓN', LANG),
		'section'  => 'pretelli_mision_vision',
		'settings' => 'pretelli_custom_settings[text_mision]',
		'type'     => 'textarea'
	));	
	/* VISION */
	$wp_customize->add_setting('pretelli_custom_settings[text_vision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('pretelli_custom_settings[text_vision]', array(
		'label'    => __('Escribe el texto VISIÓN', LANG),
		'section'  => 'pretelli_mision_vision',
		'settings' => 'pretelli_custom_settings[text_vision]',
		'type'     => 'textarea'
	));

	
}	
?>