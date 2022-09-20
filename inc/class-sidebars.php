<?php
/**
 * Drst Sidebars.
 */
class DrstSidebars {

	/**
	 * Prefix used for elements that need a prefix
	 *
	 * @since 1.0.0
	 *
	 * @var string Prefix.
	 */
	const PREFIX = '_drst_';

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
        add_action( 'widgets_init', [$this,'widgets_init'] );
	}

    public function widgets_init() {
        register_sidebar(
            [
                'name'          => esc_html__( 'Hamburger sidebar', 'drst' ),
                'id'            => 'vv-hamburger',
                'description'   => esc_html__( 'Add widgets here.', 'drst' ),
                'before_widget' => '<div id="%1$s" class="vv-sidebar-widgets__widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="vv-sidebar-widgets__widget-title">',
                'after_title'   => '</h2>',
            ]
        );
    }

}
