<?php
/**
 * Archive title.
 * 
 * Todo: refactor as class.
 */
function vv_archive_title( $title ) {

	if ( is_category() ) {
		$title = single_cat_title( '', false );

	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );

	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';

	} elseif ( is_home() ) {
		$title = get_the_title( get_option( 'page_for_posts' ) );

	} elseif ( is_post_type_archive() ) {
		switch ( get_post_type() ) {
			case 'post':
				$title = get_the_title( get_option( 'page_for_posts' ) );
				break;
			// case 'drst_agenda':

			// 	if ( isset( $_GET['archive'] ) && true === (bool) $_GET['archive'] ) {
			// 		$title = 'Previous <u>events</u>';
			// 	} else {
			// 		$title = 'Upcoming <u>events</u>';
			// 	}
			// 	break;
			default:
				$title = post_type_archive_title( '', false );
				break;
		}

	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );

	}
	return $title;
}
add_filter( 'get_the_archive_title', 'vv_archive_title' );
