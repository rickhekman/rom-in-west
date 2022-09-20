<?php

/**
 * Setup theme.
 */
function vv_setup() {

	// // Load translations.
	// load_theme_textdomain( 'vv', get_stylesheet_directory() . '/languages' );

	// // Post formats.
	// add_theme_support( 'post-formats', 
	// 	[ 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio','chat', ]
	// );

	// Add excerpt to pages.
	add_post_type_support( 'page', 'excerpt' );
	
}
add_action( 'after_setup_theme', 'vv_setup', 11 );

/**
 * Enqueue style.
 */
function vv_scripts() {

	wp_enqueue_style(
		'vv-child',
		get_stylesheet_directory_uri() . '/assets/css/style.css',
		['twenty-twenty-one-style'],
		filemtime( get_stylesheet_directory() . '/assets/css/style.css' )
	);

	// Gotham font form VormVijf typography.com account.
	wp_enqueue_style( 'gotham', 'https://cloud.typography.com/7248118/7027232/css/fonts.css', [], null );

}
add_action( 'wp_enqueue_scripts', 'vv_scripts' );

/**
 * Add admin styles.
 */
function vv_block_editor_styles() {
	wp_enqueue_style(
		'vv-admin',
		get_stylesheet_directory_uri() . '/assets/css/vv-block-editor-styles.css',
		[],
		filemtime( get_stylesheet_directory() . '/assets/css/vv-block-editor-styles.css' )
	);
}
add_action( 'enqueue_block_editor_assets', 'vv_block_editor_styles' );

/**
 * Add Analytics to header.
 */
function vv_head_analytics() {
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-179155126-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-179155126-1', { 'anonymize_ip': true });
	</script>
	<?php
}
// add_action( 'wp_head', 'vv_head_analytics', 1 );

/**
 * Remove edit post link.
 */
add_filter( 'edit_post_link', '__return_null', 99 );

/**
 * Register extra menus.
 */
function vv_menus() {

	$locations = array(
		'vv-copy'  => 'Copywrite Menu',
	);

	register_nav_menus( $locations );
}
// add_action( 'init', 'vv_menus' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 * @since 4.0.3
 */
function vv_body_classes( $classes ) {

	// Add theme name.
	$my_theme  = wp_get_theme();
	$classes[] = sanitize_title( 'theme-' . $my_theme->get( 'Name' ) );

	return $classes;
}
add_filter( 'body_class', 'vv_body_classes' );

/**
 * Editor Colors Class.
 */
require get_stylesheet_directory() . '/inc/class-editor-colors.php';
$custom_colors = new DrstEditorColors();

/**
 * Theme Blocks.
 */
require get_stylesheet_directory() . '/inc/class-theme-blocks.php';
$vv_theme_blocks= new DrstThemeBlocks();
add_action( 'init', [$vv_theme_blocks, 'register_styles'] );
// add_action( 'init', [$vv_theme_blocks, 'register_block_categories'] );
// add_action( 'init', [$vv_theme_blocks, 'register_patterns'] );

/**
 * Alow SVG.
 */
require get_stylesheet_directory() . '/inc/class-svg.php';
$vv_svg = new DrstSvg();

/**
 * Custom sidebars.
 */
// require get_stylesheet_directory() . '/inc/class-custom-sidebars.php';
// $custom_sidebars = new CustomSidebars();

/**
 * Agenda class.
 */
require get_stylesheet_directory() . '/inc/class-agenda.php';
$agenda = new DrstAgenda();
add_filter( 'drst_agenda_archive', '__return_true' );
add_filter( 'drst_agenda_slug', function() { return 'agenda'; } );
add_shortcode( 'rom-agenda', [ $agenda, 'do_shortcode' ] );

/**
 * Posts shortcode.
 */
require get_stylesheet_directory() . '/inc/class-posts.php';
$posts = new TjerkPosts();
add_shortcode( 'rom-news', [ $posts, 'do_shortcode' ] );


/**
 * Change archive titles.
 */

/**
 * Sidebars.
 */
require get_stylesheet_directory() . '/inc/class-sidebars.php';
new DrstSidebars();

/**
 * Rellax (parallex) effect script
 */
 function vv_parallex() {
	 
	wp_enqueue_script( 'rellax script', get_stylesheet_directory_uri() . '/assets/js/rellax.min.js', array(), false, true);
 }
 add_action( 'wp_enqueue_scripts', 'vv_parallex' );
 

require get_stylesheet_directory() . '/inc/archive-title.php';

/**
 * Send mails with Combell SMTP server does not work with Ninja forms.
 * Use WP SMTP form plugin to send mail.
 * Ninja forms settings.
 */
require get_stylesheet_directory() . '/inc/class-smtp-mailer.php';
