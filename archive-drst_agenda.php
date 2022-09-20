<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

switch ( get_post_type() ) {
	case 'drst_agenda':
		$description = 'Blijf op de hoogte van de laatste events en netwerkbijeenkomsten van ROM InWest.';
		break;
	default:
		$description = get_the_archive_description();
}

// $description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<div class="vv-grid-agenda">			
		<header class="vv-grid-agenda__header">
			<?php the_archive_title( '<h1 class="vv-grid-agenda-main__title">', '</h1>' ); ?>

			<div class="vv-breadcrumbs">
				<div class="vv-breadcrumbs__list">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
					?>
				</div>
			</div>

			<?php if ( $description ) : ?>
				<div class="vv-grid-agenda-main__intro"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
			<?php endif; ?>
		</header>

		<ul class="vv-grid-agenda-main">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<li class="vv-grid-agenda-main__item">
				<?php get_template_part( 'template-parts/content/excerpt-agenda', get_post_type() ); ?>
			</li>

		<?php endwhile; ?>
		</ul>
		<?php twenty_twenty_one_the_posts_navigation(); ?>

		
	<?php else : ?>
		<?php get_template_part( 'template-parts/content/content-none' ); ?>
	<?php endif; ?>

	</div>
	
<?php get_footer(); ?>
