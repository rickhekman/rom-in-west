<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer__content-wrapper">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>

		<div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<figure class="vv-site-logo">
						<a href="<?php echo home_url(''); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/rom-inwest-logo-footer-payoff.png'; ?>" alt="site logo" class="vv-site-logo__payoff"></a>
						<a href="<?php echo home_url(''); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/rom-inwest-logo-footer.png'; ?>" alt="site logo" class="vv-site-logo__no-payoff"></a>					
					</figure>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-name -->
			<div class="powered-by">
				<?php
				printf(
					/* translators: %s: WordPress. */
					esc_html__( '&copy; Copyright 2021 ROM InWest')
				);
				?>
				<div class="vv-site-contact__links">
					<ul>
						<li><a href="<?php echo home_url('disclaimer'); ?>">Disclaimer</a></li>
						<li><a href="<?php echo home_url('privacyverklaring'); ?>">Privacy</a></li>
						<li><a href="<?php echo home_url('privacyverklaring#cookies'); ?>">Cookies</a></li>
					</ul>
				</div>
			</div><!-- .powered-by -->

		</div><!-- .site-info -->

		<div class="vv-site-contact" style="min-width:25%;">
				<div class="vv-site-contact__social">
					<div class="vv-site-contact__social-linkedin">
						<a href="https://www.linkedin.com/company/rom-inwest/" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="54" height="54" viewBox="0 0 54 54">
								<defs>
									<clipPath id="clip-Linkedin">
									<rect width="54" height="54"/>
									</clipPath>
								</defs>
								<g id="Linkedin" clip-path="url(#clip-Linkedin)">
									<g id="Path_9368" data-name="Path 9368" fill="none">
									<path d="M0,0H54V54H0Z" stroke="none"/>
									<path d="M 2 2 L 2 52 L 52 52 L 52 2 L 2 2 M 0 0 L 54 0 L 54 54 L 0 54 L 0 0 Z" stroke="none" fill="#fff"/>
									</g>
									<path id="Path_6389" data-name="Path 6389" d="M17.4,36.348H11.5v-17.7h5.9ZM14.452,16.012A3.272,3.272,0,1,1,17.7,12.741,3.259,3.259,0,0,1,14.452,16.012Zm23.61,20.336h-5.9V27.9c0-5.55-5.907-5.082-5.907,0v8.443h-5.9v-17.7h5.9v3.224c2.573-4.768,11.8-5.122,11.8,4.569Z" transform="translate(2.139 2.911)" fill="#fff"/>
								</g>
							</svg>
						</a>					
					</div>
					<div class="vv-site-contact__social-email">
						<a href="mailto:info@rominwest.nl" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="54" height="54" viewBox="0 0 54 54">
								<defs>
									<clipPath id="clip-Email">
									<rect width="54" height="54"/>
									</clipPath>
								</defs>
								<g id="Email" clip-path="url(#clip-Email)">
									<g id="Rectangle_1" data-name="Rectangle 1" fill="none" stroke="#fff" stroke-width="2">
									<rect width="54" height="54" stroke="none"/>
									<rect x="1" y="1" width="52" height="52" fill="none"/>
									</g>
									<path id="Subtraction_1" data-name="Subtraction 1" d="M1600.251-10767h-22.445a2.8,2.8,0,0,0-2.792,2.806l-.014,16.834a2.814,2.814,0,0,0,2.806,2.806h22.445a2.814,2.814,0,0,0,2.806-2.806v-16.834A2.814,2.814,0,0,0,1600.251-10767Zm0,5.611-11.223,7.014-11.223-7.014v-2.806l11.223,7.015,11.223-7.015Z" transform="translate(-1561.757 10784.289)" fill="#fff" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1"/>
								</g>
							</svg>
						</a>
					</div>				
				</div>
				<p>ROM InWest BV</p>
				<p>Harmenjansweg 4</p>
				<p>2031 WK Haarlem</p>			
			</div>


		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
