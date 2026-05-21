<?php
/**
 * template-parts/pagehead.php — 下層ページ共通の見出し帯
 *
 * 黒背景のページタイトル領域。英字ラベル・日本語タイトル・
 * リード文を引数で受け取る。
 *
 * 【呼び出し方】
 *   get_template_part( 'template-parts/pagehead', null, array(
 *       'en'    => 'Our Doctors',
 *       'title' => 'ドクター紹介',
 *       'lead'  => "あなたの「変わりたい」に向き合うのは、<br>...",
 *   ) );
 *
 * @package NOIR_Mens_Clinic
 */

$ph_en    = isset( $args['en'] )    ? $args['en']    : '';
$ph_title = isset( $args['title'] ) ? $args['title'] : get_the_title();
$ph_lead  = isset( $args['lead'] )  ? $args['lead']  : '';
?>
<div class="c-pagehead">
	<div class="l-wrap c-pagehead__inner">
		<?php if ( $ph_en ) : ?>
			<span class="c-pagehead__en"><?php echo esc_html( $ph_en ); ?></span>
		<?php endif; ?>
		<h1 class="c-pagehead__title"><?php echo esc_html( $ph_title ); ?></h1>
		<?php if ( $ph_lead ) : ?>
			<p class="c-pagehead__lead"><?php echo wp_kses( $ph_lead, array( 'br' => array() ) ); ?></p>
		<?php endif; ?>
	</div>
</div>
