<?php
/**
 * header.php — 全ページ共通のヘッダー
 *
 * <head> 〜 グローバルヘッダー・ドロワーまでを出力する。
 * 各テンプレートは get_header() でこのファイルを読み込む。
 *
 * 【WordPress 化のポイント】
 *  - 静的パス（../assets/css/...）は get_template_directory_uri() に置換
 *  - 静的リンク（../index.html#xxx）は home_url() に置換
 *  - CSS / JS の読み込みは functions.php の wp_enqueue で行うため、
 *    ここでは <head> 内に wp_head() を置くだけにする
 *  - グローバルナビは wp_nav_menu() で管理画面から編集可能にする
 *
 * @package NOIR_Mens_Clinic
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0a0a0a">
<meta name="format-detection" content="telephone=no">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="u-skip-link" href="#main">本文へスキップ</a>

<!-- ==========================================================
     HEADER — 全ページ共通
========================================================== -->
<header class="l-header<?php echo is_front_page() ? '' : ' is-solid'; ?>" id="js-header">
	<div class="l-header__inner">
		<a class="l-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"
		   aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> ホーム">
			<span class="l-logo__mark">N<em>O</em>IR</span>
			<span class="l-logo__sub">Men's Clinic</span>
		</a>

		<nav class="l-header__nav" aria-label="グローバルナビゲーション">
			<?php
			/*
			 * グローバルナビ。
			 * 管理画面［外観 > メニュー］で編集できるよう wp_nav_menu を使う。
			 * メニュー未設定時は noir_fallback_menu() で既定リンクを表示。
			 */
			wp_nav_menu( array(
				'theme_location' => 'global',
				'container'      => false,
				'menu_class'     => 'l-header__nav-list',
				'fallback_cb'    => 'noir_fallback_menu',
				'depth'          => 1,
			) );
			?>
		</nav>

		<div class="l-header__actions">
			<a href="<?php echo esc_url( home_url( '/#reservation' ) ); ?>"
			   class="c-btn c-btn--primary u-pc-only">
				<span>カウンセリング予約</span>
			</a>
			<button class="l-burger" id="js-burger" type="button"
			        aria-label="メニューを開く" aria-expanded="false" aria-controls="js-drawer">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>

<!-- ==========================================================
     DRAWER — モバイル用メニュー
========================================================== -->
<div class="l-overlay" id="js-overlay" aria-hidden="true"></div>
<nav class="l-drawer" id="js-drawer" aria-label="モバイルメニュー" aria-hidden="true">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'drawer',
		'container'      => false,
		'menu_class'     => 'l-drawer__list',
		'fallback_cb'    => 'noir_fallback_drawer',
		'depth'          => 1,
	) );
	?>
	<div class="l-drawer__foot">
		<a class="l-drawer__tel" href="tel:<?php echo esc_attr( noir_get_tel_raw() ); ?>">
			<span class="l-drawer__tel-num"><?php echo esc_html( noir_get_tel_display() ); ?></span>
			<span class="l-drawer__tel-label">受付 11:00 - 20:00 / 年中無休</span>
		</a>
		<a href="<?php echo esc_url( home_url( '/#reservation' ) ); ?>"
		   class="c-btn c-btn--primary c-btn--block">
			<span>無料カウンセリング予約</span>
		</a>
	</div>
</nav>
