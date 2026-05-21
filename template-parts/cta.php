<?php
/**
 * template-parts/cta.php — 予約への誘導 CTA バンド
 *
 * 各テンプレートの末尾で使う共通の予約導線。
 * 見出し・本文はページごとに変えたいので、引数で受け取る。
 *
 * 【呼び出し方】
 *   get_template_part( 'template-parts/cta', null, array(
 *       'title' => '医師に、直接相談する。',
 *       'text'  => "無料カウンセリングは24時間 WEB から受付。<br>...",
 *   ) );
 *
 * 第3引数の $args は WordPress 5.5 以降で get_template_part に渡せる。
 *
 * @package NOIR_Mens_Clinic
 */

// 引数が無いときの既定値（トップページ等で素朴に呼ぶ場合）。
$cta_title = isset( $args['title'] ) ? $args['title'] : '変わりたい、を今日からはじめる。';
$cta_text  = isset( $args['text'] )  ? $args['text']  : "無料カウンセリングは24時間 WEB から受付。<br>あなたのお悩みに、医師が直接お応えします。";
?>
<section class="p-cta">
	<div class="l-wrap p-cta__inner">
		<p class="c-eyebrow c-eyebrow--center c-eyebrow--on-dark p-cta__eyebrow">Reservation</p>
		<h2 class="p-cta__title"><?php echo wp_kses( $cta_title, array( 'br' => array(), 'em' => array() ) ); ?></h2>
		<p class="p-cta__text"><?php echo wp_kses( $cta_text, array( 'br' => array() ) ); ?></p>
		<div class="p-cta__actions">
			<a href="<?php echo esc_url( home_url( '/#reservation' ) ); ?>"
			   class="c-btn c-btn--primary c-btn--lg">
				<span>予約フォームへ進む</span>
				<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</a>
			<a href="tel:<?php echo esc_attr( noir_get_tel_raw() ); ?>"
			   class="c-btn c-btn--ghost-dark c-btn--lg">
				<span>電話で相談する</span>
			</a>
		</div>
	</div>
</section>
