<?php
/*
* Dynamic CSS which load from Admin 
*/
//@import 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300';
function dynamic_css(){
	$get_option = get_option( 'ch_theme_option' );
	$css = '<style type="text/css" media="screen">';
		$css .= '@import "https://fonts.googleapis.com/css?family=ABeeZee|Cabin|Cantarell|Catamaran|Chewy|Comfortaa|Concert+One|Copse|Cormorant|Droid+Sans+Mono|EB+Garamond|Economica|Gudea|Josefin+Sans|Kavoon|Libre+Franklin|Montserrat|Mukta+Vaani|Open+Sans+Condensed:300|PT+Sans+Narrow|Play|Poiret+One|Quicksand|Raleway|Reem+Kufi|Roboto+Condensed|Titillium+Web|Ubuntu|Yanone+Kaffeesatz|Yrsa";';
	if(!empty($get_option['body_font'])){
		switch($get_option['body_font']):
			case 'montserrat':
				$css .= 'body{font-family: "Montserrat", sans-serif !important;}';
			break;
			case 'raleway':
				$css .= 'body{font-family: "Raleway", sans-serif !important;}';
			break;
			case 'roboto condensed':
			 	$css .= 'body{font-family: "Roboto Condensed", sans-serif !important;}';
			break;
			case 'yrsa':
			 	$css .= 'body{font-family: "Yrsa", serif !important;}';
			break;
			case 'open sans condensed':
				$css .= 'body{font-family: "Open Sans Condensed", sans-serif !important;}';
			break;
			case 'ubuntu':
				$css .= 'body{font-family: "Ubuntu", sans-serif !important;}';
			break;
			case 'titillium web': 
				$css .= 'body{font-family: "Titillium Web", sans-serif !important;}';
			break;
			case 'pt sans narrow':
				$css .= 'body{font-family: "PT Sans Narrow", sans-serif !important;}';
			case 'cabin':
				$css .= 'body{font-family: "Cabin", sans-serif !important;}';
			break;
			case 'poiret one':
				$css .= 'body{font-family: "Poiret One", cursive !important;}';
			break;
			case 'josefin sans':
				$css .= 'body{font-family: "Josefin Sans", sans-serif !important;}';
			break;
			case 'catamaran': 
				$css .= 'body{font-family: "Catamaran", sans-serif !important;}';
			break;
			case 'quicksand': 
				$css .= 'body{font-family: "Quicksand", sans-serif !important;}';
			break;
			case 'libre franklin':  
				$css .= 'body{font-family: "Libre Franklin", sans-serif !important;}';
			break; 
			case 'kavoon': 
				$css .= 'body{font-family: "Kavoon", cursive !important;}';
			break; 
			case 'concert one': 
				$css .= 'body{font-family: "Concert One", cursive !important;}';
			break; 
			case 'eb garamond': 
				$css .= 'body{font-family: "EB Garamond", serif !important;}';
			break; 
			case 'chewy': 
				$css .= 'body{font-family: "Chewy", cursive !important;}';
			break; 
			case 'comfortaa': 
				$css .= 'body{font-family: "Comfortaa", cursive !important;}';
			break; 
			case 'copse': 
				$css .= 'body{font-family: "Copse", serif !important;}';
			break;
			case 'cormorant': 
				$css .= 'body{font-family: "Cormorant", serif !important;}';
			break; 
			case 'abeezee': 
				$css .= 'body{font-family: "ABeeZee", sans-serif !important;}';
			break; 
			case 'gudea': 
				$css .= 'body{font-family: "Gudea", sans-serif !important;}';
			break; 
			case 'mukta vaani': 
				$css .= 'body{font-family: "Mukta Vaani", sans-serif !important;}';
			break; 
			case 'cantarell': 
				$css .= 'body{font-family: "Cantarell", sans-serif !important;}';
			break; 
			case 'economica': 
				$css .= 'body{font-family: "Economica", sans-serif !important;}';
			break; 
			case 'droid sans mono':  
				$css .= 'body{font-family: "Droid Sans Mono", monospace !important;}';
			break; 
			case 'reem kufi': 
				$css .= 'body{font-family: "Reem Kufi", sans-serif !important;}';
			break; 
			case 'yanone kaffeesatz': 
				$css .= 'body{font-family: "Yanone Kaffeesatz", sans-serif !important;}';
			break; 
			case 'play': 
					$css .= 'body{font-family: "Play", sans-serif !important;}';
			break; 
			default:
		endswitch;
	}


	// Heading font  
	if(!empty($get_option['heading_font'])){
		switch($get_option['heading_font']):
			case 'montserrat':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Montserrat", sans-serif !important;}';
			break;
			case 'raleway':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Raleway", sans-serif !important;}';
			break;
			case 'roboto condensed':
			 	$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Roboto Condensed", sans-serif !important;}';
			break;
			case 'yrsa':
			 	$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Yrsa", serif !important;}';
			break;
			case 'open sans condensed':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Open Sans Condensed", sans-serif !important;}';
			break;
			case 'ubuntu':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Ubuntu", sans-serif !important;}';
			break;
			case 'titillium web': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Titillium Web", sans-serif !important;}';
			break;
			case 'pt sans narrow':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "PT Sans Narrow", sans-serif !important;}';
			case 'cabin':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Cabin", sans-serif !important;}';
			break;
			case 'poiret one':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Poiret One", cursive !important;}';
			break;
			case 'josefin sans':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Josefin Sans", sans-serif !important;}';
			break;
			case 'catamaran': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Catamaran", sans-serif !important;}';
			break;
			case 'quicksand': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Quicksand", sans-serif !important;}';
			break;
			case 'libre franklin':  
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Libre Franklin", sans-serif !important;}';
			break; 
			case 'kavoon': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Kavoon", cursive !important;}';
			break; 
			case 'concert one': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Concert One", cursive !important;}';
			break; 
			case 'eb garamond': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "EB Garamond", serif !important;}';
			break; 
			case 'chewy': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Chewy", cursive !important;}';
			break; 
			case 'comfortaa': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Comfortaa", cursive !important;}';
			break; 
			case 'copse': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Copse", serif !important;}';
			break;
			case 'cormorant': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Cormorant", serif !important;}';
			break; 
			case 'abeezee': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "ABeeZee", sans-serif !important;}';
			break; 
			case 'gudea': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Gudea", sans-serif !important;}';
			break; 
			case 'mukta vaani': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Mukta Vaani", sans-serif !important;}';
			break; 
			case 'cantarell': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Cantarell", sans-serif !important;}';
			break; 
			case 'economica': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Economica", sans-serif !important;}';
			break; 
			case 'droid sans mono':  
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Droid Sans Mono", monospace !important;}';
			break; 
			case 'reem kufi': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Reem Kufi", sans-serif !important;}';
			break; 
			case 'yanone kaffeesatz': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Yanone Kaffeesatz", sans-serif !important;}';
			break; 
			case 'play': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Play", sans-serif !important;}';
			break; 
			default:
		endswitch;
	}


	// Navigation font family
		if(!empty($get_option['navigation_font'])){
		switch($get_option['navigation_font']):
			case 'montserrat':
				$css .= 'nav ul li a{font-family: "Montserrat", sans-serif !important;}';
			break;
			case 'raleway':
				$css .= 'nav ul li a{font-family: "Raleway", sans-serif !important;}';
			break;
			case 'roboto condensed':
			 	$css .= 'nav ul li a{font-family: "Roboto Condensed", sans-serif !important;}';
			break;
			case 'yrsa':
			 	$css .= 'nav ul li a{font-family: "Yrsa", serif !important;}';
			break;
			case 'open sans condensed':
				$css .= 'nav ul li a{font-family: "Open Sans Condensed", sans-serif !important;}';
			break;
			case 'ubuntu':
				$css .= 'nav ul li a{font-family: "Ubuntu", sans-serif !important;}';
			break;
			case 'titillium web': 
				$css .= 'nav ul li a{font-family: "Titillium Web", sans-serif !important;}';
			break;
			case 'pt sans narrow':
				$css .= 'nav ul li a{font-family: "PT Sans Narrow", sans-serif !important;}';
			case 'cabin':
				$css .= 'nav ul li a{font-family: "Cabin", sans-serif !important;}';
			break;
			case 'poiret one':
				$css .= 'nav ul li a{font-family: "Poiret One", cursive !important;}';
			break;
			case 'josefin sans':
				$css .= 'nav ul li a{font-family: "Josefin Sans", sans-serif !important;}';
			break;
			case 'catamaran': 
				$css .= 'nav ul li a{font-family: "Catamaran", sans-serif !important;}';
			break;
			case 'quicksand': 
				$css .= 'nav ul li a{font-family: "Quicksand", sans-serif !important;}';
			break;
			case 'libre franklin':  
				$css .= 'nav ul li a{font-family: "Libre Franklin", sans-serif !important;}';
			break; 
			case 'kavoon': 
				$css .= 'nav ul li a{font-family: "Kavoon", cursive !important;}';
			break; 
			case 'concert one': 
				$css .= 'nav ul li a{font-family: "Concert One", cursive !important;}';
			break; 
			case 'eb garamond': 
				$css .= 'nav ul li a{font-family: "EB Garamond", serif !important;}';
			break; 
			case 'chewy': 
				$css .= 'nav ul li a{font-family: "Chewy", cursive !important;}';
			break; 
			case 'comfortaa': 
				$css .= 'nav ul li a{font-family: "Comfortaa", cursive !important;}';
			break; 
			case 'copse': 
				$css .= 'nav ul li a{font-family: "Copse", serif !important;}';
			break;
			case 'cormorant': 
				$css .= 'nav ul li a{font-family: "Cormorant", serif !important;}';
			break; 
			case 'abeezee': 
				$css .= 'nav ul li a{font-family: "ABeeZee", sans-serif !important;}';
			break; 
			case 'gudea': 
				$css .= 'nav ul li a{font-family: "Gudea", sans-serif !important;}';
			break; 
			case 'mukta vaani': 
				$css .= 'nav ul li a{font-family: "Mukta Vaani", sans-serif !important;}';
			break; 
			case 'cantarell': 
				$css .= 'nav ul li a{font-family: "Cantarell", sans-serif !important;}';
			break; 
			case 'economica': 
				$css .= 'nav ul li a{font-family: "Economica", sans-serif !important;}';
			break; 
			case 'droid sans mono':  
				$css .= 'nav ul li a{font-family: "Droid Sans Mono", monospace !important;}';
			break; 
			case 'reem kufi': 
				$css .= 'nav ul li a{font-family: "Reem Kufi", sans-serif !important;}';
			break; 
			case 'yanone kaffeesatz': 
				$css .= 'nav ul li a{font-family: "Yanone Kaffeesatz", sans-serif !important;}';
			break; 
			case 'play': 
				$css .= 'nav ul li a{font-family: "Play", sans-serif !important;}';
			break; 
			default:
		endswitch;
	}
	if(!empty($get_option['body_font_size'] ) ) {
		$css .= 'body {font-size: '.$get_option['body_font_size'].'!important;}';
	}
	if(!empty($get_option['body_font_line-height'])){
		$css .= 'body {line-height: '.$get_option['body_font_line-height'].'!important;}';
	}
	if(!empty($get_option['heading_font_weight']) && $get_option['heading_font_weight'] != 'default'){
		$css .= 'h1, h2, h3, h4, h5, h6 {font-weight: '.$get_option['heading_font_weight'].' !important;}';
	}
	if(!empty($get_option['navigation_font_size'])){
		$css .= 'nav ul li a {font-size: '.$get_option['navigation_font_size'].' !important;}';
	}
	if(!empty($get_option['navigation_font_weight']) && $get_option['navigation_font_weight'] != 'default'){
		$css .= 'nav ul li a {font-weight: '.$get_option['navigation_font_weight'].' !important;}';
	}
	if(!empty($get_option['menu_background'])){
		$css .= 'section.dynamicMenu, ul#menu-main-menu > li > ul.sub-menu{background-color: '.$get_option['menu_background']. ' !important; }';
	}
	if(!empty($get_option['custom_css_code'])){
		$css .= $get_option['custom_css_code']; 
	}
	if(!empty($get_option['link_text_color'])){
		$css .= 'ul.sidebar_cat.inner_page li a, section.main_body li a, section.footer li a { color: '.$get_option['link_text_color'].'; }';
	}
	if(!empty($get_option['default_heading_color'])){
		$css .= 'h1, h2, h3, h4, h5, h6, ul.sidebar_cat > li > a { color: '.$get_option['default_heading_color'].'; }';
	}
	if(!empty($get_option['link_hover_background'])){
		$css .= 'section.main_body ul li a:hover, section.footer ul li a:hover{background:'.$get_option['link_hover_background'].';}';
	}
	if(!empty($get_option['text_color_for_colored_background'])){
		$css .= 'section.main_body ul li a:hover, section.footer ul li a:hover{color:'.$get_option['text_color_for_colored_background'].';}';
	}
	if(!empty($get_option['footer_background_color'])){
		$css .= 'section.footer.top {   background-color: '.$get_option['footer_background_color'].'; }';
	}
	if(!empty($get_option['footer_background_taxture'])){
		$css .= 'section.footer.top {   background-image: url('.$get_option['footer_background_taxture'].'); }';
	}
	if(!empty($get_option['widget_title_background'])){
		$css .= 'h3.page_title_widget {   background-image: url('.$get_option['widget_title_background'].'); }';
	}
	if(!empty($get_option['button_color'])){
		$css .= '.read_more {   background-color: '.$get_option['button_color'].'; }';
	}
	//Widget Title Background
	$css .= '</style>';
	echo $css;
}
add_action( 'wp_head', 'dynamic_css');
