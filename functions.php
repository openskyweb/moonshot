<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

// Credits in Footer
// Usage: [credits oscredit="false" title="" link="" link_title="" linebreak="true"]
add_shortcode('credits', 'opensky_credits_function');
function opensky_credits_function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'oscredit' => 'true', //set true|false for link to Open Sky
		'title' => 'Open Sky Web Studio',
		'link' => 'https://www.openskywebstudio.com',
		'link_title' => 'Open Sky Web Studio | Clean, Effective Websites',
		'linebreak' => 'true',
		'company' => get_bloginfo('name'),
		'tagline' => get_bloginfo('description'),
		'company_link' => get_option('home')
	), $atts ) );
	$creds = "<span id='credits'>Copyright &copy; " . date('Y') . " <a href='".$company_link."' title='".$company." | ".$tagline."'>".$company."</a>. All Rights Reserved. ";
	if (strtolower($oscredit) == "false")
		$creds .= "<!--";
	if (strtolower($linebreak) == "true")
		$creds .= "<br/>";
	$creds .= "Site Design &bull; <a href='".$link."' title='".$link_title."' target='_blank'>".$title."</a> &bull; ";
	if (strtolower($oscredit) == "false")
		$creds .= "-->";
	$creds .= wp_loginout('', false) . wp_register(' &bull; ', '', false) . '</span>';
	return $creds;
}
