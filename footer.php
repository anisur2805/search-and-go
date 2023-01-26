<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Search_and_Go
 */

 // Check BG Image
$bg_image = get_option_value( 'footer_bg_image');
if(!is_null($bg_image) && is_array($bg_image) && array_key_exists('background-image', $bg_image)) {
$bg_url = $bg_image['background-image'];
// Use $bg_url to set the background image
} else {
$bg_url = '';
}

// Check URL
$footer_logo = get_option_value( 'footer_logo');
if(!is_null($footer_logo) && is_array($footer_logo) && array_key_exists('url', $footer_logo)) {
$logo_url = $footer_logo['url'];
// Use $logo_url to set the background image
} else {
$logo_url = '';
}

?>

	<footer id="colophon" class="site-footer" style="background-image: url(<?php echo esc_url( $bg_url ); ?>);">
		<div class="footer-top-holder">
			<div class="container">
				<div class="footer-top-holder-wrapper">
					<div class="column column1">
						<?php echo sag_socials(); ?>
					</div>
					<div class="column column2">
						<a href="<?php home_url('/'); ?>">
							<img src="<?php echo esc_url( $logo_url ); ?>" alt="Logo" />
						</a>
					</div>
					<div class="column column3">
						<div class="search-form">
							<span class="fa fa-search"></span>
							<input placeholder="search..." type="search" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom-holder">
			<div class="container">
				<div class="site-info">
					<?php echo html_entity_decode( get_option_value( 'copyright_text') ); ?>
				</div><!-- .site-info -->
			</div>
		</div>
		<div class="back-to-top" id="back-to-top">
			<i class="bi bi-arrow-up-short"></i>
		</div>	
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
