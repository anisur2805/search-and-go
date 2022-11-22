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

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-top"></div>
		<div class="footer-copyright">
			<div class="container">
			<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'search-and-go' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'search-and-go' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'search-and-go' ), 'search-and-go', '<a href="http://github.com/anisur2805/">Anisur Rahman</a>' );
				?>
		</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
