<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>


<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">


	<div class="vv-header-content-wrapper">
		<figure class="vv-site-logo">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/rom-inwest-logo.png'; ?>" alt="site logo" class="vv-site-logo__payoff"></a>
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/rom-inwest-logo-payoff.png'; ?>" alt="site logo" class="vv-site-logo__no-payoff"></a>
		</figure>
		<a href="<?php echo home_url('mijn-account'); ?>" class="vv-login-menu">Login</a>
		<div class="vv-secondary-navigation">
			<ul class="vv-secondary-navigation__menu">
				<li class="vv-secondary-navigation__item"><a href="<?php echo home_url('business-development'); ?>">Naar innovatie</a></li>
				<li class="vv-secondary-navigation__item"><a href="<?php echo home_url('investeringen'); ?>">Naar investeren</a></li>				
			</ul>			
		</div>
	</div>
	
</header>

<nav class="hamburger-menu">
	<input type="checkbox" id="hamburgerMenu" class="hamburger-menu__check">
	<label for="hamburgerMenu" class="hamburger-menu__label">		
		<span class="hamburger-menu__icon">&nbsp;</span>
	</label>
	
	<div class="hamburger-menu__sidebar">

	<?php if ( is_active_sidebar( 'vv-hamburger' ) ) : ?>

		<aside id="secondary" class="site-header__widgets vv-sidebar-widgets">
			<?php dynamic_sidebar( 'vv-hamburger' ); ?>
		</aside>

	<?php endif; ?>

	</div>

</nav>


