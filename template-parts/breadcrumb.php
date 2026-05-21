<?php
/**
 * template-parts/breadcrumb.php — パンくずリスト
 *
 * 「ホーム / （親） / 現在ページ」を出力する。
 * 中間階層が必要なページ（症例詳細・診療詳細）のために、
 * $args['parent'] で親リンクを差し込めるようにしている。
 *
 * 【呼び出し方】
 *   // 親なし（ドクター紹介・お知らせ・プライバシー）
 *   get_template_part( 'template-parts/breadcrumb', null, array(
 *       'current' => 'ドクター紹介',
 *   ) );
 *
 *   // 親あり（症例詳細・診療詳細）
 *   get_template_part( 'template-parts/breadcrumb', null, array(
 *       'parent'      => array( 'label' => '施術メニュー', 'url' => home_url('/#menu') ),
 *       'current'     => '医療脱毛',
 *   ) );
 *
 * @package NOIR_Mens_Clinic
 */

$bc_parent  = isset( $args['parent'] )  ? $args['parent']  : null;
$bc_current = isset( $args['current'] ) ? $args['current'] : get_the_title();
?>
<nav class="c-breadcrumb" aria-label="パンくずリスト">
	<div class="l-wrap">
		<ol class="c-breadcrumb__list">
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
			<li class="c-breadcrumb__sep" aria-hidden="true">/</li>
			<?php if ( $bc_parent ) : ?>
				<li>
					<a href="<?php echo esc_url( $bc_parent['url'] ); ?>">
						<?php echo esc_html( $bc_parent['label'] ); ?>
					</a>
				</li>
				<li class="c-breadcrumb__sep" aria-hidden="true">/</li>
			<?php endif; ?>
			<li class="c-breadcrumb__current" aria-current="page">
				<?php echo esc_html( $bc_current ); ?>
			</li>
		</ol>
	</div>
</nav>
