<?php
/**
* Plugin Name: 	Acordeon
* Plugin URI: 	https://sauco-web.com/
* Description: 	Sencillo acordeon jQuery para elementos de la página. Pon el contenido del arcodeón entre los shortcodes [acordeoninicio], [acordeon] y [acordeonfin]
* Version: 		1.0
* Author: 		Antonio García-Saúco Iglesias
* Author URI: 	https://sauco-web.com/
*/


// ==============================================
//  Prevent Direct Access of this file
// ==============================================

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if this file is accessed directly


// ==============================================
// Register & enqueue styles/scripts
// ==============================================


add_action( 'wp_enqueue_scripts','sauco_web_load_scripts' );

function sauco_web_load_scripts() {

	// Register scripts and styles
	wp_register_style('sauco_jquery_iu_css', plugin_dir_url( __FILE__ ) . 'css/accordion.css', '1.0');
	
	wp_register_script('sauco_jquery_iu_js', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery') );
	wp_register_script('sauco_accordion', plugin_dir_url( __FILE__ ) . 'js/accordion.js', array('jquery'), '1.0' );

	
	// Enqueue styles
	wp_enqueue_style('sauco_jquery_iu_css');


	// Enqueue JS
	wp_enqueue_script('sauco_jquery_iu_js');
	wp_enqueue_script('sauco_accordion');
		
}



// ==============================================
//	SHORTCODE FOR FIRST ACCORDION
//	use [acordeoninicio]
// ==============================================

function sauco_shortcode_inicio_accordeon( $titulo ) {

	// Attributes
	$titulo = shortcode_atts(
		array(
			'seccion' => 'Primera sección del acordeón',
		),
		$titulo
	);
	
	return '<div id="accordion"><h3>'. $titulo ['seccion'] . '</h3><div>';

}
add_shortcode( 'acordeoninicio', 'sauco_shortcode_inicio_accordeon' );

// ==============================================
//	SHORTCODE TO BE USED IN THE MIDDLE OF ACCORDION
//	use [acordeon]
// ==============================================

function sauco_shortcode_medio_accordeon( $titulo ) {

	// Attributes
	$titulo = shortcode_atts(
		array(
			'seccion' => 'Otra sección del acordeón',
		),
		$titulo
	);
	
	return '</div><h3>'. $titulo ['seccion'] . '</h3><div>';

}
add_shortcode( 'acordeon', 'sauco_shortcode_medio_accordeon' );


// ==============================================
//	SHORTCODE TO BE USED AFTER FINAL ACCORDION
//	use [acordeonfin]
// ==============================================

function sauco_shortcode_fin_accordeon() {
	return '</div></div>';
}
add_shortcode('acordeonfin', 'sauco_shortcode_fin_accordeon');