<?php
/**
 * Drst agenda.
 *
 * @since 1.3.0
 * @package drst
 */
class DrstAgenda {

	/**
	 * Prefix used for elements that need a prefix
	 *
	 * @since 1.0.0
	 *
	 * @var string Prefix.
	 */
	const PREFIX = '_drst_agenda_';

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'new_cpt_agenda' ] );
		add_action( 'cmb2_admin_init', [ $this, 'add_metaboxes' ] );
		add_action( 'pre_get_posts', [ $this, 'frontend_filter' ] );

		add_action( 'manage_drst_agenda_posts_custom_column', [ $this, 'column_value' ], 10, 2 );
		add_filter( 'manage_drst_agenda_posts_columns', [ $this, 'columns' ] );
		add_filter( 'manage_edit-drst_agenda_sortable_columns', [ $this, 'sortable_columns' ] );
		add_action( 'pre_get_posts', [ $this, 'admin_orderby' ] );
	}

	/**
	 * Get agenda.
	 */
	public function get_agenda() {
		$sql_timestamp = $this->get_timestamp();
		$agenda_args   = [
			'post_type'        => 'drst_agenda',
			'post_status'      => 'publish',
			'posts_per_page'   => 999,
			'fields'           => 'ids',
			'suppress_filters' => true,
			'no_found_rows'    => true,
		];
		$agenda        = get_posts( $agenda_args );
		$agenda_sort   = [];

		foreach ( $agenda as $agenda_id ) {

			$end_time      = get_post_meta( $agenda_id , '_drst_agenda_end_time', true );
			$agenda_sort[] = [
				'id'   => $agenda_id,
				'time' => $end_time,
			];

			$exta_dates = get_post_meta( $agenda_id, '_drst_agenda_extra_dates', true );
			if ( $exta_dates ) {
				foreach ( (array) $exta_dates as $key => $entry ) {

					$agenda_sort[] = [
						'id'   => $agenda_id,
						'time' => $entry['end_time'],
					];
				}
			}
		}
		wp_reset_postdata();

		// Sort by timestamp.
		usort(
			$agenda_sort,
			function ( $first, $second ) {
				return $first['time'] > $second['time'];
			}
		);

		return $agenda_sort;
	}

	/**
	 * Timestamp
	 */
	public function get_timestamp() {
		return current_time( 'timestamp', 1 );
	}

	/**
	 * Shortcode.
	 */
	public function do_shortcode( $atts ) {

		$a = shortcode_atts(
			[
				'count' => 3,
			],
			$atts
		);
		$counter = 0;
		$max     = (int) $a['count'];

		$agenda_sort = $this->get_agenda();
		ob_start();

		if ( count( $agenda_sort ) > 0 ) :

			echo '<div class="vv-agenda-container">
				  	<div class="vv-agenda-header">
				  		<h2 class="vv-agenda-header__title">Agenda</h2>
				  		<a href="../agenda/" class="vv-agenda-header__link">Meer activiteiten</a>
				  	</div>
				  <div class="vv-agenda">';
	
			foreach ( $agenda_sort as $agenda_item ) :
				if ( $agenda_item['time'] < $this->get_timestamp() ) continue;
				
				if( $counter === $max ) break; // reached end of loop.

				global $post;
				$post = get_post( $agenda_item['id'] );
				setup_postdata( $post );

				echo '<div class="vv-agenda__item">';
				get_template_part( 'template-parts/content/content-agenda-excerpt' );
				echo '</div>';

				$counter++;
			endforeach;

			echo '</div></div>';
	
			endif;

		return ob_get_clean();
	}

	/**
	 * Create Agenda CPT.
	 *
	 * @since    1.0.0
	 */
	public function new_cpt_agenda() {
		$labels = array(
			'name'               => __( 'Agenda', 'drst' ),
			'singular_name'      => __( 'Event', 'drst' ),
			'menu_name'          => __( 'Agenda', 'drst' ),
			'name_admin_bar'     => __( 'Event', 'drst' ),
			'add_new'            => __( 'New event', 'drst' ),
			'add_new_item'       => __( 'Add new event', 'drst' ),
			'new_item'           => __( 'New event', 'drst' ),
			'edit_item'          => __( 'Edit event', 'drst' ),
			'view_item'          => __( 'View event', 'drst' ),
			'all_items'          => __( 'Agenda', 'drst' ),
			'search_items'       => __( 'Search Agenda', 'drst' ),
			'not_found'          => __( 'No events found.', 'drst' ),
			'not_found_in_trash' => __( 'No events found in trash.', 'drst' ),
		);
		$args = array(
			'labels'             => $labels,
			// 'description'        => __( 'Adds agenda to theme.', 'drst' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => apply_filters( 'drst_agenda_slug', 'agenda' ) ),
			'capability_type'    => 'post',
			'taxonomies'         => array( 'category', 'post_tag' ),
			'has_archive'        => apply_filters( 'drst_agenda_archive', false ),
			'menu_icon'          => 'dashicons-calendar-alt',
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
			'show_in_rest'       => true,
		);
		register_post_type( 'drst_agenda', $args );
	}

	/**
	 * CMB2 metaboxes.
	 * 
	 * Removed fields: Title, Location, Description and Extra dates.
	 * Implement these field in theme or extra plugin with filter:.
	 * add_action( 'cmb2_init__drst_agenda_metabox', [ $this, 'alter_metaboxes' ] );
	 * https://github.com/CMB2/CMB2-Snippet-Library/blob/master/filters-and-actions/cmb2_init_%24cmb_id-remove-field.php
	 *
	 * @since    1.2.4
	 */
	public function add_metaboxes() {

		$cmb = new_cmb2_box( 
			[
				'id'           => self::PREFIX . 'metabox',
				'title'        => __( 'Agenda', 'drst' ),
				'object_types' => [ 'drst_agenda' ],
			]
		);

		$cmb->add_field(
			[
				'name' => __( 'Start time', 'drst' ),
				'id'   => self::PREFIX . 'time',
				'type' => 'text_datetime_timestamp',
			]
		);

		$cmb->add_field(
			[
				'name' => __( 'End time', 'drst' ),
				'id'   => self::PREFIX . 'end_time',
				'type' => 'text_datetime_timestamp',
			]
		);
	}

	/**
	 * Columns.
	 * 
	 * @since 1.2.8
	 */
	public function columns( $columns ) {
		$columns = array(
			'cb'        => $columns['cb'],
			'title'     => __( 'Title' ),
			'drst-date' => __( 'Date', 'drst' ),
		);
		return $columns;
	}

	/**
	 * Column values.
	 * 
	 * @since 1.2.8
	 */
	public function column_value( $column, $post_id ) {

		if ( 'drst-date' === $column ) {
			$timestamp_start = get_post_meta( $post_id, '_drst_agenda_time', true );

			if ( ! $timestamp_start ) {
				_e( 'n/a' );  
			} else {
				echo date_i18n( get_option('date_format'), $timestamp_start );

				$timestamp_end = get_post_meta( $post_id, '_drst_agenda_end_time', true );
				if ( $timestamp_end ) {
					echo ' - ' . date_i18n( get_option('date_format'), $timestamp_end );
				}
			}
		}
	}

	/**
	 * Making Columns Sortable.
	 * 
	 * @since 1.2.8
	 */
	public function sortable_columns( $columns ) {
		$columns['drst-date'] = '_drst_agenda_time';
		return $columns;
	}

	/**
	 * Sort columns backend.
	 * 
	 * @since 1.2.8
	 */
	public function admin_orderby( $query ) {
		if( ! is_admin() || ! $query->is_main_query() || 'drst_agenda' !== $query->get( 'post_type' ) ) {
			return;
		}

		if ( '_drst_agenda_time' === $query->get( 'orderby') || ! $query->get( 'orderby') ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', '_drst_agenda_time' );
			$query->set( 'meta_type', 'numeric' );
		}
	}

	/**
	 * Filter agenda overview.
	 */
	function frontend_filter( $query ) {

		if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'drst_agenda' ) ) {
			$current_time = current_time( 'timestamp', 1 );
			
			if ( isset( $_GET['archive'] ) && true === (bool) $_GET['archive'] ) {
				$compare = '<';
				$order = 'DESC';
			} else {
				$compare = '>';
				$order = 'ASC';
			}
	
			$query->set( 'meta_key', '_drst_agenda_time' );
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', $order);
			$query->set(		
				'meta_query', 
				[
					[
						'key'     => '_drst_agenda_end_time',
						'value'   => $current_time,
						'compare' => $compare,
					]
				]
			);
		}
	}
}
