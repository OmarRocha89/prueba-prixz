<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prixz
 */

?>

	<footer id="colophon" class="site-footer" style="background: #4486ff; padding:10px 15px; margin-top:50px; ">
		<div class="container">
			<div class="row">

			<div class="site-info text-center" style="color:#fff;">
				<a style="color:#fff !important;" href="<?php echo esc_url( __( 'https://wordpress.org/', 'farmacia' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'farmacia' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'farmacia' ), 'Prixz', '<a style="color:#fff !important;" href="http://omar-rocha.com/">Omar Rocha Perez</a>' );
					?>
			</div><!-- .site-info -->
				
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
