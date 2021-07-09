<?php

class Ubootswatch_Nav_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( 'header-menu' === $args->theme_location ) {
			$output.='<ul class="dropdown-menu">';
		}
	}
}

add_theme_support('title-tag');

add_action("wp_enqueue_scripts","ubootswatch_wp_enqueue_scripts");
function ubootswatch_wp_enqueue_scripts() {
	wp_enqueue_script(
		"bootstrap",
		"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	);

	$theme=get_theme_mod("ubootswatch_theme");
	if ($theme)
		$cssUrl="https://cdn.jsdelivr.net/npm/bootswatch@5.0.2/dist/".$theme."/bootstrap.min.css";

	else
		$cssUrl="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css";

	wp_enqueue_style("bootstrap-css",$cssUrl);

	wp_enqueue_style(
		"ubootswatch",
		get_template_directory_uri()."/style.css"
	);
}

add_action("init","ubootswatch_init");
function ubootswatch_init() {
	register_nav_menus(array(
		"header-menu"=>"Header Menu"
	));
}

add_filter("nav_menu_css_class","ubootswatch_nav_menu_css_class",10,4);
function ubootswatch_nav_menu_css_class($classes, $item, $args, $depth) {
	if ($args->theme_location=="header-menu") {
		if ($depth==0) {
			$classes[]="nav-item";

			if (in_array('menu-item-has-children',$item->classes))
				$classes[] = 'dropdown';
		}
	}

	return $classes;
}

add_filter("nav_menu_link_attributes","ubootswatch_nav_menu_link_attributes",10,4);
function ubootswatch_nav_menu_link_attributes($attrs, $item, $args, $depth) {
	if ($attrs["aria-current"])
		$attrs["class"].=" active";

	if ($args->theme_location=="header-menu") {
		if ($depth==1) {
			$attrs["class"].=" dropdown-item";
		}

		else {
			$attrs["class"].=" nav-link";

			if (in_array('menu-item-has-children',$item->classes)) {
				$attrs["data-bs-toggle"]="dropdown";
				$attrs["class"].=' dropdown-toggle';
			}
		}
	}

	return $attrs;
}

add_action("customize_register","ubootswatch_customize_register",10,1);
function ubootswatch_customize_register($wp_customize) {
	$themes=array(
		"cerulean", "cosmo", "cyborg", "darkly", "flatly",
		"journal", "litera", "lumen", "lux", "materia",
		"minty", "morph", "pulse", "quartz", "sandstone",
		"simplex", "sketchy", "slate", "solar", "spacelab",
		"superhero", "united", "vapor", "yeti", "zephyr"
	);

	$themeChoices=array(
		""=>"Default Bootstrap"
	);

	foreach ($themes as $theme)
		$themeChoices[$theme]=ucfirst($theme);

	$wp_customize->add_section("ubootswatch", array(
		"title"=>"Bootswatch",
		"priority"=>0
	));

	$wp_customize->add_setting("ubootswatch_theme",array(
		"default"=>""
	));
	$wp_customize->add_control("ubootswatch_theme",array(
		"type"=>"select",
		"label"=>"Theme",
		"section"=>"ubootswatch",
		"choices"=>$themeChoices
	));

	$wp_customize->add_setting("ubootswatch_nav_color",array(
		"default"=>"primary"
	));
	$wp_customize->add_control("ubootswatch_nav_color",array(
		"type"=>"select",
		"label"=>"Nav Color",
		"section"=>"ubootswatch",
		"choices"=>array(
			"primary"=>"Primary",
			"secondary"=>"Secondary",
			"light"=>"Light",
			"dark"=>"Dark",
		)
	));

	$wp_customize->add_setting("ubootswatch_footer_color",array(
		"default"=>"dark"
	));
	$wp_customize->add_control("ubootswatch_footer_color",array(
		"type"=>"select",
		"label"=>"Footer Color",
		"section"=>"ubootswatch",
		"choices"=>array(
			"dark"=>"Dark",
			"light"=>"Light",
			"transparent"=>"Transparent",
		)
	));
}

function ubootswatch_content($args) {
	$args["page-header-class"]="mb-4";

	if (!is_singular()) {
		$args["page-header-class"]="";

		while (have_posts()) {
			the_post();
			get_template_part("content",null,$args);
		}
	}

	else {
		the_post();

		if (get_post_type()=="post")
			$args["page-header-class"]="";

		get_template_part("content",null,$args);
	}
}

function ubootswatch_get_args() {
	$args=array();

	$navBackground=get_theme_mod("ubootswatch_nav_color","primary");
	$navClass="navbar-dark";

	if ($navBackground=="light")
		$navClass="navbar-light";

	$args["nav-class"]="$navClass bg-$navBackground";

	$footerColor=get_theme_mod("ubootswatch_footer_color","dark");
	switch ($footerColor) {
		case "dark":
			$args["footer-class"]="bg-dark text-light";
			break;

		case "light":
			$args["footer-class"]="bg-light text-dark";
			break;

		case "transparent":
			$args["footer-class"]="";
			break;
	}

	return $args;
}