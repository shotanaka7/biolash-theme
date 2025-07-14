<?php
/**
 * functions.php
 */

// HTML5マークアップ対応
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		register_nav_menus(
			array(
				'ft-nav' => __( 'フッター', 'biolash' ),
			)
		);
	}
);

// スクリプト・スタイル読み込み
function biolash_enqueue_scripts() {
	wp_enqueue_style(
		'biolash-custom-style',
		get_template_directory_uri() . '/assets/dist/css/style.css',
		array(),
		filemtime( get_template_directory() . '/assets/dist/css/style.css' )
	);

	wp_enqueue_style( 'biolash-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
	wp_enqueue_script(
		'biolash-custom-script',
		get_template_directory_uri() . '/assets/dist/js/index.js',
		array(),
		filemtime( get_template_directory() . '/assets/dist/js/index.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'biolash_enqueue_scripts' );

/**
 * 独自関数
 */
// 画像ディレクトリのパスを取得する関数
if ( ! function_exists( 'imgDir' ) ) {
	function imgDir() {
		echo get_template_directory_uri() . '/assets/img';
	}
}