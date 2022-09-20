<?php
/**
 * drst editir colors.
 *
 * @since 4.0.3
 * @package drst
 */
class DrstEditorColors {

	/**
	 * Prefix used for elements that need a prefix
	 *
	 * @since 4.0.3
	 *
	 * @var string Prefix.
	 */
	const PREFIX = '_drst_';

	/**
	 * Initialize the class.
	 *
	 * @since 4.0.3
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [$this, 'gutenberg_setup'], 99 );
		add_action( 'wp_enqueue_scripts', [$this, 'gutenberg_styles'] );
		add_action( 'after_switch_theme', [$this, 'set_default_theme_colors'] );
		add_filter( 'customize_save_response', [$this, 'overwrite_customizer_colors'] );
	}

	/**
	 * Theme colors.
	 */
	private function get_colors() {
		return array(
			array(
				'name'  => 'Black',
				'slug'  => 'vv-black',
				'color' => '#000000',
			),
			array(
				'name'  => 'White',
				'slug'  => 'vv-white',
				'color' => '#ffffff',
			),						
			array(
				'name'  => 'Dark green',
				'slug'  => 'vv-dark-green',
				'color' => '#117336',
			),
			array(
				'name'  => 'Green',
				'slug'  => 'vv-green',
				'color' => '#00A03A',
			),
			array(
				'name'  => 'Light green',
				'slug'  => 'vv-light-green',
				'color' => '#74CB9F',
			),
			array(
				'name'  => 'Yellow green',
				'slug'  => 'vv-yellow-green',
				'color' => '#AFCA0B',
			),
			array(
				'name'  => 'Yellow',
				'slug'  => 'vv-yellow',
				'color' => '#F2e500',
			)			
		);
	}

	/**
	 * Gutenberg setup.
	 */
	public function gutenberg_setup() {
		$theme_colors = $this->get_colors();
		add_theme_support( 'editor-color-palette', $theme_colors );
	}

	/**
	 * Add custom colors to Gutenberg.
	 */
	private function gutenberg_colors() {
		$theme_colors = $this->get_colors();
		$css = '';
		foreach ( $theme_colors as $key => $color) {
			$css .= '.has-' . esc_attr( $color['slug'] ) . '-color { color: ' . esc_attr( $color['color'] ) . ' !important; }';
			$css .= '.has-' . esc_attr( $color['slug'] ) . '-background-color { background-color: ' . esc_attr( $color['color'] ) . '; }';
		}
		return wp_strip_all_tags( $css );
	}

	/**
	 * Enqueue frontend Gutenberg styles.
	 * 
	 * Add custom colors to the front end.
	 * Works only if the 'vv-child' stylesheet has already been added.
	 */
	public function gutenberg_styles() {
		wp_add_inline_style( 'vv-child', $this->gutenberg_colors() );
	}

	/**
	 * Save custom color settings.
	 */
	public function set_default_theme_colors() {
		set_theme_mod(
			'accent_accessible_colors',
			array(
				'content'       => array(
					'text'      => $this->get_colors()[5]['color'], // Primary.
					'accent'    => $this->get_colors()[6]['color'], // Links.
					'secondary' => $this->get_colors()[3]['color'], // Subtle links (site description, post dates, back to top).
					'borders'   => $this->get_colors()[3]['color'], // Subtle Background.
				),
				'header-footer' => array(
					'text'      => $this->get_colors()[5]['color'],
					'accent'    => $this->get_colors()[6]['color'],
					'secondary' => $this->get_colors()[3]['color'], 
					'borders'   => $this->get_colors()[3]['color'],
				),
			)
		);
	}
	
	/**
	 * Overwrite customizer settings.
	 */
	public function overwrite_customizer_colors( $response ) {
		$this->set_default_theme_colors();
		return $response;
	}
}
