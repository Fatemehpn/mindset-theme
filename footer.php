<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<?php get_template_part('template-parts/fwd-back-to-top'); ?>
		<div class="footer-contact">
			<?php
		
				if ( function_exists( 'get_field' ) ) {
					if ( ! is_page(6) ) {
							if ( get_field('physical_address', 6) ) {
									echo '<div class="footer-contact-left">';
											get_template_part('images/location');
											the_field('physical_address', 6);
									echo '</div>';
							}
							if ( get_field('email_address', 6) ) {
									$email  = get_field( 'email_address', 6 );
									$mailto = 'mailto:' . $email;
									?>
									<div class="footer-contact-right">
											<?php get_template_part('images/email'); ?>
											<p><a href="<?php echo esc_url( $mailto ); ?> "><?php echo esc_html( $email ); ?></a></p>
									</div>
									<?php
							}
					}
			}
		
			?>
		</div><!-- .footer-contact -->
		<div class="footer-menus">
			<nav class="footer-navigation">
				<?php
						wp_nav_menu(array('theme_location' => 'footer-left'));
				?>
			</nav>
			<nav id='social-navigation' class='social-navigation'>
				<?php
				wp_nav_menu(array('theme_location' => 'footer-right'));
				?>
			</nav>				
		</div><!-- .footer-menus -->

		<div class="site-info">
			<!-- privacy policy  -->
			<?php the_privacy_policy_link(); ?> <br/>
			<?php esc_html_e( 'Created by ', 'fwd' ); ?><a href="<?php echo esc_url( __( 'https://wp.bcitwebdeveloper.ca/', 'fwd' ) ); ?>"><?php esc_html_e( 'Jonathon Leathers', 'fwd' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
