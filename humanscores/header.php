<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Humanscores
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'humanscores' ); ?></a>

    <?php if(get_header_image() && is_front_page()) : ?>
    <figure class="header-image">
        <a href="<?php echo esc_url( home_url('/')); ?>" rel="home">
            <img src="<?php header_image(); ?>"
                 width="<?php echo esc_attr(get_custom_header()->width); ?>"
                 height="<?php echo esc_attr(get_custom_header()->height); ?>"
                 alt="">
        </a>
    </figure>
    <?php endif; ?>

	<header id="masthead" class="site-header">
        <?php
//        the_post();
//        var_dump($wp_query);
        ?>
		<div class="site-branding">
            <?php the_custom_logo(); ?>
            <div class="site-branding-text">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
            </div><!-- .site-branding-text -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <?php esc_html_e( 'Burger menu', 'humanscores' ); ?>
            </button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'header-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
    <div id="content" class="site-content">