<?php
/**
 * Drst SVG.
 */
class DrstSvg {

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
        add_filter( 'wp_check_filetype_and_ext', [$this, 'check_filetype'], 10, 4);
        add_filter( 'upload_mimes', [$this, 'upload_mimes'] );
	}

    public function check_filetype ($data, $file, $filename, $mimes) {

        if (!$data['type']) {
            $wp_filetype = wp_check_filetype($filename, $mimes);
            $ext = $wp_filetype['ext'];
            $type = $wp_filetype['type'];
            $proper_filename = $filename;
            if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
                $ext = $type = false;
            }
            $data['ext'] = $ext;
            $data['type'] = $type;
            $data['proper_filename'] = $proper_filename;
        }
        return $data;
    }

    public function upload_mimes( $mimes ) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}
