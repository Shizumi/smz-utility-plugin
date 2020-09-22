<?php
/**
 * Plugin Name: 汎用プラグイン
 * Description: 汎用的な機能が入っています。
 * Version:     1.0.0
 * Author:      Shizumi Yoshiaki
 * Author URI:  https://blog.spicadots.com/
 */

if ( ! function_exists( 'image_url_exists' ) ) {
	/**
	 * ファイルが存在するかのチェック
	 *
	 * @param $url
	 * @return bool
	 */
	function image_url_exists( $url ) {
		$parsed_url = parse_url( $url )['path'];
		$upload_dir = wp_upload_dir()[ 'basedir' ];
		$upload_str = apply_filters( 'smz_upload_dir', 'wp-content/uploads' );

		$file_path = $upload_dir . substr( $parsed_url , strpos( $parsed_url, $upload_str ) + strlen( $upload_str ) );

		return ( file_exists( $file_path ) && is_file( $file_path ) && is_readable( $file_path ) );
	}
}
