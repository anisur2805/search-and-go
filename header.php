<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Search_and_Go
 */

?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php wp_body_open();?>
	<div id="page" class="site">
		<header id="masthead" class="site-header sticky-sm-top">
			
			<nav class="navbar navbar-expand-lg bg-light">
				<div class="navbar-header">
					<div class="site-branding">
					<?php
						if ( get_theme_mod( 'custom_logo' ) ):
							the_custom_logo();
						else: ?>
						<a href="<?php echo esc_url( site_url() ); ?>">
							<!-- <img alt="WooCom Logo" src="<?php // echo get_template_directory_uri() . "/assets/images/logo-for-website-2.png" ?>" /> -->
							<h2 class="site-title"><a href="<?php echo esc_url( site_url( '/' ) ); ?>" title="<?php bloginfo( 'name' );?>" itemprop="url"><?php echo get_bloginfo( 'name' ); ?></a></h2>
						</a>
					<?php endif;

					// $description = get_bloginfo( 'description' );
					// if ( $description ) {
					// 	echo sprintf( '<p class="site-description">%s</p>', esc_html( $description ) );
					// }
				?>
					</div><!-- .site-branding -->
				</div>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id' => 'primary-menu',
							'menu_class' => 'navbar-nav',
							'container_class'=> 'ms-auto',
							'container'=> false,
							'fallback_cb' => false,
							'depth' => 2,
							'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto %2$s">%3$s</ul>',
							'walker' => new bootstrap_5_wp_nav_menu_walker()
						)
					);
					?>
				</div>
			</nav>

		</header>
	</div>
