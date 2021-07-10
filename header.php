<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
	<nav class="navbar navbar-expand-md <?php echo esc_attr($args["nav-class"]); ?>">
		<div class="container">
			<a class="navbar-brand" href="<?php echo esc_attr(get_home_url()); ?>">
				<?php echo esc_html(get_bloginfo('name')) ?>
			</a>
			<button class="navbar-toggler collapsed" type="button"
					data-bs-toggle="collapse" data-bs-target="#navbarColor01"
					aria-controls="navbarColor01" aria-expanded="false"
					aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse collapse" id="navbarColor01" style="">
				<?php
					$walker=new Ubootswatch_Nav_Walker();

					wp_nav_menu(array(
						"theme_location"=>"header-menu",
						"container"=>false,
						"menu_class"=>"navbar-nav me-auto menu",
						"depth"=>2,
						"walker"=>$walker
					));
				?>
			</div>
		</div>
	</nav>
</header>
