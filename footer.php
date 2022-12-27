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
if ( ! class_exists( 'Redux', false ) ) {
	return;
}
global $sr_redux; 
$sag_copyright_text = $sr_redux['copyright_text'];
$logo = $sr_redux['footer_logo'];
$vm_url = $sr_redux['vimeo_url'];
$ig_url = $sr_redux['ig_url'];
$tt_url = $sr_redux['tt_url'];
$pt_url = $sr_redux['pt_url'];
$fb_url = $sr_redux['fb_url'];
$footer_bg = $sr_redux['footer_bg_image'];


// var_dump($footer_bg['background-color']);

?>

	<footer id="colophon" class="site-footer" style="background-image: url(<?php echo $footer_bg['background-image'] ?>);background-position: <?php echo $footer_bg['background-position'] ?>;background-size: <?php echo $footer_bg['background-size'] ?>;">
		<div class="footer-top-holder">
			<div class="container">
				<div class="footer-top-holder-wrapper">
					<div class="column column1">
						<ul>
							<li>
								<a href="<?php echo esc_url($vm_url); ?>" class="fa fa-vimeo"></a>
							</li>
							<li>
								<a href="<?php echo esc_url($ig_url); ?>" class="fa fa-instagram"></a>
							</li>
							<li>
								<a href="<?php echo esc_url($tt_url); ?>" class="fa fa-twitter"></a>
							</li>
							<li>
								<a href="<?php echo esc_url($pt_url); ?>" class="fa fa-pinterest"></a>
							</li>
							<li>
								<a href="<?php echo esc_url($fb_url); ?>" class="fa fa-facebook"></a>
							</li>
						</ul>
					</div>
					<div class="column column2">
						<a href="/">
							<img src="<?php echo esc_url($logo['url']); ?>" alt="Logo" />
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
					<?php echo $sag_copyright_text; ?>
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
