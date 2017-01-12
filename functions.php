<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

?>
<?php


/**
 *
 * Le code suivant permet de surcharger les styles CSS du thème parent Klean.
 *
 * Premièrement, on s'assure que les styles CSS du thème parent ('klean-style') soient chargées, 
 * avec la fonction register_parent_style().
 *
 * Deuxièmement, on charge les styles CSS du thème enfant, en les plaçant après les styles du thème parent
 * pour pouvoir les surcharger (priorité de 20, qui place ces styles en fin de chaîne).
 *
 *
 */
 
function register_parent_style() {
	
	wp_enqueue_style( 
			'klean-style', 
			get_template_directory_uri() . '/style.css',
			false, // dependencies
			false // version
	); 	
	
}
add_action( 'wp_enqueue_scripts', 'register_parent_style', 10 );
function register_child_style() {
	wp_enqueue_style( 
			'child-style', 
			get_stylesheet_directory_uri() . '/style.css',
			false, // dependencies
			false // version
	); 
	
}
add_action( 'wp_enqueue_scripts', 'register_child_style', 20 );