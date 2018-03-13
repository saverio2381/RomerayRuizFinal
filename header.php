<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
   
    <title><?php echo(wp_title( ' | ', false, 'left' )); ?></title>
	<!-- Stylesheets -->
	<link href="https://file.myfontastic.com/vpmQRphgh2NCpJsjw4dXZA/icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon.ico" />
    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<!-- Header -->
	<div id="page-header">
		<div class="fila col-centro-v">
			<!-- Logo -->
			<div class="col base-2-3 tablet-1-3">
				<a href="<?php echo get_home_url();?>">
					<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logotipo.png"/>
				</a>
			</div>
			
			<!--  Menu Toggle button -->
			<div class="col base-1-3 col-derecha menu-toggle">
				<a href="#" class="menu_toggle_container">
					<div id="menu-toggle"></div>	
				</a>
			</div>
			
			<div id="aux-cab-container" class="col_np tablet-2-3_np">
				<div id="aux-cab" class="fila">
					<div id="aux-cab__sup" class="col col-derecha">
						
						<div id="lang-bar">
							<?php 
								if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Selector de Idiomas') ) : ?>
							<?php endif; ?>
						</div>
						
					</div>
					<div id="aux-cab__inf" class="col col-derecha col-centro-v">
						<div class="col base-1-3 col-derecha menu-toggle_web">
							<a href="#" class="menu_toggle_container">
								<div id="menu-toggle_web"></div>	
							</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<nav id="main-menu-mobile" class="menu-mobile">
			<div class="mobile-bar">
				
				<div id="lang-bar-mobile">
					<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Selector de Idiomas Móvil') ) : ?>
					<?php endif; ?>
				</div>
			</div>
			<?php  
				wp_nav_menu( array(
					'menu'  => 'main',
					'container' => false
				) );
			?>
		</nav>		
	</div>
	
	<!-- /page-header -->