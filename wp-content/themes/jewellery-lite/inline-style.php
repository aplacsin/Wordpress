<?php

	$jewellery_lite_first_color = get_theme_mod('jewellery_lite_first_color');

	$custom_css = "";
	
	if($jewellery_lite_first_color != false){
		$custom_css .='.top-bar,span.cart-value,.more-btn a,.woocommerce span.onsale,input[type="submit"],#sidebar .tagcloud a:hover,#footer-2,#comments input[type="submit"],#header .nav ul.sub-menu li a:hover, #header .nav ul.children li a:hover,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar .custom-social-icons i, #footer .custom-social-icons i,.pagination .current,.pagination a:hover,nav.woocommerce-MyAccount-navigation ul li,#footer .tagcloud a:hover, .scrollup i{';
			$custom_css .='background-color: '.esc_html($jewellery_lite_first_color).';';
		$custom_css .='}';
	}
	if($jewellery_lite_first_color != false){
		$custom_css .='a,#header .nav ul li a:hover,.products li:hover h2,#sidebar ul li a:hover,.post-main-box:hover h3,#footer .custom-social-icons i:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,#footer li a:hover{';
			$custom_css .='color: '.esc_html($jewellery_lite_first_color).';';
		$custom_css .='}';
	}
	if($jewellery_lite_first_color != false){
		$custom_css .='.toggle a{';
			$custom_css .='background: url(assets/images/responsive_menu.png) no-repeat right center '.esc_html($jewellery_lite_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'jewellery_lite_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'jewellery_lite_slider_opacity_color','0.8');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'jewellery_lite_slider_content_option','Left');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:left; left:10%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:45%; right:10%;';
		$custom_css .='}';
	}