<?php
/**
 * functions.php — テーマの基本設定
 *
 * 【このファイルの責務】
 *  1. テーマサポート（title-tag, post-thumbnails 等）
 *  2. CSS / JS の読み込み（wp_enqueue）
 *  3. ナビメニューの登録
 *  4. テンプレートで使うヘルパー関数
 *  5. ナビ未設定時の fallback 関数
 *
 * ※ 既存テーマに functions.php がある場合は、
 *   重複する宣言を避けつつ、4〜5 のヘルパー／fallback を
 *   マージしてください（関数名はすべて noir_ プレフィックス付き）。
 *
 * @package NOIR_Mens_Clinic
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // 直接アクセス禁止
}


/* ==========================================================
   1. テーマサポート
   ========================================================== */
function noir_setup() {
	// <title> を WordPress に管理させる
	add_theme_support( 'title-tag' );
	// アイキャッチ画像（症例・お知らせのサムネイル用）
	add_theme_support( 'post-thumbnails' );
	// HTML5 マークアップ
	add_theme_support( 'html5', array(
		'search-form', 'gallery', 'caption', 'style', 'script',
	) );
	// 自動フィードリンク
	add_theme_support( 'automatic-feed-links' );

	// ナビメニューの登録（管理画面［外観 > メニュー］に出る）
	register_nav_menus( array(
		'global'      => 'グローバルナビ（ヘッダー）',
		'drawer'      => 'モバイルメニュー（ドロワー）',
		'footer-menu' => 'フッター — Menu',
		'footer-info' => 'フッター — Information',
	) );
}
add_action( 'after_setup_theme', 'noir_setup' );


/* ==========================================================
   2. CSS / JS の読み込み
   ----------------------------------------------------------
   静的サイトでは <link>/<script> を直書きしていたが、
   WordPress では wp_enqueue_* で読み込むのが作法。
   重複読み込みの防止、依存関係の解決、子テーマからの
   上書きなどが正しく効くようになる。
   ========================================================== */
function noir_enqueue_assets() {
	$theme_uri = get_template_directory_uri();
	$theme_dir = get_template_directory(); // サーバー上の実パス（filemtime 用）

	/*
	 * 【キャッシュ対策 — 重要】
	 *  CSS / JS のバージョンには filemtime()（ファイル最終更新時刻）を使う。
	 *  wp_get_theme()->get('Version') は style.css の「Version: 1.0.0」を
	 *  読むだけで、CSS を修正しても値が変わらない。その結果、ブラウザや
	 *  サーバーが style.css?ver=1.0.0 を「同じファイル」とみなし、
	 *  古い CSS をキャッシュから配信し続ける（＝修正が反映されない）。
	 *
	 *  filemtime() はファイルを保存し直すたびに値が変わるため、
	 *  URL が style.css?ver=1715900000 のように自動更新され、
	 *  キャッシュが必ず破棄される。
	 *
	 *  file_exists() で囲うのは、万一ファイルが無くても
	 *  filemtime() の警告でページが壊れないようにする保険。
	 */
	$css_path = $theme_dir . '/assets/css/style.css';
	$js_path  = $theme_dir . '/assets/js/main.js';
	$css_ver  = file_exists( $css_path ) ? filemtime( $css_path ) : '1.0.0';
	$js_ver   = file_exists( $js_path )  ? filemtime( $js_path )  : '1.0.0';

	// Google Fonts
	wp_enqueue_style(
		'noir-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Jost:wght@400;500;600&family=Noto+Serif+JP:wght@400;500;600&family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap',
		array(),
		null
	);

	// メインスタイル（assets/css/style.css に統一・filemtime でキャッシュ制御）
	wp_enqueue_style(
		'noir-style',
		$theme_uri . '/assets/css/style.css',
		array( 'noir-fonts' ),
		$css_ver
	);

	// メイン JS（フッター読み込み・defer 相当・filemtime でキャッシュ制御）
	wp_enqueue_script(
		'noir-main',
		$theme_uri . '/assets/js/main.js',
		array(),
		$js_ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'noir_enqueue_assets' );

/**
 * Google Fonts に preconnect を付与（表示速度の最適化）。
 */
function noir_resource_hints( $hints, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = array( 'href' => 'https://fonts.googleapis.com' );
		$hints[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'noir_resource_hints', 10, 2 );


/* ==========================================================
   3. クリニック情報のヘルパー関数
   ----------------------------------------------------------
   電話番号・住所などサイト全体で使う値を1か所に集約。
   将来カスタマイザや ACF で管理画面化する場合も、
   呼び出し側（テンプレート）を変えずに済む。
   ========================================================== */

/** 電話番号（tel: リンク用 / ハイフンなし） */
function noir_get_tel_raw() {
	return apply_filters( 'noir_tel_raw', '0312345678' );
}

/** 電話番号（表示用 / ハイフンあり） */
function noir_get_tel_display() {
	return apply_filters( 'noir_tel_display', '03-1234-5678' );
}

/** クリニック住所 */
function noir_get_address() {
	return apply_filters( 'noir_address', '東京都港区西麻布 1-2-3 NOIR Building 5F' );
}

/**
 * 固定ページのURLを slug から取得する。
 * 例: noir_get_page_url('privacy') → プライバシーポリシー固定ページのURL。
 * 固定ページが無い場合はトップへフォールバック。
 */
function noir_get_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page->ID ) : home_url( '/' );
}


/* ----------------------------------------------------------
   関数名エイリアス
   ----------------------------------------------------------
   front-page.php は noir_address() / noir_hours() /
   noir_tel_display() / noir_tel_link() という短い名前で
   呼んでいる。一方このファイルの正式名は noir_get_* 系。
   テンプレート側を書き換えず動かすため、エイリアスを定義する。

   ※ 関数が既に定義済みかを function_exists() で確認してから
     宣言することで、将来 functions.php を分割・マージしても
     「重複定義」エラーにならないようにしている。
   ---------------------------------------------------------- */

if ( ! function_exists( 'noir_address' ) ) {
	/** 住所（noir_get_address のエイリアス） */
	function noir_address() {
		return noir_get_address();
	}
}

if ( ! function_exists( 'noir_tel_display' ) ) {
	/** 電話番号・表示用（noir_get_tel_display のエイリアス） */
	function noir_tel_display() {
		return noir_get_tel_display();
	}
}

if ( ! function_exists( 'noir_tel_link' ) ) {
	/** 電話番号・tel:リンク用（noir_get_tel_raw のエイリアス） */
	function noir_tel_link() {
		return noir_get_tel_raw();
	}
}

if ( ! function_exists( 'noir_hours' ) ) {
	/**
	 * 診療時間。
	 * front-page.php が呼ぶが、これまで未定義だった
	 * （= 呼ばれた瞬間に PHP Fatal Error でページが真っ白に
	 *   なる原因になっていた）。ここで新規に定義して解消する。
	 */
	function noir_hours() {
		return apply_filters( 'noir_hours', '11:00 - 20:00 / 年中無休・完全予約制' );
	}
}


/* ==========================================================
   4. ナビメニュー未設定時の fallback
   ----------------------------------------------------------
   管理画面でメニュー未設定でも、静的サイトと同じ
   リンクが表示されるようにする保険。
   メニューを設定すれば、こちらは自動的に使われなくなる。
   ========================================================== */

/** グローバルナビの既定リンク */
function noir_fallback_menu() {
	$items = array(
		'/#philosophy' => 'クリニック',
		'/#menu'       => '施術メニュー',
		'/#case'       => '症例',
		'/#pricing'    => '料金',
		'/#faq'        => 'FAQ',
		'/#access'     => 'アクセス',
	);
	echo '<ul class="l-header__nav-list">';
	foreach ( $items as $path => $label ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( home_url( $path ) ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/** ドロワーの既定リンク（番号付き） */
function noir_fallback_drawer() {
	$items = array(
		'/#philosophy' => 'クリニック紹介',
		'/#menu'       => '施術メニュー',
		'/#case'       => '症例紹介',
		'/#pricing'    => '料金表',
		'/#flow'       => '来院の流れ',
		'/#faq'        => 'よくあるご質問',
		'/#access'     => 'アクセス',
	);
	echo '<ul class="l-drawer__list">';
	$i = 1;
	foreach ( $items as $path => $label ) {
		printf(
			'<li><a href="%s"><span class="l-drawer__num">%02d</span><span class="l-drawer__label">%s</span></a></li>',
			esc_url( home_url( $path ) ),
			$i,
			esc_html( $label )
		);
		$i++;
	}
	echo '</ul>';
}

/** フッター Menu の既定リンク */
function noir_fallback_footer_menu() {
	$items = array(
		'/#philosophy' => 'クリニック紹介',
		'/#menu'       => '施術メニュー',
		'/#case'       => '症例紹介',
		'/#pricing'    => '料金表',
	);
	noir_render_footer_links( $items );
}

/** フッター Information の既定リンク */
function noir_fallback_footer_info() {
	$items = array(
		noir_get_page_url( 'doctor' )  => 'ドクター紹介',
		noir_get_page_url( 'news' )    => 'お知らせ',
		home_url( '/#access' )         => 'アクセス',
		noir_get_page_url( 'privacy' ) => 'プライバシーポリシー',
	);
	echo '<ul class="l-footer__links">';
	foreach ( $items as $url => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

/** フッターリンクの共通描画（home_url を付与するタイプ） */
function noir_render_footer_links( $items ) {
	echo '<ul class="l-footer__links">';
	foreach ( $items as $path => $label ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( home_url( $path ) ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}


/* ==========================================================
   5. SEO 補助 — プライバシーページの noindex
   ----------------------------------------------------------
   静的版では privacy.html に <meta name="robots" content="noindex">
   を直書きしていた。WordPress では wp_head フックで、
   該当テンプレートのときだけ出力する。
   ========================================================== */
function noir_noindex_for_privacy() {
	if ( is_page_template( 'page-privacy.php' ) ) {
		echo '<meta name="robots" content="noindex">' . "\n";
	}
}
add_action( 'wp_head', 'noir_noindex_for_privacy', 1 );
