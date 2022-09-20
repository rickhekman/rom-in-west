<?php
/**
 * Tjerk posts.
 *
 * @since 1.0.0
 * @package tjerk
 */
class TjerkPosts {

	/**
	 * Prefix used for elements that need a prefix
	 *
	 * @since 1.0.0
	 *
	 * @var string Prefix.
	 */
	const PREFIX = '_tjerk_';

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
	}

	/**
	 * Shortcode.
	 */
	public function do_shortcode( $atts ) {

		$args = [
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'no_found_rows'    => true,
		];
		if ( $atts ) {
			$args = array_merge( $atts, $args );
		}
		
		$my_posts = new WP_Query( $args );

		ob_start();

		if ( $my_posts->have_posts() ) :

			echo '<div class="vv-post-grid">
			<div class="vv-post-grid__header">
			<h2 class="vv-post-grid__header-title">Nieuws</h2>
			<a href="../nieuws/" class="vv-post-grid__header-link">Meer artikelen</a>
			</div>
			<div class="vv-post-grid__content">';

			while ( $my_posts->have_posts() ) :
				$my_posts->the_post();

				echo '<div class="vv-post-grid__item">';
				get_template_part( 'template-parts/content/excerpt' );
				echo '</div>';

			endwhile;
			wp_reset_postdata();

			echo '</div></div>';
	
			endif;

		return ob_get_clean();
	}
}
