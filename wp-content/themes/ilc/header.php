<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ilc
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>images/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ilc' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php if( get_theme_mod( 'ilc_logo') != "" ): ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="logo" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_theme_mod( 'ilc_logo' ); ?>"></a>
      	<?php endif; ?>
			</div><!-- .site-branding -->
			<div class="secondary-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
				<div class="search-container"><?php get_search_form(); ?></div>
			</div>
		</div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
			<?php if ( is_search() ) : ?>
					<?php elseif ( is_home() ) : ?>
					<header class="entry-header blog-header">
						<div class="container">
							<h1 id="page_header" class="page-title">Blog</h1>
						</div>
					</header>
					<?php elseif ( is_archive() ) : ?>
					<header class="entry-header blog-header">
						<div class="container">
							<?php if ( function_exists('yoast_breadcrumb') ) 
						{yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
						</div>
					</header>
					<?php elseif ( is_single() ) : ?>
						<?php // the_title( '<h1 id="page_header" class="entry-title">', '</h1>' ); ?>		
					<?php else : ?>
					<header class="entry-header page-header">
						<div class="container">
							<?php if ( function_exists('yoast_breadcrumb') ) 
						{yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
						<?php the_title( '<h1 id="page_header" class="entry-title">', '</h1>' ); ?>	
					</div>
				</header>
				<?php endif; ?>
			<?php
		// Adding Map to pages
		if(get_field('add_a_map'))
		{
			echo '<div class="map">' . get_field('add_a_map') . '</div>';
		}

		?>
	<div id="content" class="site-content">